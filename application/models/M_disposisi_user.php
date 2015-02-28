<?php

class M_disposisi_user extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function insert($data){
        $this->db->insert('tr_disposisi_user', $data);
    }
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('tr_disposisi_user');
        $this->db->order_by('dus_id', 'desc');
        return $this->db->get();
    }
	
	function selectByDisposisi($id){
        $this->db->select('*');
        $this->db->from('tr_disposisi_user');
        $this->db->where('dus_disposisi', $id);
		$this->db->join('t_user', 't_user.usr_id = tr_disposisi_user.dus_user', 'left');
        return $this->db->get();
    }
	
    function selectById($id){
        $this->db->select('*');
        $this->db->from('tr_disposisi_user');
        $this->db->where('dus_id', $id);
        return $this->db->get();
    }
     
    function update($id, $data){
        $this->db->where('dus_id', $id);
        $this->db->update('tr_disposisi_user', $data);
    }
    
	function updateByDisposisiUser($disp, $user, $data){
        $this->db->where('dus_disposisi', $disp);
        $this->db->where('dus_user', $user);
        $this->db->update('tr_disposisi_user', $data);
	}
	
    function delete($id){
        $this->db->where('dus_id', $id);
        $this->db->delete('tr_disposisi_user');
    }
    
    function deleteByDisposisi($id){
        $this->db->where('dus_disposisi', $id);
        $this->db->delete('tr_disposisi_user');
    }
	
    // function yang digunakan oleh paginationsample
    function selectAllPaging($limit=array()){
        $this->db->select('*');
        $this->db->from('tr_disposisi_user');
        $this->db->order_by('dus_id', 'desc');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
}
