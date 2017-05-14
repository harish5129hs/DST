<?php

include("dbcon.php");
include("mydate.php");

$query = $_GET['query'];


//setting return array

$return = array();
$return['query'] = $query;
$questions = array();

$queryarr = explode(" ", $query );

$searchquery = "";
$newsearchquery = "";

for($i=0;$i<count($queryarr);$i++){
	$searchquery .= " or `heading` like '%$queryarr[$i]%' ";
}

for($i=0;$i<count($queryarr);$i++){
	 if($queryarr[$i]!=""){
		$newsearchquery .= " CASE WHEN `heading` like   '%$queryarr[$i]%' THEN 1 ELSE 0 END +";
	}
}

$newsqlquery = 	"SELECT * FROM (( SELECT (".$newsearchquery."+0 ) AS numMatches ,`Q_ID`, `ques_id`, `heading`, `user_id`, `user_name`, `tags`, `no_of_answers`, `no_of_upvotes`, `no_of_downvotes`, `date`, `timestamp` FROM `forum_question` ) AS additional) WHERE numMatches > 0 ORDER BY numMatches DESC";


$sqlquery = "SELECT `Q_ID`, `ques_id`, `heading`, `user_id`, `user_name`, `tags`, `no_of_answers`, `no_of_upvotes`, `no_of_downvotes`, `date`, `timestamp` FROM `forum_question` WHERE 0  ".$searchquery;

//echo $newsqlquery;


$res= mysqli_query($conn,$newsqlquery);
if(!$res){
	die("error in query ".mysqli_error($conn));
}
$total = mysqli_num_rows($res);

$r = mysqli_fetch_assoc($res);

while($r){
	$r['curdate'] = showdate($r['timestamp']);
	$r['tags'] = show_and_echo_tags($r['tags']);
	$ret = json_encode($r);
	array_push($questions,$ret);
	$r = mysqli_fetch_assoc($res);
}

$return['total'] = $total;
$return['questions']=$questions;

echo json_encode($return);
?>