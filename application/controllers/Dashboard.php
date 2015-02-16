<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{
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
			$this->load->model('m_surat_masuk');
			$this->load->model('m_disposisi');
		}
    }
	
	public function index(){
		$data['title'] = 'SIDOEL';
		$data['content'] = 'dashboard';
		$data['info'] = $this->getData();
		$this->load->view('layout', $data);
	}
	
	function getData(){
		$sm = $this->m_surat_masuk->selectTotalBulan(6);
		$dp = $this->m_disposisi->selectTotalBulan(6);
		$m = array();
		$c_sm = array();
		$c_dp = array();
		foreach ($sm as $row){
			array_push($m, $row->month." ".$row->year);
			array_push($c_sm, $row->total);
		}
		foreach ($dp as $row){
			array_push($c_dp, $row->total);
		}
		$output['labels'] = $m;
		$output['datasets'] = array();
		
		// data surat masuk
		array_push($output['datasets'], array(
			'data'=>$c_sm,
			'label'=>'Surat Masuk',
            'fillColor'=> "rgba(220,220,220,0.5)",
            'strokeColor'=> "rgba(220,220,220,0.8)",
            'highlightFill'=> "rgba(220,220,220,0.75)",
            'highlightStroke'=> "rgba(220,220,220,1)"));
			
		// data disposisi
		array_push($output['datasets'], array(
			'data'=>$c_dp,
			'label'=>'Disposisi',
            'fillColor'=> "rgba(151,187,205,0.5)",
            'strokeColor'=> "rgba(151,187,205,0.8)",
            'highlightFill'=> "rgba(151,187,205,0.75)",
            'highlightStroke'=> "rgba(151,187,205,1)"));
			
		return $output;
	}
	
	public function getJson(){
		$sm = $this->m_surat_masuk->selectTotalBulan(6);
		$dp = $this->m_disposisi->selectTotalBulan(6);
		$m = array();
		$c_sm = array();
		$c_dp = array();
		foreach ($sm as $row){
			array_push($m, $row->month." ".$row->year);
			array_push($c_sm, $row->total);
		}
		foreach ($dp as $row){
			array_push($c_dp, $row->total);
		}
		$output['labels'] = $m;
		$output['datasets'] = array();
		
		// data surat masuk
		array_push($output['datasets'], array(
			'data'=>$c_sm,
			'label'=>'Surat Masuk',
            'fillColor'=> "rgba(220,220,220,0.5)",
            'strokeColor'=> "rgba(220,220,220,0.8)",
            'highlightFill'=> "rgba(220,220,220,0.75)",
            'highlightStroke'=> "rgba(220,220,220,1)"));
			
		// data disposisi
		array_push($output['datasets'], array(
			'data'=>$c_dp,
			'label'=>'Disposisi',
            'fillColor'=> "rgba(151,187,205,0.5)",
            'strokeColor'=> "rgba(151,187,205,0.8)",
            'highlightFill'=> "rgba(151,187,205,0.75)",
            'highlightStroke'=> "rgba(151,187,205,1)"));
		
		echo json_encode($output);
	}
}
?>