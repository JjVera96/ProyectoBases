<?php
	session_start();	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>login - Droguerias FerJo</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Ranga" rel="stylesheet">		
	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<div id="Contenido">
	<header>
		<hgroup>
		<h1>Droguerias FerJo</h1>
		<h2>Login</h2>
		</hgroup>
	</header>
	<form action="login.php" method="post">
		<input type="text" name="Codigo" id="Codigo" placeholder="Usuario" required><br>
		<input type="password" name="Contra" id="Contra" placeholder="Contraseña" required><br>
		<input type="submit" value="   Entrar   " name="btnSubmit" id="btnSubmit">
	</form>
</div>
<?php
	require("conexion.php");

	if(isset($_POST["btnSubmit"]) and isset($_POST["Codigo"]) and isset($_POST["Contra"])){
			$usuario = mysqli_real_escape_string($conexion, $_POST["Codigo"]);
			$pass = mysqli_real_escape_string($conexion, $_POST["Contra"]);
			$consulta = mysqli_query($conexion, "SELECT Codigo, Contra, Cargo, Primer_Nombre, Primer_Apellido FROM personal WHERE Codigo = '$usuario' and Contra = '$pass'");
		
		if(!empty($consulta)){
			while($result = mysqli_fetch_row($consulta)){
				$vista = $result[2];
				$pn = $result[3];
				$pa = $result[4];
			}

			if(!empty($vista)){
				if(!strcmp($vista, "Administrador")){
					$_SESSION["usuario_valido"] = 1;
					$_SESSION["Codigo"] = $usuario;
					$_SESSION["Primer_Nombre"] = $pn;
					$_SESSION["Primer_Apellido"] = $pa;
					header('Location: index.php');
				}

				if(!strcmp($vista, "Empleado")){
					$_SESSION["usuario_valido"] = 2;
					$_SESSION["Codigo"] = $usuario;
					$_SESSION["Primer_Nombre"] = $pn;
					$_SESSION["Primer_Apellido"] = $pa;
					header('Location: index.php');
				}
			}
		}
	}
?>
</body>
</html>