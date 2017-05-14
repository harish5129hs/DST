<?php
session_start();
 if(isset($_POST['cap'])) {
 	$cap=$_POST['cap'];

 	if($cap==$_SESSION['captcha_code']){
 		echo "yes";
 	}
 	else{
 		echo "no";
 	}

 }
?>