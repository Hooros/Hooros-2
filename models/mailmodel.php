<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mailmodel
 *
 * @author davidohene
 */
class MailModel extends CI_Model {
    //put your code here
    
     function __construct() {
        parent::__construct();
        
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
