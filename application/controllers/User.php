<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User List
 *
 * @author Andhika Firdaus
 */
class User extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
		if($this->session->userdata('id_user') == ''){
			redirect('login');
		}
		else
		{
			$this->load->helper('url');
			$this->load->database();
			//$this->load->library('input');
			$this->load->model('M_User');
;
		}
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
    
    public function viewList(){
        $data['content'] = 'l_user';
        $data['title'] = 'Daftar Pengguna';
        $data['userlist'] = $this->M_User->getAllUser();
        $this->load->view('layout', $data);
    }
    
    public function addUser(){
        $data['content'] = 'f_user';
        $data['title'] = 'Tambah Pengguna';
        $data['mode']= 'add';
        $this->load->view('layout', $data);
    }
        
    
    public function editUser($id){
          
        $data['dataUser'] = $this->M_User->selectById($id)->row();
        $data['id'] = $id;
        $data['mode'] = 'edit';
        $data['content'] = 'f_user';
        $data['titile'] = 'Edit user';
        $data['roleList'] = $this->getAllRole();
        $this->load->view('layout', $data);
    }
    
    public function getAllRole(){
        return $this->M_UserList->selectAllRole()->result();
    }
    
}
?>