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
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/forumstyle.css">
		<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
		<script type="text/javascript" src="js/jquery.js"></script>
	     <script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
		<title>project</title>	
	
	<script type="text/javascript">
		$(document).ready(function(){

			tinymce.init({
			    selector: '#dis',
			     plugins: "paste",
    			 paste_as_text: true
			  });

			$('#tagsfalseinput').devbridgeAutocomplete({
			    serviceUrl: 'tagssuggestions.php',
		 	});
		});

	</script>

	<script type="text/javascript">
		$(document).ready(function(){

			$("#tagsfalseinput").on('keyup',function(e){
				if(e.keyCode==32){
					var tag = $("#tagsfalseinput").val();
					tag = tag.trim();
					addtag(tag);
					$("#tagsfalseinput").val('')
				}
			});

			$('body').on('click', 'a.closetag', function(){

				var tag = $(this).attr('id');
				console.log(tag);
				closetagfunc(tag);
			});
		});

		//function to add tags
		function addtag(tag){
			//adding tag to input field
			var prevtags  = $("#orgtags").val();
			console.log("befor add="+prevtags);
			prevtags = prevtags+","+tag;
			$("#orgtags").val(prevtags);
			console.log("after add="+prevtags);

			//generating tag id
			var tagid = hashcode(tag);
			//showing tag in tagsshow div
			var htmltag = "<span class='tagsonask' id='"+tagid+"span'>"+tag+"<a id='"+tag+"' class='btn btn-link closetag'><i class='fa fa-times' aria-hidden='true'></i></a></span>";
			$('#tagsshow').append(htmltag);
		}

		//function to close tag

		function closetagfunc(tag){
			var tagid = hashcode(tag);
			var spanid= "#"+tagid+"span";
			console.log(spanid);
			$(spanid).hide();

			//removing tag from input field
			var prevtags  = $("#orgtags").val();
			
			console.log("before remove="+prevtags);
			var tagsarr = prevtags.split(",");
			var newarr = [];

			for (var i =0;i< tagsarr.length ;  i++) {
				if(tagsarr[i]!=tag){
					newarr.push(tagsarr[i]);
				}
			}
			prevtags=newarr.join(",");
			console.log("after remove="+prevtags);
			$("#orgtags").val(prevtags);
		}

		function hashcode(thisstr) {
		  var hash = 0, i, chr, len;
		  if (thisstr.length === 0) return hash;
		  for (i = 0, len = this.length; i < len; i++) {
		    chr   = thisstr.charCodeAt(i);
		    hash  = ((hash << 5) - hash) + chr;
		    hash |= 0; // Convert to 32bit integer
		  }
		  return hash;
		};
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
		
		<div id="askwrapper" class=" nbnb ">
		<h3 class="nomargin nopadding"><span class="glyphicon glyphicon-ok"></span>Start Discussion</H3>
					<hr class="nomargin nopadding">
			   
			<br>
			<br>		
		<form action="forum_ask_backend.php" method="post">
				
				<h4>Discussion Heading</h4>
				<input type="text" name="heading" class="form-control" required>
				<br>
				<h4>Discussion Details</h4>
				<textarea name="question" cols='10' rows='10' class="form-control" id="dis" required> 
					
				</textarea>		

				<h5>Tags</h5>
				<input type="text" name="tags" id="orgtags"  style="display:none;">

				<div id="tagsshow"  ></div>
				<div id="tags" class="tagsdiv">
					<div id="inputdiv"  >
						<input type="text" name="tagsfalse" id="tagsfalseinput" class="noinput">
					</div>
				</div>
				<br>

				<input type="submit" value="Start" class="btn btn-info">

		</form>			
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
