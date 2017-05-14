<?php include("dbcon.php") ?>
<!DOCTYPE html>

<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

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
    include("functions.php");

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
	      <div class="col-sm-4 col-xs-0">
	      <div class="row">
	      <div class ="col-md-1"></div>
	      <div class="col-md-11"><img src="images/dstlogo.png" ></div>
	      
	      </div>
	      </div>
	           
	      <div class="col-sm-5  col-xs-12 text-center"><img src ="images/flag3.png" height="75" width"75"><br><h2 class="stroke"> Indian Origin Academicians Database</h2></div>
	      <div class="col-sm-3 col-xs-0 ">

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
		<br>
		
			<div id= "data">
			<?php 

			     $profid = mysqli_real_escape_string($conni,$_GET['id']);
			     $sqlquery= "SELECT * FROM `table 5` WHERE `sr no` = $profid  ";
                               
                               //mysql_select_db("prof");
                             
                               $result = mysqli_query($conni,$sqlquery);
                                 if(!$result){
                                 	die("error".mysqli_error($conni));
                                 }
                                   $r = mysqli_fetch_assoc($result);
                                   
			?>

				<div class="row">
                 <div class="col-sm-1"></div>
                 <div class="col-sm-3">
                <?php 
                 				
                                if($r['imgpresent']=='y'){
                                  $path='image/'.$r['sr no'].'.jpg';
                                	$image= '<img src="'. $path.'" width="100%" height="350px" class="img-rounded">';
                                 echo $image;
                               }
                                 
                               else{
                                $path='images/default.jpg';
                                 $image= '<img src="'. $path.'" width="100%" height="350px" class="img-rounded">';
                                 echo $image;
                               }
                                 
                ?>
                 </div>

                 <div class="col-sm-7">
                 <div class="outer well well-lg">
                     <div class="outerp">



                     <div class="panel panel-primary">
					 <div class="panel-heading "></div>
					 <div class="panel-body">
					 	<div class="inner">

						        <h4 ><span class="glyphicon glyphicon-user"></span> <?php echo $r['academician name'];?></h4><br>
						        
						        
						      
						         <h5> <span class='glyphicon glyphicon-briefcase'></span> <?php echo $r['designation_d'];?></h5>

						         <h5> <span class='glyphicon glyphicon-book'></span> <?php echo $r['department name'];?></h5>

						         <h5> <span class='glyphicon glyphicon-education'></span> <?php echo $r['which university/college'];?></h5>
						        
						     
                       </div>
					 </div>
					</div>
                            

                            
                 </div>
                 <div class="outerp">



                     <div class="panel panel-primary">
					 <div class="panel-heading ">Expertise</div>
					 <div class="panel-body">
					 	<div class="inner">

						        <h5 ><?php if(strtolower($r['specialization'])!="not found"){echo $r['specialization'];}?></h5><br>
						        
						        
						      
						         
						        
						     
                       </div>
					 </div>
					</div>
                            

                            
                 </div>
                 <div class="outerp">



                     <div class="panel panel-primary">
					 <div class="panel-heading ">Personal Information</div>
					 <div class="panel-body">
					 	<div class="inner">

						       
						        
						        <?php if(strtolower($r['office address'])!="not found"){ ?>
						        <h5 ><span class="glyphicon glyphicon-home"></span>  <?php echo $r['office address'];?></h5>
						        <?php } ?>
						        <?php
						         $outer = explode(",", $r['email id']);
                    
                                      for ($i=0; $i <count($outer) ; $i++) { 
                                        

                                        $inner = explode(" ",$outer[$i]);
                                        for ($j=0; $j <count($inner) ; $j++) { 
                                            

                                            $inner2 = explode(PHP_EOL,$inner[$j]);
                                              for ($k=0; $k <count($inner2) ; $k++) { 
                                            
                                            if(($inner2[$k]!=" ")&&($inner2[$k]!="")){
                                             echo "<h5><span class='glyphicon glyphicon-envelope'></span> "; echo $inner2[$k] ; echo"</h5>";
                                          }
                                          }
                                          }
                                      }


                                      ?>
                                      <?php if(strtolower($r['mobile no'])!="not found"&&!empty($r['mobile no'])){ ?>
						        <h5 ><span class="glyphicon glyphicon-earphone"></span> <?php echo $r['mobile no'];?></h5>

						        <?php } ?>

						        <?php if(!empty($r['personal website'])){ ?>
						        <h5 ><a href = " <?php echo $r['personal website'];?> "><span class="glyphicon glyphicon-globe"></span>   <?php echo $r['personal website'];?></h5></a>
						        <?php } ?>

						        <?php
                                

						        $outer = explode(",", $r['url']);
						        
						        for ($i=0; $i <count($outer) ; $i++) { 
						        	

						        	$inner = explode(" ",$outer[$i]);
						        	for ($j=0; $j <count($inner) ; $j++) { 
						        			

						        			$inner2 = explode(PHP_EOL,$inner[$j]);
						        	      for ($k=0; $k <count($inner2) ; $k++) { 
						        			

                                            if(($inner2[$k]!=" ")&&($inner2[$k]!="")){
						        			echo '<a href="'.$inner2
						        			[$k].'"> <p class="wrapbw"><span class="glyphicon glyphicon-globe"></span> '.$inner2[$k].'</p></a>';
						      				}
						        		}
						        		}
						        }

						       ?>

						        
						        
						        		
						         
						        
						     
                       </div>
					 </div>
					</div>
                            

                            
                 </div>

                  <div class="outerp">



                     <div class="panel panel-primary">
					 <div class="panel-heading ">Experience</div>
					 <div class="panel-body">
					 	<div class="inner">

						        <h5 ><?php if(strtolower($r['experience'])!="not found"){echo $r['experience'];}?></h5><br>
						        
						        
						      
						         
						        
						     
                       </div>
					 </div>
					</div>
                            

                            
                 </div>

                  <div class="outerp">



                     <div class="panel panel-primary">
					 <div class="panel-heading ">Qualification</div>
					 <div class="panel-body">
					 	<div class="inner">

						        <h5 ><?php if(strtolower($r['qualification'])!="not found"){ echo $r['qualification'];}?></h5><br>
						        
						        
						      
						         
						        
						     
                       </div>
					 </div>
					</div>
                            

                            
                 </div>

                 <div class="outerp">



                     <div class="panel panel-primary">
					 <div class="panel-heading ">Education</div>
					 <div class="panel-body">
					 	<div class="inner">

						        <table class="table table-striped">
								    <thead>
								      <tr>
								      	<th>Qualification</th>
								        <th>Degree</th>
								        <th>Discipline</th>
								        <th>University</th>
								        <th>Passing Year</th>
								      </tr>
								    </thead>
								    <tbody>
								      <tr>
								      	<td><strong>Under Graduation</strong></td>
								      	<td><?php echo $r['Graduation Degree'] ?></td>
								        <td><?php echo $r['Graduation Discipline'] ?></td>
								        <td><?php echo $r['Graduation University Name'] ?></td>
								        <td><?php echo $r['Graduation Passing Year'] ?></td>
								      </tr>
								      <tr>
								      	<td><strong>Post Graduation</strong></td>
								        <td><?php echo $r['Post Graduation Degree'] ?></td>
								        <td><?php echo $r['Post Graduation Discipline'] ?></td>
								        <td><?php echo $r['Post Graduation University Name'] ?></td>
								        <td><?php echo $r['Post Graduation Passing Year'] ?></td>
								      </tr>
								      <tr>
								      	<td><strong>Doctorate</strong></td>
								        <td><?php echo $r['Doctorate Degree'] ?></td>
								        <td><?php echo $r['Doctorate Discipline'] ?></td>
								        <td><?php echo $r['Doctorate University Name'] ?></td>
								        <td><?php echo $r['Doctorate Passing Year'] ?></td>
								      </tr>
								    </tbody>
								  </table>
						        
     
                       </div>
					 </div>
					</div>
                            

                            
                 </div>





                 </div>

				</div>
				

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
