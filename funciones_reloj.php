<?php
include "zk/zklib.php";
$zk = new ZKLibrary('192.168.1.202', 4370, 'TCP');



function guarda_usuario(){
    $zk->connect();
    $zk->disableDevice();


    $zk->enableDevice();
    $zk->disconnect();

}

function actualiza_usuario(){
    $zk->connect();
    $zk->disableDevice();


    $zk->enableDevice();
    $zk->disconnect();

}

function info_usuario(){
    $zk->connect();
    $zk->disableDevice();


    $zk->enableDevice();
    $zk->disconnect();

}

function asistencias(){
    $zk->connect();
    $zk->disableDevice();


    $zk->enableDevice();
    $zk->disconnect();

}
?>