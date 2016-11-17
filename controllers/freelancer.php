<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of freelancer
 *
 * @author Sij
 */
class Freelancer extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        
        if(empty($this->session->userdata("name"))){
         redirect(base_url('/home'),'refresh');
         }
          else{
           
         }
        $this->load->database();
        $this->load->model('FreelancerModel');
//        $this->load->model('MailModel');
        $this->load->library('session');
        
        
    }
    
     function home(){
                  
//check if logged in
if($this->session->userdata('session_id')){
 // do somenthing cause it exist
    $this->FreelancerModel->check_session_exists();
        $data['title'] = ucfirst('profile'); // Capitalize the first letter        
        $data['profile'] = $this->FreelancerModel->get_profile()->row();
        
        $data['name'] = $this->session->userdata('name');
        $data['surname'] = $this->session->userdata('surname');
        $data['user_id'] = $this->session->userdata('user_id');
        $data['skill_list'] = $this->FreelancerModel->get_skills();
        $data['my_skills'] = $this->FreelancerModel->get_my_skills();
        $data['completed'] = $this->FreelancerModel->get_completed_project();
        $data['client_count'] = $this->FreelancerModel->get_number_of_clients();
        $data['project'] = $this->FreelancerModel->get_projects();
        $data['mail_count'] = $this->FreelancerModel->get_mail_count();
        $data['project_count'] = $this->FreelancerModel->my_project_count();
        $data['mail_type'] = ucfirst(null);
                
        $this->load->view('templates/header', $data);
        $this->load->view('templates/content_header', $data);
        $this->load->view('templates/sidebar', $data);
	$this->load->view('freelancer/home', $data);
	$this->load->view('templates/footer', $data);
}

else{
    redirect(base_url('home/login'));
}

}
    
   public function update(){
        $this->FreelancerModel->update_profile();
        
        
    }
    
    function sij(){
        $this->load->helper(array('form', 'url'));
        $this->load->view('freelancer/sij', array('error' => ' ' ));
    }
    
    function projects(){

        $data['title'] = ucfirst('Project Details');
        $data['name'] = $this->session->userdata('name');
        $data['surname'] = $this->session->userdata('surname');
        $data['user_id'] = $this->session->userdata('user_id');
        $data['search'] = null;
        $data['status'] = null;
        
     //   $data['projects'] = $this->FreelancerModel->get_total_available_projects();
        $data['projects'] = $this->FreelancerModel->get_my_project();
       // $data['project_details'] = $this->FreelancerModel->get_project_details($project);
       // $data['project_id'] = $project;
        $data['mail_count'] = $this->FreelancerModel->get_mail_count();
        $data['project_count'] = $this->FreelancerModel->my_project_count();
        $data['mail_type'] = ucfirst(null);
        $data['profile'] = $this->FreelancerModel->get_profile()->row();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/content_header', $data);
        $this->load->view('templates/sidebar', $data);
	$this->load->view('freelancer/projects', $data);
	$this->load->view('templates/footer', $data);
        
    }
    
    
    function accept_project(){
        $this->FreelancerModel->accept_project();                
    }
    
    function profile(){
        $this->FreelancerModel->check_session_exists();
        $data['title'] = ucfirst('profile'); // Capitalize the first letter        
       
        $data['profile'] = $this->FreelancerModel->get_profile()->row();
        
        $data['name'] = $this->session->userdata('name');
        $data['surname'] = $this->session->userdata('surname');
        $data['user_id'] = $this->session->userdata('user_id');
        $data['skill_list'] = $this->FreelancerModel->get_skills();
        $data['my_skills'] = $this->FreelancerModel->get_my_skills();
        $data['project_count'] = $this->FreelancerModel->my_project_count();
        
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/content_header', $data);
        $this->load->view('templates/sidebar', $data);
	$this->load->view('freelancer/profile', $data);
	$this->load->view('templates/footer', $data);
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('home'));
    }
    
    function add_skills(){
        if($this->FreelancerModel->add_skill_to_profile()){
            redirect(base_url('freelancer/profile'));
        }                
    }
    
    function choose_project($id){
        $this->FreelancerModel->choose_project($id);
        echo '<script> alert(Waiting for client to approve);</script>';
        redirect('freelancer/home');
    }
    
    function search(){
        
        $data['projects'] = $this->FreelancerModel->get_search_results();  
        $data['name'] = $this->session->userdata('name');
        $data['surname'] = $this->session->userdata('surname');
        $data['user_id'] = $this->session->userdata('user_id');
        $data['mail_count'] = $this->FreelancerModel->get_mail_count();
        $data['search'] = $this->input->post('searchField');
        $data['profile'] = $this->FreelancerModel->get_profile()->row();
        $data['status'] = 'search';
        $data['mail_count'] = $this->FreelancerModel->get_mail_count();
        $data['project_count'] = $this->FreelancerModel->my_project_count();
        $data['mail_type'] = ucfirst(null);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/content_header', $data);
        $this->load->view('templates/sidebar', $data);
	$this->load->view('freelancer/projects', $data);
	$this->load->view('templates/footer', $data);
    }
    /**
     * mail functions
     * inbox
     * compose
     * deleted
     * draft
     * 
     */
    function mail($type){
        
        $data['name'] = $this->session->userdata('name');
        $data['surname'] = $this->session->userdata('surname');
        $data['user_id'] = $this->session->userdata('user_id');
        $data['mail_count'] = $this->FreelancerModel->get_mail_count();
        $data['project_count'] = $this->FreelancerModel->my_project_count();
        
        $data['inbox_count'] = $this->FreelancerModel->mail_count('inbox');
        $data['draft_count'] = $this->FreelancerModel->mail_count('draft');
        $data['sent_count'] = $this->FreelancerModel->mail_count('sent');
        $data['junk_count'] = $this->FreelancerModel->mail_count('junk');
        $data['trash_count'] = $this->FreelancerModel->mail_count('trash');
        $data['profile'] = $this->FreelancerModel->get_profile()->row();
        
        $data['mailbox'] = $this->FreelancerModel->get_all_mail($type)->result_array();
        $data['mail_type'] = ucfirst($type);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/content_header', $data);
        $this->load->view('templates/sidebar', $data);
	$this->load->view('pages/mail', $data);
	$this->load->view('templates/footer', $data);
    }
    
    function compose(){
        
        $data['name'] = $this->session->userdata('name');
        $data['surname'] = $this->session->userdata('surname');
        $data['user_id'] = $this->session->userdata('user_id');
        $data['mail_count'] = $this->FreelancerModel->get_mail_count();
        $data['project_count'] = $this->FreelancerModel->my_project_count();
        $data['profile'] = $this->FreelancerModel->get_profile()->row();        
        
        $data['inbox_count'] = $this->FreelancerModel->mail_count('inbox');
        $data['draft_count'] = $this->FreelancerModel->mail_count('draft');
        $data['sent_count'] = $this->FreelancerModel->mail_count('sent');
        $data['junk_count'] = $this->FreelancerModel->mail_count('junk');
        $data['trash_count'] = $this->FreelancerModel->mail_count('trash');        
          
        $data['mail_type'] = ucfirst(null);
        $data['mailing_list'] = $this->FreelancerModel->get_mailing_list()->row();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/content_header', $data);
        $this->load->view('templates/sidebar', $data);
	$this->load->view('pages/compose_mail', $data);
	$this->load->view('templates/footer', $data);
        
        
    }
    
    function send_mail($mail_type){
        
        $this->FreelancerModel->send_mail($mail_type);        
        redirect(base_url('freelancer/mail/inbox'));
    }    
    
}