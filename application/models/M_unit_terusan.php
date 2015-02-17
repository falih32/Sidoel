<?php

class M_unit_terusan extends CI_Model{
        //put your code here
    //put your code here
    function __construct(){
        parent::__construct();
		$this->load->library('Datatables');
    }
    
    function insert($data){
        $this->db->insert('t_unit_terusan', $data);
    }
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('t_unit_terusan');
        $this->db->order_by('utr_id', 'desc');
        return $this->db->get();
    }
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_unit_terusan');
        $this->db->where('utr_id', $id);
        return $this->db->get();
    }
    
	function ajaxProcess(){
		$this->datatables
		->select('utr_id, utr_nama_unit_trsn')
		->from('t_unit_terusan')
		->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-danger delete' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Are you sure to delete this item?' href='UnitTerusan/delete_unit/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>".
			"<a class='btn btn-info' data-toggle='tooltip' data-placement='top' title='Edit' href='UnitTerusan/edit_unit_terusan/$1'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>".
			"</div>".
			"</form>".
		"",'utr_id');
		return $this->datatables->generate();
	}
	 
    function update($id, $data){
        $this->db->where('utr_id', $id);
        $this->db->update('t_unit_terusan', $data);
    }
    
    function delete($id){
        $this->db->where('utr_id', $id);
        $this->db->delete('t_unit_terusan');
    }
    
    // function yang digunakan oleh paginationsample
    function selectAllPaging($limit=array()){
        $this->db->select('*');
        $this->db->from('t_unit_terusan');
        $this->db->order_by('utr_id', 'asc');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
}
