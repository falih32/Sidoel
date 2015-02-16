<?php

class M_instruksi extends CI_Model{
    //put your code here
    //put your code here
    function __construct(){
        parent::__construct();
    }
    
    function insert($data){
        $this->db->insert('t_instruksi', $data);
    }
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('t_instruksi');
        $this->db->order_by('ins_id', 'desc');
        return $this->db->get();
    }
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_instruksi');
        $this->db->where('ins_id', $id);
        return $this->db->get();
    }
     
    function update($id, $data){
        $this->db->where('ins_id', $id);
        $this->db->update('t_instruksi', $data);
    }
    
    function delete($id){
        $this->db->where('ins_id', $id);
        $this->db->delete('t_instruksi');
    }
    
    // function yang digunakan oleh paginationsample
    function selectAllPaging($limit=array()){
        $this->db->select('*');
        $this->db->from('t_instruksi');
        $this->db->order_by('ins_id', 'desc');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
}
