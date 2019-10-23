<?php

if (!defined('BASEPATH'))
    exit('Ohhh... This is Cheating you are not suppose to do this.Cheater :)');
class User extends CI_Controller {

	function __construct(){
		 parent::__construct();
		  $this->load->model('user_model');
		 
	}
	function index(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
			redirect(base_url(),'refresh');
		$data["user_id"]=$this->session->userdata('user_id');
					$userid=$this->session->userdata('user_id');
    				$data['page_name']='User Information';
    			    $x=$data['info']=$this->user_model->user_information($userid);
    			    $data['sec']=$this->user_model->list_sector_byid($x[0]['sector']);
                    $data['plot']=$this->user_model->list_plot_byid($x[0]['plot_id']);
    				$data['userinfo']=$this->db->get_where('users',array('user_id'=>$this->session->userdata('user_id')))->result_array();
    				$data['direct']=$this->direct_child_count($userid);
    				$data['indirect']=$this->indirect_child_count($userid);
    				$data['error']='';
    				$data['success']='';
					//$data['users']=$this->user_model->all_user();
    				//$this->load->view('admin/admin_header',$data);
					//$this->load->view('admin/user_information',$data);
					//$this->load->view('admin/admin_footer');
					$config = array(
                        'upload_path' => "./uploads/",
                        'allowed_types' => "jpg|png|jpeg",
                        'overwrite' => TRUE,
                        'max_size' => "1024000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                        'max_height' => "768",
                        'max_width' => "1024",
                        'file_name'=>$this->session->userdata('user_id').'.jpg'
                        );
                        $this->load->library('upload', $config);
                        if($this->upload->do_upload())
                        {
                        
                       $data['success']="File Uploaded Successfully";
                        
                        }
                        else
                        {
                        $data['error'] =  $this->upload->display_errors();
                        
                        }

		$this->load->view('user/admin_header',$data);
		$this->load->view('user/user_dashboard',$data);
		$this->load->view('user/admin_footer',$data);
	}
	function direct_child_count($sponserid){
				if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
					redirect(base_url(),'refresh');
				$this->db->select('user_id');
				$this->db->where('sponser_id',$sponserid);
				$sponserid1=$this->db->get('user_sponser');
				return $sponserid1->num_rows();
    }
    function indirect_child_count($sponserid){
    	if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
			redirect(base_url(),'refresh');
			$result=array();
    	$query = $this->db->query("SELECT user_id FROM user_sponser where sponser_id=$sponserid ORDER BY sponser_id");
		foreach($query->result_array() as $row){
		$result= $this->count_child($row['user_id']);
		}
		return $result;

    }
    function count_child($sponserid){
    	if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
			redirect(base_url(),'refresh');
	 static $i=0;
				$this->db->select('user_id');
				$this->db->where('sponser_id',$sponserid);
				$sponserid1=$this->db->get('user_sponser');
				//echo $sponserid1->num_rows();
				//print_r($sponserid1);
				
				//if($sponserid1->num_rows() !=0){
					
					
					$new=$sponserid1->result_array();
					foreach ( $new as $data) {
						$i=$i+1;
						$this->count_child($data['user_id']);
					}
				//}
				return $i;
}
 	function user_incentive(){
    	if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
			redirect(base_url(),'refresh');
					$data['page_name']='Your Latest Incentive';
					$data['closingdate']=$this->user_model->get_last_closing_date();
    				$this->load->view('user/admin_header',$data);
					$this->load->view('user/user_incentive',$data);
					$this->load->view('user/admin_footer');
    }
     function total_incentive(){
    	if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
			redirect(base_url(),'refresh');
					$data['page_name']='Total Incentive of';
					

    				$this->load->view('user/admin_header',$data);
					$this->load->view('user/total_incentive',$data);
					$this->load->view('user/admin_footer');

    }
    function user_tree(){
    	if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
			redirect(base_url(),'refresh');
				$data['page_name']='User Genealogy';
				$member=array();
					$data["user_id"]=$this->session->userdata('user_id');
					$userid=$this->session->userdata('user_id');
					$data['sponser_id']=$this->session->userdata('user_id');
					$data['direct']=$this->direct_child_count($userid);
    				$data['indirect']=$this->indirect_child_count($userid);
                    $result=$this->user_model->get_user_list($data["user_id"]);
                            $this->db->select('a.user_name,b.sponser_id,b.user_id');
                            $this->db->from('user_sponser b');
                            $this->db->join('users a','a.user_id=b.user_id', 'full');
                            $this->db->where("sponser_id",$data['sponser_id']);
                            
                            $query = $this->db->get(); 
                            $direct= $query->num_rows();
                            $a=$query->result_array();
                            
                            
                            
                            foreach ($a as $key) {
                              $member[]=$key;
                              
                            }
                            $data['direct']=$direct;
                            
                    $data['member123']=$member;
                    if($result){
              
              		$data['direct']=$this->direct_child_count($userid);
    				$data['indirect']=$this->indirect_child_count($userid);
                	 $data['insert_message']="Your Direct Sale User id.";
                	 $data['user']=$result;
                	 $data['sponser_id']=$data["user_id"];
                	 
                	}
                	else{
                		$data['sponser_id']='';
                		$data['insert_message']="No Data Found for this Sponser Id ".$data["user_id"];
                	}
                    $this->load->view('user/admin_header',$data);
					$this->load->view('user/user_tree',$data);
					$this->load->view('user/admin_footer');
    }
    function child_list($id){
    	if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
			redirect(base_url(),'refresh');
    	$data["page_name"]="User Genealogy";
		$data["user_id"]=$this->session->userdata('user_id');
					$userid=$this->session->userdata('user_id');
		 $data['sponser_id']='';
		 $data['direct']=0;
		 $data['indirect']=0;
    		$member=array();
    		$result=$this->user_model->get_user_list($data["user_id"]);
                            $this->db->select('a.user_name,b.sponser_id,b.user_id');
                            $this->db->from('user_sponser b');
                            $this->db->join('users a','a.user_id=b.user_id', 'full');
                            $this->db->where("sponser_id",$id);
                            
                            $query = $this->db->get(); 
                            $direct= $query->num_rows();
                            $a=$query->result_array();
                            
                            
                            
                            foreach ($a as $key) {
                              $member[]=$key;
                              
                            }
                            $data['direct']=$direct;
                            
$data['member123']=$member;
                	if($result){
              
              		$data['direct']=$this->direct_child_count($userid);
    				$data['indirect']=$this->indirect_child_count($userid);
                	 $data['insert_message']="Your Direct Sale User id.";
                	 $data['user']=$result;
                	 $data['sponser_id']=$id;
                	 
                	}
                	else{
                		$data['sponser_id']='';
                		$data['insert_message']="No Data Found for this Sponser Id ".$id;
                	}

            		$this->load->view('user/admin_header',$data);
					$this->load->view('user/user_tree',$data);
					$this->load->view('user/admin_footer');
    }
    function payment(){
    	if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
    		redirect(base_url(),'refresh');
    	    $data['userid']=$this->session->userdata('user_id');
    	    $data["page_name"]="Datewise user Incentive";
    	    $data['dates']=$this->user_model->date_wise_user_incentive($data['userid']);

    	    $this->load->view('user/admin_header',$data);
			$this->load->view('user/payment',$data);
			$this->load->view('user/admin_footer');

    }
   function update_profile_info(){
   			if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
    		redirect(base_url(),'refresh');
    	    $data['userid']=$this->session->userdata('user_id');
    	    $data['insert_message']='';
    	    $data["page_name"]="Update Profile Information";
    	    $data['info']=$this->user_model->user_information($data['userid']);
    	    $this->load->view('user/admin_header',$data);
			$this->load->view('user/update_profile_info',$data);
			$this->load->view('user/admin_footer');
   }
   function update_profile(){
   	if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
    		redirect(base_url(),'refresh');
    	$data['userid']=$this->session->userdata('user_id');
    	$data["page_name"]="Update Profile Information";
    	$data['info']=$this->user_model->user_information($data['userid']);
    	$data['insert_message']='';
   		$this->load->library('form_validation');
		
	
        
        $this->form_validation->set_rules('name', 'Name is Required', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile is Required', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('bankname', 'Bank Name', 'required');
        $this->form_validation->set_rules('ifsc', 'IFSC Code', 'required');
        $this->form_validation->set_rules('acnumber', 'Bank Account Number', 'required');
        $this->form_validation->set_rules('account_name', 'Account Holder Name', 'required');
         if ($this->form_validation->run() == FALSE)
                {
                	$data['insert_message']=" ";
                    $this->load->view('user/admin_header',$data);
					$this->load->view('user/update_profile_info',$data);
					$this->load->view('user/admin_footer');
                }
           else{
           
            $this->user_model->update_user_profile();
            $data['info']=$this->user_model->user_information($data['userid']);
            $data['insert_message']="Successfully Updated Profile.";
            		$this->load->view('user/admin_header',$data);
					$this->load->view('user/update_profile_info',$data);
					$this->load->view('user/admin_footer');
            //redirect(base_url().'index.php/admin/new_user');
           }
   }
   function change_password(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
			redirect(base_url(),'refresh');
					$data['page_name']='Change Password';
					
    				$this->load->view('user/admin_header',$data);
					$this->load->view('user/change_password',$data);
					$this->load->view('user/admin_footer');

    }
    function update_password(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
			redirect(base_url(),'refresh');
		$password=$this->input->post('password');
		$userid=$this->session->userdata('user_id');
		$result=$this->user_model->update_password($password,$userid);
		if($result)
			echo "Password Changed Successfully.";
		else
			echo "Error Occured Try Again";
		
    }
   /*______________________________________BY DHIRAJ________________________________*/
       function commissionmade($userid='',$plotid=''){
        if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
            redirect(base_url(),'refresh');
        $userid=$_SESSION ['user_id'];   

        $data['userid']=$userid;
        $data["page_name"]="Commission Made";
        $data['insert_message']='';
        $x=$data['info']=$this->user_model->user_information($data['userid']);
        $data['commission']=$this->user_model->list_commission_by_userid($userid);
        $data['user_sponser']=$this->user_model->get_user_sponser_list($userid);
        $data['user_comm']=$this->user_model-> sponser_list_commiossion($userid);
        $this->load->view('user/admin_header',$data);
        $this->load->view('user/com_made',$data);
        $this->load->view('user/admin_footer');
    }
    
    
           function installment($userid='',$plotid=''){
        if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
            redirect(base_url(),'refresh');
        $userid=$_SESSION ['user_id'];   

        $data['userid']=$userid;
        $data["page_name"]="Installment";
        $data['insert_message']='';
        $data['stalment_count']=$this->user_model->count_stalment_by_userid($userid);
        $x=$data['info']=$this->user_model->user_information($data['userid']);
        $data['stalment']=$this->user_model->list_stalment_by_userid($userid);
        $data['commission']=$this->user_model->list_commission_by_userid($userid);
        $data['user_sponser']=$this->user_model->get_user_sponser_list($userid);
        $data['user_comm']=$this->user_model-> sponser_list_commiossion($userid);
        $this->load->view('user/admin_header',$data);
        $this->load->view('user/stallment',$data);
        $this->load->view('user/admin_footer');
    }
               function commissionpaid($userid='',$plotid=''){
        if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
            redirect(base_url(),'refresh');
        $userid=$_SESSION ['user_id'];   

        $data['userid']=$userid;
        $data["page_name"]="Update Stalment";
        $data['insert_message']='';
        $x=$data['info']=$this->user_model->user_information($data['userid']);
        $data['sec']=$this->user_model->list_sector_byid($x[0]['sector']);
        $data['plot']=$this->user_model->list_plot_byid($x[0]['plot_id']);
        $data['stalment']=$this->user_model->list_stalment_by_userid($userid);
        $data['commission']=$this->user_model->list_commission_by_userid($userid);
        $data['user_sponser']=$this->user_model->get_user_sponser_list($userid);
        $data['user_comm']=$this->user_model-> sponser_list_commiossion($userid);
        $this->load->view('user/admin_header',$data);
        $this->load->view('user/com_made',$data);
        $this->load->view('user/admin_footer');
    }
    
        function genealogy($userid=''){
        if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
            redirect(base_url(),'refresh');
              $s_id=$_SESSION ['user_id'];
              $data['msg'] = "";
              $id = $this->input->post('user_id');
              if($id){ 
                  if($id>$s_id){ $userid=$id;}
                  else{ $userid=$s_id;
                      $data['msg'] = "Access are not allowed";
                  }
                  
              }
        $data['userid']=$userid;
        $data["page_name"]="User Genology";
        $data['insert_message']='';
        $data['commission']=$this->user_model->list_commission_by_userid($userid);
        $data['user_sponser']=$this->user_model->get_user_sponser_list($userid);
        $data['user_comm']=$this->user_model-> sponser_list_commiossion($userid);
        $y=$data['user_comm_count']=$this->user_model-> sponser_list_commiossion_count($userid);
        if($y==0){$data['msg'] = "No record found";}
        $this->load->view('user/admin_header',$data);
        $this->load->view('user/genology',$data);
        $this->load->view('user/admin_footer');
    }
       
}