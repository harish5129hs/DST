<?php
	include("../functions.php");
    include("dbcon.php");
	$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
	$ques='';
	$tags='';
	$heading='';
	if(isset($_POST['question'])){
		$ques = $_POST['question'];
	}
	if(isset($_POST['tags'])){
		$tags = $_POST['tags'];
	}
	if(isset($_POST['heading'])){
		$heading = $_POST['heading'];
	}
	

	if($mysqli->connect_error){
		die("connection erroer".$mysqli->connect_error);
	}

	$t = getdate() ;

		// echo $date ;

		$day = $t['mday'] ;
		$month = $t['mon'];
		$year = $t['year'];

		if($month < 10)
		{
			$month = '0'.$month ;
		}

		if($day < 10)
		{
			$day = '0'.$day;
		}

		$date = $year.'-'.$month.'-'.$day ;

	$useris = $userid;	


	$time = time();
	$qid='';

	$sql = 'select * from forum_id;';
	$res = mysqli_query($conn,$sql);
	if(!$res){
		die("error ".mysqli_error($conn));
	}
	$row = mysqli_fetch_assoc($res);
	$num = $row['q'];
	$qid='q'.$num;
	$num=$num+1;
	$inc = 'update forum_id set q = '.$num.';';
	$res = mysqli_query($conn,$inc);
	if(!$res){
		die("error ".mysqli_error($conn));
	}

	$query = "INSERT INTO `forum_question`(`Q_ID`, `ques_id`, `heading`, `question`, `user_id`, `user_name`, `tags`, `no_of_answers`, `no_of_upvotes`, `no_of_downvotes`, `date`, `timestamp`) VALUES (DEFAULT,?,?,?,?,?,?,0,0,0,?,?)";
	
	if(!($stmt = $mysqli->prepare($query))){
		echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	if(!($stmt->bind_param('sssisssi',$qid,$heading,$ques,$useris,$user_name,$tags,$date,$time))){
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}


	$stmt->close();
	$conn->close();

	header("location:forum_questionpage.php?qid=".$qid."");

?>