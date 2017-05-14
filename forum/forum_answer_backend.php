<?php
	include("../functions.php");
    include("dbcon.php");
	$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
	$ans='';
	if(isset($_POST['ans'])){
		$ans = $_POST['ans'];
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

	$aid='';
	$qid = $_GET['qid'];
	$qidp = $_GET['quesid'];
	$time  = time();


	$incans = "UPDATE forum_question set no_of_answers = no_of_answers + 1 where Q_ID = '$qid' ;";
	$resinc = mysqli_query($conn,$incans);
	if(!$resinc){
		die("error ".mysqli_error($conn));
	}
	$sql = 'select * from forum_id;';
	$res = mysqli_query($conn,$sql);
	if(!$res){
		die("error ".mysqli_error($conn));
	}
	$row = mysqli_fetch_assoc($res);
	$num = $row['a'];
	$aid='a'.$num;
	$num=$num+1;
	$inc = 'update forum_id set a = '.$num.';';
	$res = mysqli_query($conn,$inc);
	if(!$res){
		die("error ".mysqli_error($conn));
	}

	$query = "INSERT INTO `forum_answer`(`A_ID`, `ans_id`, `answer`, `user_id`, `user_name`, `Q_ID`, `no_of_upvotes`, `no_of_downvotes`, `no_of_reply`, `date`, `timestamp`) VALUES (DEFAULT,?,?,?,?,?,0,0,0,?,?)";


	if(!($stmt = $mysqli->prepare($query))){
		echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	if(!($stmt->bind_param('ssisisi',$aid,$ans,$useris,$user_name,$qid,$date,$time))){
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}


	$stmt->close();
	$conn->close();

	header("location:forum_questionpage.php?qid=".$qidp."");

?>