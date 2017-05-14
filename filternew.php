<?php error_reporting(0); ?>
<?php 
include("dbcon.php") ;
include("functions.php");


$type = $_GET['drop'];
$searchinput =$_GET['s'];
$searchtype="free";
$facultytype = "";
if(isset($_GET['searchtype'])){
  $searchtype = $_GET['searchtype'];
} 

if(isset($_GET['facultytype'])){
  $facultytype = $_GET['facultytype'];
}


$alumni = "";
$orgtype = "";
$univ  = "";
$deptt  = "";
$skill = "";
$desg =  "";
$acadtype="";

$fl=0;
if(isset($_GET['fl'])){
  $fl = $_GET['fl'];
}
if (($_SERVER['REQUEST_METHOD'] == 'POST')||$fl==1){
  $_SESSION['alumni'] = $alumni;
  $_SESSION['org'] = $orgtype;
  $_SESSION['univ'] = $univ;
  $_SESSION['deptt'] = $deptt; 
  $_SESSION['skill'] = $skill;
  $_SESSION['desig'] = $desg;
  $_SESSION['acadtype']=$acadtype;
}

//acadtype filter new

if (isset($_POST['acadtype'])) {
 $acadtype = $_POST['acadtype'];
 $_SESSION['acadtype'] = $acadtype;
}
else{
 if(isset($_POST['acadfilter'])){
  $acadtype=$_POST['acadfilter'];
  $_SESSION['acadtype'] = $acadtype;
}
}

if (isset($_POST['alumni'])) {
 $alumni = $_POST['alumni'];
 $_SESSION['alumni'] = $alumni;
}
else{
 if(isset($_POST['alfilter'])){
  $alumni=$_POST['alfilter'];
  $_SESSION['alumni'] = $alumni;
}
}



if (isset($_POST['org'])) {
 $orgtype = $_POST['org'];
 $_SESSION['org'] = $orgtype;
}else{
 if(isset($_POST['orfilter'])){
  $orgtype=$_POST['orfilter'];
  $_SESSION['org'] = $orgtype;
}
}



if (isset($_POST['univ'])) {
 $univ  = $_POST['univ'];
 $_SESSION['univ'] = $univ;	
}
else{
 if(isset($_POST['univfilter'])){
  $univ=$_POST['univfilter'];
  $_SESSION['univ'] = $univ;  

}
}									


if (isset($_POST['deptt'])) {
 $deptt  = $_POST['deptt'];
 $_SESSION['deptt'] = $deptt; 	}
 else{
   if(isset($_POST['depttfilter'])){
    $deptt=$_POST['depttfilter'];
    $_SESSION['deptt'] = $deptt; 
  }
}

if (isset($_POST['skill'])) {
  $skill = $_POST['skill'];	
  $_SESSION['skill'] = $skill;}
  else{
   if(isset($_POST['skillfilter'])){
    $skill=$_POST['skillfilter'];
    $_SESSION['skill'] = $skill;}
  }


  if (isset($_POST['desig'])) {
    $desg =  $_POST['desig'];
    $_SESSION['desig'] = $desg;}
    else{
     if(isset($_POST['desigfilter'])){

      $desg=$_POST['desigfilter'];
      $_SESSION['desig'] = $desg;

    }
  }
  if(isset($_SESSION['org']))
   $orgtype= $_SESSION['org'] ;

 if(isset($_SESSION['alumni']))
   $alumni= $_SESSION['alumni']  ;

 if(isset($_SESSION['univ']))
   $univ = $_SESSION['univ']  ; 

 if(isset($_SESSION['deptt']))
   $deptt= $_SESSION['deptt']  ;

 if(isset($_SESSION['skill']))
   $skill= $_SESSION['skill'] ;

 if(isset($_SESSION['desig']))
   $desg= $_SESSION['desig']  ;


 if(isset($_SESSION['acadtype']))
   $acadtype= $_SESSION['acadtype']  ;




 ?>
 <!DOCTYPE html>


 <html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <title>project</title>	
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.autocomplete.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
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
    var orgtype = document.getElementById("orgtype").value;
    var univ = document.getElementById("univ").value;
    var deptt = document.getElementById("deptt").value;
    var skill = document.getElementById("skill").value;
    var desg = document.getElementById("desig").value;

    var url="fsearchresult.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput ;?>&almuni="+alumuni+"&orgtype="+orgtype+"&univ="+univ+"&deptt="+deptt+"&skill="+skill+"&desg="+desg;
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

 function aschangefun(){
   removeOptionsAlternate(document.getElementById('univ'));

   var x = document.getElementById("state").value;
   var y = document.getElementById("univ");
   var option = document.createElement("option");
   option.text = "Select University";

   y.add(option);

   $.post("univ.php",{state : x},
     function(result){
      alert(result);
      var res = result.split("+");

      for (var i = res.length - 1; i >= 0; i--) {
        var x = document.getElementById("univ");
        var option = document.createElement("option");
        option.text = res[i];

        x.add(option);
      };
    });


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
  </div>	<br><br>	

  <div id="header">
   <br>
   <div class="row">
     <div class="col-md-4">
       <div class="row">
         <div class ="col-md-1"></div>
         <div class="col-md-11"><img src="images/dstlogo.png" ></div>

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


 <div id="search" class="fullwidth  sell"> 

   <div class="row nomargin nopadding">

     <div class="col-md-4 nomargin nopadding">

       <ul class="list-inline">
        <li ><a href="filternew.php?drop=academician%20name&s=&fl=1&facultytype=Faculty"><button  class="btn btn-info"  >Faculty list</button></a></li>
        <li><a href="filternew.php?drop=academician%20name&s=&fl=1&facultytype=PhD Student"><button  class="btn btn-info"  >Phd Scholar List</button></a></li>
      </ul>
    </div>
    <div class ="col-md-8 nomargin nopadding">
      <div class="row nomargin nopadding ">
        <form class="form-search nomargin nopadding" onsubmit="return myfun();" method="POST" id="s" action="searchresultfilter.php?i=1">



         <div class="col-md-4 nomargin nopadding">
           <select class="form-control searchbox" onchange="GetSelectedTextValue(this)" id="dd1" name="drop" >
             <option value="null">Select Search Option</option>
             <option value="academician name"  <?php if($type=="academician name") echo 'selected'?>>Academician Name</option>
             <option value="which university/college" <?php if($type=="which university/college") echo 'selected'?>>University Name</option>
             <option value="designation"  <?php if($type=="designation") echo 'selected'?>>Designation</option>
             <option value="specialization"  <?php if($type=="specialization") echo 'selected'?>>Specilization</option>
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
           <br>	<div id="show1"></div>
         </div>

         <div class="col-md-5 " id="searchbar">

          <input type="text" id="s1" class="input-medium search-query form-control searchbox" name="s" value="<?php echo $searchinput; ?>" required>
          <div class="radbtns" >
           <label class="radio-inline"><input type="radio" name="searchtype" value="free" <?php if($searchtype=="free") echo 'checked = "checked"'?> >Free Search</label>
           <label class="radio-inline"><input type="radio" name="searchtype" value="exact" <?php if($searchtype=="exact") echo 'checked = "checked"'?>>Exact Search</label>
         </div>  
       </div>
       <div class="col-md-3 ">
         <input type="submit" class="btn btn-success" value=" Search">
       </div>

     </div>
   </div>

 </form>


</div>
</div>


<div id="main">
  <div id="content">
   <div class="innertube">
     <div id="namewise">
       <br />

       <div class="row">
         Search Names starting with:
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=A">A</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=B">B</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=C">C</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=D">D</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=E">E</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=F">F</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=G">G</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=H">H</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=I">I</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=J">J</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=K">K</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=L">L</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=M">M</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=N">N</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=O">O</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=P">P</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=Q">Q</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=R">R</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=S">S</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=T">T</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=U">U</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=V">V</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=W">W</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=X">X</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=Y">Y</a> </div>
         <div class=n>     <a href="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput; ?>&n=Z">Z</a> </div>

       </div>
     </div>
     <br>
     <h4>Search Results:</h4>
     <?php 
                          //optimize query start

     $page = 1;
     if (isset($_GET['i'])) {
       $page = $_GET['i'];
     }

     $alquery =" ";
     $alumarr= explode(" ", $alumni);
     for ($i=0; $i <count($alumarr) ; $i++) {

      $alumarr2 = explode(",", $alumarr[$i]);

      for ($j=0; $j <count($alumarr2) ; $j++) { 
        $alquery = $alquery."  (`qualification` like '%".$alumarr2[$j]."%' or `indian university/college` like '%".$alumarr2[$j]."%') and ";

      }

    }

    $searchinput = mysqli_real_escape_string($conni,$searchinput);
    $searchquery= "(";
    $searcharr= explode(" ", $searchinput);

    if($searchtype=="free"){
      for ($i=0; $i <count($searcharr) ; $i++) {

        $searcharr2 = explode(",", $searcharr[$i]);

        for ($j=0; $j <count($searcharr2) ; $j++) { 
         $searchquery= $searchquery."`$type` LIKE '%".$searcharr2[$j]."%' and ";
       }

     }
   }  

   if($searchtype=="exact"){
    for ($i=0; $i <count($searcharr) ; $i++) {

      $searcharr2 = explode(",", $searcharr[$i]);

      for ($j=0; $j <count($searcharr2) ; $j++) { 
        $searchquery= $searchquery."`$type` LIKE '".$searcharr2[$j]."' and ";
      }

    }
  }  
  if($type=="designation"&&$searchinput=="Graduate Student"){
      $searchquery .= "1 or `$type` like '%phd student%' ) and" ;
    } 
                        //optimize query end
                         // echo $searchquery."<br>";
                          //echo $alquery."<br>";

  $orgquery="";
  if($orgtype=='institute'){
    $orgquery = "(`which university/college` like '%institute%' AND `which university/college`  not like '%university%') and";
  }
  if($orgtype=='university'){
    $orgquery = "( `which university/college` like '%university%') and";
  }



                         //query for facultytype if list is to be displayed

  
  $facultytypequery = "";
  if($fl==1){
    $facultytypequery = " `type` like '$facultytype' and ";
  }
                          //echo $facultytypequery;
  $alpha = "";
  if(isset($_GET['n'])&&$_GET['n']!=""){
    $alpha=$_GET['n'];
    $sqlquery="SELECT * FROM `table 5` WHERE ".$searchquery." ".$alquery."".$orgquery."".$facultytypequery."  `which university/college` like '%$univ%' AND `department` like '%$deptt%'  AND `specialization` like '%$skill%' AND `designation` like '%$desg%'   and `academician name` like '".$alpha."%' and `type` like '%$acadtype%'   ORDER by `academician name` ASC ";
  }else{
    $sqlquery= "SELECT * FROM `table 5` WHERE ".$searchquery." ".$alquery."".$orgquery."".$facultytypequery."  `which university/college` like '%$univ%' AND `department` like '%$deptt%'  AND `specialization` like '%$skill%' AND `designation` like '%$desg%' and `type` like '%$acadtype%'  ORDER by `academician name` ASC  ";
  }

                                  echo $sqlquery;
  $result = mysqli_query($conni,$sqlquery);
  if(!$result){
    die("error main".mysqli_error($conni));
  }
  $x = mysqli_num_rows ( $result );
  echo "Total ".$x."  results retrieved <br><br>";

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
      echo "<li class='active'><a href='filternew.php?drop=".$type."&s=".$searchinput."&i=1&n=$alpha'>1</a></li>";
    } 
    else {             
     echo "<li><a href='filternew.php?drop=".$type."&s=".$searchinput."&i=1&n=$alpha'>1</a></li>";
   }

   if($page!=1)
     echo "<li><a href='filternew.php?drop=".$type."&s=".$searchinput."&i=".($page-10)."&n=$alpha'>Previous</a></li>";



   $s=$page;
   for ($i=$fp; $i <$no_pages ; $i++) { 
    if(($s<($page+110))&&$i!=1){
     if($i==$fp) {
      echo "<li class='active'><a href='filternew.php?drop=".$type."&s=".$searchinput."&i=".$s."&n=$alpha'>$i</a></li>";
    } 
    else {             
     echo "<li><a href='filternew.php?drop=".$type."&s=".$searchinput."&i=".$s."&n=$alpha'>$i</a></li>";
   }
 }
 $s = $s+10; 
}


if($no_pages>1&&$fp!=$no_pages)
  echo "<li><a href='filternew.php?drop=".$type."&s=".$searchinput."&i=".($page+10)."&n=$alpha'>Next</a></li>";

if($no_pages>1){
 if($s==$page) {
  echo "<li class='active'><a href='filternew.php?drop=".$type."&s=".$searchinput."&i=".$s."&n=$alpha'>Last Page $i</a></li>";
} 
else {             
 echo "<li><a href='filternew.php?drop=".$type."&s=".$searchinput."&i=".$s."&n=$alpha'>Last Page $i</a></li>";
}
}
}
?>

</ul>
</div>


<?php



$lm = $page;


$end=  $page+10;   
for ($j=1; $j<=$page ; $j++) { 
  $r = mysqli_fetch_assoc($result);
}  
while($r){





 if($lm<$end){

   echo "<div class='tbox'>";
   echo "<div class='row nomargin '>";

   echo " <a href='profile.php?id=".$r['sr no']."'' target = '_blank' >";

   echo "<div class='col-md-3 borderleft text-center'>";


   $url=$r['imgurl'];

                         //  if((strtolower($url)!="not found")&&(strtolower($url)!="")&&empty($r['photo'])){
                         // $url=$r['imgurl'];
                         // $image= '<img src="'.$r['imgurl']. '" width="130px" height="150px"class="img-rounded" >';
                         //  echo $image;
                         //  echo $r['photo'];
                         //  $dest=getcwd();
                         // // echo $dest;
                         //  $path = $dest.'/image/'.$r['sr no']. '.jpeg';
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
  echo " <a class='nolink' href='profile.php?id=".$r['sr no']."'' target = '_blank' >"; echo"<h5><strong>"; echo"   <span class='glyphicon glyphicon-user'></span> "; echo $r['academician name']."  </strong> &nbsp&nbsp&nbsp&nbsp |"; echo"</a>";
  echo "  &nbsp <span class='glyphicon glyphicon-briefcase'></span> "; echo $r['designation'] ;
  echo"</h5>";
  echo"<h5>";   echo "<span class='glyphicon glyphicon-book'></span> "; echo $r['department name'] ;echo"</h5>"; 
  echo"<h5>";  echo "<span class='glyphicon glyphicon-education'></span> "; echo $r['which university/college'] ; echo"</h5>";
  echo " <h5 ><span class='glyphicon glyphicon-home'></span> ";  echo $r['country name']; echo "</h5>";
  echo"<h5>";
  if(strtolower($r['email id'])!="not found"){
    $outer = explode(",", $r['email id']);

    for ($i=0; $i <count($outer) ; $i++) { 


      $inner = explode(" ",$outer[$i]);
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
   echo "|&nbsp&nbsp<span class='glyphicon glyphicon-earphone'></span> "; echo $r['mobile no'] ;  echo "</h5>";
 }

 ?>



 <h6> <a href="profile.php?id=<?php echo $r['sr no'] ;?>" target = "_blank"> <button  class="btn btn-info"  >View Profile</button></a>
 </h6>
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
      echo "<li class='active'><a href='filternew.php?drop=".$type."&s=".$searchinput."&i=1&n=$alpha'>1</a></li>";
    } 
    else {             
     echo "<li><a href='filternew.php?drop=".$type."&s=".$searchinput."&i=1&n=$alpha'>1</a></li>";
   }

   if($page!=1)
     echo "<li><a href='filternew.php?drop=".$type."&s=".$searchinput."&i=".($page-10)."&n=$alpha'>Previous</a></li>";



   $s=$page;
   for ($i=$fp; $i <$no_pages ; $i++) { 
    if(($s<($page+110))&&$i!=1){
     if($i==$fp) {
      echo "<li class='active'><a href='filternew.php?drop=".$type."&s=".$searchinput."&i=".$s."&n=$alpha'>$i</a></li>";
    } 
    else {             
     echo "<li><a href='filternew.php?drop=".$type."&s=".$searchinput."&i=".$s."&n=$alpha'>$i</a></li>";
   }
 }
 $s = $s+10; 
}


if($no_pages>1&&$fp!=$no_pages)
  echo "<li><a href='filternew.php?drop=".$type."&s=".$searchinput."&i=".($page+10)."&n=$alpha'>Next</a></li>";

if($no_pages>1){
 if($s==$page) {
  echo "<li class='active'><a href='filternew.php?drop=".$type."&s=".$searchinput."&i=".$s."&n=$alpha'>Last Page $i</a></li>";
} 
else {             
 echo "<li><a href='filternew.php?drop=".$type."&s=".$searchinput."&i=".$s."&n=$alpha'>Last Page $i</a></li>";
}
}
}
?>

</ul>
</div>

</div>
</div>
</div>
<nav id="nav"  >
 <br><br>

 <br>    <br><br>  <br><br>       


 <h4 class="text-center">Filters:</h3>

  <div class=" outer2">


   <form action="filternew.php?drop=<?php echo $type ;?>&s=<?php echo $searchinput ;?>&i=1" method="post">
    <div class="outer1">
     <div class="panel panel-primary">
      <div class="panel-heading ">Your Filters<a  class="textright" data-toggle="collapse" href="#yfbox" ><span class="glyphicon glyphicon-chevron-down"></span></a></div>
      <div id="yfbox" class="panel-collapse collapse in">
        <div class="panel-body filterbox" >
         <div class="innerfilter" >
          <div >
            <?php 



            if($alumni){
              echo "<div class='checkbox'><label>";
              echo '<input type ="checkbox" id="alumni" name="alfilter" onclick="" onchange="this.form.submit()" value="'.$alumni.'" checked>'.$alumni.'';
              echo "</label></div>";

            }
            if($orgtype){
             echo "<div class='checkbox'><label>";
             echo '<input type ="checkbox" id="alumni" name="orfilter" onclick="" onchange="this.form.submit()" value="'.$orgtype.'" checked>'.$orgtype.'';
             echo "</label></div>"; ;
           }
           if($univ){
             echo "<div class='checkbox'><label>";
             echo '<input type ="checkbox" id="alumni" name="univfilter" onclick="" onchange="this.form.submit()" value="'.$univ.'" checked>'.$univ.'';
             echo "</label></div>";  ;
           }
           if($deptt){
             echo "<div class='checkbox'><label>";
             echo '<input type ="checkbox" id="alumni" name="depttfilter" onclick="" onchange="this.form.submit()" value="'.$deptt.'" checked>'.$deptt.'';
             echo "</label></div>"; ;
           }
           if($skill){
             echo "<div class='checkbox'><label>";
             echo '<input type ="checkbox" id="skill" name="skillfilter" onclick="" onchange="this.form.submit()" value="'.$skill.'" checked>'.$skill.'';
             echo "</label></div>"; ;
           }
           if($desg){
             echo "<div class='checkbox'><label>";
             echo '<input type ="checkbox" id="desig"  name="desigfilter" onclick="" onchange="this.form.submit()" value="'.$desg.'" checked>'.$desg.'';
             echo "</label></div>";   ;
           }
           if($acadtype){
             echo "<div class='checkbox'><label>";
             echo '<input type ="checkbox" id="desig"  name="acadfilter" onclick="" onchange="this.form.submit()" value="'.$acadtype.'" checked>'.$acadtype.'';
             echo "</label></div>";   ;
           }

           ?>
         </div>	      
       </div>
     </div>
   </div> 
 </div>                    

</div>  








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



   <div class="panel panel-primary" >
    <div class="panel-heading ">Organisation type<a  class="textright" data-toggle="collapse" href="#orgbox" ><span class="glyphicon glyphicon-chevron-down"></span></a></div>
    <div id="orgbox" class="panel-collapse collapse in">
      <div class="panel-body filterbox " >
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
             $result = mysqli_query($conni , $query);

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

             $departmentquery= "SELECT distinct department FROM `table 5` WHERE ".$searchquery." ".$alquery." ".$orgquery." `which university/college` like '%$univ%' AND `department` like '%$deptt%'  AND `specialization` like '%$skill%' AND `designation` like '%$desg%' order by department ";

                // $query= "SELECT distinct department FROM `table 5` WHERE `$type` LIKE '%$searchinput%' AND `indian university/college` like '%$alumni%' AND `which university/college` like '%$orgtype%' AND `which university/college` like '%$univ%' AND `department` like '%$deptt%'  AND `specialization` like '%$skill%' AND `designation` like '%$desg%'  order by department";
				 //mysql_select_db("prof");
             $result = mysqli_query($conni,$departmentquery);
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

            ?>					 </div>	      
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

          $query = "select * from skill where department in(".$departmentquery.")";

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

          $query= "SELECT distinct designation FROM `table 5` WHERE ".$searchquery." ".$alquery." ".$orgquery."  `which university/college` like '%$univ%' AND `department` like '%$deptt%'  AND `specialization` like '%$skill%' AND `designation` like '%$desg%' order by designation ";

				 //mysql_select_db("prof");
          $result = mysqli_query($conni,$query);
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

<footer id="footer" class="nomargin">
  <nav class="navbar navbar-inverse nomargin nor">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
          <ul class="nav navbar-nav" style="text:align:center;">
            <li><a href="#">Web Policies</a></li>
            <li><a href="#">Contact Us</a></li> 
            <li><a href="#">Feedback</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">Disclamier</a></li>
            <li><a  class="scroll-Top pointer">Top <span class="glyphicon glyphicon-arrow-up"></span></a></li>
          </ul>
        </div>
        <div class="col-sm-3"></div>
      </div> 
    </div>
  </nav>
  <div class="footer">
   <div class="row">
    <div class="col-sm-3 ">
      <div class="footer-images text-center">
        <a href="#">
          <img src="images/pecfootlogo.png"  height="60" width="150">
        </a>
        <br><br>
        <a href="#">
          <img src="images/dstfoot.jpg" class="img-rounded dstfootlogo"   height="60" width="200">
        </a>

      </div>
    </div>

    <div class="col-sm-9">
      <h3 class="nomargin">Contact Us</h3>
      <hr class="nomargin bluebg" >

      <div class="row">
        <div class="col-sm-3">
          <h5>The Director <br>
            PEC University Of Technology<br>
            Sector-12 , Chandigarh<br>
            Phone:

          </h5>

        </div>

      </div>
    </div>
  </div>
</footer>
</div>
</body>
</html>
