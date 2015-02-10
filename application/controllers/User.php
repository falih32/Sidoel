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
                        $this->load->model('M_Role');

		}
    }
        // melihat halam qqan login
    public function index(){
        $this->page();
    }
    public function page(){
        if($this->session->userdata('id_user') == ''){
                $this->pageLogin();
        }
        else{
            $offset = $this->uri->segment(3);
            $offset = (empty($offset))?0:$offset;
            $perpage =10;
            // load library pagination
            $this->load->library('pagination');
            // konfigurasi tampilan paging
            $config = array('base_url' => site_url('User/page/'),
                            'total_rows' => count($this->M_User->selectAll()->result()),
                            'per_page' => $perpage,);
            // inisialisasi pagination dan config
            $this->pagination->initialize($config);
            $limit['perpage'] = $perpage;
            $limit['offset'] = $offset;
            $data['userList'] = $this->M_User->selectAllPaging($limit)->result();
            $data['content'] = 'l_user';
            $data['title']= 'Daftar User';
            $this->load->view('layout',$data);
        }

    }
    
    function postVariabel(){

	$data['usr_username']           = $this->input->post('usr_username');
	$data['usr_password']           = md5($this->input->post('usr_password'));
	$data['usr_nama']               = $this->input->post('usr_nama');
	$data['usr_nip']                = $this->input->post('usr_nip');
	$data['usr_role']               = $this->input->post('usr_role');
	$data['usr_no_telp']             = $this->input->post('usr_no_telp');
	$data['usr_email']              = $this->input->post('usr_email');
        
        return $data;
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
        $data['rolelist']=  $this->M_Role->selectAll()->result();
        $this->load->view('layout', $data);
    }
        
    public function proses_addUser(){      
        $data = $this->postVariabel();

        $this->M_User->insert($data);
        redirect(site_url('User'));
    }
    
    
    public function editUser($id){
          
        $data['userlist'] = $this->M_User->selectById($id)->row();
        $data['id'] = $id;
        $data['mode'] = 'edit';
        $data['content'] = 'f_user';
        $data['title'] = 'Edit User Information';
        $data['rolelist']=  $this->M_Role->selectAll()->result();
        $this->load->view('layout', $data);
    }
    
    public function proses_editUser(){
        $data = $this->postVariabel();
        $id_edit=$this->input->post('id');
        $this->M_User->update($id_edit, $data);
        redirect(site_url('User'));
    }
 
    public function deleteUser($id){
        $this->M_User->delete($id);
        redirect('User');
    }
    public function getAllRole(){
        return $this->M_Role->selectAll()->result();
    }
    
}
?>