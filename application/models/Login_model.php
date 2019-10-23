<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //function to validate user login
    function validate_login($user,$password){
        $result=$this->db->get_where("users",array("login_id"=>$user,"password"=>$password,'status'=>1));
        return $result->row_array();
    }
       function validate_login_c($user,$password){
        $result=$this->db->get_where("users",array("login_id"=>$user,"password"=>$password,'status'=>1));
        return $result->num_rows();
    }
    function login($user){
        $result=$this->db->get_where("users",array("login_id"=>$user))->result_array();
        return $result;
    }
    

}

?>