<?php

class M_departemen extends CI_Model{
        //put your code here
    //put your code here
    function __construct(){
        parent::__construct();
		$this->load->library('Datatables');
    }
    
    function insert($data){
        $this->db->insert('t_departemen', $data);
    }
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('t_departemen');
        $this->db->order_by('dpt_id', 'desc');
        return $this->db->get();
    }
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_departemen');
        $this->db->where('dpt_id', $id);
        return $this->db->get();
    }
    
	function ajaxProcess(){
		$this->datatables
		->select('dpt_id, dpt_nama')
		->from('t_departemen')
		->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-danger delete' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Are you sure to delete this item?' href='Departemen/delete_departemen/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>".
			"<a class='btn btn-info' data-toggle='tooltip' data-placement='top' title='Edit' href='Departemen/edit_departemen/$1'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>".
			"</div>".
			"</form>".
		"",'dpt_id');
		return $this->datatables->generate();
	}
	 
    function update($id, $data){
        $this->db->where('dpt_id', $id);
        $this->db->update('t_departemen', $data);
    }
    
    function delete($id){
        $this->db->where('dpt_id', $id);
        $this->db->delete('t_departemen');
    }
    
    // function yang digunakan oleh paginationsample
    function selectAllPaging($limit=array()){
        $this->db->select('*');
        $this->db->from('t_departemen');
        $this->db->order_by('dpt_id', 'asc');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
}
