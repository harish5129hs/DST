<?php error_reporting(0); ?>
<?php 
include("dbcon.php") ;
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
 $_SESSION['drop']="";
 $_SESSION['s']="";
 $_SESSION['searchtype'] ="";
}

if (isset($_POST['drop'])) {
 $type = $_POST['drop'];
 $_SESSION['drop'] = $type;
}

if (isset($_POST['s'])) {
 $searchinput = $_POST['s'];
 $_SESSION['s'] = $searchinput;
}
if (isset($_POST['searchtype'])) {
 $searchtype = $_POST['searchtype'];
 $_SESSION['searchtype'] = $searchtype;
}else{
  $searchtype="free";
  $_SESSION['searchtype'] = $searchtype;
}
$type = $_SESSION['drop'];
$searchinput =$_SESSION['s'];
$searchtype = $_SESSION['searchtype'];

?>
<!DOCTYPE html>


<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <title>project</title>  
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.autocomplete.js"></script>
  <script type="text/javascript">
   $(window).load(function() {
     $('#loadingdiv').hide();
   });


   function myfun(){
    var check1=document.getElementById('dd1');


    if(check1.value=="null")
    { 
      document.getElementById("show1").innerHTML="Please select search option";
      return false;
    }
  }


  function changefun(){

   removeOptionsAlternate(document.getElementById('state'));

   var x = document.getElementById("country").value;
   var y = document.getElementById("state");
   var option = document.createElement("option");
   option.text = "Select State";

   y.add(option);

   $.post("state.php",{country : x},
    function(result){

      var res = result.split("+");

      for (var i = res.length - 1; i >= 0; i--) {
       var x = document.getElementById("state");
       var option = document.createElement("option");
       option.text = res[i];

       x.add(option);
     };
   });
 }


 function removeOptionsAlternate(obj) {
  if (obj == null) return;
  if (obj.options == null) return;
  while (obj.options.length > 0) {
    obj.remove(0);
  }
}
function f(){

  var alumuni = document.getElementById("alumni").value;

  var orgtype = document.getElementById("org").value;
      //alert("hello again");
      var univ = document.getElementById("univ").value;
      //alert("hello again");
      var deptt = document.getElementById("deptt").value;
      //alert("hello again");
      var skill = document.getElementById("skill").value;
      //alert("hello again");
      var desg = document.getElementById("desig").value;
      //alert("hello again");
      var url="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput ;?>&almuni="+alumuni+"&orgtype="+orgtype+"&univ="+univ+"&deptt="+deptt+"&skill="+skill+"&desg="+desg;
      window.location = url;

    }

    function schangefun(){
      document.getElementById("university").innerHTML='';
      var x = document.getElementById("state").value;
      $.post("univ.php",{state : x},
        function(result){
          //alert(result);
          var res = result.split("+");
          for (var i = res.length - 1; i >= 0; i--) {
            if(res[i]!=" "){
             var ht = '<div class="radio"><label><input type ="radio"  name="univ" onchange="this.form.submit()" value="'+res[i]+'">'+res[i]+'</label></div>';
             document.getElementById("university").innerHTML+=ht;

           }
         };


       });
    }

    function viewfrofile(x){
      alert("hello");
      var url="profile.php?id="+x;
      window.location = url;
    }

    $(document).ready(function(){

      $('#s1').autocomplete({
        serviceUrl: 'searchsuggestions.php',
        params:{
          'type':function(){
            return $('#dd1').val();
          }
        }

      });

    });


  </script>

  <style type="text/css">
    #head{
      font-size: 150%;
    }

    #loading{
      position: absolute;
      top:300px;
      z-index: 100;
    }
    #loadingdiv{
     width: 100%;
     height: 100%;
     top: 0px;
     left: 0px;
     position: fixed;
     display: block;
     opacity: 0.7;
     background-color: #f5f5f5;
     z-index: 99;
     text-align: center;
   }
 </style>
</head>

<body>
  <div class="text-center" id="loadingdiv">  <img id="loading" src="images/load1.gif" alt="Loading..." />  </div>
  <div id="alldata">
    <div id="options">
      <nav class="navbar navbar-inverse navbar-fixed-top options ">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">DST</a>
          </div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="search.php">Home</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="#">About</a></li> 
            <li><a href="#">Help</a></li>
            <li><a href="forum/forum_home.php">forum </a></li> 
          </ul>
          <?php 


          if(!$log){

            ?>

            <ul class="nav navbar-nav navbar-right">
              <li><a href="signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
            <?php 
          }
          else{
            ?>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="afterlogin.php"><span class="glyphicon glyphicon-user"></span> Hello <?php echo $name?> </a></li>
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>

            <?php 
          }
          ?>
        </div>
      </nav>
    </div>  <br><br>  

    <div id="header">
      <br>
      <div class="row">
        <div class="col-md-4">
          <div class="row">
            <div class ="col-md-1"></div>
            <div class="col-md-11"><img src="images/dstlogo.png"></div>

          </div>
        </div>

        <div class="col-md-5 text-center"><img src ="images/flag3.png" height="75" width"75"><br><h2 class=""> Indian Origin Academicians Database</h2></div>
        <div class="col-md-3">

         <div class="row">
           <div class="col-md-3"></div>
           <div class="col-md-9">
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="images/pec-logo.png">
            <strong> <h4 class="whitebg">PEC University Of Technology</h4></strong>
          </div>
        </div>

      </div>
      
    </div>


  </div>


  <div id="wrapper">


   <div id="search" class="fullwidth sell"> 

     <div class="row s">
       <div class="col-md-4">
         <ul class="list-inline">
          <li ><a href="filternew.php?drop=academician%20name&s=&fl=1&facultytype=Faculty"><button  class="btn btn-info"  >Faculty list</button></a></li>
          <li><a href="filternew.php?drop=academician%20name&s=&fl=1&facultytype=PhD Student"><button  class="btn btn-info"  >Phd Scholar List</button></a></li>
        </ul>
      </div>
      <div class ="col-md-8">

        <form class="form-search" onsubmit="return myfun();" method="POST" id="s" action="searchresultfilter.php?i=1">

          <div class="input-append">
            <div class="row">
              <div class="col-md-4">
                <select class="form-control searchbox" onchange="GetSelectedTextValue(this)" id="dd1" name="drop" >
                  <option value="null">Select Search Option</option>
                  <option value="academician name"  <?php if($type=="academician name") echo 'selected'?>>Academician Name</option>
                  <option value="which university/college" <?php if($type=="which university/college") echo 'selected'?>>University Name</option>
                  <option value="designation"  <?php if($type=="designation") echo 'selected'?>>Designation</option>
                  <option value="specialization"  <?php if($type=="specialization") echo 'selected'?>>Specialization</option>
                  <option value="country name"  <?php if($type=="country name") echo 'selected'?>>Country name</option>
                  <option value="department name"  <?php if($type=="department name") echo 'selected'?>>Department</option>
                </select>
                <script type="text/javascript">
                 function GetSelectedTextValue(dd1) {
                   var selectedText = dd1.options[dd1.selectedIndex].innerHTML;
                   var Value = dd1.value;

                   document.getElementById("s1").placeholder = "Type "+Value;
                 }

               </script>
               <br>  <div id="show1"></div>
             </div>

             <div class="col-md-5" id="searchbar">

              <input type="text" id="s1" class="input-medium search-query form-control searchbox" name="s" value="<?php echo $searchinput; ?>" required>
              <div class="radbtns" >
               <label class="radio-inline"><input type="radio" name="searchtype" value="free" <?php if($searchtype=="free") echo 'checked = "checked"'?> >Free Search</label>
               <label class="radio-inline"><input type="radio" name="searchtype" value="exact" <?php if($searchtype=="exact") echo 'checked = "checked"'?>>Exact Search</label>
             </div>   
           </div>
           <div class="col-md-3">
            <input type="submit" class="btn btn-success" value=" Search"></input>
          </div>

        </div>
      </div>
    </form>
  </div>

</div>
</div>


<div id="main">

  <div id="content">
    <div class="innertube">

     <div id="namewise">
       <br />

       <div class="row">
         Search Names starting with:
         <div class=n>     <a href="searchresultfilter.php?n=A">A</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=B">B</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=C">C</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=D">D</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=E">E</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=F">F</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=G">G</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=H">H</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=I">I</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=J">J</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=K">K</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=L">L</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=M">M</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=N">N</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=O">O</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=P">P</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=Q">Q</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=R">R</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=S">S</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=T">T</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=U">U</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=V">V</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=W">W</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=X">X</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=Y">Y</a> </div>
         <div class=n>     <a href="searchresultfilter.php?n=Z">Z</a> </div>

       </div>
     </div>
     <br />
     <h4>Search Results:</h4>


     <?php 
     $page = 1;
     if (isset($_GET['i'])) {
       $page = $_GET['i'];
     }
     $searchinput = mysqli_real_escape_string($conni,$searchinput); 

                         //mysql_select_db("prof");

                         //------------------------alias
     if($type=="department name"){

      $aliasquery ="select * from `alias table` where name= '$searchinput' ;" ;
      $alresult = mysqli_query($conni,$aliasquery);
      if(!$alresult){
        die("error".mysqli_error($conni));
      }

      $r= mysqli_fetch_assoc($alresult);
      if($r){
        $searchinput = $r['org_name'];
      }       
    }
                        //------------------------------------------------

    $searchinput = mysqli_real_escape_string($conni,$searchinput); 

    $searchquery= "";
    $searcharr= explode(" ", $searchinput);

    if($searchtype=="free"){
      for ($i=0; $i <count($searcharr) ; $i++) {

        $searcharr2 = explode(",", $searcharr[$i]);

        for ($j=0; $j <count($searcharr2) ; $j++) { 
          $searchquery= $searchquery." and `$type` LIKE '%".$searcharr2[$j]."%'  ";
        }

      }
    }
    if($searchtype=="exact"){
      for ($i=0; $i <count($searcharr) ; $i++) {

        $searcharr2 = explode(",", $searcharr[$i]);

        for ($j=0; $j <count($searcharr2) ; $j++) { 
          $searchquery= $searchquery." and `$type` LIKE '".$searcharr2[$j]."'  ";
        }

      }
    }

    if($type=="designation"&&$searchinput=="Graduate Student"){
      $searchquery .= "or `$type` like '%phd student%'" ;
    } 

    //echo $searchquery;

                          //mysql_select_db("prof");
    $alpha ="";
    if(isset($_GET['n'])&&$_GET['n']!=""){
      $alpha=$_GET['n'];
      $sqlquery="SELECT * FROM `table 5` WHERE 1 ".$searchquery." and `academician name` like '".$alpha."%'ORDER BY `academician name` ";
    }else{
     $sqlquery= "SELECT * FROM `table 5` WHERE 1 ".$searchquery." ORDER BY `academician name` ";
   }
                         //  echo $sqlquery;
   $result = mysqli_query($conni,$sqlquery);

   if(!$result){
    die("error".mysqli_error($conni));
  }
  $x = mysqli_num_rows ( $result );
  echo "Total ".$x."  results retrieved .<br><br>";

  $no_pages=0;
  if($x==0){
    $no_pages=0;
  }else{

   $no_page = $x/10;
   if($x%10!=0){
     $no_pages= (int)$no_page+1;
   }
   else{
    $no_pages=$no_page;
  }
}

?>
<div class="text-center">
 <ul class="pagination ">
   <?php 
   $l=$page/10;
   $fp = (int)$l +1;


   if($x!=0){

     if($page==1) {
      echo "<li class='active'><a href='searchresultfilter.php?i=1&n=$alpha'>1</a></li>";
    } 
    else {             
     echo "<li><a href='searchresultfilter.php?i=1&n=$alpha'>1</a></li>";
   }

   if($page!=1)
     echo "<li><a href='searchresultfilter.php?i=".($page-10)."&n=$alpha'>Previous</a></li>";



   $s=$page;
   for ($i=$fp; $i <$no_pages ; $i++) { 
    if(($s<($page+110))&&$i!=1){
     if($i==$fp) {
      echo "<li class='active'><a href='searchresultfilter.php?i=".$s."&n=$alpha'>$i</a></li>";
    } 
    else {             
     echo "<li><a href='searchresultfilter.php?i=".$s."&n=$alpha'>$i</a></li>";
   }
 }
 $s = $s+10; 
}


if($no_pages>1&&$fp!=$no_pages)
  echo "<li><a href='searchresultfilter.php?i=".($page+10)."&n=$alpha'>Next</a></li>";

if($no_pages>1){
 if($s==$page) {
  echo "<li class='active'><a href='searchresultfilter.php?i=".$s."&n=$alpha'>Last Page $i</a></li>";
} 
else {             
 echo "<li><a href='searchresultfilter.php?i=".$s."&n=$alpha'>Last Page $i</a></li>";
}
}
}
?>

</ul>
</div>



<?php    


$lm = $page;


$end=  $page+10;   
for ($j=1; $j <=$page ; $j++) { 
  $r = mysqli_fetch_assoc($result);
}  
while($r){





 if($lm<$end){

   echo "<div class='tbox'>";
   echo "<div class='row nomargin nopadding'>";

   echo " <a href='profile.php?id=".$r['sr no']."'' target = '_blank' >";
   echo "<div class='col-md-3 borderleft text-center'>";


   $url=$r['imgurl'];

                         //  if((strtolower($url)!="not found")&&(strtolower($url)!="")&&empty($r['photo'])){
                         // $url=$r['imgurl'];
                         // $image= '<img src="'.$r['imgurl']. '" width="130px" height="150px"class="img-rounded" >';
                         //  echo $image;
                         //  echo $r['photo'];
                         //  $dest=getcwd();
                         //  $path = $dest.'\image\\'.$r['sr no']. '.jpeg';
                         //  //mysql_select_db("prof");


                         //      copy($url, $path);

                         //        //header("Content-type: image/jpeg");


                         //        $image = addslashes(file_get_contents($path)); //SQL Injection defence!

                         //        $query1="UPDATE `table 5` SET `photo`='".$image."' where `sr no`='".$r['sr no']."'";
                         //        $re=mysqli_query($conni,$query1);
                         //        if(!$re){
                         //          die("error".mysqli_error($conni));
                         //        }                       

                         //    }


   if($r['imgpresent']=='y'){
    $path='image/'.$r['sr no'].'.jpg';
    $image= '<img src="'. $path.'" width="130px" height="150px" class="img-rounded">';
    echo $image;
  }
  else{
    $path='images/default.jpg';
    $image= '<img src="'. $path.'" width="130px" height="150px" class="img-rounded">';
    echo $image;
  }



  echo "</div>";
  echo "</a>";
  echo "<div class='col-md-9'>"; 
  echo " <a class='nolink' href='profile.php?id=".$r['sr no']."'' target = '_blank'>";  echo"<h5><strong>"; echo"   <span class='glyphicon glyphicon-user'></span> "; echo $r['academician name']."  </strong> &nbsp&nbsp&nbsp&nbsp |"; echo "</a>";
  echo "  &nbsp <span class='glyphicon glyphicon-briefcase'></span> "; echo $r['designation'] ;
  echo"</h5>";
  echo"<h5>";   echo "<span class='glyphicon glyphicon-book'></span> "; echo $r['department name'] ;echo"</h5>"; 
  echo"<h5>";  echo "<span class='glyphicon glyphicon-education'></span> "; echo $r['which university/college'] ; echo"</h5>";
  echo " <h5 ><span class='glyphicon glyphicon-home'></span> ";  echo $r['country name']; echo "</h5>";
  echo"<h5>";
  if(strtolower($r['email id'])!="not found"){
    $outer = explode(" ", $r['email id']);

    for ($i=0; $i <count($outer) ; $i++) { 


      $inner = explode(",",$outer[$i]);
      for ($j=0; $j <count($inner) ; $j++) { 


        $inner2 = explode(PHP_EOL,$inner[$j]);
        for ($k=0; $k <count($inner2) ; $k++) { 


          if(($inner2[$k]!=" ")&&($inner2[$k]!="")){
           echo "<span class='glyphicon glyphicon-envelope'></span> "; echo $inner2[$k] ; echo" &nbsp&nbsp&nbsp&nbsp ";if($k>0){echo "<br>";}
         }
       }
     }
   }
 }




 if($r['mobile no']!="not found"){
   echo "|&nbsp&nbsp<span class='glyphicon glyphicon-earphone'></span> "; echo $r['mobile no'] ; echo "</h5>";
 }  

 ?>



 <h6> <a href="profile.php?id=<?php echo $r['sr no'] ;?>" target = "_blank"> <button  class="btn btn-info"  >View Profile</button></a></h6>
 <?php 
 echo "</div>";
 echo"</div>";
 echo"</div>";

 echo "<br><br><br>";

}

$r = mysqli_fetch_assoc($result);
$lm= $lm+1;

}




?>
<div class="text-center">
 <ul class="pagination ">
   <?php 
   $l=$page/10;
   $fp = (int)$l +1;


   if($x!=0){

     if($page==1) {
      echo "<li class='active'><a href='searchresultfilter.php?i=1&n=$alpha'>1</a></li>";
    } 
    else {             
     echo "<li><a href='searchresultfilter.php?i=1&n=$alpha'>1</a></li>";
   }

   if($page!=1)
     echo "<li><a href='searchresultfilter.php?i=".($page-10)."&n=$alpha'>Previous</a></li>";



   $s=$page;
   for ($i=$fp; $i <$no_pages ; $i++) { 
    if(($s<($page+110))&&$i!=1){
     if($i==$fp) {
      echo "<li class='active'><a href='searchresultfilter.php?i=".$s."&n=$alpha'>$i</a></li>";
    } 
    else {             
     echo "<li><a href='searchresultfilter.php?i=".$s."&n=$alpha'>$i</a></li>";
   }
 }
 $s = $s+10; 
}


if($no_pages>1&&$fp!=$no_pages)
  echo "<li><a href='searchresultfilter.php?i=".($page+10)."&n=$alpha'>Next</a></li>";

if($no_pages>1){
 if($s==$page) {
  echo "<li class='active'><a href='searchresultfilter.php?i=".$s."&n=$alpha'>Last Page $i</a></li>";
} 
else {             
 echo "<li><a href='searchresultfilter.php?i=".$s."&n=$alpha'>Last Page $i</a></li>";
}
}
}
?>

</ul>
</div>


</div>
</div>
</div>


<nav id="nav" >
  <br><br> <br>
  <br>
  <form action="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput ;?>&i=1" method="post">
    <br><br><br> 



    <h4 class="text-center">Filters</h3>


      <div class=" outer2">







       <div class="outer1">
         <div class="panel panel-primary">
           <div class="panel-heading ">Alumni University/Institution <a  class="textright" data-toggle="collapse" href="#albox" ><span class="glyphicon glyphicon-chevron-down"></span></a></div>
           <div id="albox" class="panel-collapse collapse in">
             <div class="panel-body filterbox" >
              <div class="innerfilter" >
                <div>


                  <?php 

                  $query = "select * from indianuniversity " ;

         //mysql_select_db("prof");
                  $result = mysqli_query($conni,$query);

                  $r = mysqli_fetch_assoc($result);
                  while($r){
                    echo "<div class='radio'><label>";
                    echo '<input type ="radio" id="alumni" name="alumni" onchange="this.form.submit()" value="'.$r['name'].'">'.$r['name'].'';
                    echo "</label></div>"; 
                    $r = mysqli_fetch_assoc($result);
                  }

                  ?>
                </div>       
              </div>
            </div>
          </div>                     

        </div>  
      </div>

      <?php 
      if($type!="which university/college"){
        ?>      
        <div class="outer1 ">



         <div class="panel panel-primary">
           <div class="panel-heading ">Organisation type<a  class="textright" data-toggle="collapse" href="#orgbox" ><span class="glyphicon glyphicon-chevron-down"></span></a></div>
           <div id="orgbox" class="panel-collapse collapse in">
             <div class="panel-body filterbox">
              <div class="innerfilter" style="height:90px">
                <div>
                  <div class='radio'><label><input type="radio" id="org" name="org" onchange="this.form.submit()" value="university">University</label></div>
                  <div class='radio'><label><input type="radio" id="org"  name="org" onchange="this.form.submit()" value="institute">Institute</label></div>
                </div>


              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-primary">
           <div class="panel-heading ">Academician type<a  class="textright" data-toggle="collapse" href="#orgbox" ><span class="glyphicon glyphicon-chevron-down"></span></a></div>
           <div id="orgbox" class="panel-collapse collapse in">
             <div class="panel-body filterbox">
              <div class="innerfilter" style="height:90px">
                <div>
                  <div class='radio'><label><input type="radio" id="org" name="acadtype" onchange="this.form.submit()" value="Faculty">Faculty</label></div>
                  <div class='radio'><label><input type="radio" id="org"  name="acadtype" onchange="this.form.submit()" value="PHD Student">PHD Student</label></div>
                </div>
                
                
              </div>
            </div>
          </div>
        </div>



      </div>    
      <?php
    }
    ?>        




    <?php 
    if($type!="which university/college"){
      ?>          

      <br> 
      <div class="outer1 ">
        <div class="panel panel-primary">
         <div class="panel-heading ">
          Country <a  class="textright" data-toggle="collapse" href="#cbox" ><span class="glyphicon glyphicon-chevron-down"></span></a></div>
          <div id="cbox" class="panel-collapse collapse in">
            <div class="panel-body list">
              <select class="form-control" onchange="changefun();" id="country">
               <option value="">Select Country</option>
               <?php 

               $query = "select * from country order by countryname" ;

         //mysql_select_db("prof");
               $result = mysqli_query($conni,$query);

               $r = mysqli_fetch_assoc($result);
               while($r){
                echo '<option value="'.$r[countryname].'">'.$r[countryname].'</option>';
                $r = mysqli_fetch_assoc($result);
              }

              ?>

            </select>
          </div>
        </div>
      </div>
    </div>




    <div class="outer1 ">
      <div class="panel panel-primary">
       <div class="panel-heading ">
        State <a  class="textright" data-toggle="collapse" href="#sbox" ><span class="glyphicon glyphicon-chevron-down"></span></a></div>
        <div id="sbox" class="panel-collapse collapse in">
          <div class="panel-body list">


            <select class="form-control" id="state" onchange="schangefun();">
              <option value="">Select State</option>

            </select>
          </div>
        </div>
      </div>
    </div>



    <div class="outer1 ">
      <div class="panel panel-primary">
       <div class="panel-heading ">
        University <a  class="textright" data-toggle="collapse" href="#ubox" ><span class="glyphicon glyphicon-chevron-down"></span></a></div>
        <div id="ubox" class="panel-collapse collapse in">
          <div class="panel-body filterbox">
            <div class="innerfilter">
              <div id="university">


              </div>   
            </div>        
          </div>
        </div>
      </div>
    </div>
    <br>

    <?php
  }
  ?>

  <?php 
  if(($type!="department name")&&($type!="specialization")){
    ?> 

    <div class="outer1">
     <div class="panel panel-primary">
       <div class="panel-heading ">Department <a  class="textright" data-toggle="collapse" href="#depbox" ><span class="glyphicon glyphicon-chevron-down"></span></a></div>
       <div id="depbox" class="panel-collapse collapse in">

         <div class="panel-body filterbox" >
          <div class="innerfilter" >
            <div>

             <?php 


             $departmentsqlquery= "SELECT distinct department FROM `table 5` WHERE 1 ".$searchquery." order by department";
         //mysql_select_db("prof");
             $result = mysqli_query($conni,$departmentsqlquery);
             if(!$result){
              die("erroe".mysqli_error($conni));
            }

            $r = mysqli_fetch_assoc($result);
            while($r){
              echo "<div class='radio'><label>";
              echo '<input type ="radio" id="deptt" name="deptt" onchange="this.form.submit()" value="'.$r['department'].'">'.$r['department'].'';
              echo "</label></div>";
              $r = mysqli_fetch_assoc($result);
            }

            ?>           </div>       
          </div>
        </div>
      </div>  
    </div>                   

  </div>  
  <?php
}
?>

<?php 
if($type!="specialization"){
  ?> 


  <div class="outer1">
   <div class="panel panel-primary">
     <div class="panel-heading ">Specialization <a  class="textright" data-toggle="collapse" href="#filterbox" ><span class="glyphicon glyphicon-chevron-down"></span></a></div>
     <div id="spbox" class="panel-collapse collapse in">
       <div class="panel-body filterbox" >
        <div class="innerfilter" >
          <div>

            <?php 

            $query = "select * from skill where department in (".$departmentsqlquery.")";

         //mysql_select_db("prof");
            $result = mysqli_query($conni,$query);

            $r = mysqli_fetch_assoc($result);
            while($r){
              echo "<div class='radio'><label>";
              echo '<input type ="radio" id="skill" name="skill" onchange="this.form.submit()" value="'.$r['name'].'">'.$r['name'].'';
              echo "</label></div>";
              $r = mysqli_fetch_assoc($result);
            }

            ?>
          </div>       
        </div>
      </div>
    </div>  
  </div>                  

</div>  

<?php
}
?>

<?php 
if($type!="designation"){
  ?> 

  <div class="outer1 ">



   <div class="panel panel-primary">
     <div class="panel-heading ">Designation<a  class="textright" data-toggle="collapse" href="#dsbox" ><span class="glyphicon glyphicon-chevron-down"></span></a></div>
     <div id="dsbox" class="panel-collapse collapse in">
       <div class="panel-body filterbox">
        <div class="innerfilter">
          <div>
            <?php 

            $sqlquery= "SELECT distinct designation FROM `table 5` WHERE 1  ".$searchquery." order by designation";
         //mysql_select_db("prof");
            $result = mysqli_query($conni,$sqlquery);
            if(!$result){
              die("erroe".mysqli_error($conni));
            }

            $r = mysqli_fetch_assoc($result);
            while($r){
              echo "<div class='radio'><label>";
              echo '<input type ="radio" id="desig" name="desig" onchange="this.form.submit()" value="'.$r['designation'].'">'.$r['designation'].'';
              echo "</label></div>";
              $r = mysqli_fetch_assoc($result);
            }

            ?>  

          </div>


        </div>
      </div>
    </div>



  </div>    



</div>
<?php
}
?>
</form>
</nav>

</div>
<br>
<br>
<br>

<footer id="footer">
  <div class="innertube">
    <p>PEC</p>
  </div>
</footer>
</div>
</body>
</html>
