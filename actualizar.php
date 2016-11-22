<?php
	session_start();
	if(!isset($_SESSION["usuario_valido"]))
		header("Location: login.php");
	if($_SESSION["usuario_valido"] == 2){
		header("Location: cerrar.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>actualizar - Droguerias FERJO</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Ranga" rel="stylesheet">		
</head>
<body>
<div id='Contenido'>
	<header>
		<hgroup>
		<h1>Droguerias FerJo</h1>
		</hgroup>
		<div id='Menu'>
			<nav>
				<ul>
					<li><a href='index.php'>Inicio</a></li>
					<li><a href='ventas.php'>Ventas</a></li>
					<li><a href='buscar.php'>Buscar</a></li>
					<li><a href='listar.php'>Listar</a></li>
					<li><a href='insertar.php'>Ingresar</a></li>
					<li><a href='eliminar.php'>Eliminar</a></li>
					<li><a href='actualizar.php'>Actualizar</a></li>
					<li><a href='cerrar.php'>Cerrar</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<section>
		<div id='textoID'>
			<article>
				<hgroup>
				</hgroup>
			</article>
		</div>
	</section>
</div>
</body>
</html>