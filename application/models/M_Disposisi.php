<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Disposisi
 *
 * @author Ganteng Imut
 */
class M_disposisi extends CI_Model{
    //put your code here
    //put your code here
    function __construct(){
        parent::__construct();
		$this->load->library('Datatables');
        $this->load->model('m_disposisi_instruksi');
        $this->load->model('m_disposisi_unit_terusan');
    }
	
	function selectTotalBulan($totalMonthBefore){
		return $this->db->query("SELECT DATE_FORMAT(fds_tgl_disposisi, '%Y') as 'year',
		MONTHNAME(fds_tgl_disposisi) as 'month',
		COUNT(*) as 'total'
		FROM t_form_disposisi
		WHERE MONTH(fds_tgl_disposisi) <= $totalMonthBefore
		and fds_tgl_disposisi is not null
		GROUP BY DATE_FORMAT(fds_tgl_disposisi, '%Y%m')")->result();
	}
	
	function selectAjax($min, $max){
		$this->datatables
			->select('fds_id, sms_nomor_surat, usr_username, usr_nama, fds_catatan, DATE_FORMAT(fds_tgl_disposisi, "%d-%m-%Y") as fds_tgl_disposisi, sms_id')
			->from('t_form_disposisi')
			->where('fds_deleted','0')
			->where('fds_tgl_disposisi >= ', $min)
			->where('fds_tgl_disposisi <= ', $max)
			->join('t_user', 't_user.usr_id = t_form_disposisi.fds_pengirim', 'left')
			->join('t_surat_msk', 't_surat_msk.sms_id = t_form_disposisi.fds_id_surat', 'left');
		$this->datatables->edit_column('fds_aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-primary' data-toggle='tooltip' data-placement='top' title='Lihat detail' href=".base_url()."disposisi/detail_disposisi/$1><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></a>".
			"<a class='btn btn-danger delete' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Are you sure to delete this item?' href=".base_url()."disposisi/hapus_disposisi/$1><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>".
			"<a class='btn btn-info' data-toggle='tooltip' data-placement='top' title='Edit' href=".base_url()."disposisi/edit_disposisi/$1><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>".
			"<a class='btn btn-success' data-toggle='tooltip' data-placement='top' title='Tambahkan Disposisi' href=".base_url()."disposisi/tambah_disposisi/$1><span class='glyphicon glyphicon-share-alt' aria-hidden='true'></span></a>".
			"<a class='btn btn-warning' data-toggle='tooltip' data-placement='top' title='Tracking disposisi' href=".base_url()."disposisi/tracking/$2><span class='glyphicon glyphicon-search' aria-hidden='true'></span></a>".
			"</div>".
			"</form>".
		"",'fds_id, sms_id');
		return $this->datatables->generate();
	}
	
	function selectAjaxByUserMasuk($min, $max, $user){
		$this->datatables
			->select('fds_id, sms_nomor_surat, usr_username, usr_nama, fds_catatan,  DATE_FORMAT(fds_tgl_disposisi, "%d-%m-%Y") as fds_tgl_disposisi, sms_id')
			->from('t_form_disposisi')
			->where('fds_deleted','0')
			->where('fds_tgl_disposisi >= ', $min)
			->where('fds_tgl_disposisi <= ', $max)
			->join('t_user', 't_user.usr_id = t_form_disposisi.fds_pengirim', 'left')
			->join('tr_disposisi_user', 'tr_disposisi_user.dus_disposisi = t_form_disposisi.fds_id', 'left')
			->join('t_surat_msk', 't_surat_msk.sms_id = t_form_disposisi.fds_id_surat', 'left')
			->where('tr_disposisi_user.dus_user', $user);
		$this->datatables->edit_column('fds_aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-primary' data-toggle='tooltip' data-placement='top' title='Lihat detail' href=".base_url()."disposisi/detail_disposisi/$1><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></a>".
			"<a class='btn btn-success' data-toggle='tooltip' data-placement='top' title='Tambahkan disposisi' href=".base_url()."disposisi/tambah_disposisi/$1><span class='glyphicon glyphicon-share-alt' aria-hidden='true'></span></a>".
			"<a class='btn btn-warning' data-toggle='tooltip' data-placement='top' title='Tracking disposisi' href=".base_url()."disposisi/tracking/$2><span class='glyphicon glyphicon-search' aria-hidden='true'></span></a>".
			"</div>".
			"</form>".
		"",'fds_id,sms_id');
		return $this->datatables->generate();
	}
	
	function selectAjaxByUserKeluar($min, $max, $user){
		$this->datatables
			->select('fds_id, sms_nomor_surat, usr_username, usr_nama, fds_catatan,  DATE_FORMAT(fds_tgl_disposisi, "%d-%m-%Y") as fds_tgl_disposisi, sms_id')
			->from('t_form_disposisi')
			->where('fds_deleted','0')
			->where('fds_tgl_disposisi >= ', $min)
			->where('fds_tgl_disposisi <= ', $max)
			->join('t_user', 't_user.usr_id = t_form_disposisi.fds_pengirim', 'left')
			->join('t_surat_msk', 't_surat_msk.sms_id = t_form_disposisi.fds_id_surat', 'left')
			->where('t_user.usr_id', $user);
		$this->datatables->edit_column('fds_aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-primary' data-toggle='tooltip' data-placement='top' title='Lihat detail' href=".base_url()."disposisi/detail_disposisi/$1><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></a>".
			"<a class='btn btn-danger delete' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Are you sure to delete this item?' href=".base_url()."disposisi/hapus_disposisi/$1><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>".
			"<a class='btn btn-info' data-toggle='tooltip' data-placement='top' title='Edit' href=".base_url()."disposisi/edit_disposisi/$1><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>".
			"<a class='btn btn-success' data-toggle='tooltip' data-placement='top' title='Tambahkan disposisi' href=".base_url()."disposisi/tambah_disposisi/$1><span class='glyphicon glyphicon-share-alt' aria-hidden='true'></span></a>".
			"<a class='btn btn-warning' data-toggle='tooltip' data-placement='top' title='Tracking disposisi' href=".base_url()."disposisi/tracking/$2><span class='glyphicon glyphicon-search' aria-hidden='true'></span></a>".
			"</div>".
			"</form>".
		"",'fds_id, sms_id');
		return $this->datatables->generate();
	}
	
	function selectAjaxBySurat($min, $max, $surat){
		$this->datatables
			->select('fds_id, sms_nomor_surat, usr_username, usr_nama, fds_catatan,  DATE_FORMAT(fds_tgl_disposisi, "%d-%m-%Y") as fds_tgl_disposisi, sms_id')
			->from('t_form_disposisi')
			->where('fds_deleted','0')
			->where('fds_tgl_disposisi >= ', $min)
			->where('fds_tgl_disposisi <= ', $max)
			->join('t_user', 't_user.usr_id = t_form_disposisi.fds_pengirim', 'left')
			->join('t_surat_msk', 't_surat_msk.sms_id = t_form_disposisi.fds_id_surat', 'left')
			->where('t_surat_msk.sms_id', $surat);
		$this->datatables->edit_column('fds_aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-primary' href=".base_url()."disposisi/detail_disposisi/$1><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></a>".
			"<a class='btn btn-danger delete' data-confirm='Are you sure to delete this item?' href=".base_url()."disposisi/hapus_disposisi/$1><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>".
			"<a class='btn btn-info' href=".base_url()."disposisi/edit_disposisi/$1><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>".
			"<a class='btn btn-success' href=".base_url()."disposisi/tambah_disposisi/$1><span class='glyphicon glyphicon-share-alt' aria-hidden='true'></span></a>".
			"</div>".
			"</form>".
		"",'fds_id');
		return $this->datatables->generate();
	}
	
	function getTrackingData($id_surat){
		$this->db
		->select('*')
		->from('t_form_disposisi')
		->where('fds_deleted','0')
		->where('fds_id_surat',$id_surat)
		->join('t_user', 't_user.usr_id = t_form_disposisi.fds_pengirim','left')
		->join('t_jabatan', 't_jabatan.jbt_id = t_user.usr_jabatan','left')
		->join('t_departemen', 't_departemen.dpt_id = t_user.usr_departemen', 'left')
		->order_by('fds_id_parent', 'acs');
		return $this->db->get()->result();
	}
	
	function autoInc(){
		$ai = $this->db->query("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'sidoel2' AND TABLE_NAME = 't_form_disposisi'")->row()->AUTO_INCREMENT;
		$i = $ai-1;
		return $i;
	}
    
    function setNotifZero($userId){
        $this->db->query("update t_user set usr_total_read = '0' where usr_id = '$userId'");
    }    
    function insert($data){
        $this->db->insert('t_form_disposisi', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
    }
    
    function selectAll(){
        //pake procedure
        $this->db->select('*');
        $this->db->from('t_form_disposisi');
		$this->db->where('deleted', '0');
        $this->db->order_by('fds_id', 'desc');
        return $this->db->get();
    }
    function selectById($id){
        //pake procedure
        $this->db->select('*');
        $this->db->from('t_form_disposisi');
        $this->db->where('fds_id', $id);
		$this->db->join('t_surat_msk','t_surat_msk.sms_id = t_form_disposisi.fds_id_surat', 'left');
		$this->db->join('t_user', 't_form_disposisi.fds_pengirim = t_user.usr_id', 'left');
        return $this->db->get();
    }
     
    function update($id, $data){
        //pake procedure
        $this->db->where('fds_id', $id);
        $this->db->update('t_form_disposisi', $data);
    }
    
    function delete($id){
        //pake procedure
        $this->db->where('fds_id', $id);
        $this->db->delete('t_form_disposisi');
    }
    
    // function yang digunakan oleh paginationsample
    function selectAllPaging($limit=array()){
        //logika  1 select all disposisi
        //2 select disposisiinstrukzi dan namanya
        //3 select disposisiunit terusan dan namanya
        //pake procedure
        $this->db->select('*');
        $this->db->from('t_form_disposisi');
		$this->db->join('t_surat_msk', 't_surat_msk.sms_id = t_form_disposisi.fds_id_surat', 'left');
		$this->db->join('t_user', 't_user.usr_id = t_form_disposisi.fds_pengirim', 'left');
		$this->db->where('deleted', '0');
        $this->db->order_by('fds_id', 'desc');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
}
