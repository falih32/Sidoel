<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Log
 *
 * @author Ganteng Imut
 */
class Log {
    //put your code here
    
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
			$this->load->model('M_Log');
		}
    }
    
    public function index(){
		$this->page();
    }
    
    public function page(){
        // tentukan jumlah data per halaman
	$offset = $this->uri->segment(3);
	$offset = (empty($offset))?0:$offset;
        $perpage = 10;
        // load library pagination
        $this->load->library('pagination');
        // konfigurasi tampilan paging
        $config = array('base_url' => site_url('log/page/'),
                        'total_rows' => count($this->M_log->selectAll()),
                        'per_page' => $perpage,);
        // inisialisasi pagination dan config
        $this->pagination->initialize($config);
        $limit['perpage'] = $perpage;
        $limit['offset'] = $offset;
        $data['logList'] = $this->M_Log->selectAllPaging($limit);
        $data['content'] = 'l_log';
	$data['title']= 'Log';
        $this->load->view('layout',$data);
    }
	
}
