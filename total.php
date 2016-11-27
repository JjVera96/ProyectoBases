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
						echo "<li><a href='total.php'>Total</a></li>";
					}
					echo "<li><a href='cerrar.php'>Cerrar</a></li>";
					?>
				</ul>
			</nav>
		</div>
		<div>
		<?php
			require("conexion.php");
			$consulta = "SELECT Codigo_Venta, Cod_Personal, Cod_Droga, Cantidad, Total FROM venta";
			$result = mysqli_query($conexion, $consulta);
			$tamano_paginas = 10;
			if(isset($_GET["pagina"])){				
				$pagina = $_GET["pagina"];
			}else{
				$pagina = 1;
			}
			$numfilas = mysqli_num_rows($result);
			$totalpag = ceil($numfilas/$tamano_paginas);
			$desde = ($pagina -1)*$tamano_paginas;
			$consulta_limite ="SELECT Codigo_Venta, Cod_Personal, Cod_Droga, Cantidad, Total FROM venta LIMIT $desde, $tamano_paginas";
			$result = mysqli_query($conexion, $consulta_limite);
			$total=0;

			if(!empty($result)){
				echo "<table>";
				echo "<thead>";
				echo "<tr>";
				echo "<th>Codigo Venta</th>";	
				echo "<th>Codigo Personal</th>";
				echo "<th>Codigo Producto</th>";
				echo "<th>Cantidad</th>";
				echo "<th>Total</th>";
				echo "<tr>";
				echo "</thead>";
				echo "<tbody>";
				while($fila = mysqli_fetch_row($result)){
					$total=$total+ $fila[4];
					echo "<tr><td>";
					echo "$fila[0] </td><td>";
					echo " $fila[1] </td><td>";
					echo "$fila[2] </td><td>";
					echo "$fila[3] </td><td>";
					echo "$fila[4]</td></td></tr>";
				}
				echo "</tbody>";
				echo "</table>";
				echo "<h1 id = 'Bien'>Total de Ventas: $total</h1>";
			}else{
				echo "<h1 id = 'Error'>No hay drogas en el inventario</h1>";
			}
		?>
		</div>
		<div id='Paginacion'>
		<?php
			for($i = 1; $i <= $totalpag; $i++){
				echo "<a href='?pagina=" . $i . "'>" . $i . "</a>  ";
			}
		?>
		</div>
	</header>
</div>
</body>
</html>