<?php


include("functions.php");
include("dbcon.php");


$dob = mysqli_real_escape_string($conni,$_POST['date']);
$nationalitylist = mysqli_real_escape_string($conni,$_POST['nationalitylist']);

$broadlist = mysqli_real_escape_string($conni,$_POST['broadlist']);

if($nationalitylist=="Other"){
	$nationality= mysqli_real_escape_string($conni,$_POST['nationality']);
}
else{

	$nationality = $nationalitylist;
}

$gender = mysqli_real_escape_string($conni,$_POST['gender']);
$birthplace= mysqli_real_escape_string($conni,$_POST['birthplace']);
$currentaddress = mysqli_real_escape_string($conni,$_POST['currentaddress']);
$permanentaddress= mysqli_real_escape_string($conni,$_POST['permanentaddress']);

$country= mysqli_real_escape_string($conni,$_POST['country']);
$scpreference = mysqli_real_escape_string($conni,$_POST['scpreference']);
$personalwebsite= mysqli_real_escape_string($conni,$_POST['personalwebsite']);
$state= mysqli_real_escape_string($conni,$_POST['state']);
$mobile= mysqli_real_escape_string($conni,$_POST['mobile']);
$phone= mysqli_real_escape_string($conni,$_POST['phone']);

$broadlist = mysqli_real_escape_string($conni,$_POST['broadlist']);

if($broadlist=="Other"){
	$broad= mysqli_real_escape_string($conni,$_POST['broad']);
}
else{

	$broad = $broadlist;
}

$majorlist = mysqli_real_escape_string($conni,$_POST['majorlist']);

if($majorlist=="Other"){
	$major= mysqli_real_escape_string($conni,$_POST['major']);
}
else{

	$major = $majorlist;
}

$minorlist = mysqli_real_escape_string($conni,$_POST['minorlist']);

if($minorlist=="Other"){
	$minor= mysqli_real_escape_string($conni,$_POST['minor']);
}
else{

	$minor = $minorlist;
}



$statuslist = mysqli_real_escape_string($conni,$_POST['statuslist']);

if($statuslist=="Other"){
	$status= mysqli_real_escape_string($conni,$_POST['status']);
}
else{

	$status = $statuslist;
}

$texp = mysqli_real_escape_string($conni,$_POST['texp']);

$workdesc = mysqli_real_escape_string($conni,$_POST['work']);

$under1 = mysqli_real_escape_string($conni,$_POST['under1']);
$under2 = mysqli_real_escape_string($conni,$_POST['under2']);
$under3 = mysqli_real_escape_string($conni,$_POST['under3']);

$post1 = mysqli_real_escape_string($conni,$_POST['post1']);
$post2 = mysqli_real_escape_string($conni,$_POST['post2']);
$post3 = mysqli_real_escape_string($conni,$_POST['post3']);

$phd1 = mysqli_real_escape_string($conni,$_POST['phd1']);
$phd2 = mysqli_real_escape_string($conni,$_POST['phd2']);
$phd3 = mysqli_real_escape_string($conni,$_POST['phd3']);

$others1 = mysqli_real_escape_string($conni,$_POST['others1']);
$others2 = mysqli_real_escape_string($conni,$_POST['others2']);
$others3 = mysqli_real_escape_string($conni,$_POST['others3']);

$twitter= mysqli_real_escape_string($conni,$_POST['twitter']);
$google= mysqli_real_escape_string($conni,$_POST['google']);
$facebook= mysqli_real_escape_string($conni,$_POST['facebook']);
$linkedin= mysqli_real_escape_string($conni,$_POST['linkedin']);
$scopus= mysqli_real_escape_string($conni,$_POST['scopus']);
$skype= mysqli_real_escape_string($conni,$_POST['skype']);

$photo="";

if(isset($_FILES['photo']['tmp_name'])){
$photo=addslashes (file_get_contents($_FILES['photo']['tmp_name']));
}



$fid= mysqli_real_escape_string($conni,$_GET['fid']);


$up=0;
if(isset($_GET['up'])){
	$up = $_GET['up'];
}



if($up){
	$sql = "delete from faculty_experience where faculty_id='$fid' ";
	$res = mysqli_query($conni,$sql);
	if(!$res){
	die("erroe1".mysqli_error($conni));
	}

	$sql = "delete from faculty_contact where faculty_id='$fid' ";
	$res = mysqli_query($conni,$sql);
	if(!$res){
	die("erroe1".mysqli_error($conni));
	}

	$sql = "delete from faculty_academia where faculty_id='$fid' ";
	$res = mysqli_query($conni,$sql);
	if(!$res){
	die("erroe1".mysqli_error($conni));
	}

	$sql = "delete from faculty_webpresence where faculty_id='$fid' ";
	$res = mysqli_query($conni,$sql);
	if(!$res){
	die("erroe1".mysqli_error($conni));
	}

	$sql = "delete from faculty_interest where faculty_id='$fid' ";
	$res = mysqli_query($conni,$sql);
	if(!$res){
	die("erroe1".mysqli_error($conni));
	}

}


if($photo!=""){
$sql1= "update faculty_personnel set  dob='$dob' ,nationality = '$nationality' , gender = '$gender', photo='$photo' ,birthplace='$birthplace' where faculty_id=$fid ;";
//echo $sql1."<br>";
$res=  mysqli_query($conni,$sql1);
if(!$res){
	die("erroe1".mysqli_error($conni));
}
}
else{
	$sql1= "update faculty_personnel set  dob='$dob' ,nationality = '$nationality' , gender = '$gender' , birthplace='$birthplace' where faculty_id=$fid ;";
//echo $sql1."<br>";
$res=  mysqli_query($conni,$sql1);
if(!$res){
	die("erroe1".mysqli_error($conni));
}
}


$sql2= "insert into faculty_contact values($fid,'','','$currentaddress','$permanentaddress','$personalwebsite','$phone','$mobile','$state','$country');";
//echo $sql2."<br>";
$res=  mysqli_query($conni,$sql2);
if(!$res){
	die("erroe2".mysqli_error($conni));
}

$sql3="insert into faculty_interest values($fid,'$scpreference','$broad','$major','$minor','$workdesc');";
//echo $sql3."<br>";
$res=  mysqli_query($conni,$sql3);
if(!$res){
	die("erroe3".mysqli_error($conni));
}

$sql4= "insert into faculty_academia values($fid,'$under2','$under1','$post2','$post1','$phd2','$phd1','$under3','$post3','$phd3','$others2','$others1','$others3');";
//echo $sql4."<br>";
$res=  mysqli_query($conni,$sql4);
if(!$res){
	die("erroe4".mysqli_error($conni));
}

$sqlget = "select * from faculty_personnel where faculty_id=$fid";
//echo $sqlget."<br>";
$res=  mysqli_query($conni,$sqlget);
if(!$res){
	die("erroeget".mysqli_error($conni));
}

$r = mysqli_fetch_assoc($res);
$deptt = $r['department'];
$desig= $r['designation'];

$sql5 = "insert into faculty_experience values($fid,0,'$deptt','$desig','$status','$texp');";
//echo $sql5."<br>";
$res=  mysqli_query($conni,$sql5);
if(!$res){
	die("erroe5".mysqli_error($conni));
}

$sql6 ="insert into faculty_webpresence values($fid,'$twitter','$scopus','$linkedin', '$skype','$facebook','$google'); ";
//echo $sql6."<br>";
$res=  mysqli_query($conni,$sql6);
if(!$res){
	die("erroe6".mysqli_error($conni));
}

if(isset($_POST['save'])){
	header("location:teachersecond.php?fid=".$fid."&up=1&s=1");
}

else{
header("location:aftersecond.php");
}
?>