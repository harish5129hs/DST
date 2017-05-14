<?php
include("../functions.php");
include("dbcon.php");
include("mydate.php");


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
	     <script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
		<title>project</title>	

		<script type="text/javascript">
			
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip(); 
				$('.answerbox').hide();
				$('.replies').hide();
				$('.replylink').hide();

				$('#ansbutton').on('click',function(){
					$('.answerbox').slideDown("slow");
				});

				$('#hidebtn').on('click',function(){
					$('.answerbox').slideUp("slow");
				});


				$('.updown').on('click',function(){
					var val= $(this).val();
					var arr = val.split("/");
					var urls = "updownvote.php?type="+arr[0]+"&id="+arr[2]+"&ud="+arr[1]+"";
					console.log(urls);
					$.ajax({
						url:urls,
						dataType:'json',
						success:function(data){
							parsedata(data);
						}
					}).error(function(){
					//alert("Connection-failed");
					$('#connfail').fadeIn();
				});
			});		


				function parsedata(data){
					console.log(data);
					if(data.errorcode==11){
						//alert(data.error);

						$('#updownerrorpara').html(data.error);
						$('#updownerror').fadeIn();
					}
					var id =data.type+'u'+data.id;
					var valu = data.upval;
					$("#"+id+"").html(valu);
					var id =data.type+'d'+data.id;
					var valu = data.downval;
					$("#"+id+"").html(valu);
				}

				tinymce.init({
			    selector: '#ans'
			  	});


				$('.reply,#replylink').on('click',function(){
					var val= $(this).val();
					var arr = val.split("/");
					console.log(arr);
					
					if(arr.length==4){
						//view all reply link clicked
						console.log("hello");
						$("#replink"+arr[2]).fadeOut();
					}
					else{
						//clear previous replies
						$("#showrep"+arr[2]).html('');
					}
					
					var urls = "getreply.php?type="+arr[0]+"&count="+arr[1]+"&id="+arr[2];
					console.log(urls);
					$('.replybox'+arr[2]).slideDown();
					$.ajax({
						url:urls,
						dataType:'json',
						success:function(data){
							parsereply(data);
						}
					}).error(function(){
					//alert("Connection-failed");
					$('#connfail').fadeIn();
				});

			});		

			function parsereply(data){
				var ob = JSON.parse(JSON.stringify(data));
				console.log(ob);
				//console.log(ob.replies[0]);
				for(var i=0;i<ob.length;i++){
					var rep = JSON.parse(ob.replies[i]);
					var htmls  = "<hr><p>"+rep.comment+"</p><p>posted on : "+rep.date+"</p>";

					var replymy = '<hr><div class="media"><div class="media-left media-top"><img src="../images/default-user.png" class="media-object" style="width:25px"></div><div class="media-body"><h4 class="media-heading">'+ rep.user_name +' <small><i> '+rep.curdate+'</h4><p>'+rep.comment+'</p></div></div>';
				
					$("#showrep"+ob.id).append(replymy);
				}
				if(ob.total>ob.length){
					$("#replink"+ob.id).show();
				}
			}	
				
			

			$(".sendreplybtn").on('click',function(){
				//console.log("hello");
				var val= $(this).val();
				var arr = val.split("/");
				var urls= "forum_reply_backend.php?aid="+arr[2];
				var data = $("#repinput"+arr[2]).val();
				if(data!=''){
				$("#repinput"+arr[2]).val('');
				var sendata = {"reply":data}
				$.ajax({
						url:urls,
						method:'POST',
						data:sendata,
						
						success:function(data){
							var ob = JSON.parse((data));
							console.log(ob);
							if(!(ob.er)){
								var htmls  = "<hr><p>"+ob.val+"</p><p>posted on : "+ob.date+"</p>";
								//console.log(ob.id+""+ob.val);
								var replymy = '<hr><div class="media"><div class="media-left media-top"><img src="../images/default-user.png" class="media-object" style="width:25px"></div><div class="media-body"><h4 class="media-heading">'+ ob.user_name +' <small><i> '+ob.curdate+'</h4><p>'+ob.val+'</p></div></div>';
								$("#showrep"+ob.id).prepend(replymy);
								$("#norep"+ob.id).html(ob.count);
							}
							else{
								//alert("error occured");
								$('#connfail').fadeIn();
							}
						}
					}).error(function(){
					//alert("Connection-failed");
					$('#connfail').fadeIn();
				});
				}

				});
			});

		</script>

		<script type="text/javascript" src="mymodal.js"></script>
		<script type="text/javascript">
			
			//for dialogs
			$(function(){
				$('.hmodalcontainer').hide();

				//$('#try').show();
			})
			
		</script>


		<script type="text/javascript">
			$(function(){

				// tinymce.init({
			 //   		selector: '#detailsinput',
			 //   		mode : "specific_textareas",
				// 	width: "100%",
				// 	plugins : "pagebreak,paste,fullscreen,visualchars"
			 //  	});

			  	
				$('.editques').on('click',function(){
					var quesid = $(this).attr('id');
					$('.loaddivhead').show();
					$('.stuffhere').hide();
					$('#editheading').modal();
					var urls = "getchanges.php?type=question&quesid="+quesid;
					console.log(urls);
					$.ajax({
						url:urls,
						dataType:'json',
						success:function(data){
							console.log(data);
							$("#headinginput").val(data.heading);
							//tinyMCE.activeEditor.setContent(data.question);
							$("#detailsinput").html(data.question);
							tinymce.init({
						   		selector: '#detailsinput'
						  	});
							//tinymce.get('question').setContent(data.question);
							$('#headsubmit').val(data.quesid);

							$('.loaddivhead').hide();
							$('.stuffhere').show();
						}
					})
				});
				var c =0;
				$('.editans').on('click',function(){
					if(c>0){
						
						var answerid = $(this).attr('id');
						$('.loaddivans').show();
						$('.ansstuffhere').hide();
						$('#editanswer').modal();
						var urls = "getchanges.php?type=answer&answerid="+answerid;
						console.log(urls);
						$.ajax({
							url:urls,
							dataType:'json',
							success:function(data){
								console.log(data);
								tinymce.EditorManager.get('answerinput').setContent(data.answer);
								$('#anssubmit').val(data.answerid);

								$('.loaddivans').hide();
								$('.ansstuffhere').show();
							}
						});
					}
					else{
						var answerid = $(this).attr('id');
						$('.loaddivans').show();
						$('.ansstuffhere').hide();
						$('#editanswer').modal();
						var urls = "getchanges.php?type=answer&answerid="+answerid;
						console.log(urls);
						$.ajax({
							url:urls,
							dataType:'json',
							success:function(data){
								console.log(data);
								$('#answerinput').html('');
								$('#answerinput').html(data.answer)
								tinymce.init({
							   	 selector: '#answerinput',
							  	});

								//$("#detailsinput").html(data.question);
								$('#anssubmit').val(data.answerid);

								$('.loaddivans').hide();
								$('.ansstuffhere').show();
							}
						});
					}	
					c++;
					console.log(c);
				});

				//saving the changes
				$('#headsubmit').on('click',function(){
					$('.loaddivhead').show();
					$('.stuffhere').hide();

					var quesid = $(this).val();
					var heading = $('#headinginput').val();
					var question = tinyMCE.activeEditor.getContent();

					var senddata  = {
						"quesid":quesid,
						"heading":heading,
						"question":question,
						"type":"question"
					};
					console.log(senddata);

					$.ajax({
						url:"savechanges.php",
						data:senddata,
						method:'POST',
						success:function(data){
							console.log(data);
							$('.loaddivhead').hide();
							$('#savequesalert').fadeIn('fast');
							setTimeout(function(){location.reload();},2000);
						}
					});
				});

				//saving answer
				$('#anssubmit').on('click',function(){
					$('.loaddivans').show();
					$('.ansstuffhere').hide();

					var ansid = $(this).val();
					var answer = tinyMCE.activeEditor.getContent();
					var senddata  = {
						"ansid":ansid,
						"answer":answer,
						"type":"answer"
					};
					console.log(senddata);
					$.ajax({
						url:"savechanges.php",
						data:senddata,
						method:'POST',
						success:function(data){
							console.log(data);
							$('.loaddivans').hide();
							$('#saveansalert').fadeIn('fast');
							setTimeout(function(){location.reload();},2000);
						}
					});
				});
			})
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
    <?php 

    $qid = $_GET['qid'];
    $sql = "select * from forum_question where ques_id='$qid'";
    $res = mysqli_query($conn,$sql);
	if(!$res){
		die("error ".mysqli_error($conn));
	}
	$row = mysqli_fetch_assoc($res);
	$qidt = $row['Q_ID'];
    ?>
		

    <div class="row">

    	<div class="col-sm-7">
			<div id="wrapper" class=" ">
				<br>
				<ul class="list-inline">
					<li><?php echo show_and_echo_tags($row['tags'])?></li>
				</ul>	
				<h2 class="nomargin">
				<?php  echo $row['heading'] ;?>

					<?php if($row['user_id']==$userid){ ?>
						<span >&nbsp;
							<a data-toggle="tooltip" title="Edit Question" class="btn btn-link editques" id="<?php echo $row['Q_ID'];?>">
								<i class="fa fa-pencil " aria-hidden="true"></i>
							</a>	
						</span>
					<?php }?>

				</h2>
				<hr class="nomargin">
				<br>
				<div class="media">
				  <div class="media-left media-top">
				    <img src="../images/default-user.png" class="media-object" style="width:40px">
				  </div>
				  <div class="media-body">
				    <h4 class="media-heading"><?php  echo $row['user_name'] ;?></h4>
				    <p class="textqa">
					<?php  echo $row['question'] ;?>
					</p>
				  </div>
				</div>
				

				<br><br>

				<div class="details nomargin">
					<ul class="list-inline nomargin">
					<li>
						<span class="nomargin" id="quesu<?php echo $row['Q_ID'];?>"><?php echo $row['no_of_upvotes']?></span>
						<button data-toggle="tooltip" title="Upvote" class="btn btn-link updown" value="ques/u/<?php echo $row['Q_ID'];?>"><i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i></button>
						 
					</li>
					<li>
						<span class="nomargin" id="quesd<?php echo $row['Q_ID'];?>"><?php echo $row['no_of_downvotes'] ?></span> 
						<button data-toggle="tooltip" title="Downvote" class="btn btn-link updown" value="ques/d/<?php echo $row['Q_ID'];?>"><i class="fa fa-thumbs-down fa-2x" aria-hidden="true"></i></button>
						
					</li>	
					<li><?php 
					echo showdate($row['timestamp']);
					?></li>
					</ul>
				</div>
				<hr class="nomargin">
				
				<br>
				<div class="askanswer">
					<h5>Contribute to discusssion</h5>
					<button class="btn btn-info" id="ansbutton"><i class="fa fa-reply" aria-hidden="true"></i> &nbsp;Reply</button>
				</div>
				<br>

				<div class="answerbox well well-lg lightgreybg">
					
					<div class='text-right'>
						<button class="btn btn-link" id="hidebtn"><span class="	glyphicon glyphicon-chevron-up"></span></button>
					</div>
					<form action= "forum_answer_backend.php?qid=<?php echo $qidt;?>&quesid=<?php echo $qid;?>" method="post">
					<textarea name="ans" cols="5" rows="10" class="form-control" id="ans"></textarea>
					<br>
					<input type="submit" value="Send" class="btn btn-info">
					</form>
					
				</div>	
				<hr>
				<div class="answers">
					<h4> <?php echo $row['no_of_answers']?> Responses:</h4>
					<br>
					<div class="answer">
					<?php
						
						$ansquery = "select * from forum_answer where Q_ID = '$qidt' order by timestamp desc;";
						$resans = mysqli_query($conn,$ansquery);
						if(!$resans){
							die("error ".mysqli_error($conn));
						}
						$rowans = mysqli_fetch_assoc($resans);

						while($rowans){

							?>
							<div class="media">
							  <div class="media-left media-top">
							    <img src="../images/default-user.png" class="media-object" style="width:35px">
							  </div>
							  <div class="media-body">
							    <h4 class="media-heading"><?php echo $rowans['user_name'];?></h4>
							    <?php 

							    echo "<p id='answer' class='textqa'> ".$rowans['answer']." </p>";


							
							     ?>
								
							  </div>
							</div>

							
							<br>
							<ul class="list-inline">
							
							<li>
								
								<button class="btn btn-link reply" value="ans/0/<?php echo $rowans['A_ID'];?>"><i class="fa fa-reply" aria-hidden="true"></i> &nbsp;Reply</button>
								
							</li>
							<li>
								<span id="ansu<?php echo $rowans['A_ID'];?>"><?php echo $rowans['no_of_upvotes'] ;?></span>
								<button data-toggle="tooltip" title="Upvote" class="btn btn-link updown" value="ans/u/<?php echo $rowans['A_ID'];?>"><i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i></button>
								
							</li>
							<li>
								<span  id="ansd<?php echo $rowans['A_ID'];?>"><?php echo $rowans['no_of_downvotes'] ?></span>
								<button data-toggle="tooltip" title="Downvote" class="btn btn-link updown" value="ans/d/<?php echo $rowans['A_ID'];?>"><i class="fa fa-thumbs-down fa-2x" aria-hidden="true"></i></button>
								
							</li>

							
							<li>
									<?php if($row['user_id']==$userid){ ?>
									
										<a data-toggle="tooltip" title="Edit Answer" class="btn btn-link editans" id="<?php echo $rowans['A_ID'];?>">
											<i class="fa fa-pencil " aria-hidden="true"></i> edit
										</a>	
									
								<?php }?>
							</li>

							<li>
								<span  id="norep<?php echo $rowans['A_ID'];?>"><?php echo $rowans['no_of_reply'] ?></span> replies
							</li>

								
							<li><?php 
							$time =  $rowans['timestamp'];
							echo showdate($time);
							?></li>
							</ul>
							
							
							<hr class="nomargin">
							<div class="replies replybox<?php echo $rowans['A_ID'];?>">

								
									<div class="row text-center">
									<div class="col-sm-1">
										<img src="../images/default-user.png" class="media-object" style="width:30px">
									</div>
									<div class="col-sm-9 col-xs-7">
									<input type="text" name="reply" required id="repinput<?php echo $rowans['A_ID']; ?>" class="form-control">
									</div>
									<div class="col-sm-2 col-xs-5">
									<button  class="btn btn-info sendreplybtn" value="rep/ans/<?php echo $rowans['A_ID']; ?>"><i class="fa fa-reply" aria-hidden="true"></i> &nbsp;Reply</button>
									</div>
									</div>
							
								<div class="prevreply" id ="showrep<?php echo $rowans['A_ID']; ?>" >

								</div>
								<div class="replylink" id="replink<?php echo $rowans['A_ID'];?>">
								<button class="btn btn-link " id="replylink" value="ans/8/<?php echo $rowans['A_ID'];?>/link">View all replies</button>
								</div>
							
							
							</div>
							
							<br>
							

						<?php
						$rowans = mysqli_fetch_assoc($resans);
						}

					?>
					

							


				</div>	



				</div>
				
				
			
			</div>
		</div>
		<div class="col-sm-5">
			<br><br><br>
			<div class="container wrapper relatedcon">
				
				<h4 class="nomargin">Related Topics</h4>
				<hr class="nomargin">

				<?php 

					//query to get related topics
					$tags = $row['tags'];

					$tagsarr = explode(',',$tags);
					$relquery='';
					//echo json_encode($tagsarr);
					for ($i=0; $i <count($tagsarr) ; $i++) { 
						if($tagsarr[$i]!=''){
							$relquery .= " or `tags` like '%".$tagsarr[$i]."%'";
						}	
					}

					$relgetquery  = "SELECT `Q_ID`, `ques_id`, `heading`, `tags` FROM `forum_question` WHERE 0  ".$relquery."limit 20";
					$resrel = mysqli_query($conn,$relgetquery);

					if(!$resrel){
						die(mysqli_error($conn));
					}
					$rowrel  = mysqli_fetch_assoc($resrel);

					while($rowrel){

						if($rowrel['ques_id']!=$row['ques_id']){
							echo "<br>";
							echo "<a href='forum_questionpage.php?qid=".$rowrel['ques_id']."'>".$rowrel['heading']."<br>";
						}
						$rowrel  = mysqli_fetch_assoc($resrel);
					}
				 ?>
			</div>
		</div>
	</div>	
		<br>
		<br>
		<br>
		<br>
		<br>

		<!-- dialogs start from here -->

		<div class="hmodalcontainer" id="connfail" >
			
			<div class="hmodal">
				
				<div class="hmodalcontent">
				Sorry!! can't connect .
				</div>
				<div class="hmodalbuttons">
					<a class="hmodaldismiss btn btn-link modallink" id="connfaillink"><div class="hmodalbtn">dismiss</div></a>
				</div>
			</div>	
				
			
		</div>

		<div class="hmodalcontainer" id="updownerror" >
			
			<div class="hmodal">
				
				<div class="hmodalcontent">
				<p id="updownerrorpara"></p>
				</div>
				<div class="hmodalbuttons">
					<a class="hmodaldismiss btn btn-link modallink" id="updownerrorlink"><div class="hmodalbtn">dismiss</div></a>
				</div>
			</div>	
				
			
		</div>

		
		
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





	<!-- modals for use -->

	<div id="editheading" class="modal fade " role="dialog">
	  <div class="modal-dialog modal-lg">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title"><i class="fa fa-pencil " aria-hidden="true"></i> Edit Question</h4>
	      </div>
	      <div class="modal-body">
	        <div class="loaddivhead text-center">
				<img src="images/rolling2.gif">
			</div>
			<div class="alert alert-success fade in" style="display: none;" id="savequesalert">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  Changes saved successfully.
			</div>
			<div class="stuffhere" >
			<br>
				
				<strong>Discussion Heading</strong>
				<input type="text" class="form-control" id="headinginput"><br><br>

				<strong>Discussion Details</strong>
				<textarea name="question" cols='10' rows='15'  id="detailsinput" > </textarea>

				<br><br>
				<button class="btn btn-info" id="headsubmit">Submit</button>
			</div>
	      </div>
	      
	    </div>

	  </div>
	</div>


	<div id="editanswer" class="modal fade " role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title"><i class="fa fa-pencil " aria-hidden="true"></i> Edit Answer</h4>
	      </div>
	      <div class="modal-body">
	        <div class="loaddivans text-center">
				<img src="images/rolling2.gif">
			</div>
			<div class="alert alert-success fade in" style="display: none;" id="saveansalert">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  Changes saved successfully.
			</div>
			<div class="ansstuffhere" >
			<br>
				
				<textarea name="answer" cols='10' rows='15'  id="answerinput" > </textarea>

				<br><br>
				<button class="btn btn-info" id="anssubmit">Submit</button>
			</div>
	      </div>
	      
	    </div>

	  </div>
	</div>



	</body>
</html>
