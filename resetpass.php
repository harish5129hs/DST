<?php include("dbcon.php") ?>
<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<title>project</title>	


		<script type="text/javascript">

		    var flag= "y";

			


			function checkfun(){
				document.getElementById("passerror").innerHTML="";
				document.getElementById("passok").innerHTML="";
				var x=document.getElementById('pass').value;
				var y=document.getElementById('pass2').value;

				if(x!=y){
					document.getElementById("passerror").innerHTML="Password doesn't match. ";
					flag="n";
				}
				else{
					flag="y";
					document.getElementById("passok").innerHTML="Password  match. ";
					
				}
			}

			function submitcheckfun(){

				//alert(flag);
				if(flag=="n"){
					return false;
				}

			}

		</script>
	
	</head>
	
	<body>
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
                           	
			
		</div>
		<br>
                <br>
		<div id="wrapper">
		<?php

      $uid= mysqli_real_escape_string($conni,$_GET['uid']);
      $query = "select * from user where userid = '$uid'";
        //echo $query."<br>";
         //mysql_select_db("prof"); 
       $retval = mysqli_query( $conni,$query ); 
        
       if(! $retval ) { 
          die('Could not enter data 2: ' . mysqli_error($conni)); 
          
       } 
      

        $r = mysqli_fetch_assoc($retval);

      ?>
		
			
				<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8 ">
				
                    <h3 class="nomargin nopadding"><span class="glyphicon glyphicon-refresh"></span> Recover Password</h3>
					<hr class="nomargin nopadding">
						<br><br>
						<p>Dear <strong> <?php echo $r['first_name']?> </strong></p><br>
			            <p>You can now change  your password .</p>
			            <br>
                       <form action="rpbackend.php?uid=<?php echo $uid ?>" method="post" onsubmit="return submitcheckfun();">
                      
                            
                        
                            <div class="row">
                            <div class="col-xs-5">
                            <h5>Password</h5>
                            <input type="password" class="form-control" placeholder="Type password" required name="pass" id="pass">
                            </div>
                            </div>
                              
                            <br>
                            <div class="row">
                            <div class="col-xs-5">
                            <h5>Confirm Password</h5>
                            <input type="password" class="form-control" placeholder="Confirm Password" required name="pass2" onkeyup="
                            checkfun()" id="pass2">
                            </div>
                            </div>
                               <div id="passerror" class="error">   </div>
                               <div id="passok" class="ok">   </div>
                              
                            <br>
                          
                          
                            <div class="row">
                            <div class="col-xs-5">
                            <div class="text-center">
                            
					            
                            <br>
                            <input type="submit" class="btn btn-info"  value="Change Password">
                            
                            </div>
                            </div>
                            </div>
                        </form>
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
