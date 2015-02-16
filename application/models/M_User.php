<?php

class M_user extends CI_Model{
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
        //$this->db->select('*');
//        $this->db->from('t_user');
//        $this->db->where('usr_username', $username);
//        $this->db->where('usr_password', md5($password));
		return $this->db->query("SELECT * FROM t_user WHERE usr_username = ".$this->db->escape($username)." AND usr_password = ".$this->db->escape(md5($password)));
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
    
    function updateNotif($id){
        $this->db->query("UPDATE t_user SET usr_total_read=usr_total_read+1 WHERE usr_id='".$id."'");
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
