<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UnitTujuan extends CI_Controller {
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
			$this->load->helper('date');
			$this->load->model('m_log');
			$this->load->model('m_unit_tujuan');
		}
    }
	
	function writeLog($tabel, $aksi){
		$data['log_user'] = $this->session->userdata('id_user');
		$data['log_nama_tabel'] = $tabel;
		$data['log_aksi'] = $aksi;
		$this->m_log->insert($data);
	}
    
	function limitRole($limit){
		$role = $this->session->userdata('id_role');
		if($role > $limit){
			$this->session->set_flashdata('message', array('msg' => 'Anda <strong>tidak memiliki akses</strong> ke fitur yang anda pilih','class' => 'danger'));
			redirect('Dashboard');
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
        $config = array('base_url' => site_url('UnitTujuan/page/'),
                        'total_rows' => count($this->m_unit_tujuan->selectAll()->result()),
                        'per_page' => $perpage,);
        // inisialisasi pagination dan config
        $this->pagination->initialize($config);
        $limit['perpage'] = $perpage;
        $limit['offset'] = $offset;
        $data['unitList'] = $this->m_unit_tujuan->selectAllPaging($limit)->result();
        $data['content'] = 'l_unittujuan';
	$data['title']= 'Unit surat masuk';
        $this->load->view('layout',$data);
    }
	
    
    function postVariabel(){
	//$data['utj_id']             = $this->input->post('utj_id');
	$data['utj_unit_tujuan']    = $this->input->post('utj_unit_tujuan');

        return $data;
    }
    
    public function tambah_unit_tujuan(){
		$this->limitRole(1);
        $data['content'] = 'f_unittujuan';
		$data['title']= 'Input Unit Tujuan';
        $data['mode']= 'add';
        $this->load->view('layout',$data);
    }
    public function proses_tambah_unit(){      
		$this->limitRole(1);
        $data = $this->postVariabel();
        $this->m_unit_tujuan->insert($data);
		$this->writeLog('Unit Tujuan','Create');
        redirect(site_url('UnitTujuan'));
    }
    
    public function edit_unit_tujuan($id){
		$this->limitRole(1);
        $data['dataUnit'] = $this->m_unit_tujuan->selectById($id)->row();
		$data['id'] = $id;
		$data['mode'] = 'edit';
		$data['content'] = 'f_unittujuan';
		$data['title'] = 'Edit Unit Tujuan';
        $this->load->view('layout', $data);
    }
    
    public function proses_edit_unit(){
		$this->limitRole(1);
        $data = $this->postVariabel();
        $id_edit=$this->input->post('id');
        $this->m_unit_tujuan->update($id_edit, $data);
		$this->writeLog('Unit Tujuan','Update');
        redirect(site_url('UnitTujuan'));
    }
    
    public function delete_unit($id){
		$this->limitRole(1);
        $this->m_unit_tujuan->delete($id);
		$this->writeLog('Unit Tujuan','Delete');
        redirect('UnitTujuan');
    }
}
