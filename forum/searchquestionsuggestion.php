<?php 

include("dbcon.php");
$query='';
if(isset($_GET['query'])){
  $query = mysqli_real_escape_string($conni,$_GET['query']);
}

$reply['query']=$query;
$reply['suggestions']=array();
$reply['data']=array();




//setting  up query
$queryarr = explode(" ", $query );

$newsearchquery = "";

for($i=0;$i<count($queryarr);$i++){
  if($queryarr[$i]!=""){
    $newsearchquery .= " CASE WHEN `heading` like   '%$queryarr[$i]%' THEN 1 ELSE 0 END +";
  }
}


$newsqlquery =  "SELECT * FROM (( SELECT (".$newsearchquery."+0 ) AS numMatches ,`Q_ID`, `ques_id`, `heading` FROM `forum_question` ) AS additional) WHERE numMatches > 0 ORDER BY numMatches DESC limit 8";

 
$res = mysqli_query($conn,$newsqlquery);
if(!$res){
  die("error".mysqli_error($conn));
}

$r= mysqli_fetch_assoc($res);
while ($r) {
  array_push($reply['suggestions'] , $r['heading']);
  array_push($reply['data'] , 'id');
  $r= mysqli_fetch_assoc($res);
}

echo json_encode($reply);

?>