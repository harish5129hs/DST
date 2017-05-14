<?php 

include("dbcon.php");
include("functions.php");

$usertype =mysqli_real_escape_string($conni,$_GET['select']);


$return =array();
$return['userid'] = $userid;
$return['usertype'] = $usertype;



$query1 ="UPDATE `user` set`usertype`='$usertype' WHERE `userid` = $userid";


$result = mysqli_query($conni,$query1);



echo json_encode($return);     

?>
