<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_DisposisiInstruksi
 *
 * @author Ganteng Imut
 */
class M_DisposisiInstruksi {
    //put your code here
    function __construct(){
        parent::__construct();
    }
    
    function insert($data){
        $this->db->insert('tr_disposisi_instruksi', $data);
    }
    
    function selectAll(){
        $this->db->select('*');
        $this->db->from('tr_disposisi_instruksi');
        $this->db->order_by('din_id', 'desc');
        return $this->db->get();
    }
    function selectById($id){
        $this->db->select('*');
        $this->db->from('tr_disposisi_instruksi');
        $this->db->where('din_id', $id);
        return $this->db->get();
    }
     
    function update($id, $data){
        $this->db->where('din_id', $id);
        $this->db->update('tr_disposisi_instruksi', $data);
    }
    
    function delete($id){
        $this->db->where('din_id', $id);
        $this->db->delete('tr_disposisi_instruksi');
    }
    
    // function yang digunakan oleh paginationsample
    function selectAllPaging($limit=array()){
        $this->db->select('*');
        $this->db->from('tr_disposisi_instruksi');
        $this->db->order_by('din_id', 'desc');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
}
