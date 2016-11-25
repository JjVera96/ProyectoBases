<?php
	session_start();
	if(!isset($_SESSION["usuario_valido"]))
		header("Location: login.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>buscar - Droguerias FerJo</title>
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
	</header>
	<section>
		<div id="formBuscar">
		<header>
			<hgroup>
			<h2>Buscar Producto</h2>
			</hgroup>
		</header>
		<form action="buscar.php" method="get">
			<label>Nombre Producto<br></label>
			<input type="text" name="Nombre" id="Nombre" placeholder="Nombre Producto" required>
			<br><input type="submit" value="Buscar" name="btnSubmit" id="btnSubmit"><br>
		</form>
		</div>
	</section>
</div>
<?php
	require("conexion.php");
	if(isset($_GET["btnSubmit"])){
		if(isset($_GET["Nombre"])){
			$nomprod = $_GET["Nombre"];
			$consulta = "SELECT Codigo, Nombre, Fabricante, Presentacion, Tipo, Fecha_Vencimiento, Precio, Disponibilidad, Formula  FROM drogas WHERE Nombre='$nomprod'";
			$result = mysqli_query($conexion, $consulta);
		}
		
		if($result==false){
			echo "<h1 id='Error'>Error en la busqueda del producto</h1>";
		}else{
			if($result->num_rows == 0){
				echo "<h1 id='Error'>No se encuentra el producto</h1>";
			}
			else {				
				echo "<h1 id='Bien'>Busqueda Satisfactoria</h1>";
				echo "<table><tr><td>";
				echo "<h3>Codigo</h3></td><td>";
				echo "<h3>Nombre</h3></td><td>";
				echo "<h3>Fabricante</h3></td><td>";
				echo "<h3>Presentacion</h3></td><td>";
				echo "<h3>Tipo</h3></td><td>";
				echo "<h3>Fecha de Vencimiento</h3></td><td>";
				echo "<h3>Precio</h3></td><td>";
				echo "<h3>Disponibilidad</h3></td><td>";
				echo "<h3>Formula</h3><tr></td><tr>";
				while($fila=mysqli_fetch_row($result)){
					echo "<tr><td>";
					echo "$fila[0] </td><td>";
					echo "$fila[1] </td><td>";
					echo "$fila[2] </td><td>";
					echo "$fila[3] </td><td>";
					echo "$fila[4] </td><td>";
					echo "$fila[5] </td><td>";
					echo "$fila[6] </td><td>";
					echo "$fila[7] </td><td>";
					echo "$fila[8] </td></td></tr>";
				}
				echo "</table>";
		}
		}
	}
?>
</body>
</html>