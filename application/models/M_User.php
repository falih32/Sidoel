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
    // cek keberadaan user di sistem
    function check_user_account($username, $password){
        $this->db->select('*');
        $this->db->from('t_user');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        return $this->db->get();
    }
    // mengambil data user tertentu
    function get_user($id_user){
       $this->db->select('*');
       $this->db->from('t_user');
       $this->db->where('id_user', $id_user);
       return $this->db->get();
    }
}
