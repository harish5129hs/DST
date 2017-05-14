<?php 

 include("dbcon.php");
 $email =mysqli_real_escape_string($conni,$_POST['email']);
 $query1 ="select * from  user where email = '$email'";


  ////mysql_select_db("prof");
                 $result = mysqli_query($conni,$query1);

  
                 $r = mysqli_fetch_assoc($result);

                 if($r){
                    echo "yes";
                 	 
                 } 
                 else{
                    echo "no";
                 }         
                 
?>
