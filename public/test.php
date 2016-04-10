<?php
echo json_encode(['a'=>1,'b'=>['ba'=>1,'c'=>['ca'=>'2']]]);

var_dump(phpinfo());

 echo "hi";
$iipp=$_SERVER["REMOTE_ADDR"];
//echo $iipp; 

setcookie('app_key',"abc");

$cb = $_GET['callback'];
echo $cb.'()';
?>
