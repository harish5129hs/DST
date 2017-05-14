<?php

session_start();


if(isset($_POST['a'])){
	if($_SESSION['invalid']==1)
		echo "y";
}
else{
	$_SESSION['invalid']=1;
}

?>