<?php 
include("functions.php");
include("dbcon.php");

$fid= $_GET['fid'];

$up=0;
if(isset($_GET['up'])){
  $up = $_GET['up'];
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
           
      <div class="col-md-5 text-center"><br><br><h2 class="stroke"> Indian Origin Academicians Database</h2></div>
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
		
			<br>
				<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
                    <h3 class="nomargin nopadding"><span class="glyphicon glyphicon-ok"></span> Form Submission Successful</H3>
					<hr class="nomargin nopadding">
						<br><br>
						<br>

            <?php if($up){ 

              echo "<p>Your information has been updated successfully.</p>";
              }
              else{
               
               echo "<p>Your information has been submitted successfully.</p>";
              }

               ?>
              
           
            <br>
           


            <br>
            <p>Please continue to Next Form.</p>
            <br>
            <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2">  <a href="updateform.php"> <button class="btn btn-info" ><span class="glyphicon glyphicon-arrow-left"></span> Update previous form</button></a> </div>
            <div class="col-md-1"></div>
            <?php if(!$up){  ?>
            <div class="col-md-2">  <a href="teachersecond.php?fid=<?php echo $fid ;?>"> <button class="btn btn-info"  >Continue to Next Form <span class="glyphicon glyphicon-arrow-right"></span></button></a></div>
            <?php }else { ?>
            <div class="col-md-2">  <a href="teachersecond.php?fid=<?php echo $fid ;?>&up=<?php echo $up ; ?>"> <button class="btn btn-info" >Continue to Next Form <span class="glyphicon glyphicon-arrow-right"></span></button></a></div>
            <?php } ?>
            </div>

                        
           </div>
                
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
