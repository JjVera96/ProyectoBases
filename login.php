<?php
	session_start();	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login</title>
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
		<input type="text" name="Codigo" id="Codigo" placeholder="Usuario" required>
		<input type="password" name="Contra" id="Contra" placeholder="Contraseña" required>
		<input type="submit" value="   Entrar   " id="btnSubmit">
	</form>
</div>
<?php
	require("Conexion.php");

	if(!isset($_POST["btnSubmit"]) and isset($_POST["Codigo"]) and isset($_POST["Contra"])){
			$usuario = $_POST["Codigo"];
			$pass = $_POST["Contra"];			
		$consulta = mysqli_query($conexion, "SELECT Codigo, Contra, Cargo FROM personal WHERE Codigo = $usuario and Contra = $pass");
		
		if(!empty($consulta)){
			while($result = mysqli_fetch_row($consulta)){
				$vista = $result[2];
			}

			if(!empty($vista)){
				if(!strcmp($vista, "Administrador")){
					$_SESSION["usuario_valido"] = 1;
					header('Location: index.php');
				}

				if(!strcmp($vista, "Empleado")){
					$_SESSION["usuario_valido"] = 2;
					header('Location: index.php');
				}
			}else{
				echo "<h1 id='Error'>Usuario y/o contraseña incorrecta</h1>";
			}
		}else{
			echo "<h1 id='Error>Usuario y/o contraseña incorrecta</h1>";
		}
	}
?>
</body>
</html>