<?php

class M_unit_tujuan extends CI_Model{
    //put your code here
    function __construct(){
        parent::__construct();
		$this->load->library('Datatables');
    }
    
    function insert($data){
        $this->db->insert('t_unit_tujuan', $data);
    }
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('t_unit_tujuan');
        $this->db->order_by('utj_id', 'desc');
        return $this->db->get();
    }
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_unit_tujuan');
        $this->db->where('utj_id', $id);
        return $this->db->get();
    }
    
	function ajaxProcess(){
		$this->datatables
		->select('utj_id, utj_unit_tujuan')
		->from('t_unit_tujuan')
		->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-danger delete' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Are you sure to delete this item?' href='UnitTujuan/delete_unit/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>".
			"<a class='btn btn-info' data-toggle='tooltip' data-placement='top' title='Edit' href='UnitTujuan/edit_unit_tujuan/$1'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>".
			"</div>".
			"</form>".
		"",'utj_id');
		return $this->datatables->generate();
	}
	 
    function update($id, $data){
        $this->db->where('utj_id', $id);
        $this->db->update('t_unit_tujuan', $data);
    }
    
    function delete($id){
        $this->db->where('utj_id', $id);
        $this->db->delete('t_unit_tujuan');
    }
    
    // function yang digunakan oleh paginationsample
    function selectAllPaging($limit=array()){
        $this->db->select('*');
        $this->db->from('t_unit_tujuan');
        $this->db->order_by('utj_id', 'asc');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
}
