<?php
date_default_timezone_set("Asia/Kolkata");
echo time()."<br>";
$current = time();
$date = date("m/d/y");
echo $date."<br>";
$time = strtotime($date);
echo $time."<br>";

echo date("g:i a ",$time);
?>