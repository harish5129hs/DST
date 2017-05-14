<?php
include("../functions.php");
include("dbcon.php");
$type = $_GET['type'];
$id=$_GET['id'];
$ud = $_GET['ud'];

$return =  array();
$return['type']=$type;
$return['ud']=$ud;
$return['id']=$id;
$return['error']='';
$return['errorcode']=00;

$user =$userid;
if($type=='ques'){
	//check if user has already rated question

		$checkquery = "select * from forum_question_rated where user_id = '$user' and Q_ID='$id' ; ";
		$checkres = mysqli_query($conn , $checkquery);
		if(!$checkres){
			die("error ".mysqli_error($conn));
		}
		$checkrow = mysqli_fetch_assoc($checkres);

	if($ud=='u'){

		
		if($checkrow){
			//check user has upvoted question
			if($checkrow['type']=='u'){

				$return['error'] = 'You have already upvoted this question.';
				$return['errorcode']=11;
			}

			if($checkrow['type']=='d'){
				//user has previously downvoted question , now want to update it

				//increasing no. of upvotes
				$incans = "UPDATE forum_question set no_of_upvotes = no_of_upvotes + 1 where Q_ID = '$id' ;";
				$resinc = mysqli_query($conn,$incans);
				if(!$resinc){
					die("error ".mysqli_error($conn));
				}

				//decreasing downvotes
				$incans = "UPDATE forum_question set no_of_downvotes = no_of_downvotes - 1 where Q_ID = '$id' ;";
				$resinc = mysqli_query($conn,$incans);
				if(!$resinc){
					die("error ".mysqli_error($conn));
				}

				//return value of upvotes and downvotes back to page
				$sql = "select * from forum_question where Q_ID = '$id';";
				$res = mysqli_query($conn,$sql);
				if(!$res){
					die("error ".mysqli_error($conn));
				}
				$row = mysqli_fetch_assoc($res);
				$return['upval']=$row['no_of_upvotes'];
				$return['downval']=$row['no_of_downvotes'];

				//updating rating record table
				$upratequery = "update forum_question_rated set type = 'u' where user_id = '$user' and Q_ID='$id' ; ";
				$uprateres=mysqli_query($conn,$upratequery);
				if(!$uprateres){
					die("error ".mysqli_error($conn));
				}


			}
		}
		else{
			//user has not rated question previously
			$incans = "UPDATE forum_question set no_of_upvotes = no_of_upvotes + 1 where Q_ID = '$id' ;";
			$resinc = mysqli_query($conn,$incans);
			if(!$resinc){
				die("error ".mysqli_error($conn));
			}
			$sql = "select * from forum_question where Q_ID = '$id';";
			$res = mysqli_query($conn,$sql);
			if(!$res){
				die("error ".mysqli_error($conn));
			}
			$row = mysqli_fetch_assoc($res);
			$return['upval']=$row['no_of_upvotes'];
			$return['downval']=$row['no_of_downvotes'];


			//inserting into  rating record table
			$upratequery = "insert into forum_question_rated values(DEFAULT,$user,$id,'u') ";
			$uprateres=mysqli_query($conn,$upratequery);
			if(!$uprateres){
				die("error ".mysqli_error($conn));
			}

		
		}

	}
	//user has downvoted question
	else{
		if($ud=='d'){

			if($checkrow){
				//check user has downvoted question
				if($checkrow['type']=='d'){

					$return['error'] = 'You have already downvoted this question.';
					$return['errorcode']=11;
				}

				if($checkrow['type']=='u'){
					//user has previously upvoted question , now want to update it

					//decreasing no. of upvotes
					$incans = "UPDATE forum_question set no_of_upvotes = no_of_upvotes - 1 where Q_ID = '$id' ;";
					$resinc = mysqli_query($conn,$incans);
					if(!$resinc){
						die("error ".mysqli_error($conn));
					}

					//increasing downvotes
					$incans = "UPDATE forum_question set no_of_downvotes = no_of_downvotes + 1 where Q_ID = '$id' ;";
					$resinc = mysqli_query($conn,$incans);
					if(!$resinc){
						die("error ".mysqli_error($conn));
					}

					//return value of upvotes and downvotes back to page
					$sql = "select * from forum_question where Q_ID = '$id';";
					$res = mysqli_query($conn,$sql);
					if(!$res){
						die("error ".mysqli_error($conn));
					}
					$row = mysqli_fetch_assoc($res);
					$return['upval']=$row['no_of_upvotes'];
					$return['downval']=$row['no_of_downvotes'];

					//updating rating record table
					$upratequery = "update forum_question_rated set type = 'd' where user_id = '$user' and Q_ID = '$id' ; ";
					//echo $upratequery;
					$uprateres=mysqli_query($conn,$upratequery);
					if(!$uprateres){
						die("error ".mysqli_error($conn));
					} 


				}
			}
			else{
				$incans = "UPDATE forum_question set no_of_downvotes = no_of_downvotes + 1 where Q_ID = '$id' ;";
				$resinc = mysqli_query($conn,$incans);
				if(!$resinc){
					die("error ".mysqli_error($conn));
				}

				$sql = "select * from forum_question where Q_ID = '$id';";
				$res = mysqli_query($conn,$sql);
				if(!$res){
					die("error ".mysqli_error($conn));
				}
				$row = mysqli_fetch_assoc($res);
				$return['downval']=$row['no_of_downvotes'];
				$return['upval']=$row['no_of_upvotes'];

				//inserting into  rating record table
				$upratequery = "insert into forum_question_rated values(DEFAULT,$user,$id,'d') ";
				$uprateres=mysqli_query($conn,$upratequery);
				if(!$uprateres){
					die("error ".mysqli_error($conn));
				}

			}
		}
	}
}
else{
	if($type=="ans"){
		//now rating for answers

		$checkquery = "select * from forum_answer_rated where user_id = '$user' and A_ID='$id' ; ";
		$checkres = mysqli_query($conn , $checkquery);
		if(!$checkres){
			die("error ".mysqli_error($conn));
		}
		$checkrow = mysqli_fetch_assoc($checkres);


	if($ud=='u'){


			if($checkrow){
				//check if user has already upvoted answer
				if($checkrow['type']=='u'){

				$return['error'] = 'You have already upvoted this answer.';
				$return['errorcode']=11;
				}

				if($checkrow['type']=='d'){
					//user has previously downvoted question , now want to update it

					//increasing no. of upvotes
					$incans = "UPDATE forum_answer set no_of_upvotes = no_of_upvotes + 1 where A_ID = '$id' ;";
					$resinc = mysqli_query($conn,$incans);
					if(!$resinc){
						die("error ".mysqli_error($conn));
					}

					//decreasing downvotes
					$incans = "UPDATE forum_answer set no_of_downvotes = no_of_downvotes - 1 where A_ID = '$id' ;";
					$resinc = mysqli_query($conn,$incans);
					if(!$resinc){
						die("error ".mysqli_error($conn));
					}

					//return value of upvotes and downvotes back to page
					$sql = "select * from forum_answer where A_ID = '$id';";
					$res = mysqli_query($conn,$sql);
					if(!$res){
						die("error ".mysqli_error($conn));
					}
					$row = mysqli_fetch_assoc($res);
					$return['upval']=$row['no_of_upvotes'];
					$return['downval']=$row['no_of_downvotes'];
					
					//updating rating record table
					$upratequery = "update  forum_answer_rated set type = 'u' where user_id = '$user' and A_ID='$id' ; ";
					$uprateres=mysqli_query($conn,$upratequery);
					if(!$uprateres){
						die("error ".mysqli_error($conn));
					}

				}

			}
			else{
				$incans = "UPDATE forum_answer set no_of_upvotes = no_of_upvotes + 1 where A_ID = '$id' ;";
				$resinc = mysqli_query($conn,$incans);
				if(!$resinc){
					die("error ".mysqli_error($conn));
				}
				$sql = "select * from forum_answer where A_ID = '$id';";
				$res = mysqli_query($conn,$sql);
				if(!$res){
					die("error ".mysqli_error($conn));
				}
				$row = mysqli_fetch_assoc($res);
				$return['upval']=$row['no_of_upvotes'];
				$return['downval']=$row['no_of_downvotes'];

				//inserting into  rating record table
				$upratequery = "insert into forum_answer_rated values(DEFAULT,$user,$id,'u') ";
				$uprateres=mysqli_query($conn,$upratequery);
				if(!$uprateres){
					die("error ".mysqli_error($conn));
				}
		}
	}
	else{
		if($ud=='d'){


				if($checkrow){
					if($checkrow['type']=='d'){

					$return['error'] = 'You have already downvoted this answer.';
					$return['errorcode']=11;
					}

					if($checkrow['type']=='u'){
						//user has previously upvoted question , now want to update it

						//decreasing no. of upvotes
						$incans = "UPDATE forum_answer set no_of_upvotes = no_of_upvotes - 1 where A_ID = '$id' ;";
						$resinc = mysqli_query($conn,$incans);
						if(!$resinc){
							die("error ".mysqli_error($conn));
						}

						//increasing downvotes
						$incans = "UPDATE forum_answer set no_of_downvotes = no_of_downvotes + 1 where A_ID = '$id' ;";
						$resinc = mysqli_query($conn,$incans);
						if(!$resinc){
							die("error ".mysqli_error($conn));
						}

						//return value of upvotes and downvotes back to page
						$sql = "select * from forum_answer where A_ID = '$id';";
						$res = mysqli_query($conn,$sql);
						if(!$res){
							die("error ".mysqli_error($conn));
						}
						$row = mysqli_fetch_assoc($res);
						$return['upval']=$row['no_of_upvotes'];
						$return['downval']=$row['no_of_downvotes'];

						//updating rating record table
						$upratequery = "update  forum_answer_rated set type = 'd' where user_id = '$user' and A_ID='$id' ; ";
						$uprateres=mysqli_query($conn,$upratequery);
						if(!$uprateres){
							die("error ".mysqli_error($conn));
						}

					}

				}
				else{
					$incans = "UPDATE forum_answer set no_of_downvotes = no_of_downvotes + 1 where A_ID = '$id' ;";
					$resinc = mysqli_query($conn,$incans);
					if(!$resinc){
						die("error ".mysqli_error($conn));
					}
				
					$sql = "select * from forum_answer where A_ID = '$id';";
					$res = mysqli_query($conn,$sql);
					if(!$res){
						die("error ".mysqli_error($conn));
					}
					$row = mysqli_fetch_assoc($res);
					$return['upval']=$row['no_of_upvotes'];
					$return['downval']=$row['no_of_downvotes'];
					//inserting into  rating record table
				$upratequery = "insert into forum_answer_rated values(DEFAULT,$user,$id,'d') ";
				$uprateres=mysqli_query($conn,$upratequery);
				if(!$uprateres){
					die("error ".mysqli_error($conn));
				}
			}
		}	
		}
	}
}
	echo json_encode($return);

?>