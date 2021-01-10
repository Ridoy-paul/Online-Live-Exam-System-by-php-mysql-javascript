<?php 

include("config.php");
// Helper functions start
date_default_timezone_set('Asia/Dhaka');

function query($sql){
	global $connection;
	return mysqli_query($connection, $sql);
}

function fetch_array($array){

    return mysqli_fetch_array($array);
}


function confirm($result){
	global $connection;
	if (!$result) {
		die("Query Failed" . mysqli_error($result));
	}
}

function escape_string($string){
	global $connection;
	return mysqli_real_escape_string($connection, $string);
}

function set_message($msg){
	if (!empty($msg)) {
		$_SESSION['message'] = $msg;
	}
	else{
		$msg = "";
	}
}

function display_message(){
	if(isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}

function redirect($location){
	header("Location: $location");
}

// Helper functions end
// <!----------------------------------- Front Hand Functions & Queries Start ----------------------------->

/*

// <!----------------------------------------- Admin Login user START ------------------------------->

function admin_login(){
    if(isset($_POST['admin_login'])){
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

        $query = query("SELECT * FROM admin WHERE username = '$username'");
        //confirm($query);
        $rows = mysqli_num_rows($query);
        if ($rows > 0) {
            $row = fetch_array($query);
            $db_pass = $row['password'];
            if($db_pass == md5($password)) {
                $_SESSION['username'] = $username;
                redirect("index.php");
                set_message("Login Successfull");
               
            }
            else {
                header("Location: login.php");
                set_message("Sorry Username or password is invalid, Please try again");
                
            }
        }  
    }
}

// <!----------------------------------------- Admin Login END ------------------------------->


*/

// send sms single
function sendsms(){
    if(isset($_POST['save'])){
        
        $shopkeeper_query = query("SELECT * FROM admin WHERE username = '" . $_SESSION['username'] . "'");  
        confirm($shopkeeper_query);
        $row_of_admin = fetch_array($shopkeeper_query);
        $shopkeeper_id = $row_of_admin['id'];
	
	 //getting the text data from the fields
	  
        $date   = date("d-M-Y g:iA");
       
	   
	   $mobile=escape_string($_POST['phone']);
	   $details=escape_string($_POST['msg']);
	   $insert_query=query("INSERT INTO sms(phone,msg,date,shop_id) VALUES ('$mobile','$details','$date','$shopkeeper_id')");
	   confirm($insert_query);
	  
}
}
// group sms
function groupsms(){
        $shopkeeper_query = query("SELECT * FROM admin WHERE username = '" . $_SESSION['username'] . "'");  
        confirm($shopkeeper_query);
        $row_of_admin = fetch_array($shopkeeper_query);
        $shopkeeper_id = $row_of_admin['id'];

//getting the text data from the fields

	   $date   = date("d-M-Y g:iA");
	   $mobile=escape_string($_POST['phone']);
	   $details=escape_string($_POST['msg']);
	   $phnquery_insert = query("SELECT * FROM `clients` WHERE shop_id='$shopkeeper_id' ");
	   confirm($phnquery_insert);
	   while($row2 = fetch_array($phnquery_insert)){
	       $phn=$row2['phone'];
	       $name=$row2['name'];
	       if($name=="Unknown")
	       {
	           
	       }
	       else{
	           $insert_query=query(" INSERT INTO sms(phone,msg,date) VALUES ('$phn','$details','$date')" );
	       confirm($insert_query);
	       }
	       
	   }
	  

}

// send email
function sendtoclient($fname,$mobile){
 $curl = curl_init();
		$request = json_encode( array( "from"=> "8804445659204","to" =>"88".$mobile, "text"=>$fname ) );
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://107.20.199.106/restapi/sms/1/text/single",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $request,
			  CURLOPT_HTTPHEADER => array(
				    "authorization: Basic c2F0cmF2ZWxzOmFzZGYxMjM0",
				    "content-type: application/json",
				  ),
			));
			$response = curl_exec($curl);
			$json = json_decode($response, true);
			$jsonr = $json['messages'];
			
			$err = curl_error($curl);
			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			 
			  echo "<script>alert('Notice has been inserted ! $response')</script>";
// 		  echo "<script type='text/javascript'>
// window.location = '/index.php';
// </script>";
			}
			curl_close($curl);   
    
}

function sendtocrm($fname,$crmnumber){
 $curl = curl_init();
		$request = json_encode( array( "from"=> "8804445659204","to" =>$crmnumber, "text"=>$fname ) );
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://107.20.199.106/restapi/sms/1/text/single",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $request,
			  CURLOPT_HTTPHEADER => array(
				    "authorization: Basic c2F0cmF2ZWxzOmFzZGYxMjM0",
				    "content-type: application/json",
				  ),
			));
			$response = curl_exec($curl);
			$json = json_decode($response, true);
			$jsonr = $json['messages']['0']['to'];
			$jsonr1 = $json['messages']['0']['status']['description'];
			$jsonr2 = $json['messages']['0']['status']['groupName'];
			
			
			$err = curl_error($curl);
			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  echo $response;
			  echo "<script>alert('To: $jsonr\\nStatus: $jsonr2\\nResponse: $jsonr1')</script>";
		    echo "<script type='text/javascript'>
            window.location = '/index.php';
</script>";
			}
			curl_close($curl);   
    
}


function techno_bulk_sms($mobile_no,$message){
	$url = 'https://71bulksms.com/sms_api/bulk_sms_sender_2.php';
	$ap_key='16727216286618232020/07/2007:54:15amTaafarabi'; 
    $sender_id='711';
    $user_email='taafarabi@gmail.com';
	$data = array('api_key' => $ap_key,
	 'sender_id' => $sender_id,
	 'message' => $message,
	 'mobile_no' =>$mobile_no,
	 'user_email'=> $user_email		
	 );

	// use key 'http' even if you send the request to https://...
	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	echo "<script>alert('$result')</script>"; 
}


//sell page sms start
function techno_bulk_sms_sell($mobile_no,$message){
	$url = 'https://71bulksms.com/sms_api/bulk_sms_sender_2.php';
	$ap_key='16727216286618232020/07/2007:54:15amTaafarabi'; 
    $sender_id='711';
    $user_email='taafarabi@gmail.com';
	$data = array('api_key' => $ap_key,
	 'sender_id' => $sender_id,
	 'message' => $message,
	 'mobile_no' =>$mobile_no,
	 'sms_total_payable' =>$sms_total_payable,
	 'user_email'=> $user_email		
	 );

	// use key 'http' even if you send the request to https://...
	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	echo "<script>alert('$result')</script>"; 
}
//sell page sms end

function techno_group_sms($mobile_no,$message){
	$url = 'https://71bulksms.com/sms_api/bulk_sms_sender_2.php';
	$ap_key='16727216286618232020/07/2007:54:15amTaafarabi'; 
    $sender_id='711';
    $user_email='taafarabi@gmail.com';
	$data = array('api_key' => $ap_key,
	 'sender_id' => $sender_id,
	 'message' => $message,
	 'mobile_no' =>$mobile_no,
	 'user_email'=> $user_email		
	 );

	// use key 'http' even if you send the request to https://...
	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	echo $mobile_no . " Done &#9989; <br/> "; 
}



function sendemail($fname,$email){
    $your_installation_url = 'http://email.internetmarketing.com.bd';
    $list = 'BLl8924nd8WEvGFHs0Askn2Q';
	$name = $fname;
	$email = $email;
	if($name=='' || $email=='')
	{
		echo 'Please fill in all fields.';
		exit;
	}
	
	$postdata = http_build_query(
	    array(
	    'name' => $name,
	    'email' => $email,
	    'list' => $list,
	    'boolean' => 'true'
	    )
	);
	$opts = array('http' => array('method'  => 'POST', 'header'  => 'Content-type: application/x-www-form-urlencoded', 'content' => $postdata));
	$context  = stream_context_create($opts);
	$result = file_get_contents($your_installation_url.'/subscribe', false, $context);
}



 ?>