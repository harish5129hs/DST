<?php 

include("dbcon.php");
$search='';
if(isset($_GET['query'])){
  $search = mysqli_real_escape_string($conni,$_GET['query']);
}

$reply['query']=$search;
$reply['suggestions']=array();
$reply['data']=array();




  $query = "select  * from `tagslist` where `tag` like '$search%' limit  8";
  // echo $query;  
  $res = mysqli_query($conni,$query);
  if(!$res){
    die("error".mysqli_error($conni));
  }

  $r= mysqli_fetch_assoc($res);
  while ($r) {
    array_push($reply['suggestions'] , $r["tag"]);
    array_push($reply['data'] , 'id');
    $r= mysqli_fetch_assoc($res);
  }

echo json_encode($reply);

?>