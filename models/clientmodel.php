 <?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clientmodel
 *
 * @author Sij
 */
class ClientModel extends CI_Model{
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
    
    function get_profile(){
        $this->db->select('*');
        $this->db->from('hooros_project_details');
        $this->db->where('client_id', $this->session->userdata('client_id'));
        
        return $this->db->get();
    }
    
    function update_company_profile(){
        
        $data = array ('client_company_name'=>  $this->input->post('name'),
            'company_website'=>$this->input->post('website'),
            'client_brief'=>$this->input->post('brief'));
        $this->db->where('client_id', $this->session->userdata('client_id'));        
        $this->db->update('hooros_client', $data);
        
        redirect('client/home');
    }
    
    function update_my_profile(){
        
        $data = array(
            'member_name'=>$this->input->post('name'),
            'member_surname'=>$this->input->post('surname'),
            'member_email'=>$this->input->post('email'),
            'member_skype'=>$this->input->post('skypeID')
        );
        $this->db->where('member_id', $this->session->userdata('user_id'));
        $this->db->update('hooros_client_team', $data);
        
        redirect('profile');
                
    }
    
    function add_project(){
        $data = array(
            'project_title'=>$this->input->post('title'),
            'project_brief'=>$this->input->post('brief'),
            'project_start_date'=>$this->input->post('start_date'),
            'project_completion_date'=>$this->input->post('end_date'),
            'client_id'=>$this->session->userdata('client_id'),
            'project_complete'=>0);

        
        $this->db->insert('hooros_project_details', $data);
        $this->add_project_skills($this->db->insert_id(), $this->input->post('skills'));
        
        redirect('client/home');
    }
    
    function view_projects(){
        $this->db->select('*');
        $this->db->from('hooros_project_details');
        $this->db->where('client_id', $this->session->userdata('client_id'));
        
        return $this->db->get()->result_array();
    }
    
    function view_freelancers(){
        $query = "SELECT  DISTINCT HFD.fl_id, HFD.fl_name, HFD.fl_surname, HFD.profile_picture, HFD.fl_rate,
(select count( DISTINCT af_project_id) FROM hooros_assigned_freelancers where af_freelancer_id  = HFD.fl_id and status = 'accept' ) as project_count
                 FROM hooros_project_skills HPS, 
                 hooros_freelancer_skillset HFS,
                 hooros_freelancer_details HFD,
                 hooros_skills_list HSL,
                 hooros_project_details HPD
				 
                WHERE HPS.skills_id = HFS.skill_id
                AND HFD.fl_id = HFS.freelancer_id
                AND HSL.skill_id = HPS.skills_id
                AND HSL.skill_id = HFS.skill_id
                AND HPS.project_id = HPD.project_id";
                                /**
                                 * AND HPD.client_id = ?
                                 */
                if($this->input->post('project')!=null){
                                        
                     
                        
                   $result =   $this->db->query($query, array($this->session->userdata('client_id')));
                }
                else{       
                    $result =   $this->db->query($query, array($this->session->userdata('client_id')));
                }
                
              return $result->result_array();
    }
    
    function hire_freelancer($id, $project){
        $data = array(
            'af_freelancer_id'=> $id,
            'af_project_id'=> $project,
            'status'=>'pending'
        );
        
        $this->db->insert('hooros_assigned_freelancers', $data);
        echo '<script>alert("Freelancer request has been sent");</script>';
        redirect('client/home');
    }
    
    function get_member_email(){
        $this->db->select(' member_email');
        $this->db->from('hooros_client_team');
        $this->db->where('member_id',$this->session->userdata('user_id'));
        
        $result =  $this->db->get()->row();
        
                
        return $result->member_email;
    }
        function get_member_skype(){
             $this->db->select('member_skype');
            $this->db->from('hooros_client_team');
            $this->db->where('member_id',$this->session->userdata('user_id'));

            $result =  $this->db->get()->row();
            

            return $result->member_skype;
        }

    function project_count(){
        $query = 'select count(*)as projects from hooros_project_details'
                . ' where client_id = ?';
        
        $result =$this->db->query($query, array($this->session->userdata('client_id')));
        if ($result->num_rows() > 0){
   $row = $result->row(); 

   $total =  $row->projects;
   
}
        
        return $total;
    }
    
    function approve_hours(){
        $data = array(
                'freelancer_id'=>$this->input->post('freelancer_id'),
            'client_id'=>$this->session->userdata('client_id'),
            'project_id'=>$this->input->post('project'),
            'hours_booked'=>  $this->input->post('hours'),
            'date_booked'=>$this->input->post('date'),
            'approved_by'=>$this->session->userdata('member_id'),
            'approved'=>  1);
        
        $this->db->insert('hooros_freelancer_hoursr_billed', $data);
        
        redirect('projects');
    }
    
    function my_freelancers_count(){
        $query = "select count(*) as projects
                 from 
                 hooros_assigned_freelancers haf, hooros_project_details hpd 
                 where 
                 haf.af_project_id = hpd.project_id
                 and hpd.client_id = ?";
        
        $result= $this->db->query($query, array($this->session->userdata('client_id')));
        
        if ($result->num_rows() > 0){
   
            $row = $result->row(); 
            $total =  $row->projects;
               
        }
        
        return $total;
    }
    
    function my_freelancers(){
        $query = "select * "
                . " from hooros_freelancer_details  hfs, hooros_freelancer_hoursr_billed hfh,"
                . " hooros_assigned_freelancers haf,  hooros_project_details hpd"
                . " where hfs.fl_id = hfh.freelancer_id"
                . " and haf.af_freelancer_id = hfs.fl_id"
                . " and haf.af_project_id = hpd.project_id"
                . " and hfh.project_id = hpd.project_id"
                . " and hfh.freelancer_id = haf.af_freelancer_id"
                . " and hpd.client_id = ?";
        
        return $this->db->query($query, array($this->session->userdata('client_id')))->result_array();        
        
    }
    
    function update_project(){
        $data = array(
            'project_title'=>  $this->input->post('title'),
            'project_brief'=>  $this->input->post('start_date'),
            'estimated_length'=> $this->input->post('duration')
        );
        $this->db->where('client_id', $this->session->userdata('client_id'));
        $this->db->where('project_id', $this->input->post('project_id'));
        $this->db->update('hooros_project_details', $data);
        
    }
    
    function get_skills(){
        $this->db->select('*');
        $this->db->from('hooros_skills_list');
        
        
        return $this->db->get()->result_array();
    }
    
    function add_project_skills($project, $skills){
        
        $data  =array();
        
        for($i = 0; $i<count($skills); $i++){
            $skill = $skills[$i];
            
            $data[] = array(
                'project_id'=>$project,
                'skills_id'=>$skill
            );
            
           
        }
        
        $this->db->insert_batch('hooros_project_skills', $data);
    }
    
    function company_name(){
        $this->db->select('client_company_name');
        $this->db->from('hooros_client');
        $this->db->where('client_id', $this->session->userdata('client_id'));
        
          $result = $this->db->get()->row();
          return $result->client_company_name;
        
    }
    
    function company_website(){
        $this->db->select('company_website');
        $this->db->from('hooros_client');
        $this->db->where('client_id', $this->session->userdata('client_id'));
        
          $result = $this->db->get()->row();
          return $result->company_website;
        
    }
    
    function company_brief(){
        $this->db->select('client_brief');
        $this->db->from('hooros_client');
        $this->db->where('client_id', $this->session->userdata('client_id'));
        
          $result = $this->db->get()->row();
          return $result->client_brief;
        
    }
    
     function company_location(){
        $this->db->select('company_location');
        $this->db->from('hooros_client');
        $this->db->where('client_id', $this->session->userdata('client_id'));
        
          $result = $this->db->get()->row();
          return $result->company_location;
        
    }
    
    function project_list(){
        $this->db->select('*');
        $this->db->from('hooros_project_details');
        $this->db->where('client_id',  $this->session->userdata('client_id'));
        
        return $this->db->get()->result_array();
    }
    
     function get_mail_count(){        
         $query = "SELECT count(*)as total from hooros_mail where user_id = ? ";
            
        
        $result  = $this->db->query($query, array($this->session->userdata('user_id')
            ));
        
        if ($result->num_rows() > 0){
   $row = $result->row(); 

   $count =  $row->total;   
   
        }
        return $count;           
    }
    
    function my_project_count(){
        
        $query = "SELECT count(project_id) as total FROM `hooros_project_details` "
                . "WHERE  client_id = ?";
        
          $result  = $this->db->query($query, array($this->session->userdata('client_id')));
                
          if ($result->num_rows() > 0){
            $row = $result->row(); 

            $count =  $row->total;      
            }
        
            return $count;               
        
        }   
        
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
            
             $data = array('mail_to'=>$to,
                           'mail_subject'=>$subject,
                           'message'=>$compose,
                           'user_type'=>  $this->session->userdata('user_type'),
                           'user_id'=> $this->session->userdata('client_id'),
                           'mail_from'=> $this->session->userdata('client_id'),
                           'read_receipt'=>$this->session->userdata(0),
                           'mail_type'=>$mail_type,
                           
                 );
        
        $this->db->insert('hooros_mail', $data);
        
        }
        
        
        function get_all_mail($type){
             
            $query = "SELECT HM.mail_subject, HM.mail_from, SUBSTR(HM.message,1 ,20) as message,"
                       . " HCT.member_name as name, HCT.member_surname as surname,"
                       . " HM.mail_id, HCT.CL_id, HM.user_id"
                       . " FROM hooros_client_team HCT, hooros_mail HM "
                       . " WHERE  HM.user_id = ?"
                       . " AND HCT.CL_id = HM.user_id"
                       . " AND HM.mail_type= ?"
                       . " AND HM.mail_to_type= ?";                       
                
            return $this->db->query($query, array($this->session->userdata('user_id'), $type, $this->session->userdata('user_type')));
        
        }
        
        function get_mail($mail_id){
            
               $query = "SELECT HM.mail_subject, HM.mail_from, HM.message,"
                       . " HCT.member_name as name, HCT.member_surname as surname,"
                       . " HM.mail_id, HCT.CL_id, HM.user_id"
                       . " FROM `hooros_client_team HCT, hooros_mail HM` "
                       . " WHERE  HM.user_id = ?"
                       . " AND HCT.CL_id = HM.user_id"
                       . " AND HM.mail_id = ?";
        
                return $this->db->query($query, array($this->session->userdata('client_id'), $mail_id));
            
        }
        
                function get_mailing_list(){
            
          $query = "select fl_id as ID, fl_name as name, fl_surname as surname
                    from hooros_freelancer_details
                    where fl_id IN (

                    select distinct mail_to
                    from hooros_mail 
                    where user_id  = ?
                    and user_type = ?
                    and mail_to_type = 'freelancer')
              
                    UNION
    
                    select member_id as ID, member_name as name, member_surname as surname
                    from hooros_client_team
                    WHERE member_id IN  (

                    select distinct mail_to
                    from hooros_mail 
                    where user_id  = ?
                    and user_type = ?
                    and mail_to_type = 'client')";          
            
             return $this->db->query($query, array($this->session->userdata('user_id'),
                 $this->session->userdata('user_type'), $this->session->userdata('user_id'), 
                 $this->session->userdata('user_id')))->result_array();
           
        }
        
        function get_freelancer_mail($id){
            $query = "select fl_email from hooros_freelancer_details where fl_id = $id";
            
            return $this->db->query($query, array($id));
        }
   
}