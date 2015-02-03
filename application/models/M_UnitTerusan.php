<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_UnitTerusan
 *
 * @author Ganteng Imut
 */
class M_UnitTerusan {
        //put your code here
    //put your code here
    function __construct(){
        parent::__construct();
    }
    
    function insert($data){
        $this->db->insert('t_unit_terusan', $data);
    }
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('t_unit_terusan');
        $this->db->order_by('date_modified', 'desc');
        return $this->db->get();
    }
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_unit_terusan');
        $this->db->where('id_diteruskan', $id);
        return $this->db->get();
    }
     
    function update($id, $data){
        $this->db->where('id_diteruskan', $id);
        $this->db->update('t_unit_terusan', $data);
    }
    
    function delete($id){
        $this->db->where('id_diteruskan', $id);
        $this->db->delete('t_unit_terusan');
    }
    
    // function yang digunakan oleh paginationsample
    function selectAllPaging($limit=array()){
        $this->db->select('*');
        $this->db->from('t_unit_terusan');
        $this->db->order_by('date_modified', 'desc');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
}
