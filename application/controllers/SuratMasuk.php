<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SuratMasuk
 *
 * @author Ganteng Imut
 */
class SuratMasuk extends CI_Controller{
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
			$this->load->model('M_SuratMasuk');
			$this->load->model('M_UnitTujuan');
			$this->load->model('M_JenisSMasuk');
		}
    }
    
    public function index(){
		$this->page();
    }
    
	public function page(){
              //load the surat model
//                
//              //call the model function to get the surat data
//              $suratmasukresult = $this->M_SuratMasukl->selectAll();          
//              $data['suratList'] = $suratmasukresult;
//              //load the department_view
//              $this->load->view('SuratMasuk',$data);
        // tentukan jumlah data per halaman
		$offset = $this->uri->segment(3);
		$offset = (empty($offset))?0:$offset;
        $perpage = 10;
        // load library pagination
        $this->load->library('pagination');
        // konfigurasi tampilan paging
        $config = array('base_url' => site_url('suratmasuk/page/'),
                        'total_rows' => count($this->M_SuratMasuk->selectAll()),
                        'per_page' => $perpage,);
        // inisialisasi pagination dan config
        $this->pagination->initialize($config);
        $limit['perpage'] = $perpage;
        $limit['offset'] = $offset;
        $data['suratList'] = $this->M_SuratMasuk->selectAllPaging($limit);
        $data['content'] = 'l_suratmasuk';
		$data['title']= 'Daftar surat masuk';
		$data['unit_tujuan'] = $this->M_UnitTujuan->selectAll();
        $this->load->view('layout',$data);
	}
	
    public function getAllUnitTujuan(){       
		return $this->M_UnitTujuan->selectAll()->result();
    }
    
    public function getAllJenisSurat(){
		return $this->M_JenisSMasuk->selectAll()->result();
    }
    
    function postVariabel(){
	$data['sms_nomor_surat']        = $this->input->post('sms_nomor_surat');
	$data['sms_tgl_srt']            = $this->input->post('sms_tgl_srt');
	$data['sms_tgl_srt_diterima']   = $this->input->post('sms_tgl_srt_diterima');
	$data['sms_tgl_srt_dtlanjut']   = $this->input->post('sms_tgl_srt_dtlanjut');
	$data['sms_tenggat_wkt']        = $this->input->post('sms_tenggat_wkt');
	$data['sms_perihal']            = $this->input->post('sms_perihal');
	$data['sms_jenis_surat']        = $this->input->post('sms_jenis_surat');
	$data['sms_no_agenda']          = $this->input->post('sms_no_agenda');
	$data['sms_unit_tujuan']        = $this->input->post('sms_unit_tujuan');
	$data['sms_keterangan']         = $this->input->post('sms_keterangan');
	$data['sms_edited_by']          = $this->session->userdata('id_user');
	$data['sms_status_terkirim']    = $this->input->post('sms_status_terkirim');
	$data['sms_file']               = $this->input->post('sms_file');
	$data['sms_pengirim']           = $this->input->post('sms_pengirim');
        
        return $data;
    }
    
    public function upload_config(){
		$config['upload_path'] = './uploads/surat_masuk';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2000';
		$config['max_width']  = '3000';
		$config['max_height']  = '3000';

		$this->load->library('upload', $config);
	}
     
    public function tambah_surat_masuk(){
        $data['content'] = 'f_suratmasuk';
		$data['title']= 'Daftar surat masuk';          
        $data['jenisList'] = $this->getAllJenisSurat();
        $data['unitList'] = $this->getAllUnitTujuan();
        $this->load->view('layout',$data);
    }
    public function proses_tambah_smasuk(){      
        $data = $this->postVariabel();
		$this->upload_config();
		if($this->upload->do_upload('sms_file')){
			$updata = $this->upload->data();
			$data['sms_file'] = $updata['file_name'];
		}
        $this->M_SuratMasuk->insert($data);
        redirect(site_url('SuratMasuk'));
    }
    
    public function edit_surat_masuk($id){
        $data['dataSurat'] = $this->M_SuratMasuk->selectById($id);
		$data['id'] = $id;
		$data['mode'] = 'edit';
		$data['content'] = 'f_suratmasuk';
		$data['title'] = 'Edit surat masuk';
        $data['jenisList'] = $this->getAllJenisSurat();
        $data['unitList'] = $this->getAllUnitTujuan();
        $this->load->view('layout', $data);
    }
    
    public function proses_edit_smasuk(){
        $data = $this->postVariabel();
        $this->upload_config();
		if($this->upload->do_upload('sms_file')){
			$updata = $this->upload->data();
			$data['sms_file'] = $updata['file_name'];
		}
        $id_edit=$this->input->post('id');
        $this->M_SuratMasuk->update($id_edit, $data);
        redirect(site_url('SuratMasuk'));
    }
    
    public function delete_smasuk($id){
        $this->M_SuratMasuk->delete($id);
        redirect('SuratMasuk');
    }
    
}
?>