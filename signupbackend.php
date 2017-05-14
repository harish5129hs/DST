

<?php
   

   include("dbcon.php");
    
   
 
   $fname = $_POST["First_name"];
   $lname = $_POST["Last_name"];
   $pass = $_POST["pass"];

   $email = $_POST["Email_id"];
  
   //$sql = 'INSERT INTO user  
     // VALUES ( "", "'.$fname.'", "'.$lname.'","'.$pass.'","'.$email.'","n")';
      
   if(!($stmt = mysqli_prepare($conni , "insert into user values(DEFAULT,?,?,?,?,'n','')"))){
    die("Prepare failed:" . mysqli_error($conni));
  }
  if(!(mysqli_stmt_bind_param($stmt,'ssss',$fname,$lname,$pass,$email))){
     die("Binding failed:" . mysqli_error($conni));
  }
  if (!mysqli_stmt_execute($stmt)) {
    die("Execution failed:" . mysqli_error($conni));
  } 
  else{
            
        $query = "select * from user where email = '$email'";
        echo $query."<br>";
         //mysql_select_db("prof"); 
		   $retval = mysqli_query( $conni,$query ); 
		    
		   if(! $retval ) { 
		      die('Could not enter data 2: ' . mysqli_error($conni)); 
		      
		   } 
		    else{

		    $r = mysqli_fetch_assoc($retval);
		    $uid = $r['userid'];
		     echo $uid."<br>";	

			$to = $email;
			$subject = "DST Account Activation";
			$txt = "You have successfully registered <br>
			         Your activation link is :<br>
			           http://localhost:5000/xampp/firstfiles/pro1/activate.php?uid=".$uid."";
			
            echo $txt."<br>";
            $header = "From: noreply@dst.com\r\n"; 
			$header.= "MIME-Version: 1.0\r\n"; 
			$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
			$header.= "X-Priority: 1\r\n"; 

			$er = mail($to,$subject,$txt,$header);
			echo $er;

   header("location:aftersignup.php?uid=".$uid."");
   }
   }
   mysqli_close($conni); 
?>

