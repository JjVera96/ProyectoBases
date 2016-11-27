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
		<h1><a href="index.php">Droguerias FerJo</a></h1>
		</hgroup>
		<div id='Menu'>
			<nav>
				<ul>
					<?php
					echo "<li><a href='index.php'>Inicio</a></li>";
					echo "<li><a href='ventas.php'>Ventas</a></li>";
					echo "<li><a href='buscar.php'>Buscar</a></li>";
					echo "<li><a href='listar.php'>Listar</a></li>";
					echo "<li><a href='insertar.php'>Ingresar</a></li>";
					echo "<li><a href='eliminar.php'>Eliminar</a></li>";
					echo "<li><a href='actualizar.php'>Actualizar</a></li>";
					echo "<li><a href='total.php'>Total</a></li>";
					echo "<li><a href='cerrar.php'>Cerrar</a></li>";
					?>
				</ul>
			</nav>
		</div>
	</header>
	<section>
		<div id='menuInsertar'>
			<div id='opcion'>
			<article>
			<nav>
				<ol>
				<li><a href="actualizarProveedor.php">Proveedor</a></li>
				</ol>
				<a href="actualizarProveedor.php"><img src="Recursos/proveedor.jpg" width="150" height="150"></a>
			</nav>
			</article>
			</div>
			<div id='opcion'> 
			<article>
			<nav>
				<ol>
				<li><a href="actualizarMedicamento.php">Producto</a></li>
				</ol>
				<a href="actualizarMedicamento.php"><img src="Recursos/medicamentos.jpg" width="150" height="150"></a>
			</nav>
			</article>
			</div>
			<div id='opcion'>
			<article>
			<nav>
				<ol>
				<li><a href="actualizarEmpleado.php">Empleado</a></li>
				</ol>
				<a href="actualizarEmpleado.php"><img src="Recursos/empleado.jpg" width="150" height="150"></a>
			</nav>
			</article>
			</div>
		</div>
	</section>
</div>
</body>
</html>