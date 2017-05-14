<?php 
session_start();
include("dbcon.php");


$username=mysqli_real_escape_string($conni,$_POST['username']);
$password=mysqli_real_escape_string($conni,$_POST['password']);
$rem=mysqli_real_escape_string($conni,$_POST['rem']);

//mysql_select_db("prof");

$query="select * from `user` where `email`='".$username."'";


 $result=mysqli_query($conni,$query);
  $r=mysqli_fetch_assoc($result);

 if(!$result){
   die("error".mysqli_error($conni));
     }

if(!$r){
  echo "nr";
}
else{     



	if($password==$r['password']){
    $_SESSION['invalid']=0;
		if($r['activated']=='n'){
           echo "not";
       }else{
      if($rem=='yes'){
      	setcookie("username",$username,time()+7200000);
      	echo"y";

      }else{
      	$_SESSION['username']=$username;
      	echo"y";
      }
  }
	}else
	{
		echo "n";
	}

}
?>