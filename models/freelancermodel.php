<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of freelancermodel
 *
 * @author Sij
 */
class FreelancerModel extends CI_Model{
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
    
    function update_profile(){
        
        $name = $this->input->post('name');
        $surname = $this->input->post('surname');
        $email = $this->input->post('email');
        $rate = $this->input->post('rate');
        $skype = $this->input->post('skype');
        $brief = $this->input->post('brief');
        $skills = $this->input->post('skills');
        
         
        $data = array('fl_name'=>$name,
            'fl_surname'=>$surname,
            'fl_email'=>$email,
            'fl_rate'=>$rate,
            'fl_skype_id'=>$skype,
            'fl_brief'=>$brief   );
       
        $id = $this->session->userdata('user_id');
        
        $skillsList= $this->input->post('skills');
         foreach($skillsList as $i => $skill){
            
             $this->add_skill_to_profile($skill);
        }
        $this->db->where('fl_id', $id);
        $this->db->update('hooros_freelancer_details', $data);
         
        redirect('freelancer/home');
        
    }
    
    function get_profile(){
        
        $this->db->select('*');
        $this->db->from('hooros_freelancer_details');
        $this->db->where('fl_id',$this->session->userdata('user_id'));
        
        return $this->db->get();
    }
    
    function get_skills(){
        
        $query = "select  distinct HSL.skill_id, HSL.skill_name
                    from hooros_skills_list HSL
                    where HSL.skill_id NOT IN (SELECT skill_id 
                    from hooros_freelancer_skillset where freelancer_id = ?)";
                        
         return $this->db->query($query,array($this->session->userdata('user_id')))->result_array();
    }
    
    function get_my_skills(){
        $this->db->distinct();
        $this->db->select('hsl.skill_name');
        $this->db->from('hooros_freelancer_skillset hfs, hooros_skills_list hsl');
        $this->db->join('hooros_skills_list', 'hfs.skill_id = hsl.skill_id');
        $this->db->where('hfs.freelancer_id', $this->session->userdata('user_id'));
        
        return $this->db->get()->result_array();
    }
    
    function add_to_skills_list(){
        $skills = $this->input->post('skills');
        
        $data = array('skill_name'=>$skills);
        
        $this->db->insert('hooros_skills_list', $data);
        
        return $this->db->insert_id();
    }
    
    function add_skill_to_profile($skill){
        $data = array('freelancer_id'=>$this->session->userdata('user_id'),
            'skill_id'=>$skill,
            'skill_level'=>'Expert',
            'years_of_experience'=>'3');
        
        $this->db->insert('hooros_freelancer_skillset', $data);
        
    }
    
    function get_projects(){
        $query = " SELECT distinct HPD.number_of_freelancers, HPD.project_brief, HPS.project_id, HPD.project_title, HPD.project_start_date, HPD.project_completion_date
                 FROM hooros_project_skills HPS, hooros_project_details HPD,
                 hooros_freelancer_skillset HFS, hooros_assigned_freelancers HAF
                 WHERE HPS.project_id = HPD.project_id
                 AND HAF.af_project_id = HPS.project_id
                 AND HPS.skills_id = HFS.skill_id
                 AND HAF.af_freelancer_id = HFS.freelancer_id
                 and HAF.af_project_id <> (SELECT af_project_id FROM hooros_assigned_freelancers where af_freelancer_id = 4)
                 AND HAF.status = 'pending'
                 
                 AND HAF.af_freelancer_id <> ?
                 LIMIT 10

                    ";
        
       return $this->db->query($query,array($this->session->userdata('user_id')))->result_array();
    }
    
    function get_project_details($project){
        $query = "SELECT distinct HAF.af_freelancer_id, HPD.project_brief, HPS.project_id, HPD.project_title, HPD.project_start_date, HPD.project_completion_date"
                . " FROM hooros_project_skills HPS, hooros_project_details HPD,"
                . " hooros_freelancer_skillset HFS, hooros_assigned_freelancers HAF"
                . " WHERE HPS.project_id = HPD.project_id"
                . " AND HPS.skills_id = HFS.skill_id"
                . " AND HAF.af_freelancer_id = HFS.freelancer_id"
                . " AND HFS.freelancer_id = ?"
                . " AND HPS.project_id = $project";
        
       return $this->db->query($query,array($this->session->userdata('user_id')))->result_array();
    }
    
    function get_total_available_projects(){
        $query = "SELECT COUNT( distinct HPD.project_id) as total"
                . " FROM hooros_project_skills HPS, hooros_project_details HPD,"
                . " hooros_freelancer_skillset HFS "
                . " WHERE HPS.project_id = HPD.project_id"
                . " AND HPS.skills_id = HFS.skill_id"
                . " AND HFS.freelancer_id = ?";
        
        $result = $this->db->query($query,array($this->session->userdata('user_id')));
        
        if ($result->num_rows() > 0){
   $row = $result->row(); 

   $total =  $row->total;
   
}

        
        return $total;
    }
    
    function get_my_project(){
        $query = " SELECT distinct HPD.number_of_freelancers, HPD.project_title,
                   HPD.project_brief, HPS.project_id, HPD.project_title,
                   HPD.project_start_date, HPD.project_completion_date, HAF.status
                 FROM hooros_project_skills HPS, hooros_project_details HPD,
                 hooros_freelancer_skillset HFS, hooros_assigned_freelancers HAF
                 WHERE HPS.project_id = HPD.project_id
                 AND HAF.af_project_id = HPS.project_id
                 AND HPS.skills_id = HFS.skill_id
                 AND HAF.af_freelancer_id = HFS.freelancer_id
             --  AND HAF.status = 'pending'
                 AND HFS.freelancer_id = ?
                 LIMIT 5";
       
        $result  = $this->db->query($query, array($this->session->userdata('user_id')));
        
        
       // return $project_id;
        return $result;
    }
    
    function decide_project(){
        $data = array('status', $this->input->post('decision'));
        
        $this->db->update('hooros_assigned_freelancer', $data);
    }
    
    function choose_project($id){
        
        $data = array(
            'af_freelancer_id'=>$this->session->userdata('user_id'),
            'af_project_id'=>$id,
            'status'=>'pending'
        );
        
        $this->db->insert('hooros_assigned_freelancers', $data);
    }
    
    function accept_project(){
        $data = array(
            'status'=>'client response',
            'af_project_id'=> $this->input->post('project'),
            'af_freelancer_id'=> $this->session->userdata('user_id')
        );
        
    
        $this->db->insert('hooros_assigned_freelancers', $data);
        echo'<script>alert("Waiting for Client Approval");</script>';
        
        
        //redirect('freelancer/home');
        
    }
    
    
    function check_verified(){
         $this->db->select('fl_verified');
        $this->db->from('hooros_freelancer_details');
        $this->db->where('fl_id',$this->session->userdata('user_id'));
        
        $results = $this->db->get();
        
        if ($results->num_rows() > 0){
            $row = $results->row(); 

            $verified =  $row->fl_verified;   
   
        }
        
        return $verified;
        
    }
    
    function get_completed_project(){
        
               $query = "SELECT count(*) as 'total' 
                   FROM hooros_freelancer_hoursr_billed hf, hooros_project_details hp 
                WHERE freelancer_id = ?
                and  hp.project_complete = 1
                and hf.project_id = hp.project_id";
        
        $result  = $this->db->query($query, array($this->session->userdata('user_id')));
        
        if ($result->num_rows() > 0){
   $row = $result->row(); 

   $count =  $row->total;   
   
        }
        return $count;   
    }
    
    function get_number_of_clients(){
        
                
                $query = "SELECT  count(distinct hp.client_id) as 'total' 
                   FROM hooros_freelancer_hoursr_billed hf, hooros_project_details hp 
                WHERE freelancer_id = ?
                and  hp.project_complete = 1
                and hf.project_id = hp.project_id";
        
        $result  = $this->db->query($query, array($this->session->userdata('user_id')));
        
        if ($result->num_rows() > 0){
   $row = $result->row(); 

   $count =  $row->total;   
   
        }
        return $count;   
    }
    
    function get_search_results(){
        $query = "SELECT HPD.project_id, HPD.project_title, HPD.project_brief,
                  HPD.project_start_date, HPD.project_completion_date,
                  HPD.number_of_freelancers
                  FROM `hooros_project_details` HPD, `hooros_project_skills` HPS,
                  hooros_skills_list HSL
                  WHERE HPS.project_id = HPD.project_id
                  AND HSL.skill_id = HPS.skills_id 
                  AND HSL.skill_name = TRIM(?)";
        
        return  $this->db->query($query, array($this->input->post('searchField')));
                
    }
    
    function get_mail_count(){        
         $query = "SELECT count(*)as total from hooros_mail where user_id = ?";
        
        $result  = $this->db->query($query, array($this->session->userdata('user_id')));
        
        if ($result->num_rows() > 0){
   $row = $result->row(); 

   $count =  $row->total;   
   
        }
        return $count;           
    }
    
    function my_project_count(){
        
        $query = "SELECT count(*) as total FROM `hooros_assigned_freelancers` "
                . "WHERE  af_freelancer_id = ?";
        
          $result  = $this->db->query($query, array($this->session->userdata('user_id')));
                
          if ($result->num_rows() > 0){
            $row = $result->row(); 

            $count =  $row->total;      
            }
        
            return $count;                       
        }          
        
        
        /**
         * mail info
         */
        
        function mail_count($type){
            $query = "select count(*) as total from hooros_mail
                      where user_id = ?
                      and mail_type = ?";
            
             $result  = $this->db->query($query, array($this->session->userdata('user_id'), $type));
                
          if ($result->num_rows() > 0){
            $row = $result->row(); 

            $count =  $row->total;      
            }
        
            return $count;               
        
        }
        
        function send_mail($mail_type){
            
            $to = $this->input->post('to');
            $subject = $this->input->post('subject');
            $compose = $this->input->post('composeArea');
            
             
             
             if($mail_type=='inbox'){
                 $data =array( array('mail_to'=>$to,
                           'mail_subject'=>$subject,
                           'message'=>$compose,
                           'user_type'=>  $this->session->userdata('user_type'),
                           'user_id'=> $this->session->userdata('user_id'),
                           'mail_from'=> $this->session->userdata('user_id'),
                           'read_receipt'=>$this->session->userdata(0),
                           'mail_type'=>$mail_type),
                           
                           array('mail_to'=>$to,
                           'mail_subject'=>$subject,
                           'message'=>$compose,
                           'user_type'=>  $this->session->userdata('user_type'),
                           'user_id'=> $this->session->userdata('user_id'),
                           'mail_from'=> $this->session->userdata('user_id'),
                           'read_receipt'=>$this->session->userdata(0),
                           'mail_type'=>'sent')
                     
                     );
             }
             
             else{
                 
                 $data = array('mail_to'=>$to,
                           'mail_subject'=>$subject,
                           'message'=>$compose,
                           'user_type'=>  $this->session->userdata('user_type'),
                           'user_id'=> $this->session->userdata('user_id'),
                           'mail_from'=> $this->session->userdata('user_id'),
                           'read_receipt'=>$this->session->userdata(0),
                           'mail_type'=>$mail_type);
             }
        
        $this->db->insert('hooros_mail', $data);
        
        }
            
        function get_all_mail($type){
             
            $query = "SELECT HM.mail_subject, HM.mail_from, SUBSTR(HM.message,1 ,20) as message,"
                       . " HCT.member_name as name, HCT.member_surname as surname,"
                       . " HM.mail_id, HCT.CL_id, HM.user_id"
                       . " FROM hooros_client_team HCT, hooros_mail HM "
                       . " WHERE  HM.user_id = ?"
                       . " AND HCT.CL_id = HM.user_id"
                       . " AND HM.mail_type= ?";                       
                
            return $this->db->query($query, array($this->session->userdata('user_id'), $type));
        
        }
        
        function get_mail(){
                        
            $this->input->post('mail_id');
               $query = "SELECT HM.mail_subject, HM.mail_from, HM.message,"
                       . " HCT.member_name as name, HCT.member_surname as surname,"
                       . " HM.mail_id, HCT.CL_id, HM.user_id"
                       . " FROM `hooros_client_team HCT, hooros_mail HM` "
                       . " WHERE  HM.user_id = ?"
                       . " AND HCT.CL_id = HM.user_id"
                       . " AND HM.mail_id = ?";
        
                return $this->db->query($query, array($this->session->userdata('user_id'),
                    $this->input->post('mail_id')));
            
        }
        
        function get_my_freelancer_mail_contacts(){
                     
        $this->db->distinct();
        $this->db->select('mail_to');
        $this->db->from('hooros_mail');
        $this->db->where('user_id',$this->session->userdata('user_id'));
        $this->db->where('mail_to_type','freelancer');
        
        return $this->db->get();        
        }
              
        function get_mailing_list(){
            
          $query = "select fl_id as ID, fl_name as name, fl_surname as surname
                    from hooros_freelancer_details
                    where fl_id IN (

                    select distinct mail_to
                    from hooros_mail 
                    where user_id  = ?
                    and mail_to_type = 'freelancer')
              
                    UNION
    
                    select member_id as ID, member_name as name, member_surname as surname
                    from hooros_client_team
                    WHERE member_id IN  (

                    select distinct mail_to
                    from hooros_mail 
                    where user_id  = ?
                    and mail_to_type = 'client')";          
            
             return $this->db->query($query, array($this->session->userdata('user_id'),
                 $this->session->userdata('user_id')));
           
        }
}
