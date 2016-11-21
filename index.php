<?php
	session_start();
	if(!isset($_SESSION["usuario_valido"]))
		header("Location: login.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Drogueria FerJo</title>
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
					<li><a href="">Inicio</a></li>
					<li><a href="">Ventas</a></li>
					<li><a href="">Buscar</a></li>
					<li><a href="">Listar</a></li>
					<?php
					if($_SESSION["usuario_valido"] == 1){
						echo "<li><a href=''>Ingresar</a></li>";
						echo "<li><a href=''>Eliminar</a></li>";
						echo "<li><a href=''>Actualizar</a></li>";
					}
					?>
					<li><a href="Cerrar.php">Cerrar</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<section>
		<div id='textoID'>
			<article>
				<hgroup>
				<h1>Bienvenido al aplicatico de Drogueria FerJo</h1>
				</hgroup>
				<img src="Recursos/index.jpg">
				<p>Aplicativo para llevar la base de datos de la Drogueria</p>
			</article>
		</div>
	</section>
</div>
</body>
</html>