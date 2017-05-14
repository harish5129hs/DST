<?php
include("dbcon.php");
include("mydate.php");
$type = $_GET['type'];
$id=$_GET['id'];
$count = $_GET['count'];

$return =  array();
$return['type']=$type;
$return['id']=$id;
$sql = "select * from forum_comment  where A_ID='$id' order by timestamp desc";
$res = mysqli_query($conn,$sql);
if(!$res){
	die("error ".mysqli_error($conn));
}

$total = mysqli_num_rows($res);
for ($j=0; $j<$count ; $j++) { 
$r = mysqli_fetch_assoc($res);
}  

$comments = array();
$len =0;
for ($j=0; $j<=7 ; $j++) { 
$r = mysqli_fetch_assoc($res);
if($r){
$r['curdate'] = showdate($r['timestamp']);
$p= json_encode($r); 
array_push($comments, $p);
$len++;
}
} 
$return['replies']=$comments;
$return['length']=$len;
$return['total']=$total;
echo json_encode($return);



?>