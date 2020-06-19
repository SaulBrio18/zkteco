<?php
include "db.php";
include "zk/zklib.php";

$db=db();

$zk = new ZKLibrary('192.168.1.202', 4370, 'TCP');
$zk->connect();
$zk->disableDevice();

$uid=2;
$finger=6;

//$template= $zk -> getUserTemplate($uid,$finger);
$zk -> deleteUser(6);

$zk->enableDevice();
$zk->disconnect();

//print_r($template);

//echo $insert_query="UPDATE empleado SET str_finger='$template[4]' , finger_num='$template[2]'
  //                  WHERE uid='$template[1]'";

//mysqli_query($db,$insert_query);
//echo ord($template[4]);
echo "<br> terminado";
//Template:
//[0] => tamaño [1] => uid [2] => finger [3] => valido? [4] => template
?>