<?php
include("dbcon.php");
//mysql_select_db("prof");
$sql = 'select * from `table 5` ;';
echo $sql;
$res= mysqli_query($conni,$sql );
if(!$res){
	die(mysqli_error($conni));
}

$r= mysqli_fetch_assoc($res);
echo "start<br>";
 $i=1;
while($r){


	 $url=$r['imgurl'];
	  echo "<h2>".$r['academician name']."</h2><br>";
                          
                          if((strtolower($url)!="not found")&&(strtolower($url)!="")){
                                                    
                         $image= '<img src="'.$r['imgurl']. '" width="130px" height="150px"class="img-rounded" >';
                          echo $image;
                         // echo $r['photo'];
                          $dest=getcwd();
                         // echo $dest;
                          $path = $dest.'/image/'.$r['sr no']. '.jpg';
                          //mysql_select_db("prof");
                          $var = copy($url, $path);
                          
                              if($var){

                                  $query1="UPDATE `table 5` SET `imgpresent`='y' where `sr no`='".$r['sr no']."'";
                                $re=mysqli_query($conni,$query1);
                                if(!$re){
                                  die("error".mysqli_error($conni));
                                }             

                              }
                                 
                                //header("Content-type: image/jpeg");
            

                                //$image = addslashes(file_get_contents($path)); //SQL Injection defence!
                                
                                          
                            
                            }
                           
                            echo $i."<br>";
                            $i=$i+1;


                            $r= mysqli_fetch_assoc($res);

}

?>