<?php 

include("functions.php"); 
include("dbcon.php");

if(!$log){
    	header("location:login.html");
}
   
$fid= $_GET['fid'];

$up=0;
if(isset($_GET['up'])){
	$up=$_GET['up'];
}
?>
<!DOCTYPE html>

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<title>project</title>	
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="js/jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	     <script type="text/javascript" src="js/jquery.js"></script>
	     <script type="text/javascript" src="js/jquery-ui.js"></script>
		<script type="text/javascript">
     
			$(function () {
    $("#datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1940:2025",
        dateFormat: 'dd/mm/yy'

    });
});


		function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgshow').attr('src', e.target.result);
                $('#photo').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
             reader.readAsDataURL(input.files[0]);
        }
    }

	</script>
	<script type="text/javascript">
	function check1(val){
		var element=document.getElementById("broad");
		if(val=="Others"||val=='Choose Interest'){
			element.style.display="block"; 
	}else{
		element.style.display="none";
	}
}

	function check2(val){
		var element=document.getElementById("major");
		if(val=="Others"||val=='Choose Interest'){
			element.style.display="block"; 
	}else{
		element.style.display="none";
	}
}

	function check3(val){
		var element=document.getElementById("minor");
		if(val=="Others"||val=='Choose Interest'){
			element.style.display="block"; 
	}else{
		element.style.display="none";
	}
}

	function checkn(val){
		var element=document.getElementById("nationality");
		if(val=="Others"||val=='Choose Interest'){
			element.style.display="block"; 
	}else{
		element.style.display="none";
	}
}

	function checkdp(val){
		var element=document.getElementById("dep");
		if(val=="Other"||val=='Choose Interest'){
			element.style.display="block"; 
	}else{
		element.style.display="none";
	}
}

	function checkde(val){
		var element=document.getElementById("designation");
		if(val=="Other"||val=='Choose Interest'){
			element.style.display="block"; 
	}else{
		element.style.display="none";
	}
}

	function checkse(val){
		var element=document.getElementById("stat");
		if(val=="Other"||val=='Choose Interest'){
			element.style.display="block"; 
	}else{
		element.style.display="none";
	}
}

$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal("show");
    });
        $("#myModal").on('show.bs.modal', function () {
           
    });
});

function prev(){
	var date=document.getElementsByName('date')[0].value;
	var nationality=document.getElementsByName("nationality")[0].value;
	var gender=document.getElementsByName('gender')[0].value;
	if(gender=='Choose Gender')
		gender="";

	if(nationality=='Choose Nationality')
	    nationality ="";

	var birthplace=document.getElementsByName("birthplace")[0].value;

	var photo=document.getElementsByName("photo")[0].value;
	var currentaddress=document.getElementsByName("currentaddress")[0].value;
	var permanentaddress=document.getElementsByName("permanentaddress")[0].value;
	var state=document.getElementsByName("state")[0].value;

	var country=document.getElementsByName("country")[0].value;
	var scpreference=document.getElementsByName("scpreference")[0].value;
	var phone=document.getElementsByName("phone")[0].value;
	var mobile=document.getElementsByName("mobile")[0].value;

	var personalwebsite=document.getElementsByName("personalwebsite")[0].value;
	
    var totalexperience=document.getElementsByName("texp")[0].value;
	var work=document.getElementsByName("work")[0].value;

	var under1=document.getElementsByName("under1")[0].value;
	var under2=document.getElementsByName("under2")[0].value;
	var under3=document.getElementsByName("under3")[0].value;
	var post1=document.getElementsByName("post1")[0].value;

	var post2=document.getElementsByName("post2")[0].value;
	var post3=document.getElementsByName("post3")[0].value;
	var phone=document.getElementsByName("phone")[0].value;
	var phd1=document.getElementsByName("phd1")[0].value;

    var phd2=document.getElementsByName("phd2")[0].value;
	var phd3=document.getElementsByName("phd3")[0].value;
	var others1=document.getElementsByName("others1")[0].value;
	var others2=document.getElementsByName("others2")[0].value;

	var others3=document.getElementsByName("others3")[0].value;

	


	var facebook=document.getElementsByName("facebook")[0].value;
	var twitter=document.getElementsByName("twitter")[0].value;
	var linkedin=document.getElementsByName("linkedin")[0].value;

    var scopus=document.getElementsByName("scopus")[0].value;
	var google=document.getElementsByName("google")[0].value;
	var skype=document.getElementsByName("skype")[0].value;
	


	var stat=document.getElementsByName("statuslist")[0].value;

	if(stat=='Choose status')
	 stat='';
    
    if(stat=='Other')
      stat=document.getElementsByName("status")[0].value;

   var broad=document.getElementsByName("broadlist")[0].value;

	if(broad=='Choose Interest')
	 broad='';
    
    if(broad=='Other')
      broad=document.getElementsByName("broad")[0].value;

  var major=document.getElementsByName("majorlist")[0].value;

	if(major=='Choose Area')
	 major='';
    
    if(major=='Other')
      major=document.getElementsByName("major")[0].value;

  var minor=document.getElementsByName("minorlist")[0].value;

	if(minor=='Choose Area')
	 minor='';
    
    if(minor=='Other')
      minor=document.getElementsByName("minor")[0].value;

  
	 $('#date').html(date);
	 $('#gender').html(gender);
	 $('#nat').html(nationality);
	 $('#birthplace').html(birthplace);
	 
	 $('#permanentaddress').html(permanentaddress);
	 $('#currentaddress').html(currentaddress);

	  $('#state').html(state);
	 $('#country').html(country);
	 $('#scpreference').html(scpreference);
	 $('#phone').html(phone);
	 $('#mobile').html(mobile);
	 $('#personalwebsite').html(personalwebsite);
	 $('#totalexperience').html(totalexperience);

	 $('#under1').html(under1);
	 $('#under2').html(under2);
	 $('#under3').html(under3);
	 $('#post1').html(post1);
	 $('#post2').html(post2);
	 $('#post3').html(post3);
	 $('#phd1').html(phd1);
	 $('#phd2').html(phd2);
	 $('#phd3').html(phd3);
	 $('#others1').html(others1);
	 $('#others2').html(others2);
	 $('#others3').html(others3);

	 $('#twitter').html(twitter);
	 $('#facebook').html(facebook);
	 $('#skype').html(skype);
	 $('#linkedin').html(linkedin);
	 $('#scopus').html(scopus);
	 $('#google').html(google);

	 $('#broadarea1').html(broad);
	 $('#majorarea1').html(major);
	 $('#minorarea1').html(minor);
	 $('#stat1').html(stat);
	 $('#work').html(work);
	 
    
    
    
}

</script>


	<style>
  input[type=text] {
  height:19px;
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

</style>


	</head>
	
	<body>
<div id="alldata">

<div id="options">
	<nav class="navbar navbar-default navbar-fixed-top options ">
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
    	//header("location:login.html");

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
      <li><a ><span class="glyphicon glyphicon-user"></span> Hello <?php echo $name?> </a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>

    <?php 
    }
    ?>
  </div>
</nav>
</div>	

<br />
<br />	

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
                
		<div id="wrapper">


			<div id="main">
				
					<div class="innertube">

					<?php 

					$sql1 = "select * from faculty_personnel where faculty_id = '$fid' ;";
					 $res=  mysql_query($sql1,$conn);
						if(!$res){
							die("erroe1".mysqli_error($conni));
						}

						$r =mysqli_fetch_assoc($res);
					?>
				      <form action="teachersecondbackend.php?fid=<?php echo $fid ; ?>&up=<?php echo $up ;?>&s=1" method="POST" enctype="multipart/form-data">
				      
					   <div class="row">

					   <div class="col-sm-4"></div>
					   <div class="col-sm-7"><h2 class="text-muted">Government of India Initiative</h2></div>
					   </div> 
					   <br />
					   <br />
                      <div id="inner1">

                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                        <?php if(!$S){ ?>
                        <div class="ok">To save click save button   <input type="submit" class="btn btn-info" value="SAVE"  ></div>
                        <?php } else { ?>
                         <div class="ok">Your information have been saved.</div> 
                        }
                            
                       <br> 
                        <div class="well well-sm" align="center">Personal Information</div></div>
                        </div>
                        </div>
                        
                        
                     <div id=inner>
                     <br>
                     <br>
                         
					   <div class="row">
                          
                            <div class="col-md-3">
						    &nbsp &nbsp Date Of Birth
						    <div class="panel-body"><input type="text" id="datepicker" value="<?php if($up){ echo $r['dob'] ;} ?>" placeholder ="dd/mm/yyyy" name="date" class="form-control" ></div>
						    </div>
                         
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
						     &nbsp &nbsp Nationality
							 <div class="panel-body"><select class="form-control" name="nationalitylist" onchange="checkn(this.value)">
							    <option>Choose Nationality</option>
							    <option value="Indian"  >Indian</option>
							    <option <?php if($up){  echo 'selected' ;}?>>Others</option>
							</select>
							<br />
							  <input type="text" id="nationality" name="nationality" value="<?php if($up){ echo $r['nationality'] ;} ?>"  <?php if(!$up){ ?>style="display:none ;" <?php }?> placeholder="Type Nationality"/>
							</div>
							</div>
						    
						   

                            
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
						     &nbsp &nbsp Gender
						      <br />
							 <div class="panel-body"><select class="form-control" name="gender">
							    <option>Choose Gender</option>
							    <option  <?php if($up){ if($r['gender']=="Male"){ echo 'selected' ;}} ?> >Male</option>
							    <option><?php if($up){ if($r['gender']=="Female"){ echo 'selected' ;}} ?>Female</option>
							    <option><?php if($up){ if($r['gender']=="Other"){ echo 'selected' ;}} ?>Other</option>
							  </select>
							</div>
						   </div>
						    
					  
                        
                       <br /> 
                       </div>
					   <div class="row">
                          
						  
						    <div class="col-md-3">
						    &nbsp &nbsp Birthplace
						    <div class="panel-body"><input type="text"/ name="birthplace" placeholder="TYPE BIRTH PLACE"  value="<?php if($up){ echo $r['birthplace'] ;} ?>" ></div>
						    </div>
						    <div class="col-md-1"></div>

						    
						    
						    <div class="col-md-1 nomargin">
						    <?php 
						    if($up){
						    	echo '<img src="data:image/jpeg;base64,'.base64_encode($r['photo']) .' " width="90" height="100"/>';
						    }
						    else{
						    	?>
						    	 <img id="imgshow" src="images/noimg1.jpg" class="img-rounded" height="100" width="90">
						    	<?php 
						    }
						    ?>
						    	
						    </div>
						    <div class="col-md-1 nomargin">
						    <br>
						    <br>
						    <br>

						    	<input type="file" name="photo" id="imagechoose" onchange="readURL(this);" value="Select Image" >
						    </div>

						    
						    
					  </div>
                       
                       <br />
                       <br>
                       <br>
                        <div class="row">
                        <div class="col-sm-11"><div class="well well-sm" align="center">Contact Information</div>
                        </div>
                        </div>
                        
                         <br />
                         <br>
                         

					<?php 

					$sql1 = "select * from faculty_contact where faculty_id = '$fid' ;";
					 $res=  mysql_query($sql1,$conn);
						if(!$res){
							die("erroe1".mysqli_error($conni));
						}

						$r =mysqli_fetch_assoc($res);

					$sql11 = "select * from faculty_interest where faculty_id = '$fid' ;";
					 $res1=  mysql_query($sql11,$conn);
						if(!$res1){
							die("erroe1".mysqli_error($conni));
						}

						$r1 =mysqli_fetch_assoc($res1);	
					?>
                         
                         <div class="row">
                            <div class="col-md-5">
						    &nbsp &nbsp Current Address
						    <div class="panel-body"><input type="text"/ name="currentaddress" placeholder="TYPE CURRENT ADDRESS" value="<?php if($up){ echo $r['currentaddress'] ;} ?>" ></div>
						    </div>

                            <div class="col-md-1"></div>
						   <div class="col-md-5">
						    &nbsp &nbsp Permanent Address
						    <div class="panel-body"><input type="text"/ name="permanentaddress" placeholder="TYPE PERMANENT ADDRESS" value="<?php if($up){ echo $r['permanentaddress'] ;} ?>" ></div>
						    </div>

                            <div class="col-md-1"></div>
						  
						    
					   </div>

                       <br />
                       <br />
                       <div class="row">


                       		<div class="col-md-3">
						    &nbsp &nbsp State
						    <div class="panel-body"><input type="text"/ name="state" placeholder="TYPE STATE" value="<?php if($up){ echo $r['state'] ;} ?>" ></div></div>
                          
                          	<div class="col-md-1"></div>
						   <div class="col-md-3">
						    
						    &nbsp &nbsp Country
						    <div class="panel-body"><input type="text" name="country" placeholder="TYPE COUNTRY" value="<?php if($up){ echo $r['country'] ;} ?>" ></div></div>
						    

                            <div class="col-md-1"></div>

						    <div class="col-md-3">
						    &nbsp &nbsp State/city of Preference in India
						    <div class="panel-body"><input type="text"/ name="scpreference" placeholder="TYPE STATE/CITY" value="<?php if($up){ echo $r1['choiceofcity'] ;} ?>" ></div></div>
						    

                            
						    
						    
					   </div>

                       <br />
                       <br />

                       <div class="row">

                          
						    <div class="col-md-3">
						    &nbsp &nbsp Phone
						    <div class="panel-body"><input type="text"/ name="phone" placeholder="TYPE Phone Number" value="<?php if($up){ echo $r['phone'] ;} ?>"></div></div>

                            <div class="col-md-1"></div>
						      <div class="col-md-3">
						    &nbsp &nbsp Mobile
						    <div class="panel-body"><input type="text"/ name="mobile" placeholder="TYPE MOBILE NUMBER" value="<?php if($up){ echo $r['mobile'] ;} ?>" ></div></div>

                            <div class="col-md-1"></div>
						     <div class="col-md-3">
						    &nbsp &nbsp Personal Website
						    <div class="panel-body"><input type="text"/ name="personalwebsite" placeholder="TYPE PERSONAL WEBSITE" value="<?php if($up){ echo $r['website'] ;} ?>"></div></div>
						     

						   
						    
					   </div>

					     <br />
					     <br />
					     <br>
					                           
                        <div class="row">

                       <?php  $sql1 = "select * from faculty_experience where faculty_id = '$fid' ;";
					 $res=  mysql_query($sql1,$conn);
						if(!$res){
							die("erroe1".mysqli_error($conni));
						}

						$r =mysqli_fetch_assoc($res);

						?>
                       
                        <div class="col-sm-11"><div class="well well-sm" align="center">Academic Information</div></div>
                        </div>
                        <br>
                        <br>
					     <div class="row">
                          
						  <div class="col-md-3">
						     &nbsp &nbsp Broad Area Of Interest
							 <div class="panel-body"><select class="form-control" name="broadlist" id="broadarea" onchange="check1(this.value)">
							    <option >Choose Interest</option>
							    <option value=engineering>Engineering</option>
							    <option value="agricuture">Agrilculture</option>
							    <option value="law">Law</option>
							     <option <?php if($up){ echo 'selected'; }?> >Other</option>
							  </select>
							  <br />
							  <input type="text" id="broad" name="broad" <?php if(!$up){ ?>style="display:none ;" <?php }?> placeholder="Type Interest" value="<?php if($up){ echo $r1['broadarea'] ;} ?>">
							</div>
							</div>

                            <div class="col-md-1"></div>
						     <div class="col-md-3">
						     &nbsp &nbsp Major Area 
							 <div class="panel-body"><select class="form-control" name="majorlist" id="majorarea"onchange="check2(this.value)">
							    <option>Choose Area</option>
							    <option>CSE</option>
							    <option>ECE</option>
							    <option>MECH</option>
							     <option <?php if($up){ echo 'selected';} ?> >Other</option>
							  </select>
							   <br />
							  <input type="text" id="major" name="major" <?php if(!$up){ ?>style="display:none ;" <?php }?> placeholder="Type Interest"  value="<?php if($up){ echo $r1['majorarea'] ;} ?>"/>
							</div>
							</div>


                            <div class="col-md-1"></div>
						     <div class="col-md-3">
						     &nbsp &nbsp Minor Area
							 <div class="panel-body"><select class="form-control" name="minorlist" id="minorarea" onchange="check3(this.value)">
							    <option>Choose Area</option>
							    <option>data mining</option>
							    <option>cloud computing</option>
							    <option>crytography</option>
							     <option <?php if($up){ echo 'selected';} ?> >Other</option>
							  </select>
							   <br />
							  <input type="text" id="minor" name="minor" <?php if(!$up){ ?>style="display:none ;" <?php }?> placeholder="Type Interest"  value="<?php if($up){ echo $r1['minorarea'] ;} ?>">
							</div>
							</div>

						    
					   </div>

                      
                       <br />
                       <br />
                       <div class="row">
                          
						   
						      <div class="col-md-3">
						     &nbsp &nbsp Status
						    <div class="panel-body">
							<select class="form-control" name="statuslist"  onchange="checkse(this.value)">
							    <option>Choose status</option>
							    <option>Tenure track</option>
							    <option>Permanent</option>
							    <option>contract</option>
							    <option>Other <?php if($up){ echo 'selected';} ?></option>
							  </select>
							  <br />
 							  <input type="text" id="stat" name="status" <?php if(!$up){ ?>style="display:none ;" <?php }?> placeholder="Type status" value="<?php if($up){ echo $r['facultystatus'] ;} ?>">
							</div>
                            </div>
                            <div class="col-md-1"></div>
						     `<div class="col-md-6">
                             &nbsp &nbsp Total Experience(in years)
						    <div class="panel-body"><input type="text"/ name="texp" placeholder="TYPE TOTAL EXPERIENCE" value="<?php if($up){ echo $r['totalexperience'] ;} ?>"></div></div>
                            <div class="col-md-1"></div>
						    
                       						    
					   </div>

                       <br />
                       <br />
					  
                         
                         
                       	<div class="row">
                          
						   <div class="col-md-7">
						    &nbsp &nbsp Work Description
						    <div class="panel-body"><input type="text" name="work" placeholder="TYPE WORK DESCRIPTION" value="<?php if($up){ echo $r1['interestdescription'] ;} ?>"></div>
						    </div>
						    
						 </div>
					 

                    <br />
                    <br />
                    <br>
                     <?php  $sql1 = "select * from faculty_academia where faculty_id = '$fid' ;";
					 $res=  mysql_query($sql1,$conn);
						if(!$res){
							die("erroe1".mysqli_error($conni));
						}

						$r =mysqli_fetch_assoc($res);

						?>
                    <div id="inner1">
                    <div class="row">
                        <div class="col-sm-11"><div class="well well-sm" align="center">Educational Qualification</div></div>
                        </div>
                        </div>
                        <br />
                        <br>
					   <div id="inner1">
					   <div class="row">
					   <div class="col-md-11">
                      <table  class="table borderless">
						    <thead>
						      <tr>
						        <th>Degree</th>
						        <th>Discipline with Specialization</th>
						        <th>University/Institute Name</th>
						        <th>Passing Year</th>
						      </tr>
						    </thead>
						    <tbody>

	
						      <tr>
						        <td>Undergraduate</td>
						        <td><input type="text" name="under1" style="width:200px;" value="<?php if($up){ echo $r['undergradusatediscipline'] ;} ?>"/></td>
						        <td><input type="text" name="under2" style="width:200px;" value="<?php if($up){ echo $r['undergradusateuniversity'] ;} ?>"></td>
						        <td><input type="text" name="under3" style="width:100px;" value="<?php if($up){ echo $r['ugyear'] ;} ?>"></td>
						      </tr>
						      <tr>
						        <td>Postgraduate</td>
						        <td><input type="text" name="post1" style="width:200px;" value="<?php if($up){ echo $r['postdiscipline'] ;} ?>"/></td>
						        <td><input type="text" name="post2" style="width:200px;" value="<?php if($up){ echo $r['postgraduateuniversity'] ;} ?>"/></td>
						        <td><input type="text" name="post3" style="width:100px;" value="<?php if($up){ echo $r['pgyear'] ;} ?>"/></td>
						      </tr>
						      <tr>
						        <td>PHD</td>
						        <td><input type="text" name="phd1"  style="width:200px;" value="<?php if($up){ echo $r['doctoratediscipline'] ;} ?>"/></td>
						        <td><input type="text" name="phd2"  style="width:200px;" value="<?php if($up){ echo $r['doctorateuniversity'] ;} ?>"/></td>
						        <td><input type="text" name="phd3"  style="width:100px;" value="<?php if($up){ echo $r['phdyear'] ;} ?>"/></td>
						      </tr>
						        <tr>
						        <td>Others</td>
						        <td><input type="text" name="others1" style="width:200px;" value="<?php if($up){ echo $r['otherdiscipline'] ;} ?>"/></td>
						        <td><input type="text" name="others2" style="width:200px;" value="<?php if($up){ echo $r['otheruniversity'] ;} ?>"/></td>
						        <td><input type="text" name="others3"  style="width:100px;" value="<?php if($up){ echo $r['otheryear'] ;} ?>"/></td>
						      </tr>
						    </tbody>
						  </table>
						  </div>
						  </div>
                      </div>

                    <br />
                    <br />
                    <br>
                    <?php  $sql1 = "select * from faculty_webpresence where faculty_id = '$fid' ;" ;
					 $res=  mysql_query($sql1,$conn);
						if(!$res){
							die("erroe1".mysqli_error($conni));
						}

						$r =mysqli_fetch_assoc($res);

						?>
                    <div class="row">
                        <div class="col-sm-11"><div class="well well-sm" align="center">Web Presence(if any)</div></div>
                        </div>
					   <div >
					<br />
                    <br />
                    
					   <div >
                          <div class="row">
                           <div class="col-md-3">
						    &nbsp &nbsp Twitter ID
						    <div class="panel-body"><input type="text"/ name="twitter" placeholder="TYPE id" value="<?php if($up){ echo $r['twitterid'] ;} ?>"  ></div></div>
                            

                            <div class="col-md-1"></div>
						    <div class="col-md-3">
						    &nbsp &nbsp Facebook ID
						    <div class="panel-body"><input type="text"/ name="facebook" placeholder="TYPE id" value="<?php if($up){ echo $r['facebookid'] ;} ?>"></div></div>
                          

                            <div class="col-md-1"></div>
						    <div class="col-md-3">
						    &nbsp &nbsp Skype ID
						    <div class="panel-body"><input type="text"/ name="skype" placeholder="TYPE id" value="<?php if($up){ echo $r['skypeid'] ;} ?>" ></div></div>
                           
						    
					   </div>
					  </div>
                     
                    <br />
                    <br />
					  <div >
                          <div class="row">
                            <div class="col-md-3">
						    &nbsp &nbsp Linkedin ID
						    <div class="panel-body"><input type="text"/ name="linkedin" placeholder="TYPE id" value="<?php if($up){ echo $r['linkedinid'] ;} ?>" ></div></div>
                          

                            <div class="col-md-1"></div>
						    <div class="col-md-3">
						    &nbsp &nbsp Scopus ID
						    <div class="panel-body"><input type="text"/ name="scopus" placeholder="TYPE id" value="<?php if($up){ echo $r['scopusid'] ;} ?>"></div></div>
                           

                            <div class="col-md-1"></div>
						    <div class="col-md-3">
						    &nbsp &nbsp Google Scholar ID
						    <div class="panel-body"><input type="text"/ name="google" placeholder="TYPE id" value="<?php if($up){ echo $r['googlescholarid'] ;}  ?>"></div></div>
                            
						    
					   </div>
					  </div>

					  <br/>
					  <br/>
					 
					   <div id="inner1">
                          <div class="row">
                            <div class="col-md-3"></div>
                            

                            
                           
						  
						    
					   </div>
					  </div>
                       

                      </form>

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
						     <tr class="success">
						        <td>Basic Information:</td>
						        <td><span id=""></span>  </td>
						      </tr>
						     <tr class="active">
						        <td>Date of Birth:</td>
						        <td><span id="date"></span></td>
						        
						        
						      </tr>
						     <tr class="active">
						        <td>Nationality:</td>
						        <td><span id="nat"></span></td>
						      </tr>
						      <tr class="active">
						        <td>Gender:</td>
						        <td><span id="gender"></span></td>
						      </tr>
						        <tr class="active">
						        <td> Birthplace:</td>
						        <td><span id="birthplace"></span></td>
						      </tr>
						     <tr class="active">4
						        <td>Photo:</td>
						        <td><img id="photo" src="images/noimg1.jpg" class="img-rounded" height="100" width="90"></td>
						      </tr>

						      <tr class="success">
						        <td>Contact Information </td>
						        <td><span id=""></span>  </td>
						      </tr>
						     <tr class="active">
						        <td>Current Address:</td>
						        <td><span id="currentaddress"></span></td>
						      </tr>
						       <tr class="active">
						        <td>Permanent Address: </td>
						        <td><span id="permanentaddress"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>State: </td>
						        <td><span id="state"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Country: </td>
						        <td><span id="country"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>State/City of Preference in India: </td>
						        <td><span id="scpreference"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Phone: </td>
						        <td><span id="phone"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Mobile: </td>
						        <td><span id="mobile"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Personal Website: </td>
						        <td><span id="personalwebsite"></span>  </td>
						      </tr>
						     

						      <tr class="success">
						        <td>Academic Information </td>
						        <td><span id=""></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Broad Area of Interest: </td>
						        <td><span id="broadarea1"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Major area of Interest: </td>
						        <td><span id="majorarea1"></span>  </td>
						      </tr>
						      <tr class="active">
						        <td>Minor area of Interest: </td>
						        <td><span id="minorarea1"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Status: </td>
						        <td><span id="stat1"></span>  </td>
						      </tr>
						      <tr class="active">
						        <td>Total Experience: </td>
						        <td><span id="totalexperience"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Work: </td>
						        <td><span id="work"></span>  </td>
						      </tr>

						      
						      <tr class="success">
						        <td>Educational Qualification:</td>
						        <td><span id=""></span>  </td>
						      </tr>
						      <tr class="info">
						        <td>
						            Undergraduate</td>
						        <td><span id=""></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Discipline with Specialization: </td>
						        <td><span id="under1"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>University/Institute Name: </td>
						        <td><span id="under2"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Passing Year: </td>
						        <td><span id="under3"></span>  </td>
						      </tr>

						       <tr class="info">
						        <td>
						             Postgraduate </td>
						        <td><span id=""></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Discipline with Specialization: </td>
						        <td><span id="post1"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>University/Institute Name: </td>
						        <td><span id="post2"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Passing Year: </td>
						        <td><span id="post3"></span>  </td>
						      </tr>

						       <tr class="info">
						        <td>
						             PHD </td>
						        <td><span id=""></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Discipline with Specialization: </td>
						        <td><span id="phd1"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>University/Institute Name: </td>
						        <td><span id="phd2"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Passing Year: </td>
						        <td><span id="phd3"></span>  </td>
						      </tr>
 
                               <tr class="info">
						        <td>
						             Others </td>
						        <td><span id=""></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Discipline with Specialization: </td>
						        <td><span id="others1"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>University/Institute Name: </td>
						        <td><span id="others2"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Passing Year: </td>
						        <td><span id="others3"></span>  </td>
						      </tr>

						     
						       
						       <tr class="success">
						        <td>Web Presence </td>
						        <td><span id=""></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Twitter Id: </td>
						        <td><span id="twitter"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Facebook Id: </td>
						        <td><span id="facebook"></span>  </td>
						      </tr>
						      <tr class="active">
						        <td>Skype Id: </td>
						        <td><span id="skype"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Linkedin Id: </td>
						        <td><span id="linkedin"></span>  </td>
						      </tr>
						      <tr class="active">
						        <td>Scopus Id: </td>
						        <td><span id="scopus"></span>  </td>
						      </tr>
						       <tr class="active">
						        <td>Google Id: </td>
						        <td><span id="google"></span>  </td>
						      </tr>

						      <tr class="success">
						        <td> </td>
						        <td><span id=""></span>  </td>
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

					</div> 
				
			</div>
			
			</div>
		
		</div>
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
