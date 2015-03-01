<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JenisSMasuk extends CI_Controller {
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
			$this->load->model('m_jenis_smasuk');
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
        $data['content'] = 'l_jenissmasuk';
		$data['title']= 'Jenis Surat Masuk';
        $this->load->view('layout',$data);
    }
	
	public function ajaxProcess(){
		echo $this->m_jenis_smasuk->ajaxProcess();
	}
    
    function postVariabel(){
	
	$data['jsm_nama_jenis']    = $this->input->post('jsm_nama_jenis');
        $data['jsm_keterangan']    = $this->input->post('jsm_keterangan');
        return $data;
    }
    
    public function tambah_jmasuk(){
		$this->limitRole(1);
        $data['content'] = 'f_jenissmasuk';
		$data['title']= 'Input Jenis Surat Masuk';
        $data['mode']= 'add';
        $this->load->view('layout',$data);
    }
    public function proses_tambah_jmasuk(){      
		$this->limitRole(1);
        $data = $this->postVariabel();
        $this->m_jenis_smasuk->insert($data);
		$this->writeLog('Jenis Surat Masuk','Create');
        redirect(site_url('jenissmasuk'));
    }
    
    public function edit_jmasuk($id){
		$this->limitRole(1);
        $data['dataJenis'] = $this->m_jenis_smasuk->selectById($id)->row();
		$data['id'] = $id;
		$data['mode'] = 'edit';
		$data['content'] = 'f_jenissmasuk';
		$data['title'] = 'Edit Jenis Surat Masuk';
        $this->load->view('layout', $data);
    }
    
    public function proses_edit_jmasuk(){
		$this->limitRole(1);
        $data = $this->postVariabel();
        $id_edit=$this->input->post('id');
        $this->m_jenis_smasuk->update($id_edit, $data);
		$this->writeLog('Jenis Surat Masuk','Update');
        redirect(site_url('jenissmasuk'));
    }
    
    public function delete_jmasuk($id){
		$this->limitRole(1);
        $this->m_jenis_smasuk->delete($id);
		$this->writeLog('Jenis Surat Masuk','Delete');
        redirect('jenissmasuk');
    }
}
