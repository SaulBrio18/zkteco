<?php
$usuario = "root";
$contrasena = "";  // en mi caso no tengo contraseña pero en caso de introducira aquí.
$servidor = "localhost";
$basededatos = "zkteco";

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