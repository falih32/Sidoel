<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UnitTerusan
 *
 * @author Andhika Firdaus
 */
class UnitTerusan extends CI_Controller {
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
			$this->load->model('M_UnitTerusan');
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
        $config = array('base_url' => site_url('UnitTerusan/page/'),
                        'total_rows' => count($this->M_UnitTerusan->selectAll()->result()),
                        'per_page' => $perpage,);
        // inisialisasi pagination dan config
        $this->pagination->initialize($config);
        $limit['perpage'] = $perpage;
        $limit['offset'] = $offset;
        $data['unitList'] = $this->M_UnitTerusan->selectAllPaging($limit)->result();
        $data['content'] = 'l_unitterusan';
	$data['title']= 'Unit Terusan';
        $this->load->view('layout',$data);
    }
	
    
    function postVariabel(){
	
	$data['utr_nama_unit_trsn']    = $this->input->post('utr_nama_unit_trsn');

        return $data;
    }
    
    public function tambah_unit_terusan(){
        $data['content'] = 'f_unitterusan';
	$data['title']= 'Input Unit Terusan';
        $data['mode']= 'add';
        $this->load->view('layout',$data);
    }
    public function proses_tambah_unit(){      
        $data = $this->postVariabel();
        $this->M_UnitTerusan->insert($data);
        redirect(site_url('UnitTerusan'));
    }
    
    public function edit_unit_terusan($id){
        $data['dataUnit'] = $this->M_UnitTerusan->selectById($id)->row();
	$data['id'] = $id;
	$data['mode'] = 'edit';
	$data['content'] = 'f_unitterusan';
	$data['title'] = 'Edit Unit Terusan';
        $this->load->view('layout', $data);
    }
    
    public function proses_edit_unit(){
        $data = $this->postVariabel();
        $id_edit=$this->input->post('id');
        $this->M_UnitTerusan->update($id_edit, $data);
        redirect(site_url('UnitTerusan'));
    }
    
    public function delete_unit($id){
        $this->M_UnitTerusan->delete($id);
        redirect('UnitTerusan');
    }
}
