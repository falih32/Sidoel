<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ResetUser extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
		$this->load->model('m_user');
    }
	
    public function index(){
		$data['content'] = 'l_user';
		$data['title']= 'Daftar User';
		$this->load->view('layout',$data);
    }
	
	
	public function forgot_password(){
		$data['content'] = 'password_forgot';
		$data['title'] = 'Forgot password';
        $this->load->view('layout', $data);
	}
	
	public function send_sms_forgot(){
		$username = $this->input->post('username');
		$userData = $this->m_user->selectByUsername($username)->row();
		$id = $userData->usr_id;
		$telepon = $userData->usr_no_telp;
		$randomHash = md5("sidoel".$userData->usr_id."resetpassword".date('y-m-d'));
		$message = "Silahkan klik tautan berikut untuk reset password ".site_url('ResetUser/resetPassword')."/".$id."/".$randomHash;
		//================
		$userkey="andhika1988"; // userkey di SMS Notifikasi //

		$passkey="211188"; // passkey di SMS Notifikasi //
		
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
		//================
		$this->session->set_flashdata('message', array('msg' => 'Tautan untuk reset password telah dikirim ke e-mail anda. Periksa folder spam jika tidak menemukan email yang dimaksud','class' => 'warning'));
		redirect(site_url('Login'));
	}
	
	public function resetPassword($id, $hash){
		$data['id'] = $id;
		if($hash == md5("sidoel".$id."resetpassword".date('y-m-d'))){
			$data['userData'] = $this->m_user->selectById($id)->row();
			$data['title'] = 'Ubah Password';
			$data['content'] = 'password_reset';
			$this->load->view('layout', $data);
		}
		else{
			$this->session->set_flashdata('message', array('msg' => 'Anda <strong>tidak memiliki akses</strong> ke fitur yang anda pilih','class' => 'danger'));
			redirect(site_url('Login'));
		}
	}
	
	public function process_reset_password(){
		$id_edit=$this->input->post('usr_id');
		$data['usr_password'] = md5($this->input->post('new_pass'));
		$this->m_user->update($id_edit, $data);
		$this->session->set_flashdata('message', array('msg' => 'Password baru telah disimpan. Silahkan login.','class' => 'success'));
		redirect(site_url('Login'));
	}
}
?>