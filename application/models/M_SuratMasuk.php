<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SuratMasuk
 *
 * @author Ganteng Imut
 */
class M_SuratMasuk extends CI_Model{
    //put your code here
    function __construct(){
        parent::__construct();
    }
    
    function insert($data){
        $this->db->insert('t_surat_msk', $data);
    }
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('tf_surat_masuk');
		$this->db->order_by('id', 'desc');
        return $this->db->get();
    }
    function selectById($id){
        $this->db->select('*');
        $this->db->from('tf_surat_masuk');
        $this->db->where('id', $id);
        return $this->db->get();
    }
     
    function update($id, $data){
        $this->db->where('id', $id);
        $this->db->update('t_surat_msk', $data);
    }
    
    function delete($id){
		$data['deleted'] = '1';
        $this->db->where('id', $id);
        $this->db->update('t_surat_msk', $data);
    }
    
    // function yang digunakan oleh paginationsample
    function selectAllPaging($limit=array()){
        $this->db->select('*');
        $this->db->from('tf_surat_masuk');
        $this->db->order_by('id', 'desc');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
}
