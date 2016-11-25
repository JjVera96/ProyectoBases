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
			<br><input type="submit" value="Total" name="btnTotal" id="btnSubmit"><br>

			<?php
			require("conexion.php");
			if(isset($_GET["btnTotal"])){
				if(isset($_GET["Cantidad"]) and isset($_GET["Nombre"])){
					$canprod = $_GET["Cantidad"];
					$nomprod = $_GET["Nombre"];
					$consulta = "SELECT Precio FROM drogas WHERE Nombre='$nomprod'";
					$precioprod = mysqli_query($conexion, $consulta);
				}
				
				if($precioprod==false){
					echo "<h1 id='Error'>Error en la busqueda del producto</h1>";
				}else{
					if($precioprod->num_rows == 0){
						echo "<h1 id='Error'>No se encuentra el producto</h1>";
					}
					else {
						while ($row=mysqli_fetch_row($precioprod)){
						$total=	$row[0]*$canprod;			
						echo "<h1 id='Bien'>$total</h1>";
					}
					}
					}
					
				?>
				<input type="submit" value="Vender" name="btnSubmit" id="btnSubmit"><br>

				<?php
				if (isset($_GET["btnSubmit"])){
					$consulta2 = "SELECT Disponibilidad FROM drogas WHERE Nombre='$nomprod'";
					$disponibilidad= mysqli_query($conexion,$consulta2);
					while($row_fin=mysqli_fetch_row($disponibilidad)){
						$disponibilidad_new= $row_fin[0]-$canprod;
						echo $disponibilidad_new;
						$modificar="UPDATE drogas SET Disponibilidad='$disponibilidad_new' WHERE Nombre='$nomprod'";
						$result= mysqli_query($conexion,$modificar);
						echo "Procesado Realizaco con éxito";
					}
				}
				}
			?>

			</form>
		</div>
	</section>
</div>
</div>
</body>
</html>