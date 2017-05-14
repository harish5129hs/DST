<?php 

include("functions.php");
include("dbcon.php");



   
    $firstname=mysqli_real_escape_string($conni,$_POST['firstname']);
    $middlename=mysqli_real_escape_string($conni,$_POST['middlename']);
    $lastname=mysqli_real_escape_string($conni,$_POST['lastname']);
    $email=mysqli_real_escape_string($conni,$_POST['email']);
    $employer=mysqli_real_escape_string($conni,$_POST['employer']);
    $desi1=mysqli_real_escape_string($conni,$_POST['designation1']);
    $desi2=mysqli_real_escape_string($conni,$_POST['designation2']);
    $dep1=mysqli_real_escape_string($conni,$_POST['department1']);
    $dep2=mysqli_real_escape_string($conni,$_POST['department2']);

    if($desi1=='Other'||$desi1=='choose'){
    	$designation=$desi2;
    }else {
    	$designation=$desi1;
    }


    if($dep1=='Other'||$dep1=='choose'){
    	$department=$dep2;
    }else {
    	$department=$dep1;
    }


    //session variables for retreiving data in next page

    $_SESSION['teacher_firstname']=$firstname;
    $_SESSION['teacher_middlename']=$middlename;
    $_SESSION['teacher_lastname']=$lastname;
    $_SESSION['teacher_email']=$email;
    $_SESSION['teacher_employer']=$employer;
    $_SESSION['teacher_designation']=$designation;
    $_SESSION['teacher_department']=$department;



    //end session variables

    $check=0;
    if(isset($_SESSION['update']))
    $check=$_SESSION['update'];
    $up=0;
    if(isset($_SESSION['up']))
    $up=$_SESSION['up'];


    if($check==1){
       
       $query="UPDATE `faculty_personnel` SET `firstname`='".$firstname."',`middlename`='".$middlename."',`lastname`='".$lastname."',`email`='".$email."',`employer`='".$employer."',`designation`='".$designation."',`department`='".$department."' WHERE `emailcheck`='$username'";
        $result=mysqli_query($conni,$query);
     if(!$result){
     die("error".mysqli_error($conni));
     }
    }
     else {
    $query="INSERT INTO `faculty_personnel` values(DEFAULT,'".$firstname."','".$middlename."','".$lastname."','".$email."','".$employer."','".$designation."','".$department."','','','','','','".$username."') ";
    
    $result=mysqli_query($conni,$query);
     if(!$result){
     die("error".mysqli_error($conni));
     }
 }

$fidsql= "select * from faculty_personnel where emailcheck='$username'";
$result2=mysqli_query($conni,$fidsql);
     if(!$result2){
     die("error".mysqli_error($conni));
     }

 $r=mysqli_fetch_assoc($result2);
 
 $fid= $r['faculty_id'];  
 //echo $fid;  



    header("location:afterform.php?fid=".$fid."&up=".$up);
?>