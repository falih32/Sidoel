<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Disposisi
 *
 * @author Ganteng Imut
 */
class M_Disposisi extends CI_Model{
    //put your code here
    //put your code here
    function __construct(){
        parent::__construct();
        $this->load->model('M_DisposisiInstruksi');
        $this->load->model('M_DisposisiUnitTerusan');
    }
	
	function autoInc(){
		$ai = $this->db->query("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'sidoel2' AND TABLE_NAME = 't_form_disposisi'")->row()->AUTO_INCREMENT;
		$i = $ai-1;
		return $i;
	}
    
    function insert($data){
        $this->db->insert('t_form_disposisi', $data);
    }
    
    function selectAll(){
        //pake procedure
        $this->db->select('*');
        $this->db->from('t_form_disposisi');
		$this->db->where('deleted', '0');
        $this->db->order_by('fds_id', 'desc');
        return $this->db->get();
    }
    function selectById($id){
        //pake procedure
        $this->db->select('*');
        $this->db->from('t_form_disposisi');
        $this->db->where('fds_id', $id);
        return $this->db->get();
    }
     
    function update($id, $data){
        //pake procedure
        $this->db->where('fds_id', $id);
        $this->db->update('t_form_disposisi', $data);
    }
    
    function delete($id){
        //pake procedure
        $this->db->where('fds_id', $id);
        $this->db->delete('t_form_disposisi');
    }
    
    // function yang digunakan oleh paginationsample
    function selectAllPaging($limit=array()){
        //logika  1 select all disposisi
        //2 select disposisiinstrukzi dan namanya
        //3 select disposisiunit terusan dan namanya
        //pake procedure
        $this->db->select('*');
        $this->db->from('t_form_disposisi');
		$this->db->join('t_surat_msk', 't_surat_msk.sms_id = t_form_disposisi.fds_id_surat', 'left');
		$this->db->join('t_user', 't_user.usr_id = t_form_disposisi.fds_pengirim', 'left');
		$this->db->where('deleted', '0');
        $this->db->order_by('fds_id', 'desc');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
}
