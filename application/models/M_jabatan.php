<?php

class M_jabatan extends CI_Model{
    function __construct(){
        parent::__construct();
        	$this->load->library('Datatables');
    }
    
    function insert($data){
        $this->db->insert('t_jabatan', $data);
    }
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('t_jabatan');
        $this->db->order_by('jbt_id', 'desc');
        return $this->db->get();
    }
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_jabatan');
        $this->db->where('jbt_id', $id);
        return $this->db->get();
    }
     
    function ajaxProcess(){
		$this->datatables
		->select('jbt_id, jbt_nama')
		->from('t_jabatan')
		->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-danger delete' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Are you sure to delete this item?' href='delete_jabatan/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>".
			"<a class='btn btn-info' data-toggle='tooltip' data-placement='top' title='Edit' href='Jabatan/edit_jabatan/$1'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>".
			"</div>".
			"</form>".
		"",'jbt_id');
		return $this->datatables->generate();
	}
    function update($id, $data){
        $this->db->where('jbt_id', $id);
        $this->db->update('t_jabatan', $data);
    }
    
    function delete($id){
        $this->db->where('jbt_id', $id);
        $this->db->delete('t_jabatan');
    }
    
    // function yang digunakan oleh paginationsample
    function selectAllPaging($limit=array()){
        $this->db->select('*');
        $this->db->from('t_jabatan');
        $this->db->order_by('jbt_id', 'desc');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
	
	function ajaxByDept($dept){
        $this->db->select('*');
        $this->db->from('t_jabatan');
        $this->db->where('jbt_departemen', $dept);
		$this->db->or_where('jbt_departemen', NULL); 
        return $this->db->get();
	}
    
}
