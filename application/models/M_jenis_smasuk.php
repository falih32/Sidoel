<?php

class M_jenis_smasuk extends CI_Model{
        //put your code here
    //put your code here
    function __construct(){
        parent::__construct();
		$this->load->library('Datatables');
    }
    
    function insert($data){
        $this->db->insert('t_jenis_surat_masuk', $data);
    }
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('t_jenis_surat_masuk');
        $this->db->order_by('jsm_id', 'desc');
        return $this->db->get();
    }
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_jenis_surat_masuk');
        $this->db->where('jsm_id', $id);
        return $this->db->get();
    }
    
	function ajaxProcess(){
		$this->datatables
		->select('jsm_id, jsm_nama_jenis, jsm_keterangan')
		->from('t_jenis_surat_masuk')
		->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-danger delete' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Are you sure to delete this item?' href='jenissmasuk/delete_jmasuk/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>".
			"<a class='btn btn-info' data-toggle='tooltip' data-placement='top' title='Edit' href='jenissmasuk/edit_jmasuk/$1'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>".
			"</div>".
			"</form>".
		"",'jsm_id');
		return $this->datatables->generate();
	}
	 
    function update($id, $data){
        $this->db->where('jsm_id', $id);
        $this->db->update('t_jenis_surat_masuk', $data);
    }
    
    function delete($id){
        $this->db->where('jsm_id', $id);
        $this->db->delete('t_jenis_surat_masuk');
    }
    
    // function yang digunakan oleh paginationsample
    function selectAllPaging($limit=array()){
        $this->db->select('*');
        $this->db->from('t_jenis_surat_masuk');
        $this->db->order_by('jsm_id', 'asc');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
}
