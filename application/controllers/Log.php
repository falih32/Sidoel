<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log extends CI_Controller{
    //put your code here
    
    public function __construct(){
        parent::__construct();
		if($this->session->userdata('id_user') == ''){
			$this->session->set_flashdata('message', array('msg' => 'Please <strong>login</strong> to continue','class' => 'danger'));
			redirect('login');
		}
		else
		{
			$this->load->helper('url');
			$this->load->database();
			//$this->load->library('input');
			$this->load->model('m_log');
		}
    }
    
    public function index(){
        $data['content'] = 'log';
		$data['title']= 'Log';
        $this->load->view('layout',$data);
    }
	
	public function ajaxProcess(){
		echo $this->m_log->ajaxProcess();
	}
}

    

