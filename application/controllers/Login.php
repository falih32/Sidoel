<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_user');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
        // melihat halam qqan login
    public function index(){
		if($this->session->userdata('id_user') == ''){
			$data['content'] = 'login';
			$data['title'] = 'login';       
			$this->load->view('layout', $data);
		}
		else{
			redirect('Dashboard');
		}		
    }
        
    // memeriksa keberadaan akun username
    public function do_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $temp_account = $this->m_user->check_user_account($username, $password)->row();
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
									  'id_role' => $temp_account->usr_role,
                                      'logged_in' => true);
                $this->session->set_userdata($array_items);
                $data['content'] = 'dashboard';
                $data['title'] = 'Dashboard';    
				$this->session->set_flashdata('message', array('msg' => 'Anda berhasil login sebagai <strong>'.$this->session->userdata('username').'</strong>','class' => 'success'));   
				redirect(site_url('dashboard'));
            }
            else {
				// kalau ga ada diredirect lagi ke halaman login
				$this->session->set_flashdata('message', array('msg' => 'Login gagal','class' => 'danger'));
				redirect(site_url('login'));
            }
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