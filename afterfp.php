<?php

 include("dbcon.php") ;
 if(! $conni ) {
    die('Could not connect: ' . mysqli_error($conni));
 }
 $uid= mysqli_real_escape_string($conni,$_GET['uid']);


$err =  "";
if (isset($_GET['err'])) {
   $err = mysqli_real_escape_string($conni,$_GET['err']);
}

if(isset($_POST['button'])){
	$key =  "";
if (isset($_POST['key'])) {
   $key = mysqli_real_escape_string($conni,$_POST['key']);
}




$query = "select * from fptable where userid = '$uid'";

    // //mysql_select_db("prof");
	   $retval = mysqli_query($conni, $query );

	   if(! $retval ) {
	      die('Could not enter data 2: ' . mysqli_error($conni));

	   }

	   $r= mysqli_fetch_assoc($retval);

	   if($key==$r['key']){
	   	header("location:resetpass.php?uid=".$uid."");

        $query2 = "delete from fptable where userid = '$uid'";
       // //mysql_select_db("prof");
	   $retval = mysqli_query(  $conni ,$query2);
	   }
	   else{
	   	header("location:afterfp.php?uid=".$uid."&err=1");
	   }

}


?>
<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<title>project</title>

	</head>

	<body>
    <div id="alldata">

	<div id="options">
	<nav class="navbar navbar-inverse navbar-fixed-top options  ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">DST</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="search.php">Home</a></li>
      <li><a href="search.php">Search</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Help</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
</div>	<br><br>

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
		<br>
                <br>
		<div id="wrapper">

			<?php


      $query = "select * from user where userid = '$uid'";
        //echo $query."<br>";
        // //mysql_select_db("prof");
       $retval = mysqli_query(  $conni,$query );

       if(! $retval ) {
          die('Could not enter data 2: ' . mysqli_error($conni));

       }


        $r = mysqli_fetch_assoc($retval);

      ?>
				<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
                    <h3 class="nomargin nopadding"><span class="glyphicon glyphicon-refresh"></span> Recover Password</H3>
					<hr class="nomargin nopadding">
						<br><br>

            <p>Dear <strong> <?php echo $r['first_name']?> </strong></p><br>
            <p>Password recoverey email sent successfully!!</p>
            <br>
            <p>A link containing recovery key , has been sent to your email-id :<strong> <?php echo $r['email']?> .</strong> </p><br>
            <p>Please enter  recovery key  to recover your account .</p>


            <br>
            <form action="afterfp.php?uid=<?php echo $uid ?>" method="post">
            <div class="row">

                            <div class="col-xs-5">
                            <h5>Recovery Key</h5>
                            <input type="text" class="form-control" placeholder="Type recovery-key" name="key">
                            </div>
                            </div>

                            <div class="error">
                            <?php

                            if($err=="1"){
                            	echo "Incorrect recovery key";
                            }
                            ?>
                            </div>

                            <br>
                            <br>

                            <div class="row">
                            <div class="col-xs-5">
                            <div >



                            <input  type="submit" value="Continue" class="btn btn-success "  name="button">
                            <br>
                            <br>



                          </div>
                            </div>
                            </div>


                 </div>
                 </form>

                <div class="col-md-2"></div>

				</div>



		</div>
		<br>
		<br>
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
