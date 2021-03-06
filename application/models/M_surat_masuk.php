<?php

class M_surat_masuk extends CI_Model{
    //put your code here
    function __construct(){
        parent::__construct();
		$this->load->library('Datatables');
    }
    
	function selectTotalBulan($totalMonthBefore){
		return $this->db->query("SELECT DATE_FORMAT(sms_tgl_srt_diterima, '%Y') as 'year',
		MONTHNAME(sms_tgl_srt_diterima) as 'month',
		COUNT(*) as 'total'
		FROM t_surat_msk
		WHERE MONTH(sms_tgl_srt_diterima) <= $totalMonthBefore
		and sms_tgl_srt_diterima is not null
		GROUP BY DATE_FORMAT(sms_tgl_srt_diterima, '%Y%m')")->result();
	}
	
    function insert($data){
        $this->db->insert('t_surat_msk', $data);
    }
    
	function selectAjax($min, $max){
                $this->db->query("SET lc_time_names = 'id_ID'");
                //setlocale(LC_ALL, 'IND');
		$this->datatables
			->select('sms_id, sms_no_agenda, sms_nomor_surat, DATE_FORMAT(sms_tgl_srt,"%e %M %Y") as sms_tgl_srt, sms_pengirim, sms_perihal, DATE_FORMAT(sms_tgl_srt_diterima,"%e %M %Y") as sms_tgl_srt_diterima, DATE_FORMAT(sms_tgl_srt_dtlanjut,"%e-%M-%Y") as sms_tgl_srt_dtlanjut, sms_keterangan, sms_status_terkirim, sms_confirm_status, usr_userName, usr_nama')
			->from('t_surat_msk')
			->where('sms_deleted','0')
			->where('sms_tgl_srt_diterima >= ', $min)
			->where('sms_tgl_srt_diterima <= ', $max)
			->join('t_user', 't_surat_msk.sms_edited_by = t_user.usr_id', 'left');
		$this->datatables->add_column('no_tgl', '$1<br>$2', 'sms_nomor_surat, sms_tgl_srt');
		$this->datatables->add_column('pengirim_perihal', '$1<br>$2', 'sms_pengirim, sms_perihal');
		$this->datatables->add_column('terima_tenggat', '$1<br>$2', 'sms_tgl_srt_diterima, sms_tgl_srt_dtlanjut');
		$this->datatables->add_column('sms_confirm', '<?php if($2 == 1){echo "fak";}?><a class="btn btn-danger btn-sm confirm" data-toggle="tooltip" data-placement="top" title="Konfirmasi terima form disposisi" data-confirm="Anda yakin telah mendapatkan form disposisi dari operator?" data-href="SuratMasuk/konfirmasi/$1"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>', 'sms_id, sms_confirm_status');
		$this->datatables->edit_column('sms_aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-sm btn-primary' data-toggle='tooltip' data-placement='top' title='Lihat detail' href='SuratMasuk/detail_surat_masuk/$1'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></a>".
			"<a class='btn btn-sm btn-danger delete' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Are you sure to delete this item?' href='SuratMasuk/delete_smasuk/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>".
			"<a class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='top' title='Edit' href='SuratMasuk/edit_surat_masuk/$1'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>".
			"<a class='btn btn-sm btn-success' data-toggle='tooltip' data-placement='top' title='Buat Disposisi' href='disposisi/buat_disposisi/$1'><span class='glyphicon glyphicon-share-alt' aria-hidden='true'></span></a>".
			"<a target= '_blank' class='btn btn-sm btn-warning' data-toggle='tooltip' data-placement='top' title='Print' href='SuratMasuk/disposisi_cetak/$1'><span class='glyphicon glyphicon-print' aria-hidden='true'></span></a>".
                        "</div>".
			"</form>".
		"",'sms_id');
		$this->datatables->edit_column('sms_view',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-primary' data-toggle='tooltip' data-placement='top' title='Lihat detail' href='SuratMasuk/detail_surat_masuk/$1'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></a>".
			"</div>".
			"</form>".
		"",'sms_id');
		return $this->datatables->generate();
	}
	
    function selectAll(){
        // ganti pake procedure
//        $this->db->select('*');
//        $this->db->from('t_surat_masuk');
//		$this->db->order_by('sms_id', 'desc');
         $this->db->query("SET lc_time_names = 'id_ID'");
        $data = $this->db->query("SELECT	t_surat_msk.sms_id, t_surat_msk.sms_nomor_surat, t_surat_msk.sms_tgl_srt, 
			t_surat_msk.sms_tgl_srt_diterima, t_surat_msk.sms_tgl_srt_dtlanjut,
			t_surat_msk.sms_tenggat_wkt, t_surat_msk.sms_perihal, t_surat_msk.sms_jenis_surat, 
			t_surat_msk.sms_no_agenda, t_surat_msk.sms_unit_tujuan, t_surat_msk.sms_keterangan,t_surat_msk.sms_indek,t_surat_msk.sms_kode,t_surat_msk.sms_lampiran, 
			t_surat_msk.sms_edited_by, t_surat_msk.sms_status_terkirim, t_surat_msk.sms_file, 
			t_surat_msk.sms_pengirim, t_surat_msk.sms_deleted,
			t_unit_tujuan.utj_unit_tujuan, t_jenis_surat_masuk.jsm_nama_jenis, 
			t_user.usr_userName		
	FROM t_surat_msk
	LEFT JOIN t_jenis_surat_masuk
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
	LEFT JOIN t_unit_tujuan
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id
	LEFT JOIN t_user
	ON t_surat_msk.sms_unit_tujuan = t_user.usr_id
	WHERE t_surat_msk.sms_deleted = '0'
	ORDER BY t_surat_msk.sms_id DESC")->result();
        return $data;
    }
    function selectById($id){
        // ganti pake procedure
        $this->db->query("SET lc_time_names = 'id_ID'");
        $this->db
		->select('*, DATE_FORMAT(sms_tgl_srt,"%e %M %Y") as sms_tgl_srt, DATE_FORMAT(sms_tgl_srt_diterima,"%e %M %Y") as sms_tgl_srt_diterima')
        ->from('t_surat_msk')
        ->where('sms_id', $id)
		->where('sms_deleted', '0')
		->join('t_jenis_surat_masuk', 't_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id', 'left')
		->join('t_unit_tujuan', 't_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id', 'left')
		->join('t_user','t_surat_msk.sms_unit_tujuan = t_user.usr_id', 'left');
        return $this->db->get()->row();
    }
     
    function update($id, $data){
        $this->db->where('sms_id', $id);
        $this->db->update('t_surat_msk', $data);
    }
    
    function delete($id){
		$data['sms_deleted'] = '1';
        $this->db->where('sms_id', $id);
        $this->db->update('t_surat_msk', $data);
    }
    
    // function yang digunakan oleh paginationsample
    function selectAllPaging($limit=array()){
        // ganti pake procedure
//        $this->db->select('*');
//        $this->db->from('tf_surat_masuk');
//        $this->db->order_by('id', 'desc');
//        if ($limit != NULL)
//        $this->db->limit($limit['perpage'], $limit['offset']);
//        return $this->db->get();
         $this->db->query("SET lc_time_names = 'id_ID'");
        $lmt = $limit['perpage'];
        $ofs = $limit['offset']; 
        $data = $this->db->query("SELECT	t_surat_msk.sms_id, t_surat_msk.sms_nomor_surat, t_surat_msk.sms_tgl_srt, 
			t_surat_msk.sms_tgl_srt_diterima, t_surat_msk.sms_tgl_srt_dtlanjut,
			t_surat_msk.sms_tenggat_wkt, t_surat_msk.sms_perihal, t_surat_msk.sms_jenis_surat, 
			t_surat_msk.sms_no_agenda, t_surat_msk.sms_unit_tujuan, t_surat_msk.sms_keterangan, 
			t_surat_msk.sms_edited_by, t_surat_msk.sms_status_terkirim, t_surat_msk.sms_file, 
			t_surat_msk.sms_pengirim, t_surat_msk.sms_deleted,
			t_unit_tujuan.utj_unit_tujuan, t_jenis_surat_masuk.jsm_nama_jenis, 
			t_user.usr_userName		
	FROM t_surat_msk 
	LEFT JOIN t_jenis_surat_masuk 
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id 
	LEFT JOIN t_unit_tujuan 
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id 
	LEFT JOIN t_user 
	ON t_surat_msk.sms_unit_tujuan = t_user.usr_id 
	WHERE t_surat_msk.sms_deleted = '0' 
	ORDER BY t_surat_msk.sms_id DESC
	LIMIT $ofs, $lmt")->result();
        //$this->db->free_db_resource();
        return $data;
    }
    
    function searchSuratMasuk($search, $dateAwal, $dateAkhir, $limit=array()){
        $lmt = $limit['perpage'];
        $ofs = $limit['offset'];
         $this->db->query("SET lc_time_names = 'id_ID'");
        $data = $this->db->query("SELECT	t_surat_msk.sms_id, t_surat_msk.sms_nomor_surat, t_surat_msk.sms_tgl_srt, 
			t_surat_msk.sms_tgl_srt_diterima, t_surat_msk.sms_tgl_srt_dtlanjut,
			t_surat_msk.sms_tenggat_wkt, t_surat_msk.sms_perihal, t_surat_msk.sms_jenis_surat, 
			t_surat_msk.sms_no_agenda, t_surat_msk.sms_unit_tujuan, t_surat_msk.sms_keterangan, 
			t_surat_msk.sms_edited_by, t_surat_msk.sms_status_terkirim, t_surat_msk.sms_file, 
			t_surat_msk.sms_pengirim, t_surat_msk.sms_deleted,
			t_unit_tujuan.utj_unit_tujuan, t_jenis_surat_masuk.jsm_nama_jenis, 
			t_user.usr_userName		
	FROM t_surat_msk
	LEFT JOIN t_jenis_surat_masuk
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
	LEFT JOIN t_unit_tujuan
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id
	LEFT JOIN t_user
	ON t_surat_msk.sms_pengirim = t_user.usr_id
	WHERE UPPER(t_surat_msk.sms_id) like CONCAT('%',UPPER('$search'),'%')
	OR UPPER(t_surat_msk.sms_nomor_surat) like CONCAT('%',UPPER('$search'),'%')
	OR UPPER(t_surat_msk.sms_perihal) like CONCAT('%',UPPER('$search'),'%')
	OR UPPER(t_surat_msk.sms_no_agenda) like CONCAT('%',UPPER('$search'),'%')
	OR UPPER(t_surat_msk.sms_keterangan) like CONCAT('%',UPPER('$search'),'%')
	OR UPPER(t_user.usr_username) like CONCAT('%',UPPER('$search'),'%')
	OR UPPER(t_surat_msk.sms_pengirim) like CONCAT('%',UPPER('$search'),'%')
	AND t_surat_msk.sms_tgl_srt_diterima >= '$dateAwal'
	AND t_surat_msk.sms_tgl_srt_dtlanjut <= '$dateAkhir'
	AND t_surat_msk.sms_deleted = '0'
        ORDER BY t_surat_msk.sms_id DESC
	LIMIT $ofs, $lmt")->result();
        return $data;    
    }
}
