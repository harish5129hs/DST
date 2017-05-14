<?php 
include("dbcon.php");
include ('mydate.php');
include("../functions.php");
$type="";
if(isset($_GET['type'])){
	$type = $_GET['type'];
}

$quesid = "";
if(isset($_GET['quesid'])){
	$quesid = $_GET['quesid'];
}

$answerid = "";
if(isset($_GET['answerid'])){
	$answerid = $_GET['answerid'];
}


$return = array();
$return['type']=$type;
$return['quesid']=$quesid;
$return['answerid']=$answerid;

if($type=="question"){
	$sql = "SELECT `Q_ID`, `ques_id`, `heading` , `question` FROM `forum_question` WHERE `Q_ID` = $quesid ";
	$res= mysqli_query($conn,$sql);
	if(!$res){
		die(mysqli_error($conn));
	}
	$r = mysqli_fetch_assoc($res);

	$return['heading'] = $r['heading'];
	$return['question'] = $r['question'];


}

if($type=="answer"){
	$sql = "SELECT `A_ID`, `ans_id` , `answer` FROM `forum_answer` WHERE `A_ID` = $answerid ";
	$res= mysqli_query($conn,$sql);
	if(!$res){
		die(mysqli_error($conn));
	}
	$r = mysqli_fetch_assoc($res);

	$return['answer'] = $r['answer'];


}





echo json_encode($return);
?>
