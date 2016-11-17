<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of client
 *
 * @author davidohene
 */
class Client extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
         if(empty($this->session->userdata("name"))){
         redirect(base_url('/home'),'refresh');
         }
          else{
            
         }
        $this->load->database();
        $this->load->model('ClientModel', '', TRUE);
        $this->load->library('session');
        
        
    }
    
    public function home(){  
       
	$data['title'] = ucfirst('client: Home');// Capitalize the first letter                
        $data['freelancers'] = $this->ClientModel->view_freelancers();
        $data['project'] = $this->ClientModel->project_list();
        $data['number_of_projects'] = $this->ClientModel->project_count();
        $data['my_freelancers'] = $this->ClientModel->my_freelancers_count();       
        
        //User details (fix this!!!!)
        $data['email'] = $this->ClientModel->get_member_email();
        //$data['skype'] = $this->ClientModel->get_member_skype();
        $data['name'] = $this->session->userdata('name');
        $data['surname'] = $this->session->userdata('surname');
       
        //company details(fix this!!!)
        $data['company_name'] = $this->ClientModel->company_name();
        $data['company_website'] = $this->ClientModel->company_website();
        $data['company_brief'] = $this->ClientModel->company_brief();
        $data['company_location'] = $this->ClientModel->company_location();
        $data['skill_list'] = $this->ClientModel->get_skills();
        
        $data['mail_count'] = $this->ClientModel->get_mail_count();
        $data['project_count'] = $this->ClientModel->my_project_count();
        $data['mail_type'] = ucfirst(null);
        $data = $this->security->xss_clean($data);
        
	$this->load->view('templates/header', $data);
        $this->load->view('templates/content_header', $data);
        $this->load->view('templates/sidebar', $data);
	$this->load->view('client/home', $data);
	$this->load->view('templates/footer', $data);

    }
    
    function company(){
        
        
        $data['title'] = ucfirst('company profile');
        $data['profile']= $this->ClientModel->view_company()->row();
        $data['name'] = $this->session->userdata('name');
        $data['surname'] = $this->session->userdata('surname');
        $data['user_id'] = $this->session->userdata('member_id');
        $data = $this->security->xss_clean($data);
        
        $this->load->view('templates/header', $data);
	$this->load->view('client/company', $data);
	$this->load->view('templates/footer', $data);
    }
    
    function profile(){
        
        $data['title'] = ucfirst('my profile');
        $data['profile'] = $this->ClientModel->get_member_profile()->row();
        
        $data['name'] = $this->session->userdata('name');
        $data['surname'] = $this->session->userdata('surname');
        $data['user_id'] = $this->session->userdata('member_id');
        $data = $this->security->xss_clean($data);
        
        $this->load->view('templates/header', $data);
	$this->load->view('client/profile', $data);
	$this->load->view('templates/footer', $data);
        
    }
            
    
    function freelancers(){
         
       $data['title'] = ucfirst('client: Home');// Capitalize the first letter        
        $data['project'] = $this->ClientModel->view_projects();
        $data['freelancers'] = $this->ClientModel->view_freelancers();
        $data['project_list'] = $this->ClientModel->project_list();
        $data['number_of_projects'] = $this->ClientModel->project_count();
        $data['my_freelancers'] = $this->ClientModel->my_freelancers_count();
        
        
        $data['name'] = $this->session->userdata('name');
        $data['surname'] = $this->session->userdata('surname');
        $data['user_id'] = $this->session->userdata('user_id');
        $data['skill_list'] = $this->ClientModel->get_skills();
        $data = $this->security->xss_clean($data);
        
        $data['mail_count'] = $this->ClientModel->get_mail_count();
        $data['project_count'] = $this->ClientModel->my_project_count();
        $data['mail_type'] = ucfirst(null);

	$this->load->view('templates/header', $data);
        $this->load->view('templates/content_header', $data);
        $this->load->view('templates/sidebar', $data);
	$this->load->view('client/freelancers', $data);
	$this->load->view('templates/footer', $data);

    }
    
    
    function create_project(){
        $this->ClientModel->add_project();
        
    }
    
    function update_project(){
        $this->ClientModel->update_project();
        redirect('project');
    }
    
    function update_profile(){
        $this->ClientModel->update_my_profile();
        redirect('client/profile');
    }
    
    function update_company(){
        $this->ClientModel->update_company_profile();
        redirect('company');
    }
    
    function approve_hours(){
        $this->ClientModel->approve_hours();
    }
    
    function projects(){
        
        $data['title'] = ucfirst('project');
        $data['projects_list'] = $this->ClientModel->project_list();
        $data['number_of_projects'] = $this->ClientModel->project_count();
        $data['my_freelancers'] = $this->ClientModel->my_freelancers_count();
        $data['projects'] = $this->ClientModel->view_projects();
        
        $data['name'] = $this->session->userdata('name');
        $data['surname'] = $this->session->userdata('surname');
        $data['user_id'] = $this->session->userdata('member_id');
        
        $data['mail_count'] = $this->ClientModel->get_mail_count();
        $data['project_count'] = $this->ClientModel->my_project_count();
        $data['mail_type'] = ucfirst(null);
        $data = $this->security->xss_clean($data);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/content_header', $data);
        $this->load->view('templates/sidebar', $data);
	$this->load->view('client/projects', $data);
	$this->load->view('templates/footer', $data);
    }
    
        
    function logout(){
        $this->session->unset_userdata('user_type');
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('session_id');
        $this->session->unset_userdata('client_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('surname');
        $this->session->unset_userdata('member_id');
        
        $this->session->sess_destroy();
        redirect(base_url('/home'));
    }
    
    function view_freelancers(){
        
        $data['title'] = ucfirst('client: Home');// Capitalize the first letter        
        $data['project'] = $this->ClientModel->view_projects();
        $data['freelancers'] = $this->ClientModel->view_freelancers();
        $data['project_list'] = $this->ClientModel->project_list();
        $data['number_of_projects'] = $this->ClientModel->project_count();
        $data['my_freelancers'] = $this->ClientModel->my_freelancers_count();
        
        $data['name'] = $this->session->userdata('name');
        $data['surname'] = $this->session->userdata('surname');
        $data['user_id'] = $this->session->userdata('user_id');
        $data['skill_list'] = $this->ClientModel->get_skills();
        $data = $this->security->xss_clean($data);

	$this->load->view('templates/header', $data);
	$this->load->view('client/home', $data);
	$this->load->view('templates/footer', $data);
    }
    
    function hire_freelancer($freelancer_id, $project){
        $this->ClientModel->hire_freelancer($freelancer_id, $project);
    }
    
    
    function mail($type){
        
        $data['name'] = $this->session->userdata('name');
        $data['surname'] = $this->session->userdata('surname');
        $data['user_id'] = $this->session->userdata('user_id');
        $data['mail_count'] = $this->ClientModel->get_mail_count();
        $data['project_count'] = $this->ClientModel->my_project_count();
        
        $data['inbox_count'] = $this->ClientModel->mail_count('inbox');
        $data['draft_count'] = $this->ClientModel->mail_count('draft');
        $data['sent_count'] = $this->ClientModel->mail_count('sent');
        $data['junk_count'] = $this->ClientModel->mail_count('junk');
        $data['trash_count'] = $this->ClientModel->mail_count('trash');
        
        $data['mailbox'] = $this->ClientModel->get_all_mail($type)->result_array();
        $data['mail_type'] = ucfirst($type);
        $data = $this->security->xss_clean($data);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/content_header', $data);
        $this->load->view('templates/sidebar', $data);
	$this->load->view('pages/mail', $data);
	$this->load->view('templates/footer', $data);
    }
    
    function compose($user){
        
        $data['name'] = $this->session->userdata('name');
        $data['surname'] = $this->session->userdata('surname');
        $data['user_id'] = $this->session->userdata('user_id');
        $data['mail_count'] = $this->ClientModel->get_mail_count();
        $data['project_count'] = $this->ClientModel->my_project_count();
        $data['mailing_list'] = $this->ClientModel->get_mailing_list();
        
        $data['mail_type'] = null;
        $data['user'] = $user;
        
        if($user!=0){
            $data['freelancer_mail'] = $this->ClientModel->get_freelancer_mail($user)->row();
        }
        $data['inbox_count'] = $this->ClientModel->mail_count('inbox');
        $data['draft_count'] = $this->ClientModel->mail_count('draft');
        $data['sent_count'] = $this->ClientModel->mail_count('sent');
        $data['junk_count'] = $this->ClientModel->mail_count('junk');
        $data['trash_count'] = $this->ClientModel->mail_count('trash');
        $data = $this->security->xss_clean($data);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/content_header', $data);
        $this->load->view('templates/sidebar', $data);
	$this->load->view('pages/compose_mail', $data);
	$this->load->view('templates/footer', $data);
        
    }
    
     function send_mail($mail_type){
        
        $this->ClientModel->send_mail($mail_type);        
        redirect(base_url('client/mail/inbox'));
    }
    
    function search(){
        
    }
    
    function do_upload(){
        
		$config['upload_path'] = '../assets/profile_picture/'
                        ;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2048';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()){
		
			$error = array('error' => $this->upload->display_errors());
                        
                      print_r($error);
		}
		else{
		
			$data = array('upload_data' => $this->upload->data());

			 redirect(base_url('/home'));
		}
	}
    
}
