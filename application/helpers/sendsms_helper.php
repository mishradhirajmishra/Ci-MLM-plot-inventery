<?php

 // function for send sms
// it takes following parameter as an array and return sms id for successfully delivered of sms otherwise return fasle 

 if(!function_exists("sendsms"))
 {

 	
 	function sendsms($to,$msg,$sendondate = NULL)
 	{

    $config = array();
 	$config['url']     = "http://sms.irebelwebtech.com/API/WebSMS/Http/v1.0a/index.php";
 	$config['username']    = "starview";         // userid of sms gateway login
 	$config['password']     = "abc123";  // password of sms gateway login
 	$config['sender']     = "starvi";           // approved sender id
 	$config['to']     = "";			      // destination 
 	$config['reqid'] = 1; 			      // priority of the msg, default priority is 1
    $config['format'] = "text";                   // message format
    $config['route_id'] = "";
 	$config['sendondate']    = date('d-m-Y\TH:i:s');  // time for delivering the message
 	


 	$config['to'] =  $to;
 	$config['sendondate'] = $sendondate == NULL?$config['sendondate']:$sendondate;

	$query = http_build_query([
            'username'      => $config['username'],
            'password'      => $config['password'],
            'sender'        => $config['sender'],
            'to'            => $config['to'],
            'message'       => $msg,
            'reqid'         => $config['reqid'],
            'format'        => $config['format'],
            'route_id'      => $config['route_id'],
            'sendondate'    => $config['sendondate']
        ]);

   $string = $config['url']."?".$query;
//   return $string;
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_URL, $string);
   $content = curl_exec($ch);
   return $content;
   
//var_dump($content);
 	}
 }


 
 // function for check  sms balance
// return sms balance

 if(!function_exists("checkSmsBalance"))
 {
    function checkSmsBalance()
    {
        $config = array();
        //$config['url']     = "http://sms.irebelwebtech.com/API/WebSMS/Http/v1.0a/index.php";
        $config['username']    = "starview";         // userid of sms gateway login
        $config['password']     = "abc123";  // password of sms gateway login
        $config['method_check'] ="credit_check";
        $config['format'] = "json";
        $query = http_build_query([
          'method'     => $config['method_check'],
          'username'    => $config['username'],
          'password'     => $config['password'],
          'format'       => $config['format'],
        ]);

        $string = $config['url']."?".$query;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $string);
        $content = curl_exec($ch);
        return $content;
      
    }
    
    if(!function_exists("getRandomOtp")) {
        function getRandomOtp(){
            
                $alphabet = '1234567890';
                $pass = array(); //remember to declare $pass as an array
                $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                for ($i = 0; $i < 4; $i++) {
                    $n = rand(0, $alphaLength);
                    $pass[] = $alphabet[$n];
                }
                return implode($pass); //turn the array into a string
            

        }
    }
 }
