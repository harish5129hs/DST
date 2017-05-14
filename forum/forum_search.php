<?php
include("../functions.php");
include("dbcon.php");


if(!$log){
    	header("location:../login.html");
}


?>

<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/forumstyle.css"/>
		<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
		<script type="text/javascript" src="js/jquery.js"></script>
	    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="js/jquery.autocomplete.js"></script>
		<title>project</title>	
	
	<script type="text/javascript">

		window.onpopstate = function(e){

	    	var query = getUrlParameter('query');
			$('#searchinput').val(query);
			searchfunction(query);
		    
		};

		$(window).load(function(){
			var query = getUrlParameter('query');
			$('#searchinput').val(query);
			searchfunction(query);
		});

		function getUrlParameter(sParam) {
		    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
		        sURLVariables = sPageURL.split('&'),
		        sParameterName,
		        i;

		    for (i = 0; i < sURLVariables.length; i++) {
		        sParameterName = sURLVariables[i].split('=');

		        if (sParameterName[0] === sParam) {
		            return sParameterName[1] === undefined ? true : sParameterName[1];
		        }
		    }
		}

		$(document).ready(function(){
			$('.loadquesdiv').hide();

			//console.log(window);

			$('#searchinput').on('keyup',function(e){
				if(e.keyCode==13){
					var query = $('#searchinput').val();
					//setting up new url
					searchfunction(query);
					window.history.pushState("object or string", "Project", window.location.pathname+"?query="+query);
				}
			});
			$('#searchbtn').on('click',function(){
				var query = $('#searchinput').val();
				searchfunction(query);
				window.history.pushState("object or string", "Project", window.location.pathname+"?query="+query);
			});
		});



		//function to parse questions and display them
		function parsequestions(data){
			//var data = JSON.parse(data);
			//console.log(data);
			var txt = data.total+' results retrieved for <strong>"'+data.query+'" </strong>';
			$('#searchtype').html(txt);
			
			for(i=0;i<data.total;i++){
				var question =  JSON.parse(data.questions[i]);

				var queryarr = (data.query).split(" ");
				var quesarr = (question.heading).split(" ");

				//console.log(queryarr);
				//console.log(quesarr);
				for(var k=0;k<queryarr.length;k++){
					for(var j=0;j<quesarr.length;j++){
						if((queryarr[k].toLowerCase())==(quesarr[j].toLowerCase())){
							quesarr[j]="<strong>"+quesarr[j]+"</strong>";
							//console.log(quesarr[j]);
						}
					}
				}

				question.heading = quesarr.join(" ");

				var html = "<tr><td class='questext'><a href='forum_questionpage.php?qid="+question.ques_id+"' class='queslink'>"+question.heading+"</a></td><td><ul class='list-inline'><li >"+question.tags+"</li></ul></td><td class='text-center'>"+question.user_name+"</td><td class='text-center'>"+question.no_of_answers+"</td><td class='text-center'>"+question.no_of_upvotes+"</td><td class='text-center'>"+question.no_of_downvotes+"</td><td class='text-center'>"+question.curdate+"</td></tr>";
				//console.log(html);
				$('#showmainhere').append(html);
			}
			$('.loadquesdiv').hide();
		}

		//function to get data from backend
		function searchfunction(query){
			//clearing html
			$('.loadquesdiv').show();
			$('#showmainhere').html('');

			//getting result  from ajax
			var urls="searchbackend.php?query="+query;
			//console.log(urls);
			console.log($.ajax({
				url:urls,
				dataType:'json',
				success:function(data){
					parsequestions(data);
				}
			}).error(function(){
					console.log("error in ajax");
			}));

			
		}
	</script>


	<script type="text/javascript">
		
		//to set autocomplete of search field
		$(document).ready(function(){
			$('#searchinput').autocomplete({
		    	serviceUrl: 'searchquestionsuggestion.php',
		    });

     	});

     

	</script>
	</head>
	
	<body>
    <div id="alldata container">		

	<div id="options">
	<nav class="navbar navbar-inverse navbar-fixed-top options ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">DST</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../index.php">Home</a></li>
      <li><a href="../search.php">Search</a></li>
      <li><a href="#">About</a></li> 
      <li><a href="#">Help</a></li> 
      <li><a href="forum_home.php">forum </a></li>
    </ul>
     <?php 
    

    if(!$log){
    

    ?>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="../signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="../login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
    <?php 
    }
    else{
      ?>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../afterlogin.php"><span class="glyphicon glyphicon-user"></span> Hello <?php echo $name?> </a></li>
      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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
			
			<br><br>
			<div id="formhome" class="container nbnb">
				<nav class="navbar navbar-default navbar-custom  border-bottom ">
				  <div class="container-fluid">
				    <div class="navbar-header">
				      <a class="navbar-brand" href="forum_home.php">Discussion Forum</a>
				    </div>
				    <ul class="nav navbar-nav searchinputbtnfield">
				     
				      	<div class="row">
				      		<div class="col-sm-12">
				      			<input type="text" id="searchinput" class="myinput " width="420px" >
				      			<button href="#" class="btn btn-info" id="searchbtn"><i class="fa fa-search" aria-hidden="true"></i></button>
				      		</div>
				      		
				      	</div>	
				     
				      
				    </ul>
				    <ul class="nav navbar-nav navbar-right">
				      <li><a href="forum_ask.php"><i class="fa fa-plus" aria-hidden="true"></i> Start Discussion</a></li>
				    </ul>
				  </div>
				</nav>

				<br><br>
				<h5 id="searchtype" class="nomargin"></h5>
				<hr class="nomargin">
				<br><br>
				<div class="quesshowdiv">
					
					<table class="table table-hover">
					    <thead>
					      <tr>
					        <th >Topic</th>
					        <th>Tags</th>
					        <th class='text-center'> User</th>
					        <th class='text-center'> Replies</th>
					        <th class='text-center'> Upvotes</th>
					        <th class='text-center'> Downvotes</th>
					        <th class='text-center'>Date</th>
					      </tr>
					    </thead>
					    <tbody id="showmainhere">
					      
					    </tbody>
				  </table>
				  <br>

				  
				  <div class="loadquesdiv text-center">
				  		<img src="images/rolling2.gif">
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
