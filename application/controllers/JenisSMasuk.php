<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JenisSMasuk
 *
 * @author Ganteng Imut
 */
class JenisSMasuk {
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
			$this->load->model('M_JenisSMasuk');
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
        $config = array('base_url' => site_url('jenissuratmasuk/page/'),
                        'total_rows' => count($this->M_JenisSMasuk->selectAll()),
                        'per_page' => $perpage,);
        // inisialisasi pagination dan config
        $this->pagination->initialize($config);
        $limit['perpage'] = $perpage;
        $limit['offset'] = $offset;
        $data['jenisList'] = $this->M_JenisSMasuk->selectAllPaging($limit);
        $data['content'] = 'l_jenisSmasuk';
	$data['title']= 'Jenis surat masuk';
        $this->load->view('layout',$data);
	}
	
   
    
    function postVariabel(){
	$data['jsm_id']         = $this->input->post('sms_nomor_surat');
	$data['jsm_nama_jenis'] = $this->input->post('sms_tgl_srt');

        return $data;
    }
    
     
    public function tambah_jenis_surat_masuk(){
        $data['content'] = 'f_jenissuratmasuk';
	$data['title']= 'Input Jenis Surat Masuk';          
        $this->load->view('layout',$data);
    }
    public function proses_tambah_jmasuk(){      
        $data = $this->postVariabel();
        $this->M_JenisSMasuk->insert($data);
        redirect(site_url('JenisSMasuk'));
    }
    
    public function edit_jenis_surat_masuk($id){
        $data['dataJenis'] = $this->M_JenisSMasuk->selectById($id);
	$data['id'] = $id;
	$data['mode'] = 'edit';
	$data['content'] = 'f_jenissuratmasuk';
	$data['title'] = 'Edit Jenis surat masuk';
        $this->load->view('layout', $data);
    }
    
    public function proses_edit_jmasuk(){
        $data = $this->postVariabel();
        $id_edit=$this->input->post('id');
        $this->M_JenisSMasuk->update($id_edit, $data);
        redirect(site_url('JenisSMasuk'));
    }
    
    public function delete_jmasuk($id){
        $this->M_JenisSMasuk->delete($id);
        redirect('JenisSMasuk');
    }
}