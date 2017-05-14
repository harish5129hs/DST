

<?php
   
   $uid= $_GET['uid'];
   include("dbcon.php");
    
   if(! $conni ) { 
      die('Could not connect: ' . mysqli_error($conni)); 
   } 
 
   
  
   $sql = 'update user  set activated = "y" where userid='.$uid.'';
      
      
   
   
   $retval = mysqli_query( $conni,$sql ); 
    
   if(! $retval ) { 
      die('Could not enter data: ' . mysqli_error($conni)); 
      
   } 
    else
   {
     
			

     header("location:afteractivation.php");
   }
   mysqli_close($conni); 
?>

