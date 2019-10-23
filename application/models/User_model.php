<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function sponserid_check($id){
    	$result=$this->db->get_where("users",array("user_id"=>$id));
    	if($result->num_rows()>0)
    		return true;
    	else
    		return false;

    }
   function user_list1(){
       $this->db->select('user_id');
        $this->db->select('user_name');
         $this->db->select('user_phone');
          $this->db->select('stalment_type');
           $this->db->select('total_price');
           $this->db->select('booking_price');
        $result=$this->db->get_where("users",array('user_role'=>'user'))->result_array();
        return $result;
    }
    /* add a new sector*/
    function add_sector($sec_name){
        $data = array(
            'sec_id' =>"",
            'sec_name' => $sec_name,
            'Date' =>date('d-m-y')
        );
        $this->db->insert('sector',$data);
}

/**********************************************************************************************/
function monthly_business(){
        $data= array('user_id>'=>7,'month'=>date('m'));
        $this->db->select_sum('stalment');
        $q=$this->db->get_where('user_stalment',$data);
        $x= $q->row_array();
         return $x['stalment']; 
}
function l_monthly_business(){
        $data= array('user_id>'=>7,'month'=>date('m')-1);
        $this->db->select_sum('stalment');
        $q=$this->db->get_where('user_stalment',$data);
        $x= $q->row_array();
         return $x['stalment'];
}
function total_business(){
        $data= array('user_id>'=>7);
        $this->db->select_sum('stalment');
        $q=$this->db->get_where('user_stalment',$data);
        $x= $q->row_array();
         return $x['stalment']; 
}
function today_business(){
        $data= array('user_id>'=>7,'date'=>date('d-m-y'));
        $this->db->select_sum('stalment');
        $q=$this->db->get_where('user_stalment',$data);
        $x= $q->row_array();
         return $x['stalment']; 
}
function total_sale(){
        $data= array('user_id>'=>7);
        $this->db->select_sum('total_price');
        $q=$this->db->get_where('users',$data);
        $x= $q->row_array();
        return $x['total_price']; 
}
function today_sale(){
        $data= array('user_id>'=>7,'date'=>date('d-m-y'));
        $this->db->select_sum('total_price');
        $q=$this->db->get_where('users',$data);
        $x= $q->row_array();
        return $x['total_price']; 
}
function total_associate(){
        $data= array('user_id>'=>7);
        $q=$this->db->get_where('users',$data);
        $x= $q->num_rows();
        return $x; 
}
function total_plot(){
        $data= array('sr_no!='=>7);
        $q=$this->db->get_where('plot',$data);
        $x= $q->num_rows();
        return $x; 
}
function total_booked_plot(){
        $data= array('sr_no!='=>7,'status'=>0);
        $q=$this->db->get_where('plot',$data);
        $x= $q->num_rows();
        return $x; 
}
      function all_user1(){
          $data= array('user_id>'=>7);
        $query = $this->db->get_where('users',$data); 
        return $query->result_array();
      }
      function associate_recived_amount($id){
        $data= array('user_id'=>$id);
        $this->db->select_sum('stalment');
        $q=$this->db->get_where('user_stalment',$data);
        $x= $q->row_array();
         return $x['stalment']; 
}
/**********************************************************************************************/

function add_stalment($user_id,$sec_id,$plot_id,$stalment){
    $data= array(
        'id'=>"",
        'user_id'=>$user_id	,
        'sec_id'=>$sec_id	,
        'plot_id'=>$plot_id	,
        'stalment'=>$stalment,
        'date'=>date('d-m-y'),
        'Year'=>date('y'),
        'month'=>date('m')
);

    $this->db->insert('user_stalment',$data);
}
function add_stalment_com($user_id,$sec_id,$plot_id,$stalment,$com){
    $data= array(
        'id'=>"",
        'user_id'=>$user_id	,
        'sec_id'=>$sec_id	,
        'plot_id'=>$plot_id	,
        'stalment'=>$stalment,
        'comm'=>$com,
        'date'=>date('d-m-y'),
        'Year'=>date('y'),
        'month'=>date('m')
);

    $this->db->insert('user_stalment',$data);
}
    function add_comission($user_id,$sec_id,$plot_id,$stalment){
        $data= array(
            'id'=>"",
            'user_id'=>$user_id	,
            'sec_id'=>$sec_id	,
            'plot_id'=>$plot_id	,
            'commission'=>$stalment,
            'date'=>date('d-m-y'),
            'year'=>date('y'),
            'month'=>date('m')
        );

        $this->db->insert('user_commission',$data);
    }
        function  count_stalment_by_userid($x){
        $data= array('user_id'=>$x);
        $q=$this->db->get_where('user_stalment',$data);
        return $q->num_rows();
    }
    function  list_stalment_by_userid($x){
        $data= array('user_id'=>$x);
        $q=$this->db->get_where('user_stalment',$data);
        return $q->result_array();
    }
        function  list_stalment_by_userid_date($x,$m,$y){
        $data= array('user_id'=>$x,'month'=>$m,'year'=>$y);
        $q=$this->db->get_where('user_stalment',$data);
        return $q->row_array();
    }
        function  list_stalment_of_month($user_id,$sector,$plot_id,$month){
        $data= array('user_id'=>$user_id,'sec_id'=>$sector,'plot_id'=>$plot_id,'month'=>$month,'year'=>Date('y'));
        $q=$this->db->get_where('user_stalment',$data);
        return $q->row_array();
    }
    
        function  user_id_by_month_year($year,$month){
        $data= array('year'=>$year,'month'=>$month,);
         $this->db->select('user_id');
        $q=$this->db->get_where('user_stalment',$data);
        return $q->result_array();
    }
    
    
    function  list_stalment_by_month_year($id,$year,$month){
        $data= array('user_id'=>$id,'year'=>$year,'month'=>$month,);
        $q=$this->db->get_where('user_stalment',$data);
        return $q->row_array();
    }
        function  list_commission_by_month_year($id,$year,$month){
        $data= array('user_id'=>$id,'year'=>$year,'month'=>$month,);
        $q=$this->db->get_where('user_commission',$data);
        return $q->row_array();
    }
    function  list_commission_by_userid($x){
        $data= array('user_id'=>$x);
        $q=$this->db->get_where('user_commission',$data);
        return $q->result_array();
    }
        function  list_commission_by_userid_print($x){
        $data= array('user_id'=>$x);
        $this->db->order_by('id', 'DESC');
        $q=$this->db->get_where('user_stalment',$data);
        return $q->row_array();
    }
 function  list_sector(){
        $q=$this->db->get('sector');
       return $q->result_array();
 }
    function  list_sector_byid($x){
        $data= array('sec_id'=>$x);
        $q=$this->db->get_where('sector',$data);
        return $q->row_array();
    }
    function  list_plot(){
        $q=$this->db->get('plot');
        return $q->result_array();
    }

	    function  list_plot_byno($x,$y){
			$data=array('plot_no'=>$x,'sr_no'=>$y);
        $q=$this->db->get_where('plot',$data);
        return $q->row_array();
    }
    function  list_plot_byid($x){
        $data= array('plot_id'=>$x);
        $q=$this->db->get_where('plot',$data);
        return $q->row_array();
    }
	    function  list_plot_sid($x){
        $data= array('sr_no'=>$x,'status'=>1);
        $this->db->select('plot_id');
        $this->db->select('plot_no');
        $q=$this->db->get_where('plot',$data);
        return $q->result_array();
    }
    
    /*___________________________*/

    /*_______________________________*/
    
    
    function add_plot($sr_no,$plot_no,$plot_size){
        $data = array(
            'plot_id'=>"",
            'sr_no'=>$sr_no,
            'plot_no'=>$plot_no,
            'plot_size'=>$plot_size,
            'date'=>date('d-m-y'),
             'status'=>1
        );
        $this->db->insert('plot',$data);
}
     function update_plot($id,$area){
      $data=array('plot_size'=>$area);
      $this->db->where('plot_id',$id);
      $this->db->update('plot',$data);
      return true;   
     }
    //add new member
    function add_new_member(){
    	$sponserid=$this->input->post('sponserid');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $name=$this->input->post('name');
            $mobile=$this->input->post('mobile');
            $email=$this->input->post('email');
            $fee=$this->input->post('joiningfee');
            $bank=$this->input->post('bankname');
            $ifsc=$this->input->post('ifsc');
            $acnumber=$this->input->post('acnumber');
            $acname=$this->input->post('account_name');
            $sec_id=$this->input->post('sec_id');
            $plot_id=$this->input->post('plot_id');
            $plot_price=$this->input->post('plot_price');
            $emi=$this->input->post('emi');
            $payment_modd=$this->input->post('payment_modd');
            $clearing_date=$this->input->post('clearing_date');
            $cheque_no=$this->input->post('cheque_no');
            $narration=$this->input->post('narration');
            if(isset($_POST['private1'])){
             $fee=$this->input->post('new-fee');
            }
            $data=array(
            		'user_id'=>"",
            		"user_name"=>$name,
            		"login_id"=>$username,
            		"password"=>$password,
            		"user_phone"=>$mobile,
            	 	"user_email"=>$email,
            	  	"user_address"=>"",
            	  	"date"=>date('Y-m-d'),
                     "bank_name"=>$bank,
                     "ifsc"=>$ifsc,
                     "account_number"=>$acnumber,
                     "acholder_name"=>$acname,
                     "sector"=>$sec_id,
                     "plot_id"=>$plot_id,
                     "stalment_type"=>$emi,
                     "total_price"=>$plot_price,
                     "booking_price"=>$fee,
            		 "user_role"=>"user",
            		 "payment_modd"=>$payment_modd,
                     "clearing_date"=>$clearing_date,
                     "cheque_no"=>$cheque_no,
            		 "narration"=>$narration
            	);
           $this->db->insert('users',$data);
           $user_id=$this->db->insert_id();
           
          /*add booking price as stallment */
            $data= array(
                'id'=>"",
                'user_id'=>$user_id	,
                'sec_id'=>$sec_id	,
                'plot_id'=>$plot_id	,
                'stalment'=>$fee,
                'date'=>date('d-m-y'),
                'Year'=>date('y'),
                'month'=>date('m')
            );

            $this->db->insert('user_stalment',$data);


           /*plot booked status*/

           $plt= array('status'=>0);
           $this->db->where('plot_id',$plot_id);
           $p= $this->db->update('plot',$plt);


        /*first label sponcer*/
           $first=array( 'id'=>"", "sponser_id"=>$sponserid, 	"user_id"=>$user_id, 	"relation"=>1, 	"date"=>date('Y-m-d'));
           $this->db->insert("user_sponser",$first);

            /*second label sponcer*/
            $data2 = array('user_id'=>$sponserid,'relation'=>1);
            $q2= $this->db->get_where('user_sponser',$data2);
            if($q2->row_array()) {
                $x2 = $q2->row_array();
                $sponserid2 = $x2['sponser_id'];
                $second = array('id' => "", "sponser_id" => $sponserid2, "user_id" => $user_id, "relation" => 2, "date" => date('Y-m-d'));
                $this->db->insert("user_sponser", $second);

           /*third label sponcer*/
        $data3 = array('user_id'=>$sponserid2,'relation'=>1);
        $q3= $this->db->get_where('user_sponser',$data3);
        if($q3->row_array()) {
            $x3 = $q3->row_array();
            $sponserid3 = $x3['sponser_id'];
            $third = array('id' => "", "sponser_id" => $sponserid3, "user_id" => $user_id, "relation" => 3, "date" => date('Y-m-d'));
            $this->db->insert("user_sponser", $third);

           /*forth label sponcer*/
        $data4 = array('user_id'=>$sponserid3,'relation'=>1);
        $q4= $this->db->get_where('user_sponser',$data4);
        if($q4->row_array()) {
            $x4 = $q4->row_array();
            $sponserid4 = $x4['sponser_id'];
            $forth = array('id' => "", "sponser_id" => $sponserid4, "user_id" => $user_id, "relation" => 4, "date" => date('Y-m-d'));
            $this->db->insert("user_sponser", $forth);


           /*fifth label sponcer*/
            $data5 = array('user_id'=>$sponserid4,'relation'=>1);
            $q5= $this->db->get_where('user_sponser',$data5);
            if($q5->row_array()) {
            $x5 = $q5->row_array();
            $sponserid5 = $x5['sponser_id'];
            $fifth = array('id' => "", "sponser_id" => $sponserid5, "user_id" => $user_id, "relation" => 5, "date" => date('Y-m-d'));
            $this->db->insert("user_sponser", $fifth);
        }

       }
      }
    }

/*





        $payment=array(
           		'payment_id'=>'',
           		'user_id'=>$user_id,
           		'amount'=>$fee,
           		'payment_date'=>date('Y-m-d')
           	);
          $this->db->insert("user_payment",$payment);*/



    }
       function user_sponser_first($id){
               $data=array(
                   'user_id'=>$id,
                   'relation'=>1);
        $result=$this->db->get_where('user_sponser',$data)->row_array();
        return $result;
    }
    
    function receive_payment(){

      $data=array(
        "payment_id"=>'',
        "user_id"=>$this->input->post('userid'),
        "amount"=>$this->input->post('amount'),
        "payment_date"=>date('Y-m-d')
        );
        if($this->db->insert('user_payment',$data))
          return true;
        else
          return false;
      }
      function get_user_list($id){
        if($id=='')
        $id=$this->input->post('userid');
        $result=$this->db->get_where('user_sponser',array('sponser_id'=>$id))->result_array();
        return $result;
      }
 /*by dhiraj*/
    function get_user_sponser_list($id){
        $this->db->order_by('relation','desc');
        $result=$this->db->get_where('user_sponser',array('user_id'=>$id))->result_array();
        return $result;
    }
    function sponser_list_commiossion($id){
        $this->db->order_by('relation','asc');
        $result=$this->db->get_where('user_sponser',array('sponser_id'=>$id))->result_array();
        return $result;
    }
        function sponser_list_commiossion_count($id){
        $this->db->order_by('relation','asc');
        $result=$this->db->get_where('user_sponser',array('sponser_id'=>$id))->num_rows();
        return $result;
    }
      function get_new_payment_list(){
       
        $this->db->select('*');
    $this->db->from('users a'); 
    $this->db->join('user_payment b', 'a.user_id=b.user_id', 'full');
    
    $this->db->where('b.status',0);
    $this->db->order_by('b.payment_date','asc');         
    $query = $this->db->get(); 
        return $query->result_array();

      }
      function user_incentive($date){
        $this->db->select('*');
        $this->db->from('generate_payment');
        $this->db->where('generation_date',$date);
        $this->db->order_by("payment_receiver_id");
        $query = $this->db->get(); 
        return $query->result_array();
      }
      function all_user(){
        $query = $this->db->get('users'); 
        return $query->result_array();
      }
      
      function total_incentive(){
        //$this->db->select_sum('amount');
        $this->db->select('payment_receiver_id');
        $this->db->from('generate_payment');
        $this->db->group_by("payment_receiver_id");
        $this->db->order_by("payment_receiver_id");
        $query = $this->db->get(); 
        return $query->result_array();
      }
      function customer_all_payment($userid){
        $this->db->select('amount,payment_date');
        $this->db->from('user_payment');
        $this->db->where('user_id',$userid);
        
        $query = $this->db->get(); 
        return $query->result_array();
      }
      function date_wise_incentive(){
        $this->db->select('generation_date');
        $this->db->from('generate_payment');
        $this->db->group_by("generation_date");
        
        $query = $this->db->get(); 
        return $query->result_array();
      }
      //function to get user for date wise calculation
      function date_wise_user(){
        $this->db->select('payment_receiver_id');
        $this->db->from('generate_payment');
        $this->db->group_by("payment_receiver_id");
        
        $query = $this->db->get(); 
        return $query->result_array();
      }
      function date_wise_user_incentive($userid=""){
          $this->db->select('generation_date');
        $this->db->from('generate_payment');
        $this->db->where('payment_receiver_id',$userid);
        $this->db->group_by("generation_date");
        
        $query = $this->db->get(); 
        return $query->result_array();
      }
      function user_information($userid=""){
        $result=$this->db->get_where('users',array('user_id'=>$userid))->result_array();
        return $result;
      }
       function user_mobile_no($userid){
        $this->db->select('user_id,user_name,user_phone,account_number');
        $this->db->from('users');
        $this->db->where('user_id',$userid);
        $query = $this->db->get(); 
        return $query->row_array();
      }
      function update_user_profile(){
            $name=$this->input->post('name');
            $mobile=$this->input->post('mobile');
            $email=$this->input->post('email');
            $address=$this->input->post('address');
            $bank=$this->input->post('bankname');
            $ifsc=$this->input->post('ifsc');
            $acnumber=$this->input->post('acnumber');
            $acname=$this->input->post('account_name');
            $data=array(
                
                "user_name"=>$name,
               
              
                "user_phone"=>$mobile,
                "user_email"=>$email,
                "user_address"=>$address,
                "last_update"=>date('Y-m-d H:i:s'),
                "bank_name"=>$bank,
                "ifsc"=>$ifsc,
                "account_number"=>$acnumber,
                "acholder_name"=>$acname
                

              );
            $this->db->where('user_id',$this->session->userdata('user_id'));
            $this->db->update('users',$data);
      }
      function get_last_closing_date(){
      $query = $this->db->query("SELECT * FROM generate_payment ORDER BY id DESC LIMIT 1");
        //$result = $query->result_array();
        if(!empty($query->result_array())){
        $result=$query->row()->generation_date;
        return $result;
        }
        else
        return 0;
      }
      function latest_incentive_sum($date){
        $this->db->select_sum('amount');
        $this->db->where('generation_date',$date);
        $this->db->from('generate_payment');
        $query=$this->db->get();
        return $query->result_array();

      }
     function total_sum_of_incentive(){
      $this->db->select_sum('amount');
        
        $this->db->from('generate_payment');
        $query=$this->db->get();
        return $query->result_array();
     }
     function update_password($password,$userid){
      $data=array('password'=>$password);
      $this->db->where('user_id',$userid);
      $this->db->update('users',$data);
      return true;
     }

     function check_user_email($email){
            $this->db->select('password');
            $this->db->from('users');
            $this->db->where('user_email',$email);
            $query = $this->db->get(); 
             return $query->result_array();
     }
   function get_user_name_number($userid){
        $this->db->select('user_name,user_phone');
        $this->db->where('user_id',$userid);
        $this->db->from('users');
        $query=$this->db->get();
        return $query->result_array();
     }
     function get_user_id_of_lastclosing($date){
       

        $this->db->select('a.user_id,a.user_name,a.user_phone');
        $this->db->from('users a'); 
        $this->db->join('generate_payment b', 'a.user_id=b.payment_receiver_id', 'full');
    
        //$this->db->where('b.status',0);
        //$this->db->order_by('b.payment_date','asc'); 
        $this->db->where('b.generation_date',$date);
        $this->db->group_by("b.payment_receiver_id");        
        $query = $this->db->get(); 
        return $query->result_array();
     }
     function get_new_payment(){
        
        $this->db->select('a.user_id,a.user_name,b.amount,b.payment_date,b.status,b.edited,b.payment_id');
        $this->db->from('users a'); 
        $this->db->join('user_payment b', 'a.user_id=b.user_id', 'full');
        $this->db->where('b.status',0);
        //$this->db->where('b.edited',0);      
        $query = $this->db->get(); 

        return $query->result_array();
     }
     function update_payment($amount,$payment_id){
      $data=array('amount'=>$amount,'edited'=>1);
      $this->db->where('payment_id',$payment_id);
      if($this->db->update('user_payment',$data)){
        return "Amount Updated";

      }
      else return "Failed to Update try again.";
     }
     function user_list(){
        $this->db->select('user_id,user_name,user_phone,user_email,user_address,date');
        $this->db->from('users');
        $query = $this->db->get(); 
        return $query->result_array();

     }
      function admin_update_user_profile(){
            $user_id=$this->input->post('user_id');
            $name=$this->input->post('name');
            $mobile=$this->input->post('mobile');
            $email=$this->input->post('email');
            $address=$this->input->post('address');
            $bank=$this->input->post('bankname');
            $ifsc=$this->input->post('ifsc');
            $acnumber=$this->input->post('acnumber');
            $acname=$this->input->post('account_name');
            $status=$this->input->post('status');
            $data=array(
                
                "user_name"=>$name,
               
              
                "user_phone"=>$mobile,
                "user_email"=>$email,
                "user_address"=>$address,
                "last_update"=>date('Y-m-d H:i:s'),
                "bank_name"=>$bank,
                "ifsc"=>$ifsc,
                "account_number"=>$acnumber,
                "acholder_name"=>$acname,
                "status"=> $status

              );
            $this->db->where('user_id',$user_id);
            $this->db->update('users',$data);
      }
          function user_by_id($id){
        $result=$this->db->get_where("users",array("user_id"=>$id));
        return $result->row_array();
    }
    function change_user_plot_no($data){
        $sector=$data['sector'];
        $user_id=$data['user_id'];
        $old_plot_id=$data['old_plot_id'];
        $new_plot_id=$data['plot_id'];
        /*============= CHANGE OLD PLOT STATUS TO 1 =====================*/
        $data1=array('status'=>1);
        $this->db->where('plot_id',$old_plot_id);
        $this->db->update('plot',$data1);
        /*============= CHANGE NEW PLOT STATUS TO 0 =====================*/ 
        $data2=array('status'=>0);
        $this->db->where('plot_id',$new_plot_id);
        $this->db->update('plot',$data2);
        /*============= CHANGE USER PLOT NO =====================*/
        $data3=array('plot_id'=>$new_plot_id,'sector'=>$sector);
        $this->db->where('user_id',$user_id);
        $this->db->update('users',$data3);
    }
    
  function getUsercommission_old($id){
      $this->db->select_sum('stalment');
      $where = "user_id=".$id." AND ((year=18) OR (year=19 AND month<=3))";
      $this->db->where($where);
      $query = $this->db->get('user_stalment');
     return $query->row_array();
  }
    function getUsercommission_new($id){
        $this->db->select_sum('stalment');
        $where = "user_id=".$id." AND year>=19 AND month>3";
        $this->db->where($where);
        $query = $this->db->get('user_stalment');
        return $query->row_array();
    }
    /*==================================================================*/
    /*                           cheque                             */
    /*==================================================================*/
    function all_cheque($id)
    {
        $this->db->where('user_id',$id);
        $work_data = $this->db->get_where('user_cheque')->result_array();
        return $work_data;
    }

    function add_cheque($data)
    {
        $this->db->insert('user_cheque', $data);
        if ($this->db->affected_rows() > 0) {return TRUE;} else { return FALSE;}
    }
    function update_cheque($data){
        $this->db->where('id',$data['id']);
        unset($data['id']);
        $this->db->update('user_cheque', $data);
        if ($this->db->affected_rows() > 0) { return TRUE; } else {return FALSE; }
    }
    /*============================================== =============================== */

 }