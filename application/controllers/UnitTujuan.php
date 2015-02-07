<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UnitTujuan
 *
 * @author Ganteng Imut
 */
class UnitTujuan {
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
			$this->load->model('M_UnitTujuan');
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
        $config = array('base_url' => site_url('unittujuan/page/'),
                        'total_rows' => count($this->M_UnitTujuan->selectAll()),
                        'per_page' => $perpage,);
        // inisialisasi pagination dan config
        $this->pagination->initialize($config);
        $limit['perpage'] = $perpage;
        $limit['offset'] = $offset;
        $data['unitList'] = $this->M_UnitTujuan->selectAllPaging($limit);
        $data['content'] = 'l_jenisSmasuk';
	$data['title']= 'Unit surat masuk';
        $this->load->view('layout',$data);
    }
	
    
    function postVariabel(){
	$data['utj_id']             = $this->input->post('utj_id');
	$data['utj_unit_tujuan']    = $this->input->post('utj_unit_tujuan');

        return $data;
    }
    
    public function tambah_unit_tujuan(){
        $data['content'] = 'f_unittujuan';
	$data['title']= 'Input Unit Tujuan';          
        $this->load->view('layout',$data);
    }
    public function proses_tambah_unit(){      
        $data = $this->postVariabel();
        $this->M_UnitTujuan->insert($data);
        redirect(site_url('UnitTujuan'));
    }
    
    public function edit_unit_tujuan($id){
        $data['dataUnit'] = $this->M_UnitTujuan->selectById($id);
	$data['id'] = $id;
	$data['mode'] = 'edit';
	$data['content'] = 'f_unittujuan';
	$data['title'] = 'Edit Unit Tujuan';
        $this->load->view('layout', $data);
    }
    
    public function proses_edit_unit(){
        $data = $this->postVariabel();
        $id_edit=$this->input->post('id');
        $this->M_UnitTujuan->update($id_edit, $data);
        redirect(site_url('UnitTujuan'));
    }
    
    public function delete_unit($id){
        $this->M_UnitTujuan->delete($id);
        redirect('UnitTujuan');
    }
}
