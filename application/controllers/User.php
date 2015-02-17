<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{
    
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
			$this->load->model('m_user');
			$this->load->model('m_role');

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
        if($this->session->userdata('id_user') == ''){
                $this->pageLogin();
        }
        else{
            $offset = $this->uri->segment(3);
            $offset = (empty($offset))?0:$offset;
            $perpage =10;
            // load library pagination
            $this->load->library('pagination');
            // konfigurasi tampilan paging
            $config = array('base_url' => site_url('User/page/'),
                            'total_rows' => count($this->m_user->selectAll()->result()),
                            'per_page' => $perpage,);
            // inisialisasi pagination dan config
            $this->pagination->initialize($config);
            $limit['perpage'] = $perpage;
            $limit['offset'] = $offset;
            $data['userList'] = $this->m_user->selectAllPaging($limit)->result();
            $data['content'] = 'l_user';
            $data['title']= 'Daftar User';
            $this->load->view('layout',$data);
        }

    }
	
	public function ajaxProcess(){
		echo $this->m_user->ajaxProcess();
	}
    
    function postVariabel(){

		$data['usr_username']           = $this->input->post('usr_username');
		$data['usr_password']           = md5($this->input->post('usr_password'));
		$data['usr_nama']               = $this->input->post('usr_nama');
		$data['usr_nip']                = $this->input->post('usr_nip');
		$data['usr_role']               = $this->input->post('usr_role');
		$data['usr_no_telp']             = $this->input->post('usr_no_telp');
		$data['usr_email']              = $this->input->post('usr_email');
			
        return $data;
    }
    public function viewList(){
        $data['content'] = 'l_user';
        $data['title'] = 'Daftar Pengguna';
        $data['userlist'] = $this->m_user->getAllUser();
        $this->load->view('layout', $data);
    }
    
    public function addUser(){
		$this->limitRole(1);
        $data['content'] = 'f_user';
        $data['title'] = 'Tambah Pengguna';
        $data['mode']= 'add';
        $data['rolelist']=  $this->m_role->selectAll()->result();
        $this->load->view('layout', $data);
    }
        
    public function proses_addUser(){     
		$this->limitRole(1); 
        $data = $this->postVariabel();

        $this->m_user->insert($data);
		$this->writeLog('User','Create');
        redirect(site_url('User'));
    }
    
    
    public function editUser($id){
		$this->limitRole(1);
          
        $data['userlist'] = $this->m_user->selectById($id)->row();
        $data['id'] = $id;
        $data['mode'] = 'edit';
        $data['content'] = 'f_user';
        $data['title'] = 'Edit User Information';
        $data['rolelist']=  $this->m_role->selectAll()->result();
        $this->load->view('layout', $data);
    }
    
    public function proses_editUser(){
		$this->limitRole(1);
        $data = $this->postVariabel();
        $id_edit=$this->input->post('id');
        $this->m_user->update($id_edit, $data);
		$this->writeLog('User','Update');
        redirect(site_url('User'));
    }
 
    public function deleteUser($id){
		$this->limitRole(1);
        $this->m_user->delete($id);
		$this->writeLog('User','Delete');
        redirect('User');
    }
    public function getAllRole(){
        return $this->m_role->selectAll()->result();
    }
    
}
?>