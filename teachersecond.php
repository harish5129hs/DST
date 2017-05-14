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

$s=0;
if(isset($_GET['s'])){
	$s=$_GET['s'];
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
		<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
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
                $('#pphoto').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
             //reader.readAsDataURL(input.files[0]);
        }
    }

	</script>
	<script type="text/javascript">
	function check1(val){
		var element=document.getElementById("broad");
		if(val=="Other"||val=='Choose Interest'){
			element.style.display="block"; 
	}else{
			element.style.display="none";

		   removeOptionsAlternate(document.getElementById('majorarea'));

		   var x = document.getElementById("broadarea").value;
		   var y = document.getElementById("majorarea");
		   var option = document.createElement("option");
		   option.text = "Choose Area";

		   y.add(option);
		   console.log(x);

		   $.post("getmajor.php",{department : x},
		    function(result){
		    	console.log(result);
		      var res = result.split("+");

		      for (var i = res.length - 1; i >= 0; i--) {
		       var x = document.getElementById("majorarea");
		       var option = document.createElement("option");
		       option.text = res[i];

		       x.add(option);
		     }
		     var option = document.createElement("option");
		   option.text = "Other";

		   y.add(option);
		   });

		   
 		}


	}





 function removeOptionsAlternate(obj) {
  if (obj == null) return;
  if (obj.options == null) return;
  while (obj.options.length > 0) {
    obj.remove(0);
  }
}

	function check2(val){
		var element=document.getElementById("major");
		if(val=="Other"||val=='Choose Interest'){
			element.style.display="block"; 
	}else{
		element.style.display="none";
	}
}

	function check3(val){
		var element=document.getElementById("minor");
		if(val=="Other"||val=='Choose Interest'){
			element.style.display="block"; 
	}else{
		element.style.display="none";
	}
}

	function checkn(val){
		var element=document.getElementById("nationality");
		if(val=="Other"||val=='Choose Interest'){
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
		element.style.dZisplay="none";
	}
}

$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal("show");
    });
        $("#myModal").on('show.bs.modal', function () {
           
    });

       $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        
      });
    } // End if
  });



	$('#university1,#university2,#university3,#university4').devbridgeAutocomplete({
	    serviceUrl: 'universitysuggestions.php',
 	});
 	$('#bcity,#pcity').devbridgeAutocomplete({
	    serviceUrl: 'citysuggestions.php',
 	});



});


function addressfun(){
	//alert("hello");
	var x =document.getElementById("ac").checked;
	//alert(x);
	if(x){
		var add = document.getElementById("currentaddressf").value;
		//alert(add);
		$('#permanentaddressf').val(add);
	}
	else{
		$('#permanentaddressf').val('');

	}
}

function prev(){
	var date=document.getElementsByName('date')[0].value;
	var nationality;
	var gender=document.getElementsByName('gender')[0].value;
	if(gender=='Choose Gender')
		gender="";

	

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

  var nationality=document.getElementsByName("nationalitylist")[0].value;

	if(nationality=='')
	 nationality='';
    
    if(nationality=='Other')
      nationality=document.getElementsByName("nationality")[0].value;

  
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
      <li><a href="afterlogin.php"><span class="glyphicon glyphicon-user"></span> Hello <?php echo $name?> </a></li>
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

					//to get value from tecaher database to show in this page
					$getrow='';

					if(!$up){
					$firstname=$_SESSION['teacher_firstname'];
				    $middlename=$_SESSION['teacher_middlename'];
				    $lastname=$_SESSION['teacher_lastname'];
				    $email=$_SESSION['teacher_email'];
				    $employer=$_SESSION['teacher_employer'];
				    $designation=$_SESSION['teacher_designation'];
				    $department=$_SESSION['teacher_department'];
				    if(!empty($middlename)){
				   		$name = $firstname.' '.$middlename.' '.$lastname;
					}else{
						$name = $firstname.' '.$lastname;
					}

				    $getquery = "select * from `table 5` where  (`academician name` = '$name' and (`department`='$department' or `department name`='$department' ) and (`designation` = '$designation' or`designation_d` = '$designation') and `which university/college` = '$employer' ) or (`email id` like '$username')or((`email id` like '%,%')and(`email id` like '$username,%' or `email id` like '%,$username' or `email id` like '%,$username,%') ) ;"; 
				    
				    //$getquery = mysqli_real_escape_string($conni,$getquery);
				   	// echo  $getquery ;

				    $getres=  mysqli_query($conni,$getquery);
					if(!$getres){
						die("erroe1".mysqli_error($conni));
					}

					$getrow =mysqli_fetch_assoc($getres);

					echo $getrow['academician name'];
					

				    //end of getting 
				}
					$sql1 = "select * from faculty_personnel where faculty_id = '$fid' ;";
					 $res=  mysqli_query($conni,$sql1);
						if(!$res){
							die("erroe1".mysqli_error($conni));
						}

						$r =mysqli_fetch_assoc($res);

					?>

					
				      <form action="teachersecondbackend.php?fid=<?php echo $fid ; ?>&up=<?php echo $up ;?>" method="POST" enctype="multipart/form-data">
				      
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

                       
                        
                          <ul class=" nav nav-tabs">
                           <li class="active"><a > Quick Links</a></li>
                        <li><a href="#personal">Personal Information</a></li>
                        <li><a href="#contact">Contact Information</a></li>
                        <li><a href="#academic">Academic Information</a></li>
                        <li><a href="#edu">Educational Qualifications</a></li>
                        <li><a href="#web">Web Presence</a></li>
                        </ul>
                        <br>
                        <br>
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
                        
                        <?php if($s) { ?> <div class="ok"><strong>Your information is saved successfully.</strong></div> <?php  } ?>
                      
                        <div class="well well-sm" align="center">Personal Information</div></div>
                        </div>
                        </div>
                        
                        <div id="personal"></div>
                     <div id=inner>
                     <br>
                     <br>
                         
					   <div class="row">
                          
                            <div class="col-md-3">
						   <strong> &nbsp &nbsp Date Of Birth</strong>
						    <div class="panel-body"><input type="text" id="datepicker" value="<?php if($up){ echo $r['dob'] ;}else{ if($getrow){ echo $getrow['date of birth']; }} ?>" placeholder ="dd/mm/yyyy" name="date" class="form-control" ></div>
						    </div>
                         
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
						    <strong> &nbsp &nbsp Nationality </strong>
							 <div class="panel-body"><select class="form-control" name="nationalitylist" onchange="checkn(this.value)">
							    <option value="">Choose Nationality</option>
							    <option value="Indian" <?php if($getrow&&$getrow['nationality']=="Indian"){  echo 'selected' ;}?> >Indian</option>
							    <option <?php if($up||($getrow&&$getrow['nationality']!="Indian")){  echo 'selected' ;}?>>Other</option>
							</select>
							<br />
							  <input type="text" id="nationality" name="nationality" value="<?php if($up){ echo $r['nationality'] ;}else{ if($getrow){ echo $getrow['nationality']; } } ?>"  <?php if(!$up&&($getrow&&$getrow['nationality']=="Indian")){ ?>style="display:none ;" <?php }?> placeholder="Type Nationality"/>
							</div>
							</div>
						    
						   

                            
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
						    <strong> &nbsp &nbsp Gender</strong>
						      <br />
							 <div class="panel-body"><select class="form-control" name="gender">
							    <option value="">Choose Gender</option>
							    <option  <?php if($up){ if($r['gender']=="Male"){ echo 'selected' ;}} ?> >Male</option>
							    <option<?php if($up){ if($r['gender']=="Female"){ echo 'selected' ;}} ?> >Female</option>
							    <option<?php if($up){ if($r['gender']=="Other"){ echo 'selected' ;}} ?> >Other</option>
							  </select>
							</div>
						   </div>
						    
					  
                        
                       <br /> 
                       </div>
					   <div class="row">
                          
						  
						    <div class="col-md-3">
						    <strong>&nbsp &nbsp Birthplace</strong>
						    <div class="panel-body"><input type="text"/ name="birthplace"  id="bcity" placeholder="Type Birth Place" value="<?php if($up){ echo $r['birthplace'] ;} ?>" ></div>
						    </div>
						    <div class="col-md-1"></div>

						    
						    
						    <div class="col-md-1 nomargin">
						    <?php 
						    $_SESSION['got photo']='';
						    $_SESSION['found photo']='';
						    if(($up&&!empty($r['photo']))){
						    	echo '<img src="data:image/jpeg;base64,'.base64_encode($r['photo']) .' " width="90" height="100" id="imgshow"/>';
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
                       <div id="contact"></div>
                        <div class="row">
                        
                        <div class="col-sm-11"><div class="well well-sm" align="center">Contact Information</div>
                        </div>
                        </div>
                        
                         <br />
                         <br>
                         

					<?php 

					$sql1 = "select * from faculty_contact where faculty_id = '$fid' ;";
					 $res=  mysqli_query($conni,$sql1);
						if(!$res){
							die("erroe1".mysqli_error($conni));
						}

						$r =mysqli_fetch_assoc($res);

					$sql11 = "select * from faculty_interest where faculty_id = '$fid' ;";
					 $res1=  mysqli_query($conni,$sql11);
						if(!$res1){
							die("erroe1".mysqli_error($conni));
						}

						$r1 =mysqli_fetch_assoc($res1);	
					?>
                         
                         <div class="row">
                            <div class="col-md-5">
						   <strong> &nbsp &nbsp Current Address</strong>
						    <div class="panel-body"><input type="text" id="currentaddressf" name="currentaddress" placeholder="Type Current Address" value="<?php if($up){ echo $r['currentaddress'] ;}else{
						     if($getrow&&$getrow['office address']!='not found'){ echo $getrow['office address']; }} ?>" ></div>
						    </div>

                            <div class="col-md-1"></div>
						   <div class="col-md-5">
						    <strong>&nbsp &nbsp Permanent Address</strong>&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp <div class="checkbox nomargin" style="display:inline-block">
															  <label style="display:inline-block;color:grey;"><input type="checkbox" value="" id="ac" onchange="addressfun();">Same as Current Address</label>
															</div>
						    <div class="panel-body"><input type="text" name="permanentaddress" id="permanentaddressf" placeholder="Type Permanent Address" value="<?php if($up){ echo $r['permanentaddress'] ;} ?>" ></div>
						    </div>

                            <div class="col-md-1"></div>
						  
						    
					   </div>

                       <br />
                       <br />
                       <div class="row">

                       		<?php
                       			if(!$up){
                       			$found = 'n';
                       			$university = $employer;
                       			$statename='';
                       			$countryname='';

                       			$univqry = "select * from university where name ='$university';";
                       			$ures=  mysqli_query($conni,$univqry);
								if(!$ures){
									die("erroe1".mysqli_error($conni));
								}

								$ur =mysqli_fetch_assoc($ures);
								$sid= $ur['stateid'];

								$stateqry = "select * from state where stateid ='$sid';";
                       			$sres=  mysqli_query($conni,$stateqry);
								if(!$sres){
									die("erroe1".mysqli_error($conni));
								}
								

								$sr =mysqli_fetch_assoc($sres);
								$cid= $sr['countryid'];
								$statename = $sr['statename'];

								$countryqry = "select * from country where countryid ='$cid';";
                       			$cres=  mysqli_query($conni,$countryqry);
								if(!$cres){
									die("erroe1".mysqli_error($conni));
								}

								$cr =mysqli_fetch_assoc($cres);
								$countryname = $cr['countryname'];

                       		}
                       		?>

                       		<div class="col-md-3">
						    <strong>&nbsp &nbsp State</strong>
						    <div class="panel-body"><input type="text"/ name="state" placeholder="Type State" value="<?php if($up){ echo $r['state'] ;}else{ echo $statename;} ?>" ></div></div>
                          
                          	<div class="col-md-1"></div>
						   <div class="col-md-3">
						    
						   <strong> &nbsp &nbsp Country</strong>
						    <div class="panel-body"><input type="text" name="country" placeholder="Type Country" value="<?php if($up){ echo $r['country'] ;}else{ echo $countryname ; } ?>" ></div></div>
						    

                            <div class="col-md-1"></div>

						    <div class="col-md-3">
						    <strong>&nbsp &nbsp State/City of Preference in India</strong>
						    <div class="panel-body"><input type="text"/ name="scpreference" id="pcity" placeholder="Type State/City" value="<?php if($up){ echo $r1['choiceofcity'] ;} ?>" ></div></div>
						    

                            
						    
						    
					   </div>

                       <br />
                       <br />

                       <div class="row">

                          
						    <div class="col-md-3">
						   <strong> &nbsp &nbsp Phone</strong>
						    <div class="panel-body"><input type="text"/ name="phone" placeholder="Type Phone Number" value="<?php if($up){ echo $r['phone'] ;} ?>"></div></div>

                            <div class="col-md-1"></div>
						      <div class="col-md-3">
						    <strong>&nbsp &nbsp Mobile</strong>
						    <div class="panel-body"><input type="text"/ name="mobile" placeholder="Type Mobile Number" value="<?php if($up){ echo $r['mobile'] ;}else{ if($getrow&&$getrow['mobile no']!='not found'){ echo $getrow['mobile no']; }} ?>" ></div></div>

                            <div class="col-md-1"></div>
						     <div class="col-md-3">
						    <strong>&nbsp &nbsp Personal Website</strong>
						    <div class="panel-body"><input type="text"/ name="personalwebsite" placeholder="Type Personal Website" value="<?php if($up){ echo $r['website'] ;}else{ if($getrow){ echo $getrow['personal website']; }} ?>"></div></div>
						     

						   
						    
					   </div>

					     <br />
					     <br />
					     <br>
					         <div id="academic"></div>                   
                        <div class="row">

                       <?php  $sql1 = "select * from faculty_experience where faculty_id = '$fid' ;";
					 $res=  mysqli_query($conni,$sql1);
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
						     <strong>&nbsp &nbsp Broad Area of Interest</strong>(e.g. Engineering)
							 <div class="panel-body"><select class="form-control" name="broadlist" id="broadarea" onchange="check1(this.value)">
							    <option value="">Choose Interest</option>



							     <?php 

					               $querydeptt = "select distinct `department` from skill order by `department`" ;

					         //mysql_select_db("prof");
					               $resultdeptt = mysqli_query($conni,$querydeptt);

					               $rdeptt = mysqli_fetch_assoc($resultdeptt);
					               while($rdeptt){
					                echo '<option value="'.$rdeptt['department'].'">'.$rdeptt['department'].'</option>';
					                $rdeptt = mysqli_fetch_assoc($resultdeptt);
					              }

					              ?>





							     <option <?php if($up||$getrow){ echo 'selected'; }?> >Other</option>
							  </select>
							  <br />
							  <input type="text" id="broad" name="broad" <?php if(!$up&&!$getrow){ ?>style="display:none ;" <?php }?> placeholder="Type Broad Area" value="<?php if($up){ echo $r1['broadarea'] ;}else{if($getrow){ echo $getrow['department name']; }} ?>">
							</div>
							</div>

                            <div class="col-md-1"></div>
						     <div class="col-md-3">
						    <strong> &nbsp &nbsp Major Area</strong>(e.g. Mechanical )
							 <div class="panel-body">



							 <select class="form-control" name="majorlist" id="majorarea"onchange="check2(this.value)">
							    <option value="">Choose Area</option>
							    <option>CSE</option>
							    <option>ECE</option>
							    <option>MECH</option>
							     <option <?php if($up){ echo 'selected';} ?> >Other</option>
							  </select>



							   <br />
							  <input type="text" id="major" name="major" <?php if(!$up){ ?>style="display:none ;" <?php }?> placeholder="Type Major Area"  value="<?php if($up){ echo $r1['majorarea'] ;} ?>"/>
							</div>
							</div>


                            <div class="col-md-1"></div>
						     <div class="col-md-3">
						    <strong> &nbsp &nbsp Minor Area</strong>(e.g. Manufacturing  )
							 <div class="panel-body"><select class="form-control" name="minorlist" id="minorarea" onchange="check3(this.value)">
							    <option value="">Choose Area</option>
							    <option>data mining</option>
							    <option>cloud computing</option>
							    <option>crytography</option>
							     <option <?php if($up){ echo 'selected';} ?> >Other</option>
							  </select>
							   <br />
							  <input type="text" id="minor" name="minor" <?php if(!$up){ ?>style="display:none ;" <?php }?> placeholder="Type Minor Area"  value="<?php if($up){ echo $r1['minorarea'] ;} ?>">
							</div>
							</div>

						    
					   </div>

                      
                       <br />
                       <br />
                       <div class="row">
                          
						   
						      <div class="col-md-3">
						     <strong>&nbsp &nbsp Status</strong>
						    <div class="panel-body">
							<select class="form-control" name="statuslist"  onchange="checkse(this.value)">
							    <option value="">Choose status</option>
							    <option>Tenure track</option>
							    <option>Permanent</option>
							    <option>contract</option>
							    <option <?php if($up){ echo 'selected';} ?>>Other </option>
							  </select>
							  <br />
 							  <input type="text" id="stat" name="status" <?php if(!$up){ ?>style="display:none ;" <?php }?> placeholder="Type Status" value="<?php if($up){ echo $r['facultystatus'] ;} ?>">
							</div>
                            </div>
                            <div class="col-md-1"></div>
						     `<div class="col-md-6">
                             <strong>&nbsp &nbsp Total Experience(in Years)</strong>
						    <div class="panel-body"><input type="text"/ name="texp" placeholder="Type Total Experience" value="<?php if($up){ echo $r['totalexperience'] ;} ?>"></div></div>
                            <div class="col-md-1"></div>
						    
                       						    
					   </div>

                       <br />
                       <br />
					  
                         
                         
                       	<div class="row">
                          
						   <div class="col-md-7">
						    <strong>&nbsp &nbsp Work Description</strong>
						    <div class="panel-body">
						    <textarea  name="work" placeholder="Type Work Description" class="wdtext form-control" rows='4'> <?php if($up){ echo $r1['interestdescription'] ;}else { if($getrow){ echo $getrow['specialization']; }} ?></textarea>
						    </div>
						    </div>
						    
						 </div>
					 

                    <br />
                    <br />
                    <br>
                     <?php  $sql1 = "select * from faculty_academia where faculty_id = '$fid' ;";
					 $res=  mysqli_query($conni,$sql1);
						if(!$res){
							die("erroe1".mysqli_error($conni));
						}

						$r =mysqli_fetch_assoc($res);

						?>

                    <div id="inner1">
                    <div id="edu"></div>
                    <div class="row">
                    
                        <div class="col-sm-11"><div class="well well-sm" align="center">Educational Qualifications</div></div>
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
						        <td><strong>Undergraduate</strong></td>
						        <td><input type="text" name="under1" style="width:200px;" value="<?php if($up){ echo $r['undergradusatediscipline'] ;} ?>"/></td>
						        <td><input type="text" name="under2" id="university1" style="width:300px;" value="<?php if($up){ echo $r['undergraduateuniversity'] ;} ?>"></td>
						        <td><input type="text" name="under3" style="width:100px;" value="<?php if($up){ echo $r['ugyear'] ;} ?>"></td>
						      </tr>
						      <tr>
						        <td><strong>Postgraduate</strong></td>
						        <td><input type="text" name="post1" style="width:200px;" value="<?php if($up){ echo $r['postdiscipline'] ;} ?>"/></td>
						        <td><input type="text" name="post2" id="university2"  style="width:300px;" value="<?php if($up){ echo $r['postgraduateuniversity'] ;} ?>"/></td>
						        <td><input type="text" name="post3" style="width:100px;" value="<?php if($up){ echo $r['pgyear'] ;} ?>"/></td>
						      </tr>
						      <tr>
						        <td><strong>PHD</strong></td>
						        <td><input type="text" name="phd1"  style="width:200px;" value="<?php if($up){ echo $r['doctoratediscipline'] ;} ?>"/></td>
						        <td><input type="text" name="phd2" id="university3"  style="width:300px;" value="<?php if($up){ echo $r['doctorateuniversity'] ;} ?>"/></td>
						        <td><input type="text" name="phd3"  style="width:100px;" value="<?php if($up){ echo $r['phdyear'] ;} ?>"/></td>
						      </tr>
						        <tr>
						        <td><strong>Others</strong></td>
						        <td><input type="text" name="others1" style="width:200px;" value="<?php if($up){ echo $r['otherdiscipline'] ;} ?>"/></td>
						        <td><input type="text" name="others2" id="university4"  style="width:300px;" value="<?php if($up){ echo $r['otheruniversity'] ;} ?>"/></td>
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
					 $res=  mysqli_query($conni,$sql1);
						if(!$res){
							die("erroe1".mysqli_error($conni));
						}

						$r =mysqli_fetch_assoc($res);

						?>

						<?php 
						//getting id from table 5 url
							
                                $linkedin='';
                                $fb='';
                                $twitter='';
                                $scopus='';
                                $google='';
                                $skype='';
                                if(!$up){
						        $outer = explode(",", $getrow['url']);
						        
						        for ($i=0; $i <count($outer) ; $i++) { 
						        	

						        	$inner = explode(" ",$outer[$i]);
						        	for ($j=0; $j <count($inner) ; $j++) { 
						        			

						        			$inner2 = explode(PHP_EOL,$inner[$j]);
						        	      for ($k=0; $k <count($inner2) ; $k++) { 
						        			

                                            if(strpos($inner2[$k], 'linkedin')!==false){
                                            	$arr = explode("/", $inner2[$k]) ;
                                            	$linkedin=$arr[count($arr)-1];
                                            }
                                            if(strpos($inner2[$k], 'facebook')!==false){

                                            	$arr = explode("/", $inner2[$k]) ;
                                            	//echo json_encode($arr);
                                            	$c=0;
                                            	for ($l=0; $l <count($arr) ; $l++){
                                            		if(strpos($arr[$l], 'facebook')!==false){
                                            			//echo $l;
                                            			$c=$l;
                                            		}
                                            	}
                                            	$fb=$arr[($c+1)];
                                            }
                                            if(strpos($inner2[$k], 'skype')!==false){
                                            	$arr = explode("/", $inner2[$k]) ;
                                            	$skype=$arr[count($arr)-1];
                                            }
                                            if(strpos($inner2[$k], 'researchgate')!==false){
                                            	$arr = explode("/", $inner2[$k]) ;
                                            	$scopus=$arr[count($arr)-1];
                                            }
                                            if(strpos($inner2[$k], 'google')!==false){
                                            	$arr = explode("/", $inner2[$k]) ;
                                            	$google=$arr[count($arr)-1];
                                            }
                                            if(strpos($inner2[$k], 'twitter')!==false){
                                            	$arr = explode("/", $inner2[$k]) ;
                                            	$twitter= $arr[count($arr)-1];
                                            }
						        		}
						        }

						      }

						  }
						       ?>


						
						 <div id="web"></div>
                    <div class="row">
                   
                        <div class="col-sm-11"><div class="well well-sm" align="center">Web Presence(if any)</div></div>
                        </div>
					   <div >
					<br />
                    <br />
                    
					   <div >
                          <div class="row">
                           <div class="col-md-3">
						    <strong>&nbsp &nbsp Twitter ID</strong>
						    <div class="panel-body"><input type="text"/ name="twitter" placeholder="Type ID" value="<?php if($up){ echo $r['twitterid'] ;}else{
						      echo $twitter; }  ?>"  ></div></div>
                            

                            <div class="col-md-1"></div>
						    <div class="col-md-3">
						    <strong>&nbsp &nbsp Facebook ID</strong>
						    <div class="panel-body"><input type="text"/ name="facebook" placeholder="Type ID" value="<?php if($up){ echo $r['facebookid'] ;}else{
						      echo $fb; } ?>"></div></div>
                          

                            <div class="col-md-1"></div>
						    <div class="col-md-3">
						   <strong> &nbsp &nbsp Skype ID</strong>
						    <div class="panel-body"><input type="text"/ name="skype" placeholder="Type ID" value="<?php if($up){ echo $r['skypeid'] ;}else{
						      echo $skype; } ?>" ></div></div>
                           
						    
					   </div>
					  </div>
                     
                    <br />
                    <br />
					  <div >
                          <div class="row">
                            <div class="col-md-3">
						    <strong>&nbsp &nbsp Linkedin ID</strong>
						    <div class="panel-body"><input type="text"/ name="linkedin" placeholder="Type ID" value="<?php if($up){ echo $r['linkedinid'];}else{
						      echo $linkedin; }  ?>" ></div></div>
                          

                            <div class="col-md-1"></div>
						    <div class="col-md-3">
						    <strong>&nbsp &nbsp Research Gate ID</strong>
						    <div class="panel-body"><input type="text"/ name="scopus" placeholder="Type ID" value="<?php if($up){ echo $r['scopusid'] ;}else{
						      echo $scopus; } ?>"></div></div>
                           

                            <div class="col-md-1"></div>
						    <div class="col-md-3">
						    <strong>&nbsp &nbsp Google Scholar ID</strong>
						    <div class="panel-body"><input type="text"/ name="google" placeholder="Type ID" value="<?php if($up){ echo $r['googlescholarid'] ;}else{
						      echo $google; }  ?>"></div></div>
                            
						    
					   </div>
					  </div>

					  <br/>
					  <br/>
					  <br>
					  <br>
					 
					   <div id="inner1">
                          <div class="row">
                            <div class="col-md-4"></div>
                            

                            <div class="col-md-1"><input type="submit" class="btn btn-info" value="SAVE" name="save" ></div>
                            <div class="col-md-1"><input type="submit" class="btn btn-info" value="SUBMIT"  ></div>
                          
                            <div class="col-md-1"><button type="button" class="btn btn-info" id="myBtn" onclick="prev();">PREVIEW</button></div>
                           
						  
						    
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
						     <tr class="active">
						        <td>Photo:</td>
						        <?php 

					$sql1 = "select * from faculty_personnel where faculty_id = '$fid' ;";
					 $res=  mysqli_query($conni,$sql1);
						if(!$res){
							die("erroe1".mysqli_error($conni));
						}

						$rp =mysqli_fetch_assoc($res);
						
					?>
						        <td><?php 
						    if($up&&!empty($rp['photo'])){
						    	echo '<img src="data:image/jpeg;base64,'.base64_encode($rp['photo']) .' " width="90" height="100" id="pphoto">';
						    }
						    else{
						    	if($getrow){
						    		echo '<img src="data:image/jpeg;base64,'.base64_encode($getrow['photo']) .' " width="90" height="100" id="pphoto">';
						    		
						    	}
						    	else{
						    	?>
						    	 <img id="pphoto" src="images/noimg1.jpg" class="img-rounded" height="100" width="90">
						    	<?php 
						    }
						}

						mysqli_close($conni);						
						    ?></td>
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
