<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_disposisiUnitTerusan
 *
 * @author Ganteng Imut
 */
class M_disposisi_unit_terusan extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function insert($data){
        $this->db->insert('tr_disposisi_unit_terusan', $data);
    }
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('tr_disposisi_unit_terusan');
        $this->db->order_by('dut_id', 'desc');
        return $this->db->get();
    }
	
	function selectByDisposisi($id){
        $this->db->select('*');
        $this->db->from('tr_disposisi_unit_terusan');
        $this->db->where('dut_id_disposisi', $id);
        return $this->db->get();
    }
	
    function selectById($id){
        $this->db->select('*');
        $this->db->from('tr_disposisi_unit_terusan');
        $this->db->where('dut_id', $id);
        return $this->db->get();
    }
     
    function update($id, $data){
        $this->db->where('dut_id', $id);
        $this->db->update('tr_disposisi_unit_terusan', $data);
    }
    
    function delete($id){
        $this->db->where('dut_id', $id);
        $this->db->delete('tr_disposisi_unit_terusan');
    }
    
    function deleteByDisposisi($id){
        $this->db->where('dut_id_disposisi', $id);
        $this->db->delete('tr_disposisi_unit_terusan');
    }
	
    // function yang digunakan oleh paginationsample
    function selectAllPaging($limit=array()){
        $this->db->select('*');
        $this->db->from('tr_disposisi_unit_terusan');
        $this->db->order_by('dut_id', 'desc');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
}
