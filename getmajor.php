<?php 
 $department =$_POST['department'];
 include("dbcon.php");

 $query1 ="select * from  skill where department = '$department' order by name";


  //mysql_select_db("prof");
 $result = mysqli_query($conni,$query1);


 $r = mysqli_fetch_assoc($result);

 while($r){
 	echo $r['name'];
 	$r = mysqli_fetch_assoc($result);
 	if($r)
 	echo "+";
 	 
 }          
?>
