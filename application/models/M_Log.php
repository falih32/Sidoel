<?php

class M_log extends CI_Model {
    //put your code here
    function __construct(){
        parent::__construct();
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
