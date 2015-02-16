<?php

class M_role extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function insert($data){
        $this->db->insert('t_role', $data);
    }
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('t_role');
        $this->db->order_by('rle_id', 'desc');
        return $this->db->get();
    }
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_role');
        $this->db->where('rle_id', $id);
        return $this->db->get();
    }
     
    function update($id, $data){
        $this->db->where('rle_id', $id);
        $this->db->update('t_role', $data);
    }
    
    function delete($id){
        $this->db->where('rle_id', $id);
        $this->db->delete('t_role');
    }
    
    // function yang digunakan oleh paginationsample
    function selectAllPaging($limit=array()){
        $this->db->select('*');
        $this->db->from('t_role');
        $this->db->order_by('rle_id', 'desc');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
    
}
