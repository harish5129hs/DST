<?php 
include("functions.php");
include("dbcon.php") ;
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
		
			<br>
				<div class="row">
  				<div class="col-md-2"></div>
  				<div class="col-md-8">
                      <h3 class="nomargin nopadding"><span class="glyphicon glyphicon-home"></span> Post Job/Internship</H3>
  					<hr class="nomargin nopadding">
  						<br><br>
  						<br>

               <div class="jobmain ">
               <form method="POST" accept="jobbackend.php">
                    <br>
                    <div class="border aboutjob">
                      <h3 class="text-center">About the Internship/Job</h3>
                      <br><br>
                      <h4 class="text-left">Select primary profile*</h4>
                      <div class="row">
                        <div class="col-sm-6">
                            <div class="radio">
                              <label><input type="radio" name="typeofjob">Type 1</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" name="typeofjob">Type 2</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" name="typeofjob">Type 3</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" name="typeofjob">Type 4</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" name="typeofjob">Type 5</label>
                            </div>
                        </div>
                         <div class="col-sm-6">
                            <div class="radio">
                              <label><input type="radio" name="typeofjob">Type 1</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" name="typeofjob">Type 2</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" name="typeofjob">Type 3</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" name="typeofjob">Type 4</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" name="typeofjob">Type 5</label>
                            </div>
                        </div>
                      </div>
                      <br>
                      <h4 class="text-left">Select type of internship/job*</h4>
                      <div class="row">
                        <div class="col-sm-6">
                            <div class="radio">
                              <label><input type="radio" name="regularOrNot">Regular</label>
                            </div>
                            
                        </div>
                         <div class="col-sm-6">
                            <div class="radio">
                              <label><input type="radio" name="regularOrNot">Work from home</label>
                            </div>
                            
                        </div>
                      </div>
                      <br>
                      <h4 class="text-left">Select location of internship/job*</h4>
                      <input type="text" class="form-control" name="locationofjob" id="city"/>
                      <br/>
                        <h4 class="text-left">Is part time allowed*</h4>
                      <div class="row">
                        <div class="col-sm-6">
                            <div class="radio">
                              <label><input type="radio" name="parttime">Yes</label>
                            </div>
                            
                        </div>
                         <div class="col-sm-6">
                            <div class="radio">
                              <label><input type="radio" name="parttime">No</label>
                            </div>
                            
                        </div>
                      </div>
                      <br>
                      <h4 class="text-left">Number of Openings*</h4>
                      <input type="text" class="form-control" name="openings" />
                      <br/>
                      <h4 class="text-left">Internship/Job start date*</h4>
                      <input type="date" class="form-control" name="startdate" />
                      <br/>
                      <h4 class="text-left">Internship/Job duration*</h4>
                      <div class="row">
                        <div class="col-xs-8">
                          <input type="text" class="form-control" name="duration" />
                        </div> 
                        <div class="col-xs-4">
                          <select class="form-control" name="durationtype">
                            <option>days</option>
                            <option>weeks</option>
                            <option>months</option>
                            <option>years</option>
                          </select>
                         </div> 
                       </div>  
                      <br>
                      <h4 class="text-left nomargin">Internship/Job description*</h4>
                      <p class="small">(describe the job)</p>
                      <textarea name="description" class="form-control" rows="7"></textarea>

                    </div>
                    <br>
                    <div class="border aboutjob">
                      <h3 class="text-center">pay</h3>
                      
                    </div>
                    <br>
                    <div class="border aboutjob">
                      <h3 class="text-center">Who can apply</h3>
                      <br>
                      <h4 class="text-left nomargin">Skills you are looking for*</h4>
                      <p class="small">(type skills required)</p>
                      <textarea name="description" class="form-control" rows="7"></textarea>
                      
                    </div>
                    <br>
                    <div class="aboutjob text-right">
                      <input type="submit" name="" value="Post " class="btn btn-info">
                    </div>
                  </form>
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
