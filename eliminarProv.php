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
	<title>eliminar Proveedor - Droguerias FERJO</title>
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
					echo "<li><a href='cerrar.php'>Cerrar</a></li>";
					?>
				</ul>
			</nav>
		</div>
	</header>
	<section>
		<div id='menuInsertarRecortado'>
			<div id='opcionRecortada'> 
			<article>
			<nav>
				<ol>
				<li><a href="eliminarMedicamento.php">Medicamento</a></li>
				</ol>
			</nav>
			</article>
			</div>
			<div id='opcionRecortada'>
			<article>
			<nav>
				<ol>
				<li><a href="eliminarEmpleado.php">Empleado</a></li>
				</ol>
			</nav>
			</article>
			</div>
			<div id='opcionRecortada'>
			<article>
			<nav>
				<ol>
				<li><a href="eliminarProv.php">Proveedor</a></li>
				</ol>
			</nav>
			</article>
			</div>
		</div>
	</section>
	<section>
		<div id="formInsertar">
		<header>
			<hgroup>
			<h2>Eliminar Proveedor</h2>
			</hgroup>
		</header>
		<form action="eliminarProv.php" method="post">
			<label><br>Codigo Proveedor<br></label>
			<input type="number" name="codProv" id="codProv" min="0" placeholder="Codigo Proveedor" required>
			<br><input type="submit" value="Enviar Datos" name="btnSubmit" id="btnSubmit"><br>
		</form>
		</div>
	</section>
</div>
<?php
	require("conexion.php");
	if(isset($_POST["btnSubmit"])){
		if(isset($_POST["codProv"])){
			$cod = mysqli_real_escape_string($conexion, $_POST["codProv"]);

			$consulta = "SELECT drogas.Nombre FROM proveedor INNER JOIN drogas ON proveedor.Codigo = drogas.Cod_Proveedor WHERE proveedor.Codigo = $cod";
		
			$result = mysqli_query($conexion, $consulta);
			$num_filas = mysqli_num_rows($result);
			if($num_filas > 0){
				echo "<h1 id='Error'>No se puede eliminar, tiene medicamentos asociados a este proveedor</h1>";
			}else{
				$consulta = "DELETE FROM proveedor WHERE Codigo = $cod";
				$result = mysqli_query($conexion, $consulta);
				if(mysqli_affected_rows($conexion)){
					echo "<h1 id='Bien'>Proveedor Eliminado Correctamente</h1>";
				}else{
					echo "<h1 id='Error'>Proveedor Inexistente</h1>";
				}
			}
		}
	}
?>
</body>
</html>
