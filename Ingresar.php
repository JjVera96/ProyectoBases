<?php
	require("Conexion.php");

	if(!isset($_POST["btnSubmit"])){
		$usuario = $_POST["Codigo"];
		$pass = $_POST["Contra"];
		echo "$usuario $pass<br>";
		$consulta = mysqli_query($conexion, "SELECT Codigo, Contra, Cargo FROM personal WHERE Codigo = $usuario and Contra = $pass");
		$result = mysqli_fetch_row($consulta);

		if(strcmp($result[2],"Administrador")){
			echo "Has Ingresado Como Admin<br>";
		}elseif (strcmp($result[2],"Empleado")) {
			echo "Has Ingreado Como Empleado<br>";
		}else{
			echo "Error Grandisimo<br>";
		}
	}
?>