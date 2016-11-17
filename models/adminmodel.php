<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adminmodel
 *
 * @author Sij
 */
class AdminModel extends CI_Model{
    //put your code here
    
    function get_freelancer_requests(){
        $query = "select  * from hooros_assigned_freelancers HAF, hooros_client HC,
            hooros_project_details HPD, hooros_freelancer_details HFD
            WHERE HAF.af_freelancer_id = HFD.fl_id
            AND HPD.project_id = HAF.af_project_id
            AND HPD.client_id = HC.client_id
            AND HAF.status = 'client response'";
        
        return $this->db->query($query)->result_array();
    }
    
    function get_client_requests(){
         $query = "select  * from hooros_assigned_freelancers HAF, hooros_client HC,
            hooros_project_details HPD, hooros_freelancer_details HFD
            WHERE HAF.af_freelancer_id = HFD.fl_id
            AND HPD.project_id = HAF.af_project_id
            AND HPD.client_id = HC.client_id
            AND HAF.status = 'pending'";
        
        return $this->db->query($query)->result_array();
    }
    
}
