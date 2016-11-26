<?php
	session_start();
	if(!isset($_SESSION["usuario_valido"]))
		header("Location: login.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>ventas - Droguerias FerJo</title>
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
	<div id="formVender">
		<header>
			<hgroup>
			<h2>Vender Producto</h2>
			</hgroup>
		</header>
		<form action="ventas.php" method="get">
			<label>Nombre Producto<br></label>
			<input type="text" name="Nombre" id="Nombre" placeholder="Nombre Producto" required>
			<br><label>Cantidad<br></label>
			<input type="number" name="Cantidad" id="Cantidad" placeholder="Cantidad a vender" required>
			<br><br><input type="submit" value="Vender" name="btnSubmit" id="btnSubmit"><br>
			</form>
		</div>
	</section>
</div>
</div>
<?php
	require("conexion.php");
	if (isset($_GET["btnSubmit"]) and isset($_GET["Nombre"]) and isset($_GET["Cantidad"])){
		$nomprod = $_GET["Nombre"];
		$canprod = $_GET["Cantidad"];
		$consulta = "SELECT Disponibilidad FROM drogas WHERE Nombre='$nomprod'";
		$result = mysqli_query($conexion,$consulta);
		if($result==False){
			echo "<h1 id='Error'> Ocurrió un error en la transacción</h1>";
		}
		else{
			while($fila=mysqli_fetch_row($result)){
					$disponibilidad_new= $fila[0]-$canprod;
					$modificar="UPDATE drogas SET Disponibilidad='$disponibilidad_new' WHERE Nombre='$nomprod'";
					$resultfinal= mysqli_query($conexion,$modificar);
					if($resultfinal==False){
						echo "<h1 id='Error'> Ocurrió un error en la transacción</h1>";
					}
					else{
						echo "<h1 id='Bien'>Procesado Realizado con éxito</h1>";
					}
					
				}
			}
	}
?>
</body>
</html>