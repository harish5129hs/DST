<?php 
 $st =$_POST['state'];
 include("dbcon.php");

 $query1 ="select * from  state where statename = '$st'";


  //mysql_select_db("prof");
                 $result = mysqli_query($conni,$query1);

  
                 $r = mysqli_fetch_assoc($result);

                 $id = $r['stateid'];

    $query2 ="select * from  university where stateid = $id order by name desc";   
    
    $result = mysqli_query($conni,$query2);
                 echo "+";
                 $r = mysqli_fetch_assoc($result);
                 while($r){
                 	echo $r['name'];
                 	$r = mysqli_fetch_assoc($result);
                 	if($r)
                 	echo "+";
                 	 
                 }          
?>
