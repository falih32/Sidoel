<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_Login
 *
 * @author Ganteng Imut
 */
class testview extends CI_Controller{
    
    function __construct(){
        parent::__construct();
    }
        // melihat halam qqan login
    public function index(){
		$data['title'] = 'suratmasuk';
		$data['content'] = 'testview';
        $this->load->view('testview', $data);
    }
}
