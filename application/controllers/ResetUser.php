<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ResetUser extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
		$this->load->model('m_user');
    }
	
    public function index(){
		$this->forgot_password();
    }
	
	
	public function forgot_password(){
        $this->load->view('password_forgot');
	}
	
	public function send_sms_forgot(){
		$username = $this->input->post('username');
		$userData = $this->m_user->selectByUsername($username)->row();
		$id = $userData->usr_id;
		$to = $userData->usr_email;
		$randomHash = md5("sidoel".$id."resetpassword".date('y-m-d'));
		$link = site_url('ResetUser/resetPassword')."/".$id."/".$randomHash;
		$message = "
		<html>
		<head>
		</head>
		<body>
		<p>Silahkan klik tautan berikut untuk melakukan reset password <a href=".$link.">".$link."</a>. Link tersebut hanya berlaku untuk hari ini, tanggal ".date('d-m-Y').".</p>
		<p>Jika anda merasa tidak pernah meminta layanan ini, harap abaikan pesan ini. </p>
		</body>
		</html>
		";
		$subject = "Link untuk reset password";
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		// More headers
		$headers .= 'From: <webmaster@sidoel.esy.es>' . "\r\n";
		
		mail($to,$subject,$message,$headers);
		
		$this->session->set_flashdata('message', array('msg' => 'Tautan untuk reset password telah dikirim ke e-mail anda. Periksa folder spam jika tidak menemukan email yang dimaksud','class' => 'warning'));
		redirect(site_url('Login'));
	}
	
	public function resetPassword($id, $hash){
		$data['id'] = $id;
		if($hash == md5("sidoel".$id."resetpassword".date('y-m-d'))){
			$data['userData'] = $this->m_user->selectById($id)->row();
			$data['title'] = 'Ubah Password';
			$this->load->view('password_reset', $data);
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