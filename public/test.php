<?php

 echo "hi";
$iipp=$_SERVER["REMOTE_ADDR"];
//echo $iipp; 

setcookie('app_key',"abc");

$cb = $_GET['callback'];
echo $cb.'()';
?>
