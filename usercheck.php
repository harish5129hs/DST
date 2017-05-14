<?php 

 include("dbcon.php");
 $email =mysqli_real_escape_string($conni,$_POST['username']);
 $query1 ="select * from  user where username = '$email'";


 $result = mysqli_query($conni,$query1);


 $r = mysqli_fetch_assoc($result);

 if($r){
    echo 1;
 	 
 } 
 else{
    echo 0;
 }         
                 
?>
