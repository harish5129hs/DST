<?php
session_start();
include("dbcon.php");
$id_token = mysqli_real_escape_string($conni,$_GET['googleid']);
$email = mysqli_real_escape_string($conni,$_GET['email']);
$firstname = mysqli_real_escape_string($conni,$_GET['firstname']);
$lastname = mysqli_real_escape_string($conni,$_GET['lastname']);
$alg = mysqli_real_escape_string($conni,$_GET['alg']);



$nm= $firstname{0}.$firstname{1};
$lm= $lastname{0}.$lastname{1};

$alg = 'g'.$nm.$alg.$lm.mt_rand(5, 150);

$return=array();
$return['success']=0;
//insert new user to users database

//first check if user exists
$query="select * from `user` where `email`='".$email."'";
$result=mysqli_query($conni,$query);
if(!$result){
   die("error".mysqli_error($conni));
}
 $r=mysqli_fetch_assoc($result);
 

if($r){

 	//just login the user
 	$_SESSION['username']=$email;
 	$return['success']=1;
 
 }
 else{
 	//insert into user a new value
 		$query = "insert into user values(DEFAULT,'$firstname','$lastname','$alg','$email','y','') ;";
 		$result=mysqli_query($conni,$query);
		if(!$result){
		   die("error".mysqli_error($conni));
		}

		$_SESSION['username']= $email;
		$return['success']=1;

		//sending mail to user 
 		/*
 		$to = $email;
			$subject = "DST Registration successfull";
			$txt = "You have successfully registered with google account <br>
			         Your account details are :<br>
			         username = '$email';
			         password = '$alg';
			           ";
			
            echo $txt."<br>";
            $header = "From: noreply@dst.com\r\n"; 
			$header.= "MIME-Version: 1.0\r\n"; 
			$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
			$header.= "X-Priority: 1\r\n"; 

			$er = mail($to,$subject,$txt,$header);
			//echo $er;
			*/

 }


echo json_encode($return);

?>