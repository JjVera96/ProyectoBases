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
		<div id='menuInsertar'>
			<div id='opcionRecortada'> 
			<article>
			<nav>
				<ol>
				<li><a href="">Medicamento</a></li>
				</ol>
			</nav>
			</article>
			</div>
			<div id='opcionRecortada'>
			<article>
			<nav>
				<ol>
				<li><a href="">Empleado</a></li>
				</ol>
			</nav>
			</article>
			</div>
			<div id='opcionRecortada'>
			<article>
			<nav>
				<ol>
				<li><a href="">Proveedor</a></li>
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
		<form action="insertarMedicamento.php" method="post">
			<label>Nombre Medicamento</label>
			<input type="text" name="NombreMed" id="NombreMed" placeholder="Nombre Medicamento" required>
			<label>Nombre Fabricante</label>
			<input type="text" name="NombreFab" id="NombreFab" placeholder="Nombre Fabricante">
			<label><br>Presentacion</label>	
			<input type="text" name="Presentacion" id="Presentacion" placeholder="Presentacion" required>
			<label>Tipo</label>
			<input type="text" name="Tipo" id="Tipo" placeholder="Capsula,ampolla,etc." required>
			<label><br>Fecha de Vencimiento<br></label>
			<input type="date" name="fechaVen" id="fechaVen" placeholder="aaaa-mm-dd" required>
			<label><br>Precio<br></label>
			<input type="number" name="Precio" id="Precio" required>
			<label><br>Disponibilidad<br></label>
			<input type="number" name="Disp" id="Disp" placeholder="1,2,3,etc." required>			
			<label><br>Codigo Medicamento<br></label>
			<input type="number" name="codigo" id="codigo" placeholder="Codigo Medicamento" required>
			<label><br>Codigo Proveedor<br></label>
			<input type="number" name="codProv" id="codProv" placeholder="Codigo Proveedor" required>
			<label><br>¿Necesita formula?</label><br>
			<select name="formula" id="formula">
				<option value="">Selecciona si es necesaria la formula</option>
				<option value="si">Sí</option>
				<option value="no">No</option>
			</select><br><br><br><br>
			<br><input type="submit" value="Enviar Datos" name="btnSumbit"><br>
		</form>
		</div>
	</section>
</div>
</body>
</html>