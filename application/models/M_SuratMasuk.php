<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SuratMasuk
 *
 * @author Ganteng Imut
 */
class M_SuratMasuk extends CI_Model{
    //put your code here
    function __construct(){
        parent::__construct();
    }
    
    function insert($data){
        $this->db->insert('t_surat_msk', $data);
    }
    
    function selectAll(){
        // ganti pake procedure
//        $this->db->select('*');
//        $this->db->from('t_surat_masuk');
//		$this->db->order_by('sms_id', 'desc');
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
	ORDER BY t_surat_msk.sms_id DESC")->result();
        return $data;
    }
    function selectById($id){
        // ganti pake procedure
//        $this->db->select('*');
//        $this->db->from('t_surat_masuk');
//        $this->db->where('sms_id', $id);
//        return $this->db->get();
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
	WHERE t_surat_msk.sms_id = '$id' 
	AND t_surat_msk.sms_deleted = '0'")->row();
        return $data;
    }
     
    function update($id, $data){
        $this->db->where('sms_id', $id);
        $this->db->update('t_surat_msk', $data);
    }
    
    function delete($id){
	$data['deleted'] = '1';
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
}
