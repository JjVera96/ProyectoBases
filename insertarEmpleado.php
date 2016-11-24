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
			<h2>Nuevo Empleado</h2>
			</hgroup>
		</header>
		<form action="insertarEmpleado.php" method="post">
		<label>Primer Nombre</label>
		<input type="text" name="pnom" id="pnom" placeholder="Primer Nombre" required>
		<label>Segundo Nombre</label>
		<input type="text" name="snom" id="snom" placeholder="Segundo Nombre" required>
		<label><br>Primer Apellido</label>
		<input type="text" name="pape" id="pape" placeholder="Primer Apellido" required>
		<label>Segundo Apellido</label>
		<input type="text" name="sape" id="sape" placeholder="Segundo Apellido" required>
		<label><br>Fecha de Nacimiento</label>
		<input type="date" name="fechanac" id="fechanac" placeholder="aaaa-mm-dd" required>
		<label><br>Cargo</label>
		<select name="cargo" id="cargo">
			<option value="">Cargo</option>
			<option value="Administrador">Administrador</option>
			<option value="Empleado">Empleado</option>
		</select>
		<label><br>Codigo</label>
		<input type="number" name="codigo" id="codigo" placeholder="Codigo" required>
		<label><br>Contraseña</label>
		<input type="number" name="pass" id="pass" placeholder="Contraseña" required><br><br>
		<input type="submit" value="Enviar Datos" name="btnSubmit" id="btnSubmit">
		</form>
		</div>
	</section>
</div>
<?php  
	require("conexion.php");

	if(isset($_POST["btnSubmit"])){
		if(isset($_POST["pnom"]) and isset($_POST["snom"]) and isset($_POST["pape"]) and isset($_POST["sape"]) and isset($_POST["fechanac"]) and isset($_POST["cargo"]) and isset($_POST["codigo"]) and isset($_POST["pass"])){
			$pnemp = $_POST["pnom"];
			$snemp = $_POST["snom"];
			$paemp = $_POST["pape"];
			$saemp = $_POST["sape"];
			$fnemp = $_POST["fechanac"];
			$cemp = $_POST["cargo"];
			$codemp = $_POST["codigo"];
			$passemp = $_POST["pass"];

			$consulta = "INSERT INTO personal (Codigo, Contra, Primer_Nombre, Segundo_Nombre, Primer_Apellido, Segundo_Apellido, Fecha_Nacimiento, Cargo) VALUES ('$codemp', '$passemp', '$pnemp', '$snemp', '$paemp', '$saemp', '$fnemp', '$cemp')";

			$result = mysqli_query($conexion, $consulta);
		}
	}

	if($result==false){
		echo "<h1 id='Error'>Error en el ingreso de datos</h1>";
	}else{
		echo "<h1 id='Bien'>Registro guardado</h1>";
	}
?>
</body>
</html>
