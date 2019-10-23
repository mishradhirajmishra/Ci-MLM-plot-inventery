<?php

if (!defined('BASEPATH'))
    exit('Ohhh... This is Cheating you are not suppose to do this.Cheater :)');
class Admin extends CI_Controller {

	function __construct(){
		 parent::__construct();
		 $this->load->model('user_model');
		 $this->load->library('email');
/*		 $this->load->helper('sendsms');*/
         $this->load->helper('sendsms_helper');
	}	
/*	function tt(){

        $msg = "starview test sms";
        $mob=8543029454;
        $to = 91 . $mob;
        $x = sendsms($to, $msg, $sendondate = NULL);
	}*/

	function index(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
		$data["user_id"]=$this->session->userdata('user_id');
		$data['page_name']="Dashboard";
		$data['closingdate']=$this->user_model->get_last_closing_date();
		$data['incentive']=$this->user_model->latest_incentive_sum($data['closingdate']);
		$data['total_incentive']=$this->user_model->total_sum_of_incentive();
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_dashboard',$data);
		$this->load->view('admin/admin_footer',$data);
	}
		
	// by dhiraj
	    function sector(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
                $sec_name = $this->input->post('sec_name');
            $data['msg']=0;
                if($sec_name){
                    $this->user_model->add_sector($sec_name);
                    $data['msg']=1;
                }
            $data['page_name']="Block";
            $data['all_sec']=$this->user_model->list_sector();

            $this->load->view('admin/admin_header',$data);
            $this->load->view('admin/sector',$data);
            $this->load->view('admin/admin_footer');
        }
    function plot(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
        $sr_no = $this->input->post('sr_no');
        $plot_no = $this->input->post('plot_no');
        $plot_size= $this->input->post('plot_size');
         $plt=$this->user_model->list_plot_byno($plot_no,$sr_no);
        $data['msg']=0;
        if($sr_no){
			if($plt){
				 $data['msg']=2;
			}else{
            $this->user_model->add_plot($sr_no,$plot_no,$plot_size);
            $data['msg']=1;
			}
        }
        $data['sec']=$this->user_model->list_sector();
        $data['plot']=$this->user_model->list_plot();
        $data['page_name']="Plot";
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/plot');
       /* $this->load->view('admin/admin_footer');*/


    }
    function plot_update(){

    }
    function plot_edit($x=""){

        
        $data['msg']=0;
        /*-------------------------------------------------------------------*/
                $plot_id= $this->input->post('plot_id');
                $plot_size= $this->input->post('plot_size');
                if($plot_id){
                $x=$this->user_model->update_plot( $plot_id,$plot_size);
                $data['msg']=1;
                $x=$plot_id;
                }
        /*--------------------------*/
        /*-------------------------------------------------------------------*/
        $data['plot']=$this->user_model->list_plot_byid($x);
        $data['page_name']="Plot Edit";
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/plot_edit');
         $this->load->view('admin/admin_footer');
    }
    function abhplot(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
        $data['msg']=0;
         $data['sec']=$this->user_model->list_sector();
        $data['plot']=$this->user_model->list_plot();
        $data['page_name']="Available Plot";
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/abhplot');
        $this->load->view('admin/admin_footer');
    }
	    function bookedplot(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
        $data['msg']=0;
         $data['sec']=$this->user_model->list_sector();
        $data['plot']=$this->user_model->list_plot();
        $data['page_name']="Booked Plot";
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/bookedplot');
        $this->load->view('admin/admin_footer');
    }
    function stalment(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
        $data['page_name']="Recive Stalment";
        $data['msg']=0;
        $data['insert_message']=0;


        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/stalment',$data);
        $this->load->view('admin/admin_footer');
    }
	
	// by gautam
	function new_user(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
    $data['page_name']="Add New User";
    $data['insert_message']=" ";
        $data['sec']=$this->user_model->list_sector();
        $data['plot']=$this->user_model->list_plot();
    $this->load->view('admin/admin_header',$data);
    $this->load->view('admin/new_user_form');
    $this->load->view('admin/admin_footer');

}
function add_new_user1(){print_r($this->input->post());}

	function add_new_user(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
		$data['page_name']="Add New User";
		$data['insert_message']=" ";
		$this->load->library('form_validation');
		$this->form_validation->set_rules('sponserid', 'Sponser Id is Required', 'callback_sponserid_check');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.login_id]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('name', 'Name is Required', 'required');
         if ($this->form_validation->run() == FALSE)
                {
                	$data['insert_message']=" ";

                    $this->load->view('admin/admin_header',$data);
					$this->load->view('admin/new_user_form',$data);
				$this->load->view('admin/admin_footer');
                }
           else{
            $sponserid=$this->input->post('sponserid');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $name=$this->input->post('name');
            $mobile=$this->input->post('mobile');
            $email=$this->input->post('email');
            /*________________________________________________*/
            
            $sec_id=$this->input->post('sec_id');
            $sect=$this->user_model->list_sector_byid($sec_id);
            $sect= $sect ['sec_name'];
            $plot_id=$this->input->post('plot_id');
            $plt=$this->user_model->list_plot_byid($plot_id);
            $plt=$plt['plot_no'] ;
            /*___________________________________________________________________________________________*/
            
            $phone=$mobile;
            $date=date('Y-m-d');
            $fee=$this->input->post('joiningfee');
             if(isset($_POST['private1'])){
             $fee=$this->input->post('new-fee');
              //echo $this->input->post('new-fee');
            }
            $url="http://localhost/starswin/";
            $msg1="Welcome to Starview Family Your Usename is : $username and your password is : $password ";
            $msg2="Thank you ,Your payment has been received of amount  $fee by $date.";
             $msg3="Your Unit Detail is : $sect  Plot no : $plt";

          
            $this->user_model->add_new_member();
            $x = sendsms($phone,$msg1, $sendondate = NULL);
            $x = sendsms($phone,$msg2, $sendondate = NULL);
            $x = sendsms($phone,$msg3, $sendondate = NULL);

            $data['insert_message']="Successfully Added a New Member.";
                    $data['sec']=$this->user_model->list_sector();
                    $data['plot']=$this->user_model->list_plot();
            		$this->load->view('admin/admin_header',$data);
					$this->load->view('admin/new_user_form',$data);
				    $this->load->view('admin/admin_footer');
           }

        }
        
        function tes(){
       $data['sec']=$this->user_model->list_sector();

       	$this->load->view('admin/admin_header',$data);
     	$this->load->view('admin/table');
        }
        
        
        
		function list_plot_sec($x="")
        {
            if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
            $d = $this->user_model->list_plot_sid($x);
            foreach ($d as $row) {
                echo '<option value="' . $row["plot_id"] . '">' . $row["plot_no"] . '</option>';
            }
        }
        function plot_size($x=""){
             $plot = $this->user_model->list_plot_byid($x);
            echo ( $plot['plot_size']);
        }

        function test(){
          	if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
           $x= $data['sec']=$this->user_model->list_sector();
           $y= $data['plot']=$this->user_model->list_plot();
           print_r($x);
           print_r($y);
        }
        function sponserid_check($id)
        {
          if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
        	$check=$this->user_model->sponserid_check($id);
                if ($check===false)
                {
                        $this->form_validation->set_message('sponserid_check', ' {field}  Id not Found Use valid ID');
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
        }
    function payemnt(){
        		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
   
		$data["page_name"]="Receive Payment";
		$data['insert_message']=" ";
		$data['newpay']=$this->user_model->get_new_payment();
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/payment');
		$this->load->view('admin/admin_footer');
    }
    
        function payemnt1(){
            		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');

		$data["page_name"]="Receive Payment";
		$data['insert_message']=" ";
		$data['newpay']=$this->user_model->get_new_payment();
	
		$this->load->view('admin/print_payment',$data);

    }
        function print_payemnt(){
            		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
            $this->load->library('m_pdf');

		$data["page_name"]="Receive Payment";
		$data['insert_message']=" ";
		$data['newpay']=$this->user_model->get_new_payment();

		          //now pass the data
        $html= $this->load->view('admin/print_payment',$data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
        //this the the PDF filename that user will get to download
        $pdfFilePath ="starswinPayment-".time()."-download.pdf";

        //actually, you can pass mPDF parameter on this load() function
        $pdf = $this->m_pdf->load();
        //generate the PDF!
        $pdf->WriteHTML($html,0);
        //offer it to user via browser download! (The PDF won't be saved on your server HDD)
        $pdf->Output($pdfFilePath, "D");

    }
       
    function receive_payment(){
   		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');

		$data["page_name"]="Receive Payment";
		$data['newpay']=$this->user_model->get_new_payment();
		$data['insert_message']=" ";
		$this->load->library('form_validation');
		$this->form_validation->set_rules('userid', 'This is Required and', 'callback_sponserid_check');
		$this->form_validation->set_rules('amount', 'Amount', 'callback_amount_check');
		if ($this->form_validation->run() == FALSE){
                	$data['insert_message']=" ";
                    $this->load->view('admin/admin_header',$data);
					$this->load->view('admin/payment');
					$this->load->view('admin/admin_footer');
                }
                else{
                	$result=$this->user_model->receive_payment();
                	$amount=$this->input->post('amount');
                    $userdetail=$this->user_model->get_user_name_number($this->input->post('userid'));
                	if($result==true){
                	    $data['newpay']=$this->user_model->get_new_payment();
                	 $data['insert_message']="Successfully Receive Payment.";
                	 $phone=8318194240;
                	 $name=$userdetail[0]['user_name'];
                	 $mobile=$userdetail[0]['user_phone'];
                	 $date=date('Y-m-d');
           			 $msg1="Thank you $name, Your payment has been received of amount Rs $amount by $date";
           			 sendsms($mobile,$msg1);
                	}
                	else
                		$data['insert_message']="Error Occured While Receiving the Fee.";
            		$this->load->view('admin/admin_header',$data);
					$this->load->view('admin/payment');
					$this->load->view('admin/admin_footer');
                }

    }
    function amount_check($fee){
        		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
    	if(($fee % 5000)==0)
    		return true;
    	else{ 
    		$this->form_validation->set_message('amount_check', ' {field} Should Multiple of 5000');
                        return FALSE;   	
    	}
    }
    function generate_payment(){
        		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
		$data["page_name"]="Generate Payment";
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/generate_payment');
		$this->load->view('admin/admin_footer');
    }
  function user_tree(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
		$data["page_name"]="User Geneology";
		$data['user']='';
	     $data['search_result']=array();
		 $data['sponser_id']='';
		 $data['error_message']='';
		 $result=array();
		 $member=array();
		$this->load->library('form_validation');
		//$this->form_validation->set_rules('userid', 'This is Required and', 'callback_sponserid_check');
		
			if($this->input->post('userid') || $this->input->post('username')){
		
                	$id=$this->input->post('userid');
                	$name=$this->input->post('username');
                	if($name!=''){
                		/*$this->db->select('user_id');
                		
                		$this->db->like('user_name',$name);
                		$query=$this->db->get('users');*/

                		//$userid=$query[0]['user_id'];
                		$query = $this->db->query("SELECT user_id,user_name FROM users where user_name like '%$name%'");
                	if($query->num_rows()>0)
                		$id=$query->row()->user_id;
                		$data['search_result']=$query->result_array();
                	
                		
                	}
                	if($id!=''){
                	$query = $this->db->query("SELECT user_id FROM user_sponser where sponser_id=$id ORDER BY sponser_id");
                	}

$b=array();
foreach($query->result_array() as $row){
	//echo "<h1>".$row['user_id']."</h1>";
	//$id=$row['user_id'];

	$count=0;
	$result= $this->count_child($row['user_id']);


}
//echo $result;
$data['indirect']=$result;
                	
                	$result=$this->user_model->get_user_list($id);
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
                	 $data['insert_message']="Your Direct Sale User id.";
                	 $data['user']=$result;
                	 $data['sponser_id']=$id;
                	 

                	}
                	else
                		$data['error_message']="No Data Found for your search Try Again...";

            		$this->load->view('admin/admin_header',$data);
					$this->load->view('admin/user_tree',$data);
					$this->load->view('admin/admin_footer');
            } else{ 
            $this->load->view('admin/admin_header',$data);
					$this->load->view('admin/user_tree',$data);
					$this->load->view('admin/admin_footer');
		}  
    }
    function count_child($sponserid){
        		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
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
 
function indirect_child_count($sponserid){
    		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
    	 $result=0;
    	$query = $this->db->query("SELECT user_id FROM user_sponser where sponser_id=$sponserid ORDER BY sponser_id");
		foreach($query->result_array() as $row){
		$result= $this->count_child($row['user_id']);
		}
		return $result;

    }
    function child_list($id){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
    	$data["page_name"]="User Geneology";
		$data['user']='';
		 $data['sponser_id']='';
		 $data['error_message']='';
		 $member=array();
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
    		$result=$this->user_model->get_user_list($id);
                	if($result){
              
              $query = $this->db->query("SELECT user_id FROM user_sponser where sponser_id=$id ORDER BY sponser_id");
					foreach($query->result_array() as $row){
						$result1= $this->count_child($row['user_id']);

						}
					 $data['indirect']=$result1;
                	 $data['insert_message']="Your Direct Sale User id.";
                	 $data['user']=$result;
                	 $data['sponser_id']=$id;
                	 $this->db->select('sponser_id');
       						$this->db->from('user_sponser');
							$this->db->where("sponser_id",$id);
							
        					$query = $this->db->get(); 
        					$direct= $query->num_rows();
        					$data['direct']=$direct;

                	}
                	else
                		$data['error_message']="<h3 class='btn btn-danger'>No Entry Found for Sponser Id ".$id."</h3>";

            		$this->load->view('admin/admin_header',$data);
					$this->load->view('admin/user_tree',$data);
					$this->load->view('admin/admin_footer');
    }
    function get_new_payment_list(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
		$pay=$this->user_model->get_new_payment_list();
		
		if($pay){
			$i=1;
			Echo "<h3>Here Is the list of user payment.</h3>";
			echo "<h1></h1>";
			echo '<table id="simple-table" class="table  table-bordered table-hover">';
			echo "<th>SNO</th><th>User id</th><th>User Name</th><th>Payment</th><th>Date</th>";
		foreach ($pay as $row) {

			echo "<tr>";
			echo "<td>$i</td>";
			echo "<td>".$row['user_id']."</td>";
			echo "<td>".$row['user_name']."</td>";
			echo "<td>".$row['amount']."</td>";
			echo "<td>".$row['payment_date']."</td>";
			echo "</tr>";
			$i++;
		}
		echo "</table>";
		$url=base_url().'index.php/admin/generate_incentive';
		echo "<a href='$url' class='btn btn-info'>Generate Payment</a>";
	}
	else{
		echo "<h3 style='color:#d15b47;'>No new entry found in this time slot.</h3>";
	}

    }
    function generate_incentive(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
		$new_pay=$this->user_model->get_new_payment_list();
		if($new_pay){
			foreach($new_pay as $row){
				$this->db->select('sponser_id');
				$this->db->where('user_id',$row['user_id']);
				$sponserid=$this->db->get('user_sponser')->result_array();
				//print_r($sponserid);
				//echo $sponserid[0]['sponser_id'];
				if($sponserid[0]['sponser_id']==1){
					//echo "<h1>Direct Income for sponser id ".$sponserid[0]['sponser_id']." from user id ".$row['user_id']."</h1>";
					$incentive= $row['amount']*8/100;
					$data=array(
							'id'=>"",
							'payment_receiver_id'=>$sponserid[0]['sponser_id'],
							'from_user_id'=>$row['user_id'],
							'relationship'=>'Direct Income',
							'amount'=>$incentive,
							'generation_date'=>date('Y-m-d'),
							'status'=>0
						);
					$this->db->insert('generate_payment',$data);
				}
				if($sponserid[0]['sponser_id']!=1){
					$incentive= $row['amount']*8/100;
					echo "<h1>Direct Income for sponser id ".$sponserid[0]['sponser_id']." from user id ".$row['user_id']."</h1>";
					$data=array(
							'id'=>"",
							'payment_receiver_id'=>$sponserid[0]['sponser_id'],
							'from_user_id'=>$row['user_id'],
							'relationship'=>'Direct Income',
							'amount'=>$incentive,
							'generation_date'=>date('Y-m-d'),
							'status'=>0
						);
					$this->db->insert('generate_payment',$data);
				}
				$new_sponser=$sponserid[0]['sponser_id'];
				while($new_sponser !=1){
					$incentive1=$row['amount']*2/100;
					$this->db->select('sponser_id');
					$this->db->where('user_id',$new_sponser);
					$sponserid1=$this->db->get('user_sponser')->result_array();

					echo "<h1>inDirect Income for sponser id ".$sponserid1[0]['sponser_id']." from user id ".$row['user_id']."</h1>";
					$data=array(
							'id'=>"",
							'payment_receiver_id'=>$sponserid1[0]['sponser_id'],
							'from_user_id'=>$row['user_id'],
							'relationship'=>'In-Direct Income',
							'amount'=>$incentive1,
							'generation_date'=>date('Y-m-d'),
							'status'=>0
						);
					$this->db->insert('generate_payment',$data);
					$new_sponser=$sponserid1[0]['sponser_id'];
				}
				$user_payment_update=array(
						'status'=>1,
						'payment_generation_date'=>date('Y-m-d')
					);
				$this->db->where('payment_id', $row['payment_id']);
				$this->db->update('user_payment', $user_payment_update);
			}
			//to get last closing date
			$date=$this->user_model->get_last_closing_date();
			//to get all user who got incentive
			$userids=$this->user_model->get_user_id_of_lastclosing($date);
			//this loop will calculate sum of amount 
			foreach($userids as $row){
				$this->db->select_sum('amount');
        		$this->db->where('generation_date',$date);
        		$this->db->where('payment_receiver_id',$row['user_id']);
        		$this->db->from('generate_payment');
        		$query=$this->db->get();
        		$amount=$query->result_array();
        		$amount1=$amount[0]['amount'];
        		$phone=$row['user_phone'];
        		$name=$row['user_name'];
        		$msg="Congratulation $name ,Your incentive has been generated of Rs $amount1, at closing date $date.";
        		$mobile=$phone;
        		sendsms($mobile,$msg);
			}
			redirect(base_url()."index.php/admin/user_incentive","refresh");

		}else{
			echo "<h1>no data found</h1>";
		}



    }

    function user_incentive(){
    		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
					$data['page_name']='User Incentive';
					
					$data['closingdate']=$this->user_model->get_last_closing_date();
					$data['incentive']=$this->user_model->user_incentive($data['closingdate']);
					$data['closing_date']=$data['closingdate'];
    				$this->load->view('admin/admin_header',$data);
					$this->load->view('admin/user_incentive',$data);
					$this->load->view('admin/admin_footer');
    }
       function stallment_sms(){

             $month= Date('m');
             $year= Date('y');
             $d = $this->user_model->user_id_by_month_year($year,$month);
             foreach($d as $col){ echo "xchx"; }
             $user_list = $this->user_model->user_list1();
             
             foreach($user_list as $row){             }
       
                

       }
       function keep_balance_reminder(){
         	if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
            $x=$this->user_model->all_user();
            foreach($x as $row ){
                $phone=$row['user_phone'];
                    $msg="Please keep sufficient balance in your ac in order to pay installments of starview pvt ltd.";             
                   $y = sendsms($phone,$msg, $sendondate = NULL);
            }
            	$this->session->set_flashdata('item','Sms has been sent Successfully.');
                   redirect(base_url()."index.php/admin");
            
       }

    
    function all_user(){
    		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
					$data['page_name']='All User';
					$data['users']=$this->user_model->all_user();
    				$this->load->view('admin/admin_header',$data);
					$this->load->view('admin/all_user',$data);
					$this->load->view('admin/admin_footer');
    }
    function all_user_commission(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
       $com=$this->input->post('com');
       if($com){
           foreach($com as $row){
               $up= explode("_",$row);
             $this->user_model->add_comission($up[0],$up[1],$up[2],$up[3]);
               /*--------------------------------------------------------*/
               $x=$this->user_model->user_mobile_no($up[0]);
                $username=$x['user_name'];
			   $mo=$x['user_phone'];
               $ac=$x['account_number'];
               $today=date('d')."-".date('m')."-20".date('y');
               /*---------------------------------------------------------*/
              // $msg1="Dear $username your commission  amt. $up[3] from Starview has been credited to your account no : $ac ";
               $msg1="Your incentive has generated of Rs. $up[3] Date $today . All the best.";
               $x = sendsms($mo,$msg1, $sendondate = NULL);
           }
       }
         
    $data['page_name']='All User Commission';
    $data['users']=$this->user_model->all_user();
    $this->load->view('admin/admin_header',$data);
    $this->load->view('admin/all_user_commissiom',$data);
    $this->load->view('admin/admin_footer');
}
    function report(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
    $data['page_name']='Report';
    $data['users']=$this->user_model->all_user1();
    $this->load->view('admin/admin_header',$data);
    $this->load->view('admin/report',$data);
    $this->load->view('admin/admin_footer');
}
/*--------------------------------------*/
function stallment_not_paid_sms(){

    
}

/*-----------------------------------*/
    function all_user_stallment(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
		redirect(base_url(),'refresh');
        $year=$this->input->post('year');
        $month=$this->input->post('month');
       
         /*----------------------------------*/
      $com=$this->input->post('com');
      if($com){
          foreach($com as $row){
             $up= explode("_",$row);
             $name=$up[0];
             $mo=$up[1];
             $month=$up[2];
             $year="20".$up[3];
             $msg="Dear $name your Installment of $month - $year has not been paid yet. from  Starview. Ignore if this is your joining month.";
             $x = sendsms($mo,$msg, $sendondate = NULL);
             $this->session->set_flashdata('item','Sms has been sent Successfully.');
             redirect(base_url()."index.php/admin/all_user_stallment");
           }
      }
         /*----------------------------------*/
        $data['page_name']='All User Installment';
        $data['month']=$month;
        $data['year']=$year;
        $data['users']=$this->user_model->all_user();
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/all_user_stallment',$data);
        $this->load->view('admin/admin_footer');
    }
        function installment_report(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
		redirect(base_url(),'refresh');
        $year=$this->input->post('year');
        $month=$this->input->post('month');
       
         /*----------------------------------*/
      $com=$this->input->post('com');
      if($com){
          foreach($com as $row){
             $up= explode("_",$row);
             $name=$up[0];
             $mo=$up[1];
             $month=$up[2];
             $year="20".$up[3];
             $msg="Dear $name your Installment of $month - $year has not been paid yet. from  Starview. Ignore if this is your joining month.";
             $x = sendsms($mo,$msg, $sendondate = NULL);
             $this->session->set_flashdata('item','Sms has been sent Successfully.');
             redirect(base_url()."index.php/admin/all_user_stallment");
           }
      }
         /*----------------------------------*/
        $data['page_name']='Installment Report';
        $data['month']=$month;
        $data['year']=$year;
        $data['users']=$this->user_model->all_user1();
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/installment_report',$data);
        $this->load->view('admin/admin_footer');
    }
    /*==============================================*/
        function commission_history(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
		redirect(base_url(),'refresh');
        $year=$this->input->post('year');
        $month=$this->input->post('month');
     /*----------------------------------*/
        $data['page_name']='Commission History';
        $data['month']=$month;
        $data['year']=$year;
        $data['users']=$this->user_model->all_user();
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/commission_history',$data);
        $this->load->view('admin/admin_footer');
    }
    /*=============================================*/
    function total_incentive(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
					$data['page_name']='Total Incentive of Users';
					$data['userid']=$this->user_model->total_incentive();
					
    				$this->load->view('admin/admin_header',$data);
					$this->load->view('admin/total_incentive',$data);
					$this->load->view('admin/admin_footer');

    }
    function date_wise_incentive(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
    				$data['page_name']='Date Incentive of User';
					$data['dates']=$this->user_model->date_wise_incentive();
					$data['userid']=$this->user_model->date_wise_user();
    				$this->load->view('admin/admin_header',$data);
					$this->load->view('admin/date_wise_incentive',$data);
					$this->load->view('admin/admin_footer');
    }
    function user_information($userid){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
    				$data['page_name']='User Information';
    				$data['userid']=$userid;
    				$data['userinfo']=$this->db->get_where('users',array('user_id'=>$userid))->result_array();

    				$data['direct']=$this->direct_child_count($userid);
    				$data['indirect']=$this->indirect_child_count($userid);
    				$data['payment']=$this->user_model->customer_all_payment($userid);
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
                        'file_name'=>$userid.'.jpg'
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
					//$data['users']=$this->user_model->all_user();
    				$this->load->view('admin/admin_header',$data);
					$this->load->view('admin/user_information',$data);
					$this->load->view('admin/admin_footer');
    }
    function direct_child_count($sponserid){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
				$this->db->select('user_id');
				$this->db->where('sponser_id',$sponserid);
				$sponserid1=$this->db->get('user_sponser');
				return $sponserid1->num_rows();
    }
    function paynow($userid,$date){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
		    echo $userid,$date;
		 	$this->db->set('status', 1);
			$this->db->where('payment_receiver_id', $userid);
			$this->db->where('generation_date', $date);
			$this->db->update('generate_payment');
			echo $this->db->affected_rows();
			redirect(base_url()."index.php/admin/date_wise_incentive","refresh");
    }
    function change_password(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
					$data['page_name']='Change Password';
					
    				$this->load->view('admin/admin_header',$data);
					$this->load->view('admin/cpass',$data);
					$this->load->view('admin/admin_footer');

    }
    function update_password(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
		$password=$this->input->post('new_password');
		$userid=$this->session->userdata('user_id');
		$result=$this->user_model->update_password($password,$userid);
		if($result){  $this->session->set_flashdata('item','Password Changed Successfully.'); }
		else{
		    $this->session->set_flashdata('item','unable to change.'); 
		}
              redirect(base_url()."index.php/admin/change_password");
		
    }
    function send_password(){
        
        //if($this->session->userdata('logged_in')!=TRUE)
			//redirect(base_url(),'refresh');
			 
			/*$config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/sendmail';

$config['wordwrap'] = TRUE;

           */
           $email=$this->input->post('email');
           $check=$this->user_model->check_user_email($email);
           if(!empty($check)){
               
            $data['name']='PAta nhi kaun hain';
            $data['email']='gautamchadraa@gmail.com';
            $data['password']=$check[0]['password'];
			$message=$this->load->view('password_email',$data,true);   
           $config['charset'] = 'utf-8';
           $config['mailtype'] = 'html';
           $this->email->initialize($config);
			
			$this->email->from('info@thestarview.com', 'The StarView Infratech Pvt. Ltd.');
            $this->email->to($email);
            $this->email->subject('Password Reset Request');
            $this->email->message($message);
            
            
            if($this->email->send())
            echo "Password Has been sent to your email.";
           }
           else{
               echo "Email id does not exits";
           }
           
            
    }
    function send_sms(){
        
        $mobile=8318194240;
        $msg="This is text of sms $mobile";
        sendsms($mobile,$msg);
        echo "message send";
    }
    function check_sms_balance(){
        $data=checkSmsBalance();
        
        print_r($data);
        echo "above is balance of sms";
    }
     function edit_payment($id='',$userid=''){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
    	//echo "gautam";
    	//echo $id;
    	echo "<h4>You are editing ";
    	echo $this->db->get_where('users',array('user_id'=>$userid))->row()->user_name;
    	echo " Payment";
    	echo " and You can Edit Once.</h3>";
    	echo "<br />";echo "<br />";
    	echo '<form class="form-horizontal" method="post" action="'.base_url().'index.php/admin/update_payment" role="form">';
				echo '<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> New Amount</label>';

						echo '<div class="col-sm-8">';
							echo '<input type="number" id="form-field-1" name="amount" value="" placeholder="Amount" class="col-xs-10 col-sm-5" required="required">';
						echo '<input type="hidden" id="form-field-1" name="payment_id" value="'.$id.'" placeholder="Payment Id" class="col-xs-10 col-sm-5" required="required">';
						echo "<br />";
						
						
						echo '</div>';
						echo "<br />";
						echo '<div class="col-sm-12 text-center">';
						echo "<br />";
						
						echo '<input type="submit" class="btn btn-sm btn-success " value="Update Payment">';
						echo "<br />";
						echo "</div>";
						echo '</div>';
			echo '</form>';
			

    }
    function update_payment(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
//echo $this->input->post('amount');
//echo $this->input->post('payment_id');
		$data["page_name"]="Receive Payment";
		$data['amount']=$this->input->post('amount');
		$data['payment_id']=$this->input->post('payment_id');
		
		$data['insert_message']=$this->user_model->update_payment($data['amount'],$data['payment_id']);
		$data['newpay']=$this->user_model->get_new_payment();
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/payment',$data);
		$this->load->view('admin/admin_footer');
    }
    function download_backup(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
			
        	$this->load->dbutil();
		
            $prefs = array(     
                'format'      => 'zip',             
                'filename'    => 'my_db_backup.sql'
              );


        $backup =$this->dbutil->backup($prefs); 

        $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
        $save = 'C:/Users/iRebel/Downloads/'.$db_name;

        //$this->load->helper('file');
        //write_file($save, $backup); 


        $this->load->helper('download');
        force_download($db_name, $backup);
        
       
    }
    function download_user(){
		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');

    	 $this->load->library('excel');
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Users list');

        $this->excel->getActiveSheet()->setCellValue('A1','User Id');  
        $this->excel->getActiveSheet()->setCellValue('B1','User Name'); 
        $this->excel->getActiveSheet()->setCellValue('C1','Mobile'); 
        $this->excel->getActiveSheet()->setCellValue('D1','Email');
        $this->excel->getActiveSheet()->setCellValue('E1','Address');  
        $this->excel->getActiveSheet()->setCellValue('F1','Joining Date'); 
       // $this->excel->getActiveSheet()->setCellValue('G1',''); 
        //$this->excel->getActiveSheet()->setCellValue('H1','Address');  
       // $this->excel->getActiveSheet()->setCellValue('I1','Phone');  
       // $this->excel->getActiveSheet()->setCellValue('J1','Email'); 
        //$this->excel->getActiveSheet()->setCellValue('K1','Password Do not use this');
        $users1=$this->user_model->user_list(); 
        $this->excel->getActiveSheet()->fromArray($users1,'','A2');
         $filename='user.xls'; //save our workbook as this file name
 
        header('Content-Type: application/vnd.ms-excel'); //mime type
 
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
 
        header('Cache-Control: max-age=0'); //no cache
                    
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');

    }
    function download_user_incentive($date){
        		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
    	$date='2017-08-25';
    	$incentive=$this->user_model->user_incentive($date);
    	 $this->db->select('a.user_id,a.user_name,a.user_phone,a.user_email,a.user_address,a.acholder_name,a.account_number,a.bank_name,a.ifsc,b.generation_date');
       	$this->db->from('generate_payment b');
       	$this->db->join('users a','a.user_id=b.payment_receiver_id', 'full');
		$this->db->where("generation_date",$date);
		$this->db->group_by('payment_receiver_id');					
        $query = $this->db->get(); 
       
        $a=$query->result_array();
    	
    	$this->db->select('payment_receiver_id');
    	$this->db->from('generate_payment');
    	$this->db->where('generation_date',$date);
    	$this->db->group_by('payment_receiver_id');
    	$query=$this->db->get();
    	$userid=$query->result_array();
    	
    	
    	
    	$i=0;
    	foreach($userid as $row){
    		$this->db->select_sum('amount');
    		$this->db->from('generate_payment');
    		$this->db->where("generation_date",$date);
    		$this->db->where("payment_receiver_id",$row['payment_receiver_id']);
    		$query1=$this->db->get();

    		//$incentive[]=$query1->row('amount');
    		$a[$i]['amount']=$query1->row('amount');
    		$i++;
    	}
    	
    	
    	//print_r($a);
    	 $this->load->library('excel');
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Users list');

        $this->excel->getActiveSheet()->setCellValue('A1','User Id');  
        $this->excel->getActiveSheet()->setCellValue('B1','User Name'); 
        $this->excel->getActiveSheet()->setCellValue('C1','Mobile'); 
        $this->excel->getActiveSheet()->setCellValue('D1','Email');
        $this->excel->getActiveSheet()->setCellValue('E1','Address');  
        $this->excel->getActiveSheet()->setCellValue('F1','Account Holder Name'); 
        $this->excel->getActiveSheet()->setCellValue('G1','Account Numer'); 
        $this->excel->getActiveSheet()->setCellValue('H1','Bank Name');  
       	$this->excel->getActiveSheet()->setCellValue('I1','IFSC');  
       	$this->excel->getActiveSheet()->setCellValue('J1','Incentive on'); 
        $this->excel->getActiveSheet()->setCellValue('K1','Amount');
       
        $this->excel->getActiveSheet()->fromArray($a,'','A2');
         $filename='user_incentive.xls'; //save our workbook as this file name
 
        header('Content-Type: application/vnd.ms-excel'); //mime type
 
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
 
        header('Cache-Control: max-age=0'); //no cache
                    
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');


    }
    function update_profile_info($userid=''){
   			if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
    		redirect(base_url(),'refresh');
    	    $data['userid']=$userid;
    	    $data["page_name"]="Update Profile Information";
    	    $data['insert_message']='';
    	    $data['info']=$this->user_model->user_information($data['userid']);
    	    $this->load->view('admin/admin_header',$data);
			$this->load->view('admin/update_profile_info',$data);
			$this->load->view('admin/admin_footer');
   }

   function user_stalment(){
    if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
        redirect(base_url(),'refresh');
    $user_id = $this->input->post('user_id');
    if($user_id){  
    redirect(base_url().'index.php/admin/update_Stalment/'.$user_id);
}
}
    function user_gegology(){
        if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
            redirect(base_url(),'refresh');
        $user_id = $this->input->post('user_id');
        $x=$this->user_model->user_information( $user_id );
     if($x){  
        redirect(base_url().'index.php/admin/user_genology/'.$user_id);
       }
       else{
            redirect(base_url().'index.php/admin');
       }
    }



    function update_Stalment($userid='',$plotid=''){
        if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
            redirect(base_url(),'refresh');


        $data['userid']=$userid;
        $data["page_name"]="Update Installment";
        $data['insert_message']='';
        $x=$data['info']=$this->user_model->user_information($data['userid']);
        $data['sec']=$this->user_model->list_sector_byid($x[0]['sector']);
        $data['plot']=$this->user_model->list_plot_byid($x[0]['plot_id']);
        $data['stalment']=$this->user_model->list_stalment_by_userid($userid);
        $data['commission']=$this->user_model->list_commission_by_userid($userid);
        $data['commission_print']=$this->user_model->list_commission_by_userid_print($userid);
        $data['user_sponser']=$this->user_model->get_user_sponser_list($userid);
        $data['first_sponser']=$this->user_model->user_sponser_first($userid);
        $data['user_comm']=$this->user_model->sponser_list_commiossion($userid);
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/stalment',$data);
        $this->load->view('admin/admin_footer');
    }
    function user_genology($userid=''){
        if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
            redirect(base_url(),'refresh');


        $data['userid']=$userid;
        $data["page_name"]="User Genology";
        $data['insert_message']='';
        $x=$data['info']=$this->user_model->user_information($data['userid']);
        $data['sec']=$this->user_model->list_sector_byid($x[0]['sector']);
        $data['plot']=$this->user_model->list_plot_byid($x[0]['plot_id']);
        $data['stalment']=$this->user_model->list_stalment_by_userid($userid);
        $data['commission']=$this->user_model->list_commission_by_userid($userid);
        $data['user_sponser']=$this->user_model->get_user_sponser_list($userid);
        $data['user_comm']=$this->user_model-> sponser_list_commiossion($userid);
        $data['user_comm_count']=$this->user_model-> sponser_list_commiossion_count($userid);
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/genology',$data);
        $this->load->view('admin/admin_footer');
    }
    function add_stalment(){
    $user_id = $this->input->post('user_id');
    $sec_id = $this->input->post('sec_id');
    $plot_id = $this->input->post('plot_id');
    $stalment = $this->input->post('stalment');
    $comm = $this->input->post('comm');
    echo $this->user_model->add_stalment_com($user_id,$sec_id,$plot_id,$stalment,$comm);

    redirect('/admin/update_Stalment/'.$user_id.'/'.$plot_id, 'refresh');
}

    function add_commission(){
        		if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
			redirect(base_url(),'refresh');
        $user_id = $this->input->post('user_id');
        $sec_id = $this->input->post('sec_id');
        $plot_id = $this->input->post('plot_id');
        $stalment = $this->input->post('stalment');
        echo $this->user_model->add_comission($user_id,$sec_id,$plot_id,$stalment);

        redirect('/admin/update_Stalment/'.$user_id.'/'.$plot_id, 'refresh');
    }




   function update_profile(){
   	if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
    		redirect(base_url(),'refresh');
    	$data['userid']=$this->input->post('user_id');
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
                    $this->load->view('admin/admin_header',$data);
					$this->load->view('admin/update_profile_info',$data);
					$this->load->view('admin/admin_footer');
                }
           else{
           
            $this->user_model->admin_update_user_profile();
            $data['info']=$this->user_model->user_information($data['userid']);
            $data['insert_message']="Successfully Updated Profile.";
            		$this->load->view('admin/admin_header',$data);
					$this->load->view('admin/update_profile_info',$data);
					$this->load->view('admin/admin_footer');
            //redirect(base_url().'index.php/admin/new_user');
           }
   }
   function change_plot_no($id=''){
          	if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('logged_in')=='user' )
    		redirect(base_url(),'refresh');
    	        	$data['insert_message']=" ";
    		                   /*================================================*/
                               $d = $this->input->post();
                               if($d){
                               $X=$this->user_model->change_user_plot_no($d);
                               $data['insert_message']="Plot No has been changed successfully";
                               $id=$d['user_id'];
                               }
                    /*================================================*/
    		     	$data['user']=$this->user_model->user_by_id($id);
    		       	
    		        $data["page_name"]="Change Plot No";
    		        $data['sec']=$this->user_model->list_sector();
                    $data['plot']=$this->user_model->list_plot();

                    
                    $this->load->view('admin/admin_header',$data);
					$this->load->view('admin/change_user_plot',$data);
					$this->load->view('admin/admin_footer');
   }
   function ttt(){
      $x =$this->user_model->user_by_id(10);
      print_r($x);
     
   }
       
   function changeplotno(){
           $data = $this->input->post();
           $X=$this->user_model->change_user_plot_no($data);
          
   }
    function add_cheque(){
        if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
            redirect(base_url(),'refresh');
        $user_id =$data['user_id'] = $this->input->post('user_id');
        $sec_id = $this->input->post('sec_id');
        $plot_id = $this->input->post('plot_id');
        $data['comment'] = $this->input->post('comment');
        echo $this->user_model->add_cheque($data);

        redirect('/admin/update_Stalment/'.$user_id.'/'.$plot_id, 'refresh');
    }
    function cheque_status_cheque(){
        if($this->session->userdata('logged_in')!=TRUE && $this->session->userdata('user_role')!='admin')
            redirect(base_url(),'refresh');
        $data['id'] = $this->input->post('id');
        $data['status'] = $this->input->post('status');

        echo $this->user_model->update_cheque($data);

//        redirect('/admin/update_Stalment/'.$user_id.'/'.$plot_id, 'refresh');
    }

}
