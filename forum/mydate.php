<?php 
date_default_timezone_set("Asia/Kolkata");
function showdate($indate){
	if(date('Ymd') == date('Ymd', $indate)){
		return date("g:i a ",$indate);
	}
	else{
		return  date("F j, Y ",$indate);
	}
}

function show_and_echo_tags($tags){
	$str ="";
	$tagsarr = explode(',',$tags);
	for ($i=0; $i <count($tagsarr) ; $i++) { 
		if($tagsarr[$i]!=""){
			$str.= "<span class='tags'>".$tagsarr[$i]."</span>";
		}
	}

	return $str;
}
?>