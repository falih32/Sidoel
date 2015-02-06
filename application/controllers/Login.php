<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_Login
 *
 * @author Ganteng Imut
 */
class Login extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_User');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
        // melihat halam qqan login
    public function index(){
		if($this->session->userdata('id_user') == ''){
			$this->pageLogin();
		}
		else{
			$data['title'] = 'SIDOEL';
			$data['content'] = 'dashboard';
			$this->load->view('layout', $data);
		}		
    }
    
    public function pageLogin(){
        $data['content'] = 'login';
        $data['title'] = 'login';       
        $this->load->view('layout', $data);
    }
    
    // memeriksa keberadaan akun username
    public function do_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $temp_account = $this->M_User->check_user_account($username, $password)->row();
        // check account
        $num_account = count($temp_account);
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->pageLogin();
        }else{
            if ($num_account > 0){
            // kalau ada set session
                $array_items = array('id_user' => $temp_account->usr_id,
                                      'username' => $temp_account->usr_username,
                                      'logged_in' => true);
                $this->session->set_userdata($array_items);
                $data['content'] = 'dashboard';
                $data['title'] = 'Dashboard';       
            }
            else {
            // kalau ga ada diredirect lagi ke halaman login
                $this->session->set_flashdata('notification', 'Peringatan : Username dan Password
                tidak cocok '.$username);
            }
			redirect(site_url('login'));
        }
    }
    // keluar dari sistem
    public function logout(){
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>