<?php 
 $country =$_POST['country'];
 include("dbcon.php");

 $query1 ="select * from  country where countryname = '$country'";


  //mysql_select_db("prof");
                 $result = mysqli_query($conni,$query1);

  
                 $r = mysqli_fetch_assoc($result);

                 $id = $r['countryid'];

    $query2 ="select * from  state where countryid = $id order by statename desc";   
    
    $result = mysqli_query($conni,$query2);
  
                 $r = mysqli_fetch_assoc($result);
                 while($r){
                 	echo $r['statename'];
                 	$r = mysqli_fetch_assoc($result);
                 	if($r)
                 	echo "+";
                 	 
                 }          
?>
