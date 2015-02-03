<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SuratMasuk
 *
 * @author Ganteng Imut
 */
class SuratMasuk extends CI_Controller{
    //put your code here
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('input');
        $this->load->model('C_User');
        $this->load->model('M_SuratMasuk');
    }
    
    public function index(){
              //load the surat model
                
              //call the model function to get the surat data
              $suratmasukresult = $this->M_SuratMasukl->selectAll();          
              $data['suratlist'] = $suratmasukresult;
              //load the department_view
              $this->load->view('SuratMasuk',$data);
    }
    
    function postVariabel(){
        $data['idp']                = $this->input->post('idp');
	$data['nomor_surat']        = $this->input->post('nomor_surat');
	$data['tgl_srt']            = $this->input->post('tgl_srt');
	$data['tgl_srt_diterima']   = $this->input->post('tgl_srt_diterima');
	$data['tgl_srt_dtlanjut']   = $this->input->post('tgl_srt_dtlanjut');
	$data['tenggat_wkt']        = $this->input->post('tenggat_wkt');
	$data['perihal']            = $this->input->post('perihal');
	$data['jenis_surat']        = $this->input->post('jenis_surat');
	$data['no_agenda']          = $this->input->post('no_agenda');
	$data['unit_tujuan']        = $this->input->post('unit_tujuan');
	$data['keterangan']         = $this->input->post('keterangan');
	$data['edited_by']          = $this->input->post('edited_by');
	$data['status_terkirim']    = $this->input->post('status_terkirim');
	$data['file']               = $this->input->post('file');
	$data['pengirim']           = $this->input->post('pengirim');
        
        return $data;
    }
     
    public function tambah_surat_masuk(){
        $this->load->view('SuratMasuk/tambahSrtMasuk');
    }
    public function proses_tambah_smasuk(){      
        $data = $this->postVariabel();
        $this->M_SuratMasuk->insert($data);
        redirect(site_url('SuratMasuk'));
    }
    
    public function edit_surat_masuk($id){
        $data['suratmasuk'] = $this->agenda_model->select_by_id($id)->row();
        $this->load->view('SuratMasuk/editSrtMasuk', $data);
    }
    
    public function proses_edit_smasuk(){
        $data = $this->postVariabel();
        $id_edit=$this->input->post('id');
        $this->M_SuratMasuk->update($id_edit, $data);
        redirect(site_url('SuratMasuk'));
    }
    
    public function delete_smasuk($id){
        $this->agenda_model->delete_agenda($id);
        redirect(site_url('SuratMasuk'));
    }
    
}
