<?php
	session_start();
	include("phptextClass.php");	
	
	/*create class object*/
	$phptextObj = new phptextClass();	
	/*phptext function to genrate image with text*/
	$phptextObj->phpcaptcha('#162453','#f5f5f5',150,40,3,4);	
 ?>