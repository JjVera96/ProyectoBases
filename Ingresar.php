<?php
	require("Conexion.php");

	if(!isset($_POST["btnSubmit"])){
		$usuario = $_POST["Codigo"];
		$pass = $_POST["Contra"];
		$consulta = mysqli_query($conexion, "SELECT Codigo, Contra, Cargo FROM personal WHERE Codigo = $usuario and Contra = $pass");
		
		while($result = mysqli_fetch_row($consulta)){
			$vista = $result[2];
		}

		if(!empty($vista)){
			if(!strcmp($vista, "Administrador")){
				echo "Administrador";
			}

			if(!strcmp($vista, "Empleado")){
				echo "Empleado";
			}
		}else{
			echo "Datos Erroneos";
		}
	}

?>