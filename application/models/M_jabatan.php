<?php

class M_jabatan extends CI_Model{
    function __construct(){
        parent::__construct();
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
    
}
