<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Disposisi extends CI_Controller{
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
			$this->load->model('M_SuratMasuk');
			$this->load->model('M_User');
			$this->load->model('M_UnitTerusan');
			$this->load->model('M_Instruksi');
			$this->load->model('M_Disposisi');
			$this->load->model('M_DisposisiInstruksi');
			$this->load->model('M_DisposisiUnitTerusan');
			$this->load->model('M_DisposisiUser');
		}
    }
    
    public function index(){
                        $s = $this->session->userdata('id_user');
                        $this->M_Disposisi->setNotifZero($s);
			$data['mode'] = 'normal';
			$data['content'] = 'l_disposisi';
			$data['title'] = 'Daftar disposisi';
			$this->load->view('layout',$data);
    }
	
	public function disposisi_saya(){
			$data['mode'] = 'byUser';
			$data['content'] = 'l_disposisi';
			$data['title'] = 'Daftar disposisi';
			$this->load->view('layout',$data);
    }
	
	public function tracking(){
			$data['mode'] = 'bySurat';
			$data['content'] = 'l_disposisi';
			$data['title'] = 'Daftar disposisi';
			$this->load->view('layout',$data);
    }
    
    public function updateNotifZero(){
        $this->M_disposisi->selectNotifZero($this->session->userdata('id_user'));
    }
    
	public function ajaxProcess(){
		$min=$this->input->post('min');
		$max=$this->input->post('max');
		if($min == '') $min = '0000-00-00';
		if($max == '') $max = '9999-12-31';
		$result = $this->M_Disposisi->selectAjax($min, $max);
		echo $result;
	}
	
	public function ajaxProcessByUser(){
		$user = $this->session->userdata('id_user');
		$min=$this->input->post('min');
		$max=$this->input->post('max');
		if($min == '') $min = '0000-00-00';
		if($max == '') $max = '9999-12-31';
		$result = $this->M_Disposisi->selectAjaxByUser($min, $max, $user);
		echo $result;
	}
	
	public function ajaxProcessBySurat($surat){
		$min=$this->input->post('min');
		$max=$this->input->post('max');
		if($min == '') $min = '0000-00-00';
		if($max == '') $max = '9999-12-31';
		$result = $this->M_Disposisi->selectAjaxBySurat($min, $max, $surat);
		echo $result;
	}	
    public function getAllUnitTerusan(){       
		return $this->M_UnitTerusan->selectAll()->result();
    }
    
    public function getAllInstruksi(){
		return $this->M_Instruksi->selectAll()->result();
    }
    
    function postVariabel_fds(){
		$data_fds['fds_id_surat']       = $this->input->post('fds_id_surat');
		$data_fds['fds_kasubbag']		= $this->input->post('fds_kasubbag');
		$data_fds['fds_catatan']	    = $this->input->post('fds_catatan');
		$data_fds['fds_pengirim']		= $this->session->userdata('id_user');
		$data_fds['fds_tgl_disposisi']	= $this->input->post('fds_tgl_disposisi');
		$data_fds['fds_id_parent']		= $this->input->post('fds_id_parent');
		$data_fds['fds_id']        		= $this->input->post('fds_id');
		return $data_fds;
    }
	
	function postVariabel_din(){
		return $this->input->post('ins_instruksi');
	}
	
	function postVariabel_dut(){
		return $this->input->post('utr_unitTerusan');
	}
     
    public function buat_disposisi($id){
        $data['content'] = 'f_disposisi';
		$data['title'] = 'Tambah disposisi';
		$data['mode'] = 'add';          
		$data['id_surat'] = $id;
		$data['unitTerusan'] = $this->getAllUnitTerusan();
		$data['instruksi'] = $this->getAllInstruksi();
		$data['disposisiInstruksi'] = '';
		$data['disposisiUnitTerusan'] = '';
		$data['userList'] = $this->M_User->selectAll()->result();
		$data['disposisiUser'] = '';
		$data['fds_id_parent'] = -99;
        $this->load->view('layout',$data);
    }
	
    public function tambah_disposisi($id){
		$data['id_surat'] = $this->M_Disposisi->selectById($id)->row()->fds_id_surat;
        $data['content'] = 'f_disposisi';
		$data['title'] = 'Tambah disposisi';
		$data['mode'] = 'add';
		$data['unitTerusan'] = $this->getAllUnitTerusan();
		$data['instruksi'] = $this->getAllInstruksi();
		$data['disposisiInstruksi'] = '';
		$data['disposisiUnitTerusan'] = '';
		$data['userList'] = $this->M_User->selectAll()->result();
		$data['disposisiUser'] = '';
		$data['fds_id_parent'] = $id;
        $this->load->view('layout',$data);
    }
	
    public function proses_tambah_disposisi(){      
        $data1 = $this->postVariabel_fds();
        $this->M_Disposisi->insert($data1);
		$AI = $this->M_Disposisi->autoInc();
		
        $data2 = $this->postVariabel_din();
		foreach($data2 as $row){
			$in['din_id_instruksi'] = $row;
			$in['din_id_disposisi'] = $AI;
	        $this->M_DisposisiInstruksi->insert($in);
		}
		
        $data3 = $this->postVariabel_dut();
		foreach($data3 as $row){
			$in2['dut_id_unit_terusan'] = $row;
			$in2['dut_id_disposisi'] = $AI;
	        $this->M_DisposisiUnitTerusan->insert($in2);
		}
		
		$data4 = $this->input->post('tr_disposisi_user');
		foreach($data4 as $row){
			$in3['dus_user'] = $row;
			$in3['dus_disposisi'] = $AI;
	        $this->M_DisposisiUser->insert($in3);
		}
        
		redirect(site_url('Disposisi'));
    }
    
    public function edit_disposisi($id){
        $data['dataDisposisi'] = $this->M_Disposisi->selectById($id)->row();
		$data['id'] = $id;
		$data['mode'] = 'edit';
		$data['content'] = 'f_disposisi';
		$data['title'] = 'Edit disposisi';
		$data['disposisiInstruksi'] = $this->M_DisposisiInstruksi->selectByDisposisi($id)->result() ;
		$data['disposisiUnitTerusan'] = $this->M_DisposisiUnitTerusan->selectByDisposisi($id)->result() ;
		$data['userList'] = $this->M_User->selectAll()->result();
		$data['disposisiUser'] = $this->M_DisposisiUser->selectAll()->result();
		$data['unitTerusan'] = $this->getAllUnitTerusan();
		$data['instruksi'] = $this->getAllInstruksi();
        $this->load->view('layout', $data);
    }
    
    public function proses_edit_disposisi(){
		$id = $this->input->post('fds_id');
		
        $data1 = $this->postVariabel_fds();
        $this->M_Disposisi->update($id, $data1);
		
		$this->M_DisposisiInstruksi->deleteByDisposisi($id);
		
        $data2 = $this->postVariabel_din();
		foreach($data2 as $row){
			$in['din_id_instruksi'] = $row;
			$in['din_id_disposisi'] = $id;
	        $this->M_DisposisiInstruksi->insert($in);
		}
		
		$this->M_DisposisiUnitTerusan->deleteByDisposisi($id);
		
        $data3 = $this->postVariabel_dut();
		foreach($data3 as $row){
			$in2['dut_id_unit_terusan'] = $row;
			$in2['dut_id_disposisi'] = $id;
	        $this->M_DisposisiUnitTerusan->insert($in2);
		}
		
		$this->M_DisposisiUser->deleteByDisposisi($id);
		
		$data4 = $this->input->post('tr_disposisi_user');
		foreach($data4 as $row){
			$in4['dus_user'] = $row;
			$in4['dus_disposisi'] = $AI;
	        $this->M_DisposisiUser->insert($in4);
		}
        redirect(site_url('Disposisi'));
    }
    
    public function hapus_disposisi($id){
		$data['fds_deleted'] = 1;
        $this->M_Disposisi->update($id, $data);
        redirect('Disposisi');
    }
    
}
?>