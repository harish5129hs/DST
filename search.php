<?php 
include("functions.php");
include("dbcon.php"); ?>
<!DOCTYPE html>

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

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
     function myfun(){
          var check1=document.getElementById('dd1');
         

          if(check1.value=="null")
          { 
            document.getElementById("show1").innerHTML="Please select search option";
              return false;
          }
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
      <li class="active"><a href="index.php">Home</a></li>
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


		    <div id="searchpage"> 

		                 <h4 class="nomargin"><span class='glyphicon glyphicon-search'></span> Search the Database</h4>
		                 <hr class="nomargin"> 
		                 <br>
		                 <br>

		                  <form class="form-search" onsubmit="return myfun();" method="POST" id="s" action="searchresultfilter.php?i=1">
							
						    <div class="input-append " style="margin-left:10%;">
							<div class="row">
							<div class="col-md-4">
							<select class="form-control" onchange="GetSelectedTextValue(this)" id="dd1" name="drop">
							    <option value="null">Select Search Option</option>
							  <option value="academician name">Academician Name</option>
							  <option value="which university/college">University Name</option>
							  <option value="designation">Designation</option>
							  <option value="specialization">Specialization</option>
							  <option value="country name">Country name</option>
							  <option value="department name">Department Name</option>
							</select>
							<script type="text/javascript">
                           function GetSelectedTextValue(dd1) {
                           var selectedText = dd1.options[dd1.selectedIndex].innerHTML;
                           var Value = dd1.value;
                           
                           if(Value!='null')
                           document.getElementById("s1").placeholder = "Type "+Value;
                            else{
                            document.getElementById("s1").placeholder = "choose search option";	
                            }
                        }
                           
                           </script>
                           						<br>	<div id="show1"></div>
							</div>

							<div class="col-md-5" id="searchbar">
							
								<input type="text" id="s1" class="input-medium search-query form-control" name="s"  required>
								
								
								<div class="radbtns">
									 <label class="radio-inline"><input type="radio" name="searchtype" value="free" checked="checked">Free Search</label>
									
									
									 <label class="radio-inline"><input type="radio" name="searchtype" value="exact">Exact Search</label>
								</div>
							</div>
							<div class="col-md-3">
							<input type="submit" class="btn add-on" value="search"></input>
							</div>
						    

						

							
						</form>
						</div>
					
						</div>
						</div>
						
						<br>
			<div class="help">
				<div class="searchhelptext">
				<br>

					<h4 class="nomargin"><span class='glyphicon glyphicon-info-sign'></span> Help</h4>
			                 <hr class="nomargin"> 
			                 <br>
			                 <br>
			         <ul>
			         <li><h5>First select the option according to which you wish to search.</h5></li>
			         <li><h5>Type in the your search query and press enter or search button.</h5></li>    


				</div>	
			</div>		


			
			

		
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br><br>
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
