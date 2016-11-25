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
			<h2>Nuevo Producto</h2>
			</hgroup>
		</header>
		<form action="insertarMedicamento.php" method="post">
			<label>Nombre Medicamento</label>
			<input type="text" name="NombreMed" id="NombreMed" placeholder="Nombre Producto" required>
			<label>Nombre Fabricante</label>
			<input type="text" name="NombreFab" id="NombreFab" placeholder="Nombre Fabricante">
			<label><br>Presentacion</label>	
			<input type="text" name="Presentacion" id="Presentacion" placeholder="Presentacion" required>
			<label>Tipo</label>
			<select name="Tipo" id="Tipo">
				<option value="">Tipo de Producto</option>
				<option value="ampolla">Ampolla</option>
				<option value="pasta">Pasta</option>
				<option value="jarabe">Jarabe</option>
				<option value="condon">Condon</option>
				<option value="pañales">Pañales</option>
				<option value="inyeccion">Inyeccion</option>
				<option value="vitamina">Vitamina</option>
				<option value="utileria">Utileria</option>
			</select>
			<label><br>Fecha de Vencimiento<br></label>
			<input type="date" name="fechaVen" id="fechaVen" placeholder="aaaa-mm-dd" required>
			<label><br>Precio<br></label>
			<input type="number" name="Precio" min="0" id="Precio" required>
			<label><br>Disponibilidad<br></label>
			<input type="number" name="Disp" id="Disp" min="0" placeholder="1,2,3,etc." required>			
			<label><br>Codigo Producto<br></label>
			<input type="number" name="codigo" id="codigo" min="0" placeholder="Codigo Medicamento" required>
			<label><br>Codigo Proveedor<br></label>
			<input type="number" name="codProv" id="codProv" min="0" placeholder="Codigo Proveedor" required>
			<label><br>¿Necesita formula?</label><br>
			<select name="formula" id="formula">
				<option value="">Selecciona si es necesaria la formula</option>
				<option value="si">Sí</option>
				<option value="no">No</option>
			</select><br>
			<br><input type="submit" value="Enviar Datos" name="btnSubmit" id="btnSubmit"><br>
		</form>
		</div>
	</section>
</div>
<?php
	require("conexion.php");
	if(isset($_POST["btnSubmit"])){
		if(isset($_POST["NombreMed"]) and isset($_POST["NombreFab"]) and isset($_POST["Presentacion"]) and isset($_POST["Tipo"]) and    isset($_POST["fechaVen"]) and isset($_POST["Precio"]) and isset($_POST["codigo"]) and isset($_POST["codProv"]) and          isset($_POST["formula"]) and isset($_POST["Disp"])){

			$nompro = mysqli_real_escape_string($conexion, $_POST["NombreMed"]);
			$nomfab = mysqli_real_escape_string($conexion, $_POST["NombreFab"]);
			$prepro = mysqli_real_escape_string($conexion, $_POST["Presentacion"]);
			$tipopro = mysqli_real_escape_string($conexion, $_POST["Tipo"]);
			$fevenpro = mysqli_real_escape_string($conexion, $_POST["fechaVen"]);
			$preciopro = mysqli_real_escape_string($conexion, $_POST["Precio"]);
			$codpro = mysqli_real_escape_string($conexion, $_POST["codigo"]);
			$codprov = mysqli_real_escape_string($conexion, $_POST["codProv"]);
			$forpro = mysqli_real_escape_string($conexion, $_POST["formula"]);
			$dispro = mysqli_real_escape_string($conexion, $_POST["Disp"]);

			$consulta = "INSERT INTO drogas (Codigo, Nombre, Fabricante, Presentacion, Tipo, Fecha_Vencimiento, Precio, Disponibilidad, Cod_Proveedor, Formula) VALUES ('$codpro', '$nompro', '$nomfab', '$prepro', '$tipopro', '$fevenpro', '$preciopro', '$dispro', '$codprov', '$forpro')";

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
