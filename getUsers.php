<?php
include "db.php";
include "zk/zklib.php";

$zk = new ZKLibrary('192.168.1.202', 4370, 'TCP');
$zk->connect();
$zk->disableDevice();

//$imp= $zk -> getUserTemplate(2,6);
$usuarios = $zk -> getUser();

$zk->enableDevice();
$zk->disconnect();

$db=db();


mysqli_query($db,"BEGIN"); 

foreach($usuarios as $cont => $user)
{
    $sqlQuery ="INSERT INTO empleado(clave,nombre,roll,pass,uid) 
            VALUES('$user[0]','$user[1]','$user[2]','$user[3]','$cont')";
    mysqli_query($db,$sqlQuery);
}

mysqli_query($db,"COMMIT");

echo "terminado";
?>