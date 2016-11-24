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
	<title>insertar - Droguerias FERJO</title>
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
				<li><a href="insertarMedicamento.php">Medicamento</a></li>
				</ol>
			</nav>
			</article>
			</div>
			<div id='opcionRecortada'>
			<article>
			<nav>
				<ol>
				<li><a href="insertarEmpleado.php">Empleado</a></li>
				</ol>
			</nav>
			</article>
			</div>
			<div id='opcionRecortada'>
			<article>
			<nav>
				<ol>
				<li><a href="insertarProveedor.php">Proveedor</a></li>
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
			<h2>Nuevo Proveedor</h2>
			</hgroup>
		</header>
		<form action="insertarProveedor.php" method="get">
			<label>Codigo<br></label>
			<input type="number" name="Codigo" id="Codigo" placeholder="Codigo Proveedor" required>
			<label><br>Nombre Proveedor<br></label>
			<input type="text" name="Nombre" id="Nombre" placeholder="Nombre Proveedor"><br>
			<br><input type="submit" value="Enviar Datos" name="btnSubmit" id="btnSubmit"><br>
		</form>
		</div>
	</section>
</div>
<?php
	require("conexion.php");
	if(isset($_GET["btnSubmit"])){
		if(isset($_GET["Codigo"]) and isset($_GET["Nombre"])){
			$codprov = $_GET["Codigo"];
			$nomprov = $_GET["Nombre"];
			$consulta = "INSERT INTO proveedor (Codigo, Nombre) VALUES ('$codprov', '$nomprov')";
			$result = mysqli_query($conexion, $consulta);
		}
		
		if($result==false){
			echo "<h1 id='Error'>Error en el ingreso de datos</h1>";
		}else{
			echo "<h1 id='Bien'>Registro guardado</h1>";
		}
	}

?>
</body>
</html>
