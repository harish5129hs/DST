<?php
include("dbcon.php");
    
   
 
$type = $_POST["type"];
$return = array();
$return['type'] = $type;
$return['error']=0;
  
if($type=="question"){

  $id = $_POST['quesid'];
  $question = $_POST['question'];
  $heading=$_POST['heading'];


  $return['question']=$question;
  $return['id']=$id;
  $return['heading']=$heading;

  $query = "UPDATE `forum_question` SET `heading`=?,`question`=? WHERE `Q_ID` = $id ";
 
  if(!($stmt = mysqli_prepare($conni , $query))){
    die("Prepare failed:" . mysqli_error($conni));
    $return['error']=1;
  }
  if(!(mysqli_stmt_bind_param($stmt,'ss',$heading,$question))){
    die("Binding failed:" . mysqli_error($conni));
    $return['error']=1;
  }
  if (!mysqli_stmt_execute($stmt)) {
    die("Execution failed:" . mysqli_error($conni));
    $return['error']=1;
  } 

}
if($type=="answer"){
  
  $id = $_POST['ansid'];
  $answer = $_POST['answer'];
  


  $return['answer']=$answer;
  $return['id']=$id;
  

  $query = "UPDATE `forum_answer` SET `answer`=? WHERE `A_ID` = $id ";
 
  if(!($stmt = mysqli_prepare($conni , $query))){
    die("Prepare failed:" . mysqli_error($conni));
    $return['error']=1;
  }
  if(!(mysqli_stmt_bind_param($stmt,'s',$answer))){
    die("Binding failed:" . mysqli_error($conni));
    $return['error']=1;
  }
  if (!mysqli_stmt_execute($stmt)) {
    die("Execution failed:" . mysqli_error($conni));
    $return['error']=1;
  } 

}
  
echo json_encode($return);
?>

