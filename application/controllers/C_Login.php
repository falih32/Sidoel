<?php

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
class C_Login extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_User');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
        // melihat halaman login
    public function index(){
        $this->load->view('sidoel/form_login');
    }
}
