<?php
session_start();
include("dbcon.php");





	if(isset($_COOKIE['username'])||isset($_SESSION['username'])){
		$log=true;
	}else{
		$log=false;
	}

if(isset($_COOKIE['username'])){
	//echo "cokkie";
	$username=$_COOKIE['username'];
	$query="select * from `user` where `email`='".$username."'";

//mysql_select_db("prof");
 $resultl=mysqli_query($conni,$query);
  

 if(!$resultl){
   die("error".mysqli_error($conni));
     }

     $rl=mysqli_fetch_assoc($resultl);

     $name= $rl['first_name'];
     $lname=$rl['last_name'];
     $userid = $rl['userid'];
     $user_name = $name." ".$lname;

}

if(isset($_SESSION['username'])){
	//echo "seesion";
	$username=$_SESSION['username'];
	$query="select * from `user` where `email`='".$username."'";

//mysql_select_db("prof");
 $resultl=mysqli_query($conni,$query);
  

 if(!$resultl){
   die("error".mysqli_error($conni));
     }

     $rl=mysqli_fetch_assoc($resultl);

     $name= $rl['first_name'];
     $lname=$rl['last_name'];
     $userid = $rl['userid'];
     $user_name = $name." ".$lname;

}



?>