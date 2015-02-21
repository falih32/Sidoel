<?php

class M_departemen extends CI_Model{
    function __construct(){
        parent::__construct();
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
        $this->db->order_by('dpt_id', 'desc');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
    
}
