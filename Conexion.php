<?php

$host = "localhost";
$user = "root";
$pw = "";
$db = "proyecto";

$conexion = mysqli_connect($host, $user, $pw) or die("Error al Conectar Con EL SGDB");
mysqli_select_db($conexion, $db) or die("Error al conectar con la Base de Datos Proyecto");

?>