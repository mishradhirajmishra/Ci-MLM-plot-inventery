<?php

if (!defined('BASEPATH'))
    exit('Ohhh... This is Cheating you are not suppose to do this.Cheater :)');
class Login extends CI_Controller {

	function __construct(){
		 parent::__construct();
		 $this->load->model('login_model');
	}
	
	function index(){
		$this->load->view('login');
	}
	//Ajax login function 
    function ajax_login() 
    {
        $this->load->library('session');
        $response = array();
        $user = $this->input->post("login_user");//$_POST["user"];
        $password = $this->input->post("login_password");//$_POST["password"];

        $login_status = $this->login_model->validate_login($user,$password);
        $login_status_c = $this->login_model->validate_login_c($user,$password);
        if($login_status_c){
               $userdata = array('user_id'  => $login_status['user_id'],'user_role'=>$login_status['user_role'],'logged_in' => TRUE);
                 $this->session->set_userdata($userdata);
            if($login_status['user_role']=="admin"){
              redirect(base_url().'index.php/admin');
            }
            else{
                redirect(base_url().'index.php/user');
            }
        }
        else{
                $this->session->set_flashdata('item','Username and Password mismatch.'); 
              redirect(base_url());
        }

        
       
    }
     function logout()
    {
        $this->session->sess_destroy();
        header('location: ../../');
    }

}