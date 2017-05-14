<?php 
include("functions.php");
include("dbcon.php");

if(!$log){
    	header("location:login.html");
}

?>
<!DOCTYPE html>

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<title>project</title>	
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		 <script type="text/javascript" src="js/aj_email.js"></script>
	     <script type="text/javascript" src="js/jquery.js"></script>
	      <script type="text/javascript" src="js/jquery-ui.min.js"></script>
	     

	<style>
  input[type=text] {
  height:20px;
  border: 0;
  width: calc(100% - 1px);
  margin-left:1px;
  box-shadow: -8px 10px 0px -7px #ebebeb, 8px 10px 0px -7px #ebebeb;
  -webkit-transition: box-shadow 0.3s;
  transition: box-shadow 0.3s;
}
input[type=text]:focus {
  outline: none;
  box-shadow: -8px 10px 0px -7px #4EA6EA, 8px 10px 0px -7px #4EA6EA;
}

.borderless td, .borderless th {
    border: none;
}
#inner{
       margin-left: 100px;
	   }

#head{
		        font-size: 150%;
          	}
			#show1{
				color: red;
				font-family: Sans-Serif;
			}

			input[type=email] {
  height:20px;
  border: 0;
  width: calc(100% - 1px);
  margin-left:1px;
  box-shadow: -8px 10px 0px -7px #ebebeb, 8px 10px 0px -7px #ebebeb;
  -webkit-transition: box-shadow 0.3s;
  transition: box-shadow 0.3s;
}
input[type=email]:focus {
  outline: none;
  box-shadow: -8px 10px 0px -7px #4EA6EA, 8px 10px 0px -7px #4EA6EA;
}

.borderless td, .borderless th {
    border: none;
}
#inner{
       margin-left: 100px;
	   }

#head{
		        font-size: 150%;
          	}
			#show1{
				color: red;
				font-family: Sans-Serif;
			}
</style>



<script type="text/javascript">

  var dep;
  var des;
  var em;
  var textdep=0;
  var textdesi=0;
  var email;
  


	function checkdp(val){
		var element=document.getElementById("dep");
         dep=1;
		if(val=="Other"||val=='Choose Interest'){
			element.style.display="block"; 
			textdep=1;
	}else{
		element.style.display="none";
		textdep=0;
	}
}

	function checkde(val){
		var element=document.getElementById("designation");
		des=1;
		if(val=="Other"||val=='Choose Interest'){
			element.style.display="block"; 
            textdesi=1;
	}else{
		element.style.display="none";
		 textdesi=0;
	}
}

var indicate;
function validate_email(email){
  $.post('check_email.php',{email:email},function(data){
  	if(data==0){
     $('#sp').html("Email Address is not valid");
     $('#sp').css('color','red');
     indicate=1;
     em=0;
    
  	}
   else{
     //  $('#sp').html("Email Address is valid");
     //  $('#sp').css('color','green');
     $('#sp').hide();
     indicate=0;
     em=1;
  	}
  });
    if(indicate==1){
        $('#sp').show();
       }
}



$(document).ready(function(){
    $("#emailid").blur(function(){
    var desivalu=document.getElementById("emailid").value;
    validate_email(desivalu);
       if(indicate==0){
       	$('#sp').hide();
       	em=1;
       }
       if(indicate==1){
        $('#sp').show();
        em=0;
       }

       $("#emailid").autoEmail(
       ["gmail.com", "yahoo.com", "outlook.com", "jqueryscript.net"], // an array of domains to autocomplete
         true // enables the user to enter multiple emails in the field
         );
});


});

function checkdesi(){
	if(des==1)
	$('#des1').html('');
}

function checkdep(){
	if(dep==1)
    $('#dep1').html('');
}

function displaydesi(){
	var a=document.getElementById("designation").value;
     if(a!=''){
		$('#des1').html('');
	}
}

function displaydep(){
	var ab=document.getElementById("dep").value;
	if(ab!=''){
		$('#dep1').html('');
	}
}

function load(){
	var n=document.getElementById("designation").value;
	var m=document.getElementById("designation").value;
	if(n!='')
	des=1;
    if(m!='')
    dep=1;
   
   var desivalu=document.getElementById("emailid").value;
    validate_email(desivalu);
       if(indicate==0){
       	$('#sp').hide();
       	em=1;
       }
       if(indicate==1){
        $('#sp').show();
        em=0;
       }
} 

function check(){


		
	 if(!des){
     $('#des1').html("Please Choose Designation");
     $('#des1').css('color','red');
     return false;
      }

 if(!dep){
     $('#dep1').html("Please Choose Department");
     $('#dep1').css('color','red');
     return false;
 }

 
var desivalue=document.getElementById("designation").value;

   if(textdesi==1&& desivalue==""){
     $('#des1').html("Please Fill Designation");
     $('#des1').css('color','red');
     return false;
 }

var depvalue=document.getElementById("dep").value;
  if(textdep==1&& depvalue==""){
     $('#dep1').html("Please Fill Department");
     $('#dep1').css('color','red');
     return false;
 }


var g='Email is not valid';
var desival=document.getElementById("sp").value; 
if(!em&&g!=desival){
	return false;
}
return true;
}


function p(){
	alert("jkb");
  $("#preview").load("teacher.php");
}

$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal("show");
    });
        $("#myModal").on('show.bs.modal', function () {
           
    });
});

function prev(){
	var firstname=document.getElementById("first").value;
	var middlename=document.getElementById("middle").value;
	var lastname=document.getElementById("last").value;
	var email=document.getElementById("emailid").value;
	var desi=document.getElementById("desi").value;
	if(desi=='choose')
	 desi='';
    
    if(desi=='Other')
      desi=document.getElementById("designation").value;


	var dep=document.getElementById("department").value;
    if(dep=='choose')
	 dep='';
    
    if(dep=='Other')
      dep=document.getElementById("dep").value;

	
	var employer=document.getElementById("employer").value;
	 
	 $('#f').html(firstname);
	 $('#m').html(middlename);
	 $('#l').html(lastname);
	 $('#e').html(email);
	 $('#em').html(employer);
	 $('#des3').html(desi);
	 $('#dep3').html(dep);
    
    
    
}

</script>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	
	<body onload="load()">
<div id="alldata">

<div id="options">
	<nav class="navbar navbar-default navbar-fixed-top options ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">DST</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="search.php">Search</a></li>
      <li><a href="#">About</a></li> 
      <li><a href="#">Help</a></li> 
    </ul>
    <?php 
    

    if(!$log){
    	header("loaction:login.html");

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


	<?php
	//getting result from database

	$getquery = "select * from `table 5` where (`email id` like '$username')or((`email id` like '%,%')and(`email id` like '$username,%' or `email id` like '%,$username' or `email id` like '%,$username,%') )";  
   //echo $getquery;
   $getres=  mysqli_query($conni,$getquery);
	if(!$getres){
		die("error fetch".mysqli_error($conni));
	}

	$getrow = mysqli_fetch_assoc($getres);


	?>
		<div id="header">
      <br>
      <div class="row">
      <div class="col-md-4">
      <div class="row">
      <div class ="col-md-1"></div>
      <div class="col-md-11"><img src="images/dstlogo.png" ></div>
      
      </div>
      </div>
           
      <div class="col-md-5 text-center"><img src ="images/flag3.png" height="75" width"75"><br><h2 class=""> Indian Origin Acadamicians Database</h2></div>
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
                
		<div id="wrapper">


			<div id="main">
				
					<div class="innertube">
				      <form action="teacherbackend.php" method="POST" onsubmit="return check();" >
				      <div class="row">
				      <div class="col-md-5"></div>
				      
				      </div>

					   <div class="row">

					   <div class="col-sm-4"></div>
					   <div class="col-sm-7"><h2 class="text-muted">Government of India Initiative</h2></div>
					   </div> 
					   <br />
					   <br />
                      <div id="inner1">

                      <?php

                      $fname = $name;
                      $lastname = $lname;
                      $midname = '';
                      $designation = '';
                      $department='';
                      $employer='';

                      $email = $username;
                     
                      if($getrow){
                      	$name = $getrow['academician name'];
                      	$arr = explode(' ', $name);
                      	$fname = $arr[0];
                      	if(count($arr)==3){
                      		$midname = $arr[1];
                      		$lastname = $arr[2];
                      	}
                      	else{
                      		$lastname = $arr[1];
                      	}

                      	$employer = $getrow['which university/college'];
                      	$designation  = $getrow['designation'];
                      	$department = $getrow['department'];
                      }
                      ?>


                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                        	<?php
						if($getrow){
							?>

							<div class="alert alert-info fade in">
							  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  <strong>Hello!</strong> Your entry was already in our database.<br>
							  We have filled some information for you.<br>
							  Please verify and update the information.
							</div>
					
					<?php
						}
					?>
                        <div class="well well-sm" align="center">Basic Information</div></div>
                        </div>
                        </div>
                        
                        <br />
                        <br />
                     <div id=inner>
                         <br />
                       <div class="row">
                          
						    <div class="col-md-3">
						   <strong> &nbsp &nbsp <span class="error">*</span>First Name</strong>
						    <div class="panel-body"><input type="text" name="firstname" placeholder="Type First Name" id="first" required value="<?php echo $fname; ?>"></div>
						    </div>

                            <div class="col-md-1"></div>
						    <div class="col-md-3">
						    <strong>&nbsp &nbsp Middle Name</strong>
						    <div class="panel-body"><input type="text"/ name="middlename" placeholder="Type Middle Name" id="middle" value="<?php echo $midname; ?>"></div>
						    </div>

                            <div class="col-md-1"></div>
						    <div class="col-md-3">
						    <strong> &nbsp &nbsp <span class="error">*</span>Last Name</strong>
						    <div class="panel-body"><input type="text"/ name="lastname" placeholder="Type Last Name" id="last" required value="<?php echo $lastname; ?>"></div>
						    </div>
						    
					   </div>

                       <br />
                       <br />
                       <br />
					   <div class="row">
                          
                            <div class="col-md-3">
						    <strong>&nbsp &nbsp <span class="error">*</span>Email</strong>
						    <div class="panel-body"><input type="email" name="email" id="emailid" autocomplete="on"  placeholder="Type Email" onkeyup="validate_email(this.value);"  value="<?php echo $email; ?>" required></div>
						      <div id="sp"></div>
						    </div>
                            
                         
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
						   	<strong> &nbsp &nbsp <span class="error">*</span>Current Employer </strong>
						    <div class="panel-body"><input type="text" name="employer" placeholder="Type Current Employer" 
						    id="employer"  value="<?php echo $employer; ?>"required></div>
						    </div>
							    
						    
						   

                            
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
						    <strong> &nbsp &nbsp <span class="error">*</span>Designation</strong>
						    <div class="panel-body">
							<select class="form-control" name="designation1" id="desi"  onchange="checkde(this.value);checkdesi();">
							    <option value="choose">Choose designation</option>
							    <option value="Professor">Professor</option>
							    <option value="Research Associate"  >Research Associate</option>
							    <option value="Assistant Professor">Assistant Professor</option>
							    <option value="Other" <?php if($getrow){ echo 'selected'; }?> >Other</option>
							  </select>
							  <br />
							  
 							  <input type="text" id="designation" name="designation2" <?php if(!$getrow){ ?>style="display:none ;" <?php }?> placeholder="Type Designation" onkeyup="displaydesi();" value="<?php echo $designation; ?>" />
 							  <div id="des1"></div>
 							  
							</div>
                            </div>
						    
					   </div>

					   
                        
                       <br /> 
					   <div class="row">
                          
						  
						    <div class="col-md-3">
						     <strong >&nbsp &nbsp <span class="error">*</span>Department</strong>
						    <div class="panel-body">
							<select class="form-control" name="department1" id="department"  onchange="checkdp(this.value);checkdep();">
							    <option value="choose">Choose department</option>
							    <option value="cse">CSE</option>
							    <option  value="ece">ECE</option>
							    <option  value="civil">CIVIL</option>
							    <option value="Other" <?php if($getrow){ echo 'selected'; }?>>Other</option>
							  </select>
							  <br />
 							  <input type="text" id="dep" name="department2" <?php if(!$getrow){ ?>style="display:none ;" <?php }?> placeholder="Type Department" onkeyup="displaydep();" value="<?php echo $department; ?>"/>
 							  <div id="dep1"></div>
							</div>
                            </div>

					  </div>
                     
                       <br />
                       <div class="container">
					  
					  <!-- Trigger the modal with a button -->
					  
<script type="text/javascript" src="js/bootstrap.js"></script>
					  <!-- Modal -->
					  <div class="container">
						  

						  <!-- Modal -->
						  <div class="modal fade" id="myModal" role="dialog">
						    <div class="modal-dialog">
						    
						      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">PREVIEW</h4>
						        </div>
						        <div class="modal-body">
						         <table  class="table">
						   
						    <tbody>
						     <tr class="active">
						        <td>Firstname:</td>
						        <td><span id="f"></span></td>
						        
						        
						      </tr>
						     <tr class="active">
						        <td>Middlename:</td>
						        <td><span id="m"></span></td>
						      </tr>
						      <tr class="active">
						        <td>Lastname:</td>
						        <td><span id="l"></span></td>
						      </tr>
						        <tr class="active">
						        <td> Email:</td>
						        <td><span id="e"></span></td>
						      </tr>
						     <tr class="active">
						        <td>Employer:</td>
						        <td><span id="em"></span></td>
						      </tr>
						     <tr class="active">
						        <td>Designation:</td>
						        <td><span id="des3"></span></td>
						      </tr>
						       <tr class="active">
						        <td>Department: </td>
						        <td><span id="dep3"></span>  </td>
						      </tr>
						    </tbody>
						  </table>
						        
						        <div class="modal-footer">
						          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        </div>
						      </div>
						      
						    </div>
						  </div>
						</div>
                      
                     
					   <div id="inner1">
                          <div class="row">
                            <div class="col-md-3"></div>
                            
                           <div id="preview"></div>
                            <div class="col-md-1"><button type="button" class="btn btn-info" id="myBtn" onclick="prev();">PREVIEW</button></div>
                            <div class="col-md-1"><input type="submit" class="btn btn-info" value="SUBMIT"  ></input></div>
                            
                           
						  
						    
					   </div>
					  </div>  
						                          
                      <br />
                      <br />
                      </form>
					</div> 
				
			</div>
			
			
		
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
