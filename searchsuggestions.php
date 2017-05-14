<?php 

include("dbcon.php");
$search='';
$type='';
if(isset($_GET['query'])){
  $search = mysqli_real_escape_string($conni,$_GET['query']);
}
if(isset($_GET['type'])){
  $type = mysqli_real_escape_string($conni,$_GET['type']);
}

$reply['query']=$search;
$reply['suggestions']=array();
$reply['data']=array();


if($type!=''){

  $query = "select distinct `$type` from `table 5` where `$type` like '%$search%' limit 7 ";
// echo $query;  
  $res = mysqli_query($conni,$query);
  if(!$res){
    die("error".mysqli_error($conni));
  }

  $r= mysqli_fetch_assoc($res);
  while ($r) {
    array_push($reply['suggestions'] , $r[$type]);
    array_push($reply['data'] , 'id');
    $r= mysqli_fetch_assoc($res);
  }
}
echo json_encode($reply);

?>