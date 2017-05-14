<?php 
include("functions.php");
include("dbcon.php") ;

$query1 ="select * from user WHERE `userid` = $userid";
$result = mysqli_query($conni,$query1);
$r = mysqli_fetch_assoc($result);

if($r['usertype']=="student"){
  header("location:index.php");
}
else{
  if($r['usertype']=="academician"){
    header("location:user.php");
   } 
}
?>
<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

		<title>project</title>	

    <script type="text/javascript">

      $(document).ready(function(){
        //alert("hello");
        var usertype;
        $('.conformation').hide();
        $('.student').hide();
        $('.academician').hide();

        $('.typeofuser').click(function(){
           usertype = $(this).val();
          $('#selectedtype').html(usertype);

          $("#conformationmodal").modal()
        });

        $('#yesbtn').on('click',function(){


            var showid="."+usertype;
            $('.optionsforuser').hide();
             $("#conformationmodal").modal("hide");

             //post request of selection
             $.ajax({
              url : "saveselection.php?select="+usertype,
              success: function(data){
                console.log(data);
              }
             });


            $(showid).show();
          

        });

        $('#nobtn').on('click',function(){
            $("#conformationmodal").modal("hide");
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
				<div class="marginleftright">
  				
                <h3 class="nomargin nopadding"><span class="glyphicon glyphicon-home"></span> Welcome</H3>
      					<hr class="nomargin nopadding">
      						<br><br>
      						<br>


                  <p>Welcome to DST Indian Academician Database.</p>
                  <br>
                  


                  <br>
                  
                  <br>
                  <div class="optionsforuser text-center">

                      <div class="optionstable" style="border-radius: 10px;margin-left: 20%;margin-right: 20%;">
                        <table class="table   table-hover  ">
                          <thead>
                            <tr>
                              <th><h3 class="text-center">Continue as</h3></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                             <td>
                              <button class="typeofuser btn btn-link" value="student" style="width: 100%">
                               <h4>Student
                                </h4>
                              </button>
                              </td>
                            </tr>
                            <tr>
                              <td>
                              <button class="typeofuser btn btn-link" value="academician" style="width: 100%">
                                
                          
                               <h4>Academician</h4> 
                                
                              </button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                  </div>

                  <!-- <div class="conformation ">

                      <h4>Do you wish to continue as a: </h4>

                      <h3 id="selectedtype"></h3>
                      <br><br>

                      <button class="btn btn-default" id="yesbtn">Yes</button>
                      <button class="btn btn-default" id="nobtn">No</button>

                  </div> -->


                  <div id="conformationmodal" class="modal fade conformation" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Confirm Selection</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Do you wish to continue as a: </h4>

                          <h3 id="selectedtype"></h3>
                          <br><br>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-default" id="yesbtn">Yes</button>
                          <button class="btn btn-default" id="nobtn">No</button>

                        </div>
                      </div>

                    </div>
                  </div>

                  <div class="student">

                    <h4>Features for students </h4>
                    <br>

                    <ul>
                      <li>Search database</li>
                      <li>Find internships</li>
                      <li>Research projects</li>
                      <li>Find reasearchers to work with</li>
                    </ul>
                  </div>
                  

                  <div class="academician">

                   <p> We are maintaing a database of all indian origin academicians working abroad.
                    <br><br>
                    So you can contribute by filling your information.</p>
                    <br>
                    <div class="row">
                     <?php 

                    $sql1 = "select * from faculty_personnel where emailcheck = '$username' ;";
                     $res=  mysqli_query($conni,$sql1);
                      if(!$res){
                        die("erroe1".mysqli_error($conni));
                      }

                      $r =mysqli_fetch_assoc($res);

                    
                      if(!$r){
                    ?>
                      
                      <div class="col-md-2">  <a href="teacher.php"> <button class="btn btn-info" >Fill Your Information</button></a> </div>

                      <?php }else{ ?>

                      <div class="col-md-2">  <a href="updatefinal.php"> <button class="btn btn-info" >Update Your Information</button></a> </div>
                     
                     <?php  } ?>
                    </div>
                  </div>
                   
                  

               
					
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
