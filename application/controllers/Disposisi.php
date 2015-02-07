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
			$this->load->model('M_UnitTerusan');
			$this->load->model('M_Instruksi');
			$this->load->model('M_Disposisi');
			$this->load->model('M_DisposisiInstruksi');
			$this->load->model('M_DisposisiUnitTerusan');
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
			// tentukan jumlah data per halaman
			$offset = $this->uri->segment(3);
			$offset = (empty($offset))?0:$offset;
			$perpage = 10;
			// load library pagination
			$this->load->library('pagination');
			// konfigurasi tampilan paging
			$config = array('base_url' => site_url('disposisi/page/'),
							'total_rows' => count($this->M_Disposisi->selectAll()->result()),
							'per_page' => $perpage);
			// inisialisasi pagination dan config
			$this->pagination->initialize($config);
			$limit['perpage'] = $perpage;
			$limit['offset'] = $offset;
			$data['suratList'] = $this->M_Disposisi->selectAllPaging($limit)->result();
			$data['content'] = 'l_disposisi';
			$data['title']= 'Daftar disposisi';
			$this->load->view('layout',$data);
		}
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
        
		redirect(site_url('Disposisi'));
    }
    
    public function edit_disposisi($id){
        $data['dataDisposisi'] = $this->M_Disposisi->selectById($id)->row();
		$data['id'] = $id;
		$data['mode'] = 'edit';
		$data['content'] = 'f_disposisi';
		$data['titile'] = 'Edit disposisi';
		$data['disposisiInstruksi'] = $this->M_DisposisiInstruksi->selectByDisposisi($id)->result() ;
		$data['disposisiUnitTerusan'] = $this->M_DisposisiUnitTerusan->selectByDisposisi($id)->result() ;
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
		
        redirect(site_url('Disposisi'));
    }
    
    public function hapus_disposisi($id){
		$data['deleted'] = 1;
        $this->M_Disposisi->update($id, $data);
        redirect('Disposisi');
    }
    
}
?>