<?php

class M_log extends CI_Model {
    //put your code here
    function __construct(){
        parent::__construct();
		$this->load->library('Datatables');
    }
    
    function insert($data){
        $this->db->insert('t_log', $data);
    }
	
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('t_log');
        $this->db->order_by('log_id', 'desc');
        return $this->db->get();
    }
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_log');
        $this->db->where('log_id', $id);
        return $this->db->get();
    }
    
	function ajaxProcess(){
		$this->datatables
		->select('log_id, log_nama_tabel, log_aksi, log_tanggal, log_user, usr_nama, rle_role_name, usr_role')
		->from('t_log')
		->join('t_user', 't_user.usr_id = t_log.log_user', 'left')
		->join('t_role', 't_role.rle_id = t_user.usr_role','left')
		->edit_column('aksi',"".
			"<form>".
			"<div class='form-group'>".
			"<a class='btn btn-danger delete' data-toggle='tooltip' data-placement='top' title='Hapus' data-confirm='Are you sure to delete this item?' href='User/deleteUser/$1'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>".
			"<a class='btn btn-info' data-toggle='tooltip' data-placement='top' title='Edit' href='User/editUser/$1'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>".
			"</div>".
			"</form>".
		"",'usr_id');
		return $this->datatables->generate();
	}
	
    function update($id, $data){
        $this->db->where('log_id', $id);
        $this->db->update('t_log', $data);
    }
    
    function delete($id){
        $this->db->where('log_id', $id);
        $this->db->delete('t_log');
    }
    
    // function yang digunakan oleh paginationsample
    function selectAllPaging($limit=array()){
        $this->db->select('*');
        $this->db->from('t_log');
        $this->db->order_by('log_id', 'desc');
		$this->db->join('t_user','t_user.usr_id = t_log.log_user','left');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
}
