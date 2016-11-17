<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of accessmodel
 *
 * @author Sij
 */
class AccessModel extends CI_Model{
    //put your code here
    
     function __construct() {
        parent::__construct();
    }
    
    function check_session_exists(){
        $check = true;
        
        if($this->session->all_userdata()==NULL){
            $check = false;
        }
        
        return $check;
    }
    
    function login_user($email, $password){
        $this->db->select('fl_id, fl_name, fl_surname');
        $this->db->from('hooros_freelancer_details');
        $this->db->where('fl_email', $email); 
        $this->db->where('fl_password', $password);
       
        
        $result = $this->db->get();
        $return = '';
        
        if($result->num_rows()==1){
            $this->setSession($result, 'freelancer');
            $return = 'freelancer';
        }
        
        else if($result->num_rows()==0){
            $this->db->select('member_id, member_name, member_surname, CL_id');        
            $this->db->from('hooros_client_team');
            $this->db->where('member_email', $email); 
            $this->db->where('member_password', $password);
            
            $client = $this->db->get();
            if($client->num_rows()==1){
              
                $this->setSession($client, 'client');
                  $return = 'client'   ;
                }
            }
            return $return;
            
        }
        
    
    
    function last_active(){
        
    }
    
    function setSession($query, $type){                        
        
        foreach ($query->result() as $row){
                
            if($type=='client'){                                     
                    
                $newdata = array(                       
                    'user_type'=> $type,
                    'logged_in'=>true,
                    'session_id' => uniqid(),
                    'client_id'=>$row->CL_id,
                    'name' => $row->member_name,
                    'surname' => $row->member_surname, 
                    'member_id' => $row->member_id);
                }
                    else{
                 
                    $newdata = array(
                        'user_type'=> $type,
                        'logged_in'=>true,
                        'session_id' => uniqid(),
                        'name' => $row->fl_name,
                        'surname' => $row->fl_surname, 
                        'user_id' => $row->fl_id);
                }

                $this->session->set_userdata($newdata);
    
                
                    }

    
                    }

                    function register($type){
                        
                         if($type=='client'){
          $company_name = $this->input->post('company');
          $brief =  $this->input->post('company_brief');
          
          $data = array(
              'client_company_name'=>$company_name,
              'client_brief'=>$brief,
              'client_active'=>1
          );
          
          $this->db->insert('hooros_client', $data);
          
          $id = $this->db->insert_id();
          
          $team_data = array(
              'member_name'=>$this->input->post('first_name'),
              'member_surname'=>$this->input->post('surname'),
              'member_email'=>$this->input->post('email'),
              'member_password'=>md5($this->input->post('password')),
              'CL_id'=>$id
          );
          
          $user_id = $this->db->insert_id();
          
          $this->db->insert('hooros_client_team', $team_data);
          
           $newdata = array(
                        'user_type'=> $type,
                        'session_id' => uniqid(),
                        'name' => $this->input->post('first_name'),
                        'surname' => $this->input->post('surname'),
                        'client_id'=>$id,
                        'user_id' => $user_id);
          $this->session->set_userdata($newdata);
      }
      
      //insert freelancer data
      else{
          $data = array(
              'fl_name'=>$this->input->post('first_name'),
              'fl_surname'=>$this->input->post('surname'),
              'fl_email'=>$this->input->post('email'),
//              'fl_brief'=>$this->input->post('btief'),
              'fl_ip_address'=>$this->input->ip_address(),
              'fl_password'=>md5($this->input->post('password')),
              'fl_skype_id'=>$this->input->post('skype')
          );
          
                    
          $this->db->insert('hooros_freelancer_details', $data);
          $id = $this->db->insert_id();
          
          $newdata = array(
                        'user_type'=> $type,
                        'session_id' => uniqid(),
                        'name' => $this->input->post('first_name'),
                        'surname' => $this->input->post('surname'), 
                        'user_id' => $id);
          
          $this->session->set_userdata($newdata);
      }
                        
                    }
                    
                    
                    function email(){
                        $data = array(
                            'message'=>$this->input->post('message'),
                            'contact_name'=>$this->input->post('name'),
                            'email'=>$this->input->post('email'),
                            'phone_number'=>$this->input->post('phone')
                        );
                        
                        
                        $this->db->insert('hooros_contact_details', $data);
                    }
                                                           
                    
                    function get_number_of_freelancers(){
        
                        $this->db->select('count(*)as total');
                        $this->db->from('hooros_freelancer_details');
                        $result = $this->db->get();
                        
                        $row = $result->row(); 

                        $total =  $row->total;
   
        
                        return $total;
                        
                    }
                    
/*                    function get_online_freelancers(){
                        $this->db->select('count(*) as total');
                        $this->db->from('hooros_freelancer_details');
                        $this->db->where('fl_online', 1);
                        $result = $this->db->get();
                        
                        $row = $result->row();
                        $total = $row->total;
                        
                        return $total;
                    }
*/                    
                    function get_clients_total(){
                        $this->db->select('count(*) as total');
                        $this->db->from('hooros_client');
                        
                        $result = $this->db->get();
                        $row = $result->row();
                        $total = $row->total;
                        
                        return $total;
                        
                    }
                    
                    function get_projects_total(){
                        $this->db->select('count(*) as total');
                        $this->db->from('hooros_project_details');
                        $result = $this->db->get();
                        $row = $result->row();
                        $total = $row->total;
                        
                        return $total;
                        
                    }
                    
                    function get_freelancer_list(){
                        $this->db->select('*');
                        $this->db->from('hooros_freelancer_details');
                        
                    }
                    
                     function get_skills(){
        $this->db->select('*');
        $this->db->from('hooros_skills_list');
        
        
        return $this->db->get()->result_array();
    }
    
    
       function get_most_used_freelancers(){
        $query = "SELECT count(*) as total, haf.af_freelancer_id, hfd.fl_name, hfd.fl_surname, hfd.fl_rate 
                    FROM hooros_assigned_freelancers haf, hooros_freelancer_details hfd
                    WHERE haf.af_freelancer_id = hfd.fl_id
                    limit 3";

         return $this->db->query($query)->result_array();

    }
    
    function get_latest_projects(){
        $this->db->select('*');
        $this->db->from('hooros_project_details');
        $this->db->order_by("project_added_date ","desc");
        return $this->db->get();
    }
}