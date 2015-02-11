<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class notif extends CI_Controller{
    //put your code here
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
                 $notifA = $this->session->userdata('id_user');
				 $respon = $this->db->query("select * FROM t_user where usr_id = '$notifA'")->row()->usr_total_read;
                 echo json_encode($respon);
    }
}
?>