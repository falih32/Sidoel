<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_DisposisiUnitTerusan
 *
 * @author Ganteng Imut
 */
class M_DisposisiUser extends CI_Model{
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
