<?php 
include("functions.php");
include("dbcon.php") ;
?>
<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.autocomplete.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
		<title>project</title>
    <script type="text/javascript">
      
      $(document).ready(function(){
        $('.scroll-Top').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        
      });
      })


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
		<div id="wrapper" class="greybg">
    <div class="whitebgnew">
      <div id="searchhome" class="whitebgnew">

        <div id="searchpagehome"> 
            <br><br><br><br>
              <form class="form-search" onsubmit="return myfun();" method="POST" id="s" action="searchresultfilter.php?i=1">
              
      
              <div class="row">
              <div class="col-md-4">
              <select class="form-control doubleborderinput" onchange="GetSelectedTextValue(this)" id="dd1" name="drop">
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
                                      <br>  <div id="show1"></div>
              </div>

              <div class="col-md-5" id="searchbar">
              
            <input type="text" id="s1" class="input-medium search-query form-control doubleborderinput" name="s"  required>
              </div>
              <div class="col-md-3">
              <input type="submit" class="btn add-on doubleborderinput" value="search">
              </div>
                

            
              </div>
              
            </form>
            <br><br>
         </div>   
      </div>
    </div>
    		
    <div class="crousal">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox" id="ci">
        <div class="item active">
        <br><p clas="text-center"><h1>
          Introduction about site
          </h1></p><br>

        </div>

        <div class="item">
          <br><p clas="text-center"><h1>
          Why site
           </h1></p><br>
        </div>

        <div class="item">
          <br><p clas="text-center"><h1>
          Who can Join
           </h1></p><br>
        </div>

        <div class="item">
          <br><p clas="text-center"><h1>
          What we offer
           </h1></p><br>
        </div>
      </div>

      
     </div>
    </div>

    

    <div class="whitebgnew" id="wbg">
    <br><br>
    <div class="data">


    <div class="row">
      <div class="col-sm-4 ">
      <div class="  showthings sectionbg">

      <h3 class="nomargin">Learning Section</h3>
      <hr class="nomargin">
      <br>
     <div class="row">
                  <div class="col-sm-5">
                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                      <div class="flipper">
                        <div class="front">
                         <a href="https://www.microsoft.com/india/unleash-your-future/Certification_Listing_page.aspx?action=getcertified" ><img src="images/micro.png" class="img-circle img-border" width="100" height="100" ></a>
                        </div>
                       <a href="https://www.microsoft.com/india/unleash-your-future/Certification_Listing_page.aspx?action=getcertified" > <div class="back">
                         <center><h5>Microsoft</h5></center>
                        </div></a>
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="col-sm-4">
                    <div>
                 <a href="https://www.microsoft.com/india/unleash-your-future/Certification_Listing_page.aspx?action=getcertified" >  <h4>Microsoft</h4></a>
                    </div>
                  </div>
       </div>
      
      

    <br />
    <div class="row">
                  <div class="col-sm-5">
                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                      <div class="flipper">
                        <div class="front">
                         <a href="hhttps://www.coursera.org/" ><img src="images/coursera.jpg" class="img-circle img-border" width="100" height="100" ></a>
                        </div>
                       <a href="https://www.coursera.org/" > <div class="back">
                         <center><h5>Coursera</h5></center>
                        </div></a>
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="col-sm-2">
                    <div>
                 <a href="https://www.coursera.org/" >  <h4>Coursera</h4></a>
                    </div>
                  </div>
       </div>

<br/>
        <div class="row">
                  <div class="col-sm-5">
                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                      <div class="flipper">
                        <div class="front">
                         <a href="https://www.mooc-list.com/" ><img src="images/mooc.jpg" class="img-circle img-border" width="100" height="100" ></a>
                        </div>
                       <a href="https://www.mooc-list.com/" > <div class="back">
                         <center><h5>Mooc -List</h5></center>
                        </div></a>
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="col-sm-4">
                    <div>
                 <a href="https://www.mooc-list.com/" >  <h4>Mooc-List</h4></a>
                    </div>
                  </div>
       </div>


      </div>
      </div>
      <div class="col-sm-4 ">
      <div class="  showthings sectionbg">
        <h3 class="nomargin">Job Opporturnity Section</h3>
      <hr class="nomargin">
         <br />
          <div class="row">
          <div class="col-sm-5">
            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
              <div class="flipper">
                <div class="front">
                 <a href="http://internshala.com/" ><img src="images/internshala.png" class="img-circle img-border" width="100" height="100" ></a>
                </div>
               <a href="http://internshala.com/" > <div class="back">
                 <center><h5>Intershala</h5></center>
                </div></a>
              </div>
            </div>
          </div>
          <br />
          <div class="col-sm-2">
            <div>
         <a href="http://internshala.com/" >   <h4>Intershala</h4></a>
            </div>
          </div>
    </div>

            <br />

             <div class="row">
                  <div class="col-sm-5">
                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                      <div class="flipper">
                        <div class="front">
                         <a href="https://www.naukri.com/assistant-professor-jobs" ><img src="images/n.jpg" class="img-circle img-border" width="100" height="100" ></a>
                        </div>
                       <a href="https://www.naukri.com/assistant-professor-jobs" > <div class="back">
                         <center><h5>Naukri.com</h5></center>
                        </div></a>
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="col-sm-2">
                    <div>
                 <a href="hhttps://www.naukri.com/assistant-professor-jobs" >  <h4>Naukri.com</h4></a>
                    </div>
                  </div>
            </div>

           <br />
            <div class="row">
                  <div class="col-sm-5">
                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                      <div class="flipper">
                        <div class="front">
                         <a href="https://www.timeshighereducation.com/unijobs/listings/lecturers-assistant-professors/" ><img src="images/uin.jpg" class="img-circle img-border" width="100" height="100" ></a>
                        </div>
                       <a href="https://www.timeshighereducation.com/unijobs/listings/lecturers-assistant-professors" > <div class="back">
                         <center><h5>Timeshighereducation</h5></center>
                        </div></a>
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="col-sm-2">
                    <div>
                 <a href="https://www.timeshighereducation.com/unijobs/listings/lecturers-assistant-professors" >  <h4>Timeshighereducation</h4></a>
                    </div>
                  </div>
            </div>





        </div>
      </div>
      <div class="col-sm-4 ">
      <div class="  showthings ">
        <h3 class="nomargin">Researcher Section</h3>
      <hr class="nomargin">
          <br/>

             <div class="row">
                  <div class="col-sm-5">
                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                      <div class="flipper">
                        <div class="front">
                         <a href="http://www.acm.org/" ><img src="images/acm.jpg" class="img-circle img-border" width="100" height="100" ></a>
                        </div>
                       <a href="http://www.acm.org/" > <div class="back">
                         <center><h5>ACM</h5></center>
                        </div></a>
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="col-sm-4">
                    <div>
                 <a href="http://www.acm.org/" >  <h4>ACM</h4></a>
                    </div>
                  </div>
          </div>
         
         <br />
           <div class="row">
                  <div class="col-sm-5">
                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                      <div class="flipper">
                        <div class="front">
                         <a href="https://www.ieee.org/conferences_events/index.html" ><img src="images/ieee.jpg" class="img-circle img-border" width="100" height="100" ></a>
                        </div>
                       <a href="https://www.ieee.org/conferences_events/index.html" > <div class="back">
                         <center><h5>IEEE</h5></center>
                        </div></a>
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="col-sm-4">
                    <div>
                 <a href="https://www.ieee.org/conferences_events/index.html" >  <h4>IEEE</h4></a>
                    </div>
                  </div>
          </div>

          <br />
           <div class="row">
                  <div class="col-sm-5">
                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                      <div class="flipper">
                        <div class="front">
                         <a href="https://www.springer.com/gp/librarians/conference-calendar/7716" ><img src="images/springer.png" class="img-circle img-border" width="100" height="100" ></a>
                        </div>
                       <a href="https://www.springer.com/gp/librarians/conference-calendar/7716" > <div class="back">
                         <center><h5>Springer</h5></center>
                        </div></a>
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="col-sm-4">
                    <div>
                 <a href="https://www.springer.com/gp/librarians/conference-calendar/7716" >  <h4>Springer</h4></a>
                    </div>
                  </div>
          </div>

        </div>
      </div>
    </div>
    </div>
    </div>
    <br><br>

    <div class="data">


    <div class="row">
      <div class="col-sm-5">
      <div class=" mar10 showthings">

      <h3 class="nomargin">Research Grants</h3>
      <hr class="nomargin">

      <br/>
        <div class="box">
                  
                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                      <div class="flipper">
                        <div class="front">
                         <a href="https://www.ncbs.res.in/rdo/sponsor-grants" ><img src="images/nb.png" class="img-circle img-border" width="100" height="100" ></a>
                        </div>
                       <a href="https://www.ncbs.res.in/rdo/sponsor-grants" > <div class="back">
                         <center><h5>NCBS</h5></center>
                        </div></a>
                      </div>
                    </div>
                  
                  
                    <div>
                 <a href="https://www.ncbs.res.in/rdo/sponsor-grants" >  <h4>&nbsp&nbspNCBS</h4></a>
                    </div>
                  
          </div>


        <div class="box">
                  
                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                      <div class="flipper">
                        <div class="front">
                         <a href="http://www.serb.gov.in/srg.php" ><img src="images/serb.png" class="img-circle img-border" width="100" height="100" ></a>
                        </div>
                       <a href="http://www.serb.gov.in/srg.php" > <div class="back">
                         <center><h5>SERB</h5></center>
                        </div></a>
                      </div>
                    </div>
                  
                
                  
                    <div>
                 <a href="http://www.serb.gov.in/srg.php" >  <h4>&nbsp &nbspSERB</h4></a>
                    </div>
                 
          </div>

      </div>
      </div>



      <div class="col-sm-7">
      <div class=" mar10 showthings">
        <h3 class="nomargin">Scholarships</h3>
         <hr class="nomargin">
         <br/>
      <div  class="box">
                 <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                      <div class="flipper">
                        <div class="front">
                         <a href="http://scholarship-positions.com/category/india-scholarships/" ><img src="images/s.png" class="img-circle img-border" width="100" height="100" ></a>
                        </div>
                       <a href="http://scholarship-positions.com/category/india-scholarships/" > <div class="back">
                         <center><h5>Scholarship-Positions</h5></center>
                        </div></a>
                      </div>
                    </div>
                  
                    <div>
                 <a href="http://scholarship-positions.com/category/india-scholarships/" >  <h5>Scholarship-Positions</h5></a>
                    </div>
                 
          </div>
   


     <div class="box">
            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
              <div class="flipper">
                <div class="front">
                 <a href="http://www.daaddelhi.org/en/14498/index.html" ><img src="images/daad.jpg" class="img-circle img-border" width="100" height="100" ></a>
                </div>

               <a href="http://www.daaddelhi.org/en/14498/index.html" > <div class="back">
                 <center><h5> DAAD</h5></center>
                </div></a>
              </div>
            </div>
            <div>
              <a href="http://www.daaddelhi.org/en/14498/index.html" >   <h4>&nbsp &nbsp &nbspDAAD</h4></a>
            </div>
        
      </div>

       <div class="box">
            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
              <div class="flipper">
                <div class="front">
                 <a href="http://scholarshipportal.com/" ><img src="images/study.png" class="img-circle img-border" width="100" height="100" ></a>
                </div>
               <a href="http://scholarshipportal.com/" > <div class="back">
                 <center><h5>Scholarshipportal</h5></center>
                </div></a>
              </div>
            </div>
        
          
            <div>
              <a href="http://scholarshipportal.com/" >   <h4>Scholarshipportal</h4></a>
            </div>
       </div>  


       <div class="box">
            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
              <div class="flipper">
                <div class="front">
                 <a href="http://www.topuniversities.com/blog/phd-funding-around-world" ><img src="images/top.png" class="img-circle img-border" width="100" height="100" ></a>
                </div>

               <a href="http://www.topuniversities.com/blog/phd-funding-around-world" > <div class="back">
                 <center><h5>TopUniversities</h5></center>
                </div></a>
              </div>
            </div>
        
          
            <div>
              <a href="http://www.topuniversities.com/blog/phd-funding-around-world" >   <h4>TopUniversities</h4></a>
            </div>
        
      </div>

    


      
        </div>
      </div>
		</div>
    </div>
<br>
<br>
    <div class="sch whitebgnew ">
    <div class="data showthings">
    <h3 class="nomargin"></h3>
    <hr class="nomargin">
    <br />
    </div>
    </div>	
        
			
			
		
		</div>
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

    </ul>    </div>
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
