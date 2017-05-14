<?php

$dbhost = 'localhost'; 
$dbuser = 'root'; 
$dbpass = ''; 
$dbname='prof';
$conn = mysqli_connect("localhost",'root',$dbpass,'prof');
if(!$conn){
	die('could not connect'.mysql_error());
}
$conni= mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

?>