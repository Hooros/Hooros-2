<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author Sij
 */
class Admin extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('AdminModel', '', TRUE);
        $this->load->library('session');
    }
    
    function home(){
        $data['title'] = ucfirst('home');
        $data['client_requests'] = $this->AdminModel->get_client_requests();
        $data['freelancer_requests'] = $this->AdminModel->get_freelancer_requests();
        
        $this->load->view('templates/header', $data);
	$this->load->view('admin/home', $data);
	$this->load->view('templates/footer', $data);
    }
}
