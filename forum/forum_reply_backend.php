<?php
	include("../functions.php");
    include("dbcon.php");
    include("mydate.php");
	$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
	$rep='';
	if(isset($_POST['reply'])){
		$rep = $_POST['reply'];
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

	$aid= $_GET['aid'];
	//$qidp = $_GET['quesid'];
	$useris=$userid;
	$time = time();
	$return = array();
	$return['er']=0;

	$query = "INSERT INTO `forum_comment`(`C_ID`, `comment`, `A_ID`, `user_id`, `user_name`, `date`, `timestamp`) VALUES(DEFAULT,?,?,?,?,?,?)";
	if(!($stmt = $mysqli->prepare($query))){
		//echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		$return['er']=1;
	}
	if(!($stmt->bind_param('siissi',$rep,$aid,$useris,$user_name,$date,$time))){
		//echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		$return['er']=1;
	}
	if (!$stmt->execute()) {
    //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    $return['er']=1;
}


	$stmt->close();
	

	$incans = "UPDATE forum_answer set no_of_reply = no_of_reply + 1 where A_ID = '$aid' ;";
	$resinc = mysqli_query($conn,$incans);
	if(!$resinc){
		die("error ".mysqli_error($conn));
	}
	$return['val']=$rep;
	$return['id']=$aid;
	$return['user_name']=$user_name;
	$return['date']=$date;
	$return['curdate']=showdate($time);
	$sql = "select * from forum_answer where A_ID = '$aid';";
	$res = mysqli_query($conn,$sql);
	if(!$res){
		die("error ".mysqli_error($conn));
	}
	$row = mysqli_fetch_assoc($res);
	$return['count']=$row['no_of_reply'];
	echo json_encode($return);

	//header("location:forum_questionpage.php?qid=".$qidp."");

?>