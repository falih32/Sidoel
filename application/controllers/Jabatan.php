<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jabatan extends CI_Controller {
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
			$this->load->model('m_jabatan');
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
        $data['content'] = 'l_jabatan';
		$data['title']= 'Jabatan';
        $this->load->view('layout',$data);
    }
	
	public function ajaxProcess(){
		echo $this->m_jabatan->ajaxProcess();
	}
    
    function postVariabel(){
	//$data['utj_id']             = $this->input->post('utj_id');
	$data['jbt_nama']    = $this->input->post('jbt_nama');

        return $data;
    }
    
    public function tambah_jabatan(){
		$this->limitRole(1);
        $data['content'] = 'f_jabatan';
		$data['title']= 'Input Jabatan';
        $data['mode']= 'add';
        $this->load->view('layout',$data);
    }
    public function proses_tambah_jabatan(){      
		$this->limitRole(1);
        $data = $this->postVariabel();
        $this->m_jabatan->insert($data);
		$this->writeLog('Jabatan','Create');
        redirect(site_url('Jabatan'));
    }
    
    public function edit_jabatan($id){
		$this->limitRole(1);
        $data['dataUnit'] = $this->m_jabatan->selectById($id)->row();
		$data['id'] = $id;
		$data['mode'] = 'edit';
		$data['content'] = 'f_jabatan';
		$data['title'] = 'Edit Jabatan';
        $this->load->view('layout', $data);
    }
    
    public function proses_edit_jabatan(){
		$this->limitRole(1);
        $data = $this->postVariabel();
        $id_edit=$this->input->post('id');
        $this->m_jabatan->update($id_edit, $data);
		$this->writeLog('Jabatan','Update');
        redirect(site_url('Jabatan'));
    }
    
    public function delete_jabatan($id){
		$this->limitRole(1);
        $this->m_jabatan->delete($id);
		$this->writeLog('Jabatan','Delete');
        redirect('Jabatan');
    }
}
