<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UnitTerusan extends CI_Controller {
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
			$this->load->model('m_unit_terusan');
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
        $config = array('base_url' => site_url('UnitTerusan/page/'),
                        'total_rows' => count($this->m_unit_terusan->selectAll()->result()),
                        'per_page' => $perpage,);
        // inisialisasi pagination dan config
        $this->pagination->initialize($config);
        $limit['perpage'] = $perpage;
        $limit['offset'] = $offset;
        $data['unitList'] = $this->m_unit_terusan->selectAllPaging($limit)->result();
        $data['content'] = 'l_unitterusan';
	$data['title']= 'Unit Terusan';
        $this->load->view('layout',$data);
    }
	
	public function ajaxProcess(){
		echo $this->m_unit_terusan->ajaxProcess();
	}
    
    function postVariabel(){
	
	$data['utr_nama_unit_trsn']    = $this->input->post('utr_nama_unit_trsn');

        return $data;
    }
    
    public function tambah_unit_terusan(){
		$this->limitRole(1);
        $data['content'] = 'f_unitterusan';
		$data['title']= 'Input Unit Terusan';
        $data['mode']= 'add';
        $this->load->view('layout',$data);
    }
    public function proses_tambah_unit(){      
		$this->limitRole(1);
        $data = $this->postVariabel();
        $this->m_unit_terusan->insert($data);
		$this->writeLog('Unit Terusan','Create');
        redirect(site_url('UnitTerusan'));
    }
    
    public function edit_unit_terusan($id){
		$this->limitRole(1);
        $data['dataUnit'] = $this->m_unit_terusan->selectById($id)->row();
		$data['id'] = $id;
		$data['mode'] = 'edit';
		$data['content'] = 'f_unitterusan';
		$data['title'] = 'Edit Unit Terusan';
        $this->load->view('layout', $data);
    }
    
    public function proses_edit_unit(){
		$this->limitRole(1);
        $data = $this->postVariabel();
        $id_edit=$this->input->post('id');
        $this->m_unit_terusan->update($id_edit, $data);
		$this->writeLog('Unit Terusan','Update');
        redirect(site_url('UnitTerusan'));
    }
    
    public function delete_unit($id){
		$this->limitRole(1);
        $this->m_unit_terusan->delete($id);
		$this->writeLog('Unit Terusan','Delete');
        redirect('UnitTerusan');
    }
}
