<?php
$usuario = "subelom";
$contrasena = "123qwe*sub++";  
$servidor = "subelo.mx";
$basededatos = "subelom_quijote2";


$conexion = mysqli_connect($servidor, $usuario, $contrasena) or 
die ("No se ha podido conectar al servidor");

$db = mysqli_select_db( $conexion, $basededatos ) or
die("No se encontrado la bd");

function db()
{
    global $conexion;    
    return  $conexion;
}


?>