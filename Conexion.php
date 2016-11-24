<?php
	$host = "localhost";
	$user = "root";
	$pw = "";
	$db = "proyecto";

	$conexion = mysqli_connect($host, $user, $pw) or die("<h1>Error al Conectar Con EL SGDB</h1>");
	mysqli_select_db($conexion, $db) or die("<h1>Error al conectar con la Base de Datos Proyecto</h1>");
?>