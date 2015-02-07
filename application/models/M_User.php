<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author Ganteng Imut
 */
class M_User extends CI_Model{
    //put your code here
    //put your code here
    function __construct(){
        parent::__construct();
    }
     function insert($data){
        $this->db->insert('t_user', $data);
    }
    
    function delete($id){
	$data['usr_deleted'] = '1';
        $this->db->where('usr_id', $id);
        $this->db->update('t_user', $data);
    }
    // cek keberadaan user di sistem
    function check_user_account($username, $password){
        $this->db->select('*');
        $this->db->from('t_user');
        $this->db->where('usr_username', $username);
        $this->db->where('usr_password', md5($password));
        return $this->db->get();
    }
    // mengambil data user tertentu
       function get_user($id_user){
       $this->db->select('*');
       $this->db->from('t_user');
       $this->db->where('usr_id', $id_user);
       return $this->db->get();
    }
    function selectAll(){
       $this->db->select('*');
       $this->db->from('t_user');
       return $this->db->get();
    }
    
    function selectById($id){
        $this->db->select('*');
        $this->db->from('t_user');
        $this->db->where('usr_id', $id);
        return $this->db->get();
    }
    
    
    function update($id, $data){
        $this->db->where('usr_id', $id);
        $this->db->update('t_user', $data);
    }
    function selectAllPaging($limit=array()){
        $this->db->select('*');
        $this->db->from('t_user');
        $this->db->join('t_role','t_role.rle_id=t_user.usr_role', 'left');
         $this->db->where('usr_deleted', '0');
        $this->db->order_by('usr_id', 'asc');
        if ($limit != NULL)
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get();
    }
}
