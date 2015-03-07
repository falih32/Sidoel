<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SuratMasuk extends CI_Controller{
    //put your code here
    public function __construct(){
        parent::__construct();
		if($this->session->userdata('id_user') == ''){
			$this->session->set_flashdata('message', array('msg' => 'Silahkan <strong>login</strong> untuk melanjutkan','class' => 'danger'));
			redirect('login');
		}
		else
		{
			$this->load->helper('url');
			$this->load->helper('date');
			$this->load->database();
			$this->load->model('m_surat_masuk');
			$this->load->model('m_instruksi');
                        $this->load->model('m_unit_terusan');
                        $this->load->model('m_unit_tujuan');
			$this->load->model('m_jenis_smasuk');
			$this->load->model('m_log');
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
		$this->limitRole(3);
		$data['content'] = 'l_suratmasuk';
		$data['title']= 'Daftar surat masuk';
		$data['mode'] = 'normal';
		$this->load->view('layout',$data);
    }
	
    public function surat_saya(){
		$this->limitRole(3);
		$data['content'] = 'l_suratmasuk';
		$data['title']= 'Daftar surat masuk';
		$data['mode'] = 'byUser';
		$this->load->view('layout',$data);
    }
	
	public function ajaxProcess(){
		$min=$this->input->post('min');
		$max=$this->input->post('max');
		if($min == '') $min = '0000-00-00';
		if($max == '') $max = '9999-12-31';
		$result = $this->m_surat_masuk->selectAjax($min, $max);
		echo $result;
	}
    	
	public function ajaxProcessByUser(){
		$user = $this->session->userdata('id_user');
		$min=$this->input->post('min');
		$max=$this->input->post('max');
		if($min == '') $min = '0000-00-00';
		if($max == '') $max = '9999-12-31';
		$result = $this->m_surat_masuk->selectAjax($min, $max, $user);
		echo $result;
	}
	
    public function getAllUnitTujuan(){       
		return $this->m_unit_tujuan->selectAll()->result();
    }
    
    public function getAllJenisSurat(){
		return $this->m_jenis_smasuk->selectAll()->result();
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
                $data['sms_indek']              = $this->input->post('sms_indek');
                $data['sms_kode']               = $this->input->post('sms_kode');
                $data['sms_lampiran']           = $this->input->post('sms_lampiran');
        return $data;
    }
    
    public function upload_config(){
		$config['upload_path'] = './uploads/surat_masuk';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
		$config['max_size']	= '2000';
		$config['max_width']  = '3000';
		$config['max_height']  = '3000';

		$this->load->library('upload', $config);
	}
     
    public function tambah_surat_masuk(){
		$this->limitRole(2);
        $data['content'] = 'f_suratmasuk';
		$data['title']= 'Daftar surat masuk';          
        $data['jenisList'] = $this->getAllJenisSurat();
        $data['unitList'] = $this->getAllUnitTujuan();
        $this->load->view('layout',$data);
    }
    public function proses_tambah_smasuk(){  
		$this->limitRole(2);    
        $data = $this->postVariabel();
		$this->upload_config();
		if($this->upload->do_upload('sms_file')){
			$updata = $this->upload->data();
			$data['sms_file'] = $updata['file_name'];
		}
        $this->m_surat_masuk->insert($data);
		$this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
		$this->writeLog('Surat Masuk','Create');
        redirect(site_url('SuratMasuk'));
    }
    
    public function detail_surat_masuk($id){
		$this->limitRole(3);
        $data['dataSurat'] = $this->m_surat_masuk->selectById($id);
		$data['id'] = $id;
		$data['mode'] = 'edit';
		$data['content'] = 'v_suratmasuk';
		$data['title'] = 'Detail surat masuk';
        $data['jenisList'] = $this->getAllJenisSurat();
        $data['unitList'] = $this->getAllUnitTujuan();
        $this->load->view('layout', $data);
    }
    
    public function edit_surat_masuk($id){
		$this->limitRole(2);
        $data['dataSurat'] = $this->m_surat_masuk->selectById($id);
		$data['id'] = $id;
		$data['mode'] = 'edit';
		$data['content'] = 'f_suratmasuk';
		$data['title'] = 'Edit surat masuk';
        $data['jenisList'] = $this->getAllJenisSurat();
        $data['unitList'] = $this->getAllUnitTujuan();
        $this->load->view('layout', $data);
    }
    
    public function proses_edit_smasuk(){
		$this->limitRole(2);
        $data = $this->postVariabel();
        $this->upload_config();
		if($this->upload->do_upload('sms_file')){
			$updata = $this->upload->data();
			$data['sms_file'] = $updata['file_name'];
		}
        $id_edit=$this->input->post('id');
        $this->m_surat_masuk->update($id_edit, $data);
		$this->session->set_flashdata('message', array('msg' => 'Data telah diperbarui','class' => 'success'));
		$this->writeLog('Surat Masuk','Update');
        redirect(site_url('SuratMasuk'));
    }
    
    public function delete_smasuk($id){
		$this->limitRole(2);
        $this->m_surat_masuk->delete($id);
		$this->session->set_flashdata('message', array('msg' => 'Data telah dihapus','class' => 'warning'));
		$this->writeLog('Surat Masuk','Delete');
        redirect('SuratMasuk');
    }
	
	public function konfirmasi($id){
		$this->limitRole(1);
		$data['sms_confirm_by'] = $this->session->userdata("id_user");
		$data['sms_confirm_status'] = '1';
		$this->m_surat_masuk->update($id, $data);
		//$red = "SuratMasuk/detail_surat_masuk/".$id;
		//redirect($red);
	}
    
    public function disposisi_cetak($id) {
                $data['suratMasuk']=  $this->m_surat_masuk->selectById($id);
                $data['instruksi'] = $this->m_instruksi->selectAll()->result();
                $data['disposisiInstruksi'] = '';
                $data['unitTerusan'] = $this->m_unit_terusan->selectAll()->result();
                $data['disposisiUnitTerusan'] = '';
		$this->load->view('v_cetakdisposisi',$data);
	}

	public function search(){
		$this->limitRole(2);
		$s_key = $this->input->post('s_key');
		$s_date_awal = $this->input->post('s_date_awal');
		$s_date_akhir = $this->input->post('s_date_akhir');
		
		$limit['perpage'] = 100;
		$limit['offset'] = 0;
		$data['suratList'] = $this->m_surat_masuk->searchSuratMasuk($s_key, $s_date_awal, $s_date_akhir, $limit);
		
		$data['content'] = 'l_suratmasuk';
		$data['title']= 'Daftar surat masuk';
		$data['unit_tujuan'] = $this->m_unit_tujuan->selectAll();
		$this->load->view('layout',$data);
	}
}
?>