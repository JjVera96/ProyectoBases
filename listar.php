<?php
	session_start();
	if(!isset($_SESSION["usuario_valido"]))
		header("Location: login.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>listar - Droguerias FerJo</title>
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
					if($_SESSION["usuario_valido"] == 1){
						echo "<li><a href='insertar.php'>Ingresar</a></li>";
						echo "<li><a href='eliminar.php'>Eliminar</a></li>";
						echo "<li><a href='actualizar.php'>Actualizar</a></li>";
					}
					echo "<li><a href='cerrar.php'>Cerrar</a></li>";
					?>
				</ul>
			</nav>
		</div>
		<div>
		<?php
			require("conexion.php");
			$consulta = "SELECT Codigo, Nombre, Fabricante, Precio, Disponibilidad FROM drogas";
			$result = mysqli_query($conexion, $consulta);

			if(!empty($result)){
				echo "<table><tr><td>";
				echo "<h3 id='titleTable'>Codigo</h3></td><td>";	
				echo "<h3 id='titleTable'>Nombre</h3></td><td>";
				echo "<h3 id='titleTable'>Fabricante</h3></td><td>";
				echo "<h3 id='titleTable'>Precio</h3></td><td>";
				echo "<h3 id='titleTable'>Disponibilidad</h3></td><tr>";
				while($fila = mysqli_fetch_row($result)){
					echo "<tr><td>";
					echo "$fila[0] </td><td>";
					echo " $fila[1] </td><td>";
					echo "$fila[2] </td><td>";
					echo "$fila[3] </td><td>";
					echo "$fila[4]</td></td></tr>";
				}
				echo "</table>";
			}else{
				echo "<h1 id = 'Error'>No hay drogas en el inventario</h1>";
			}
		?>
		</div>
	</header>
</div>
</body>
</html>