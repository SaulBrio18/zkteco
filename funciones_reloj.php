<?php
include "zk/zklib.php";
$zk = new ZKLibrary('192.168.1.202', 4370, 'TCP');



function guarda_usuario($userid, $name, $password, $role){
    global $zk;
    $zk->connect();
    $zk->disableDevice();

    $usuarios=$zk->getUser();

    $uid= count($usuarios)+1;

    $zk->setUser($uid, $userid, $name, $password, $role);


    $zk->enableDevice();
    $zk->disconnect();

}

function actualiza_usuario(){
    global $zk;
    $zk->connect();
    $zk->disableDevice();


    $zk->enableDevice();
    $zk->disconnect();

}

function info_usuario(){
    global $zk;
    $zk->connect();
    $zk->disableDevice();


    $zk->enableDevice();
    $zk->disconnect();

}

function asistencias(){
    global $zk;
    $zk->connect();
    $zk->disableDevice();

    return $zk->getAttendance();

    $zk->enableDevice();
    $zk->disconnect();
}
?>