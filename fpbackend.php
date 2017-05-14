

<?php
   

   include("dbcon.php");
    
   if(! $conni ) { 
      die('Could not connect: ' . mysqli_error($conni)); 
   } 
 
   
   $email = mysqli_real_escape_string($conni,$_POST["email"]);
  
  
  
            
        $query = "select * from user where email = '$email'";
        echo $query."<br>";
         //mysql_select_db("prof"); 
		   $retval = mysqli_query( $conni, $query ); 
		    
		   if(! $retval ) { 
		      die('Could not enter data 2: ' . mysqli_error($conni)); 
		      
		   } 
		    else{


       $sql = 'Select * from id';
     //mysql_select_db("prof");
      $result = mysqli_query($conni,$sql);
    $row = mysqli_fetch_assoc($result);
    $num = $row["fp"];
    $num = $num+1;
    $inc = 'update id set fp = '.$num.';';
   
    mysqli_query($conni,$inc);






		    $r = mysqli_fetch_assoc($retval);
		    $uid = $r['userid'];
        $pass= $r['password'];
        $name= $r['first_name'];
        $lname= $r['last_name'];
		     echo $uid."<br>";	

         $nm= $name{0}.$name{1}.$name{2};
         $lm= $lname{0}.$lname{1};

         $ps=$num+33;

         $rid = "".$nm.$num.$lm.$ps;

         echo $rid;

         $inq = "insert into fptable value('','$uid','$rid')";
        $rt =  mysqli_query($conni,$inq);

         if(! $rt ) { 
          die('Could not enter data 2: ' . mysqli_error($conni)); 
          
       } 

			$to = $email;
			$subject = "Dst account recover password";
			$txt = "
                Dear ".$name."<br><br>You have requested for the password of your account<br><br>
			         Your recovery id   is : 
			          ".$rid."";
		
            echo $txt."<br>";
            $header = "From: noreply@example.com\r\n"; 
			$header.= "MIME-Version: 1.0\r\n"; 
			$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
			$header.= "X-Priority: 1\r\n"; 

			$er = mail($to,$subject,$txt,$header);
			echo $er;

   header("location:afterfp.php?uid=".$uid."");
   }

   mysqli_close($conni); 
?>

