<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_Log
 *
 * @author Ganteng Imut
 */
class M_Log extends CI_Model {
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
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
}
