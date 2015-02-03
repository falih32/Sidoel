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
    }
    
    public function index()
         {
              //load the surat model
              $this->load->model('M_SuratMasuk');  
              //call the model function to get the surat data
              $suratmasukresult = $this->M_SuratMasukl->selectAll();          
              $data['suratlist'] = $suratmasukresult;
              //load the department_view
              $this->load->view('V_SuratMasuk',$data);
     }
    
}
