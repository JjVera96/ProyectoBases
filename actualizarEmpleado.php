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
		<div id='menuInsertarRecortado'>
			<div id='opcionRecortada'> 
			<article>
			<nav>
				<ol>
				<li><a href="actualizarMedicamento.php">Medicamento</a></li>
				</ol>
			</nav>
			</article>
			</div>
			<div id='opcionRecortada'>
			<article>
			<nav>
				<ol>
				<li><a href="actualizarEmpleado.php">Empleado</a></li>
				</ol>
			</nav>
			</article>
			</div>
			<div id='opcionRecortada'>
			<article>
			<nav>
				<ol>
				<li><a href="actualizarProveedor.php">Proveedor</a></li>
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
			<h2>Actualizar Empleado</h2>
			</hgroup>
		</header>
		<form action="actualizarEmpleado.php" method="post">
		<label>Primer Nombre</label>
		<input type="text" name="pnom" id="pnom" placeholder="Primer Nombre" required>
		<label>Segundo Nombre</label>
		<input type="text" name="snom" id="snom" placeholder="Segundo Nombre">
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
		<input type="number" name="codigo" id="codigo" placeholder="Codigo" min = "0" required>
		<label><br>Contraseña</label>
		<input type="password" name="pass" id="pass" placeholder="Contraseña" required><br><br>
		<input type="submit" value="Actualizar Datos" name="btnSubmit" id="btnSubmit">
		</form>
		</div>
</section>
</div>
<?php  
	require("conexion.php");
	if(isset($_POST["btnSubmit"])){
		if(isset($_POST["pnom"]) and isset($_POST["snom"]) and isset($_POST["pape"]) and isset($_POST["sape"]) and isset($_POST["fechanac"]) and isset($_POST["cargo"]) and isset($_POST["codigo"]) and isset($_POST["pass"])){
			$pnemp = mysqli_real_escape_string($conexion, $_POST["pnom"]);
			$snemp = mysqli_real_escape_string($conexion, $_POST["snom"]);
			$paemp = mysqli_real_escape_string($conexion, $_POST["pape"]);
			$saemp = mysqli_real_escape_string($conexion, $_POST["sape"]);
			$fnemp = mysqli_real_escape_string($conexion, $_POST["fechanac"]);
			$cemp = mysqli_real_escape_string($conexion, $_POST["cargo"]);
			$codemp = mysqli_real_escape_string($conexion, $_POST["codigo"]);
			$passemp = mysqli_real_escape_string($conexion, $_POST["pass"]);

			$consulta = "UPDATE personal SET Contra='$passemp', Primer_Nombre='$pnemp', Segundo_Nombre='$snemp', Primer_Apellido='$paemp', Segundo_Apellido='$saemp', Fecha_Nacimiento='$fnemp', Cargo='$cemp'WHERE Codigo='$codemp'";

			$result = mysqli_query($conexion, $consulta);
		}


		if($result==false){
			echo "<h1 id='Error'>Error en la actualización de datos</h1>";
		}else{
			echo "<h1 id='Bien'>Registro de empleado actualizado</h1>";
		}
	}
?>

</body>
</html>