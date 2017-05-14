<?php 
                include("dbcon.php");
				$query = "select * from `table 9`";

				 ////mysql_select_db("prof");
                
                
                 
                 

                $i = 52;
                while($i<=57){
                 $result = mysql_query($query,$conn);
                  if(!$result){
                 	die("erroe".mysqli_error($conni));
                 }
                 $r = mysqli_fetch_assoc($result);
                 $state = $r['COL '.$i.''];
                 $query1 ="select * from  state where statename = '$state'";


                
                 $resultid = mysql_query($query1,$conn);

  
                 $rid = mysqli_fetch_assoc($resultid);

                 $id = $rid['stateid'];
                 echo $id;
                     $r = mysqli_fetch_assoc($result);
                 while($r){
                 	
                 	$query2 = 'insert into university values( "'.$r["COL ".$i.""].'",null,'.$id.') ';
                 	echo $query2;
                 	echo "<br>";
                 	$result2 = mysql_query($query2,$conn);
                 	if(!$result2){
                 	die("erroe2".mysqli_error($conni));
                 	
                 }
                 $r = mysqli_fetch_assoc($result);	 
                 }
                 $i =$i+1;
             }

				?>