<?php
	session_start();
	if(!isset($_SESSION["usuario_valido"]))
		header("Location: login.php");

	require("conexion.php");
	$var = 0;
	$error = false;
	if(isset($_POST['codPro']) && isset($_POST['cantPro']) && isset($_POST['forPro'])){
		foreach ($_POST['codPro'] as $key) {
			$codProd = mysqli_real_escape_string($conexion, $_POST['codPro'][$var]);
			$cantProd = mysqli_real_escape_string($conexion, $_POST['cantPro'][$var]);
			$forProd = mysqli_real_escape_string($conexion, $_POST['forPro'][$var]);

			$consulta = "SELECT Disponibilidad, Formula FROM drogas WHERE Codigo = $codProd";
			$dispo = mysqli_query($conexion, $consulta);

			if(!empty($dispo)){
				while($result = mysqli_fetch_row($dispo)){
					if($result[0] < $cantProd){
						echo "No se cuenta con la Disponibilidad del producto $key";
						$error = true;
					}
					if(!strcmp($result[1], "si") and !strcmp($forProd, "no")){
						echo "El producto $key solo se vende con formula\n";
						$error = true;
					}
				}
			}else{
				$error = true;
			}
			$var++;
		}
		if($error){
			echo "Venta Fallida";
		}else{
			$var = 0;
			foreach ($_POST['codPro'] as $key) {
				$codProd = mysqli_real_escape_string($conexion, $_POST['codPro'][$var]);
				$cantProd = mysqli_real_escape_string($conexion, $_POST['cantPro'][$var]);
				$forProd = mysqli_real_escape_string($conexion, $_POST['forPro'][$var]);

				$consulta = "SELECT Precio, Disponibilidad FROM drogas WHERE Codigo = $codProd";
				$result = mysqli_query($conexion, $consulta);

				while ($fila = mysqli_fetch_row($result)) {
					$valor = $fila[0] * $cantProd;
					$canttotal = $fila[1];
				}

				$codigo = $_SESSION["Codigo"];

				$consulta = "INSERT INTO venta (Codigo_Venta, Cod_Personal, Cod_Droga, Cantidad, Total) VALUES (NULL, $codigo, $codProd, $cantProd, $valor)";
				$result = mysqli_query($conexion, $consulta);

				if($result==false){
					echo "Error en la transacción";
				}else{
					echo "Venta registrada";
					$newCantidad = $canttotal - $cantProd;
					$consulta = "UPDATE drogas SET Disponibilidad = $newCantidad WHERE drogas.Codigo = $codProd";
					$result = mysqli_query($conexion, $consulta);
					if(!$result) 
						echo "Error al guardar nueva Disponibilidad del producto";
				}
			}
		}
	}
?>