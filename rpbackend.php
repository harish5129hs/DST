

<?php
   

   include("dbcon.php");
    
   if(! $conn ) { 
      die('Could not connect: ' . mysqli_error($conni)); 
   } 
 
   
   $uid = mysqli_real_escape_string($conni,$_GET["uid"]);
  
$pass = mysqli_real_escape_string($conni,$_POST['pass']);  
  
            
        $query = "update user set password = '$pass' where userid = '$uid'";
        echo $query."<br>";
         //mysql_select_db("prof"); 
		   $retval = mysqli_query(  $conni, $query ); 
		    
		   if(! $retval ) { 
		      die('Could not enter data 2: ' . mysqli_error($conni)); 
		      
		   } 
		    else{


//echo "ok";
   header("location:afterrp.php");
   }

   mysqli_close($conni); 
?>

