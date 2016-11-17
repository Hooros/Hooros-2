<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author Sij
 */
class home extends CI_Controller{
    //put your code here
 function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->library('email');
        $this->load->model('AccessModel', '', TRUE);
    }
        public function index($page ='home'){
        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php')){
		// Whoops, we don't have a page for that!
		show_404();                        
	}
        
        $data['title'] = ucfirst('hooros'); // Capitalize the first letter
        $data['freelancers'] = $this->AccessModel->get_number_of_freelancers();
      //  $data['online'] = $this->AccessModel->get_online_freelancers();
        $data['clients'] = $this->AccessModel->get_clients_total();
        $data['projects'] = $this->AccessModel->get_projects_total();
        $data['skill_list'] = $this->AccessModel->get_skills();
        $data['top_freelancers'] = $this->AccessModel->get_most_used_freelancers();

//	$this->load->view('templates/header', $data);
	$this->load->view('pages/home', $data);
//	$this->load->view('templates/footer', $data);

    }
    
    function smtptest(){
//        $f = fsockopen('mail.hooros.co.za', 587) ;
//if ($f !== false) {
//    $res = fread($f, 1024) ;
//    if (strlen($res) > 0 && strpos($res, '220') === 0) {
//        echo "Success!" ;
//    }
//    else {
//        echo "Error: " . $res ;
//    }
//}
//fclose($f) ;


     //set up email config            
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'serv7.registerdomain.co.za';//'mail.hooros.co.za';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'sijabuliso@hooros.co.za';
        $config['smtp_pass']    = '$iJ(-)8uli$0';
        $config['charset']    = 'iso-8859-1';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      

    $this->email->initialize($config);
       
        
        
        //email details
        $this->email->from('sijabuliso@hooros.co.za', 'Hooros');
        $this->email->to('sijnkiwane@gmail.com'); //admin@hooros.co.za
        $this->email->subject('More Information');
        $this->email->message('Test');	

        $this->email->send();
        echo $this->email->print_debugger();
    }
    
    public function email(){     
        
        $this->AccessModel->email();
    
    }

  function login(){
      
      if ( ! file_exists(APPPATH.'/views/pages/login.php')){
		// Whoops, we don't have a page for that!
		show_404();          
	}      
        $data['login_attempt'] = 'success';
	$this->load->library('form_validation');
        $data['title'] = ucfirst('hooros'); // Capitalize the first letter              
        
        $this->load->view('templates/header', $data);
	$this->load->view('pages/login', $data);
	$this->load->view('templates/footer', $data);
        
  }
  
  function submit_login(){
               
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      
      $pass = md5($password);
      
      if($this->AccessModel->login_user($email, $pass)== 'client'){
          redirect(base_url('client/home'));
      }
      else if($this->AccessModel->login_user($email, $pass)== 'freelancer'){
          redirect(base_url('freelancer/home'));
          
      }
      else{
          $data['login_attempt'] = 'failed';
          $this->load->view('templates/header', $data);
	$this->load->view('pages/login', $data);
	$this->load->view('templates/footer', $data);
      }      
      
  }  
  
  
  function register(){
      
      $this->load->helper(array('form', 'url'));
  
      $data['title'] = "Registration";
      $data['message'] = "";
      $data['email_exists'] = false;
      
          $this->load->view('templates/header', $data);
          $this->load->view('pages/register', $data);
          $this->load->view('templates/footer', $data);
  
          }
      
     function submit_registration(){
         $type = $this->input->post('type');
      if($this->input->post('password')==$this->input->post('password_check')){
          $this->AccessModel->register($type);
          
          if($type=='client'){
              
              redirect(base_url('client/home'));              
          }
          else{
              redirect( base_url('freelancer/home'));
          }
      }
      
      else{
          
          $data['email_exists'] = true;
          $data['password_fail'] = true;
         $this->load->view('templates/header', $data);
          $this->load->view('pages/register', $data);
          $this->load->view('templates/footer', $data);
          
      }
     }
     
      function sij($page = 'sij'){
          echo 'Sij';
      }
      
      
      function searchFreelancer(){
          echo '';
      }
  
  
  function client($page='client_reg'){
      
       
      if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php')){
		// Whoops, we don't have a page for that!
		show_404();
	}
	$this->load->library('form_validation');
        $data['title'] = "Client Registratiion"; // Capitalize the first letter              
        $this->load->view('templates/header', $data);	
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
  
  }
  
  function freelancer($page='freelancer_reg'){
       
      if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php')){
		// Whoops, we don't have a page for that!
		show_404();
	}
	$this->load->library('form_validation');
        $data['title'] = "Freelancer Registratiion"; // Capitalize the first letter              
        $this->load->view('templates/header', $data);	
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
  }
  
  function searchFreelancers(){
      echo "Test";
  }
  
  
  function about(){
      
      $data['title'] = ucfirst('about'); // Capitalize the first letter
        $data['freelancers'] = $this->AccessModel->get_number_of_freelancers();
    //  $data['online'] = $this->AccessModel->get_online_freelancers();
        $data['clients'] = $this->AccessModel->get_clients_total();
        $data['projects'] = $this->AccessModel->get_projects_total();
        $data['skill_list'] = $this->AccessModel->get_skills();
        $data['top_freelancers'] = $this->AccessModel->get_most_used_freelancers();

//	$this->load->view('templates/header', $data);
	$this->load->view('pages/about', $data);
//	$this->load->view('templates/footer', $data);

  }
}
