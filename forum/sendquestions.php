<?php 
include("dbcon.php");
include ('mydate.php');
include("../functions.php");
$type="";
if(isset($_GET['type'])){
	$type = $_GET['type'];
}

$count = 0;
if(isset($_GET['count'])){
	$count = $_GET['count'];
}
//echo $count;
//setting return object
$return = array();
$return['type']=$type;
$questions=array();

if($type=="all"){
	$showcat = "All categories/tags";
	$sql = "SELECT `Q_ID`, `ques_id`, `heading`, `user_id`,`user_name`, `tags`, `no_of_answers`, `no_of_upvotes`, `no_of_downvotes`, `date`, `timestamp` FROM `forum_question` ";
}

if($type=="new"){
	$showcat = "New Questions";
	$sql = "SELECT `Q_ID`, `ques_id`, `heading`, `user_id`,`user_name`, `tags`, `no_of_answers`, `no_of_upvotes`, `no_of_downvotes`, `date`, `timestamp` FROM `forum_question` order by timestamp desc";
}


if($type=="top"){
	$showcat = "Top Rated Questions";
	$sql = "SELECT `Q_ID`, `ques_id`, `heading`, `user_id`,`user_name`, `tags`, `no_of_answers`, `no_of_upvotes`, `no_of_downvotes`, `date`, `timestamp` FROM `forum_question` order by no_of_upvotes - no_of_downvotes desc";
}

if($type=="unread"){
	$showcat = "Questions Without Responses";
	$sql = "SELECT `Q_ID`, `ques_id`, `heading`, `user_id`, `user_name`,`tags`, `no_of_answers`, `no_of_upvotes`, `no_of_downvotes`, `date`, `timestamp` FROM `forum_question` where no_of_answers=0 order by timestamp desc";
}


if($type=="myquestions"){
	$showcat = "Your Questions ";
	$sql = "SELECT `Q_ID`, `ques_id`, `heading`, `user_id`, `user_name`,`tags`, `no_of_answers`, `no_of_upvotes`, `no_of_downvotes`, `date`, `timestamp` FROM `forum_question` where `user_id` = $userid order by timestamp desc";
}



$res= mysqli_query($conn,$sql);

$total = mysqli_num_rows($res);
//wasting strating rows
for ($j=0; $j<$count ; $j++) { 
	$r = mysqli_fetch_assoc($res);
}

$len=0;
//sending 25 questions
for($i=0;$i<25;$i++){
	$r = mysqli_fetch_assoc($res);
	if($r){
		$r['curdate'] = showdate($r['timestamp']);
		$r['tags'] = show_and_echo_tags($r['tags']);
		$ret = json_encode($r);
		array_push($questions,$ret);
		$len++;
	}
}

$return['showcat']=$showcat;
$return['number_of_questions']=$len;
$return['questions']=$questions;
$return['total']=$total;
$return['count']=(int)$count;

echo json_encode($return);
?>
