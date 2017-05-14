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
		<script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
		<title>project</title>	
	
	<script type="text/javascript">
		$(document).ready(function(){
        $('.scroll-Top').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        
      });
      })
		var qtype;
		$(document).ready(function(){
			$('.loadquesdiv').hide();
			$(".showmore").hide();

			getquestions("all");

			$('.change').on('click',function(){
				var type = $(this).attr('id');
				getquestions(type);
			});


			$(".showmorelink").on('click',function(){
				var count = $(this).val();
				getmorequestion(count);
			});
		});


		function getquestions(type){
			qtype=type;
			$(".showmore").hide();
			$('.loadquesdiv').show();
			$('#showmainhere').html('');
			var urls="sendquestions.php?type="+type;
			console.log(urls);
			$.ajax({
				url:urls,
				dataType:'json',
				success:function(data){
					parsequestions(data);
				}
			});
		}


		function parsequestions(data){
			//var data = JSON.parse(data);
			console.log(data);
			$('#questype').html(data.showcat);

			if(data.total>(data.count+25)){
				console.log(data.total);
				console.log(data.count);
				$(".showmore").show();
				$('.showmorelink').val(data.count+25);
			}
			for(i=0;i<data.number_of_questions;i++){
				var question =  JSON.parse(data.questions[i]);
				var html = "<tr><td class='questext'><a href='forum_questionpage.php?qid="+question.ques_id+"' class='queslink'>"+question.heading+"</a></td><td><ul class='list-inline'><li >"+question.tags+"</li></ul></td><td class='text-center'>"+question.user_name+"</td><td class='text-center'>"+question.no_of_answers+"</td><td class='text-center'>"+question.no_of_upvotes+"</td><td class='text-center'>"+question.no_of_downvotes+"</td><td class='text-center'>"+question.curdate+"</td></tr>";
				//console.log(html);
				$('#showmainhere').append(html);
			}
			$('.loadquesdiv').hide();
		}

		//for loading more question

		function getmorequestion(count){

			$('.loadquesdiv').show();
			$(".showmore").hide();
			var urls="sendquestions.php?type="+qtype+"&count="+count;
			console.log(urls);
			$.ajax({
				url:urls,
				dataType:'json',
				success:function(data){
					parsequestions(data);
				}
			});
			
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
				    <ul class="nav navbar-nav">
				      <li class="dropdown">
				      	  <a class=" dropdown-toggle" type="button" data-toggle="dropdown" href="#"><span class="catshow">All categories/tags</span>
						  <span class="caret"></span></a>
						  <ul class="dropdown-menu">
						  	<li><a href="#" class="change" id="all">All categories/tags</a></li>
						  	<li><a href="#">Engineering</a></li>
						  	<li><a href="#">Commerce</a></li>
						    <li><a href="#">HTML</a></li>
						    <li><a href="#">CSS</a></li>
						    <li><a href="#">JavaScript</a></li>
						  </ul>
						
				      </li>
				      <li><a href="#" class="change " id="new">New</a></li>
				      <li><a href="#" class="change" id="unread">Unread</a></li> 
				      <li><a href="#" class="change" id="top">Top</a></li> 
				      <li><a href="#" class="change" id="myquestions">Your Questions</a></li>
				      <li><a href="#">Categories/Tags</a></li>
				    </ul>
				    <ul class="nav navbar-nav navbar-right">
				      <li>
				      	<div class="dropdown height33">
						  <a class="btn btn-link dropdown-toggle" type="button" data-toggle="dropdown">
						  	<i class="fa fa-search fa-lg" aria-hidden="true"></i>
						  </a>
						  <ul class="dropdown-menu mymenu">
						    <li>
						    	<form action="forum_search.php" method="get" accept-charset="utf-8">
						    		<input type="text" id="searchinput" class="myinput " name="query" required>
				      				<button href="#" class="btn btn-info" id="searchbtn" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
						    	</form>
						    </li>
						  </ul>
						</div>
				      </li>
				      <li><a href="forum_ask.php"><i class="fa fa-plus" aria-hidden="true"></i> Start Discussion</a></li>
				    </ul>
				  </div>
				</nav>

				<br>
				<h4 id="questype" class="nomargin text-center"></h4>
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

				  <div class="showmore text-center">
				  	<button  class="showmorelink btn btn-link" value="25">Show more question</button>
				  </div>
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
