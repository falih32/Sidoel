<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Disposisi extends CI_Controller{
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
			$this->load->database();
			$this->load->helper('date');
			$this->load->model('m_log');
			$this->load->model('m_surat_masuk');
			$this->load->model('m_user');
			$this->load->model('m_unit_terusan');
			$this->load->model('m_instruksi');
			$this->load->model('m_disposisi');
			$this->load->model('m_disposisi_instruksi');
			$this->load->model('m_disposisi_unit_terusan');
			$this->load->model('m_disposisi_user');
		}
    }
	
	function limitRole($limit){
		$role = $this->session->userdata('id_role');
		if($role > $limit){
			$this->session->set_flashdata('message', array('msg' => 'Anda <strong>tidak memiliki akses</strong> ke fitur yang anda pilih','class' => 'danger'));
			redirect('Dashboard');
		}
	}
	
	function writeLog($tabel, $aksi){
		$data['log_user'] = $this->session->userdata('id_user');
		$data['log_nama_tabel'] = $tabel;
		$data['log_aksi'] = $aksi;
		$this->m_log->insert($data);
	}
    
    public function index(){
		$this->limitRole(3);
		$s = $this->session->userdata('id_user');
		$this->m_disposisi->setNotifZero($s);
		$data['mode'] = 'normal';
		$data['content'] = 'l_disposisi';
		$data['title'] = 'Daftar disposisi';
		$this->load->view('layout',$data);
    }
	
	public function disposisi_masuk(){
		$this->limitRole(3);
		$this->updateNotifZero();
		$data['mode'] = 'byUserMasuk';
		$data['content'] = 'l_disposisi';
		$data['title'] = 'Daftar Masuk';
		$this->load->view('layout',$data);
    }
	
	public function disposisi_keluar(){
		$this->limitRole(3);
		$data['mode'] = 'byUserKeluar';
		$data['content'] = 'l_disposisi';
		$data['title'] = 'Daftar Keluar';
		$this->load->view('layout',$data);
    }
	
	public function tracking($id_surat){
		$data['mode'] = 'bySurat';
		$data['content'] = 'l_disposisi';
		$data['title'] = 'Daftar disposisi';
		$data['graphData'] = $this->m_disposisi->getTrackingData($id_surat);
		$this->load->view('layout',$data);
    }
    
    public function updateNotifZero(){
        $this->m_disposisi->setNotifZero($this->session->userdata('id_user'));
    }
    
	public function ajaxProcess(){
		$min=$this->input->post('min');
		$max=$this->input->post('max');
		if($min == '') $min = '0000-00-00';
		if($max == '') $max = '9999-12-31';
		$result = $this->m_disposisi->selectAjax($min, $max);
		echo $result;
	}
	
	public function ajaxProcessByUserMasuk(){
		$user = $this->session->userdata('id_user');
		$min=$this->input->post('min');
		$max=$this->input->post('max');
		if($min == '') $min = '0000-00-00';
		if($max == '') $max = '9999-12-31';
		$result = $this->m_disposisi->selectAjaxByUserMasuk($min, $max, $user);
		echo $result;
	}
	
	public function ajaxProcessByUserKeluar(){
		$user = $this->session->userdata('id_user');
		$min=$this->input->post('min');
		$max=$this->input->post('max');
		if($min == '') $min = '0000-00-00';
		if($max == '') $max = '9999-12-31';
		$result = $this->m_disposisi->selectAjaxByUserKeluar($min, $max, $user);
		echo $result;
	}
	
	public function ajaxProcessBySurat($surat){
		$min=$this->input->post('min');
		$max=$this->input->post('max');
		if($min == '') $min = '0000-00-00';
		if($max == '') $max = '9999-12-31';
		$result = $this->m_disposisi->selectAjaxBySurat($min, $max, $surat);
		echo $result;
	}	
	
    public function getAllUnitTerusan(){       
		return $this->m_unit_terusan->selectAll()->result();
    }
    
    public function getAllInstruksi(){
		return $this->m_instruksi->selectAll()->result();
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
		$this->limitRole(2);
        $data['content'] = 'f_disposisi';
		$data['title'] = 'Tambah disposisi';
		$data['mode'] = 'add';          
		$data['id_surat'] = $id;
		$data['unitTerusan'] = $this->getAllUnitTerusan();
		$data['instruksi'] = $this->getAllInstruksi();
		$data['disposisiInstruksi'] = '';
		$data['disposisiUnitTerusan'] = '';
		$data['userList'] = $this->m_user->selectAll()->result();
		$data['disposisiUser'] = '';
		$data['fds_id_parent'] = -99;
        $this->load->view('layout',$data);
    }
	
    public function tambah_disposisi($id){
		$this->limitRole(3);
		$data['id_surat'] = $this->m_disposisi->selectById($id)->row()->fds_id_surat;
        $data['content'] = 'f_disposisi';
		$data['title'] = 'Tambah disposisi';
		$data['mode'] = 'add';
		$data['unitTerusan'] = $this->getAllUnitTerusan();
		$data['instruksi'] = $this->getAllInstruksi();
		$data['disposisiInstruksi'] = '';
		$data['disposisiUnitTerusan'] = '';
		$data['userList'] = $this->m_user->selectAll()->result();
		$data['disposisiUser'] = '';
		$data['fds_id_parent'] = $id;
        $this->load->view('layout',$data);
    }
	
    public function proses_tambah_disposisi(){      
		$this->limitRole(3);
        $data1 = $this->postVariabel_fds();
        $AI=$this->m_disposisi->insert($data1);
		//$AI = $this->m_disposisi->autoInc();
		
        $data2 = $this->postVariabel_din();
		foreach($data2 as $row){
			$in['din_id_instruksi'] = $row;
			$in['din_id_disposisi'] = $AI;
	        $this->m_disposisi_instruksi->insert($in);
		}
		
        //$data3 = $this->postVariabel_dut();
//		foreach($data3 as $row){
//			$in2['dut_id_unit_terusan'] = $row;
//			$in2['dut_id_disposisi'] = $AI;
//	        $this->m_disposisi_unit_terusan->insert($in2);
//		}
		
		$data4 = $this->input->post('tr_disposisi_user');
		foreach($data4 as $row){
			$in3['dus_user'] = $row;
			$in3['dus_disposisi'] = $AI;
                        $this->m_disposisi_user->insert($in3);
                        $this->m_user->updateNotif($row);
		}
                            
                $data4 = $this->input->post('tr_disposisi_user');
		foreach($data4 as $row){
//                    $noTujuan= $this->m_user->selectbyId($row)->row()->usr_no_telp;
//                    $message = 'Anda mendapat disposisi instruksi baru dari '.$this->session->userdata('username').' dengan ID '.$AI.'. Silahkan cek '.  base_url().'disposisi/detail_disposisi/'.$AI;
//
//                    $query = "INSERT INTO sms.outbox (DestinationNumber, TextDecoded, CreatorID)VALUES ('$noTujuan', '$message', 'Gammu')";
//                    $this->db->query($query);
                    $userkey="andhika1988"; // userkey di SMS Notifikasi //

                    $passkey="211188"; // passkey di SMS Notifikasi //
                    
                    $telepon= $this->m_user->selectbyId($row)->row()->usr_no_telp;
                    
                    $message='Anda mendapat disposisi instruksi baru dari '.$this->session->userdata('username').' dengan ID '.$AI.'. Silahkan cek '.  base_url().'disposisi/detail_disposisi/'.$AI;

                    $url = "http://reguler.sms-notifikasi.com/apps/smsapi.php";$curlHandle = curl_init();

                    curl_setopt($curlHandle, CURLOPT_URL, $url);

                    curl_setopt($curlHandle, CURLOPT_POSTFIELDS, "userkey=".$userkey."&passkey=".$passkey."&nohp=".$telepon.
                    "&pesan=".urlencode($message));

                    curl_setopt($curlHandle, CURLOPT_HEADER, 0);

                    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);

                    curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);

                    curl_setopt($curlHandle, CURLOPT_POST, 1);

                    $results = curl_exec($curlHandle);

                    curl_close($curlHandle);

                }
		$this->session->set_flashdata('message', array('msg' => 'Data telah dimasukkan','class' => 'success'));
                redirect(site_url('Disposisi/disposisi_keluar'));
    }
    
    public function edit_disposisi($id){
		$this->limitRole(3);
        $data['dataDisposisi'] = $this->m_disposisi->selectById($id)->row();
		$data['id'] = $id;
		$data['mode'] = 'edit';
		$data['content'] = 'f_disposisi';
		$data['title'] = 'Edit disposisi';
		$data['disposisiInstruksi'] = $this->m_disposisi_instruksi->selectByDisposisi($id)->result() ;
		$data['disposisiUnitTerusan'] = $this->m_disposisi_unit_terusan->selectByDisposisi($id)->result() ;
		$data['userList'] = $this->m_user->selectAll()->result();
		$data['disposisiUser'] = $this->m_disposisi_user->selectByDisposisi($id)->result();
		$data['unitTerusan'] = $this->getAllUnitTerusan();
		$data['instruksi'] = $this->getAllInstruksi();
        $this->load->view('layout', $data);
    }
    
    public function detail_disposisi($id){
		$this->limitRole(3);
        $data['dataDisposisi'] = $this->m_disposisi->selectById($id)->row();
		$data['mode'] = 'normal';
		$data['id'] = $id;
		$data['content'] = 'v_disposisi';
		$data['title'] = 'Detail disposisi';
		$data['disposisiInstruksi'] = $this->m_disposisi_instruksi->selectByDisposisi($id)->result() ;
		$data['disposisiUnitTerusan'] = $this->m_disposisi_unit_terusan->selectByDisposisi($id)->result() ;
		$data['userList'] = $this->m_user->selectAll()->result();
		$data['disposisiUser'] = $this->m_disposisi_user->selectByDisposisi($id)->result();
		$data['unitTerusan'] = $this->getAllUnitTerusan();
		$data['instruksi'] = $this->getAllInstruksi();
        $this->load->view('layout', $data);
    }
	
    public function proses_edit_disposisi(){
		$this->limitRole(3);
		$id = $this->input->post('fds_id');
		
        $data1 = $this->postVariabel_fds();
        $this->m_disposisi->update($id, $data1);
		
		$this->m_disposisi_instruksi->deleteByDisposisi($id);
		
        $data2 = $this->postVariabel_din();
		foreach($data2 as $row){
			$in['din_id_instruksi'] = $row;
			$in['din_id_disposisi'] = $id;
	        $this->m_disposisi_instruksi->insert($in);
		}
		
		//$this->m_disposisiUnitTerusan->deleteByDisposisi($id);
//		
//        $data3 = $this->postVariabel_dut();
//		foreach($data3 as $row){
//			$in2['dut_id_unit_terusan'] = $row;
//			$in2['dut_id_disposisi'] = $id;
//	        $this->m_disposisiUnitTerusan->insert($in2);
//		}
		
		$this->m_disposisi_user->deleteByDisposisi($id);
		
		$data4 = $this->input->post('tr_disposisi_user');
		foreach($data4 as $row){
			$in4['dus_user'] = $row;
			$in4['dus_disposisi'] = $id;
	        $this->m_disposisi_user->insert($in4);
		}
		$this->session->set_flashdata('message', array('msg' => 'Data telah diperbarui','class' => 'success'));
		$this->writeLog('Disposisi','Update');
        redirect(site_url('Disposisi/disposisi_keluar'));
    }
    
    public function hapus_disposisi($id){
		$this->limitRole(3);
		$data['fds_deleted'] = 1;
        $this->m_disposisi->update($id, $data);
		$this->session->set_flashdata('message', array('msg' => 'Data telah dihapus','class' => 'warning'));
		$this->writeLog('Disposisi','Delete');
        redirect('Disposisi/disposisi_keluar');
    }
    
}
?>