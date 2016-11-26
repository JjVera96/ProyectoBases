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
	<script src="jquery-3.1.1.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-es.js"></script>
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
		<form name="miform" id="miform" method="get">
			<table id="tablaProd">
				<thead>
					<tr>
						<th>Codigo</th>
						<th>Cantidad</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<div class="form-group codigos">
								<input class="form-control validate[required]" name="codPro[]" placeholder="Codigo Producto"/>
							</div>
						</td>
						<td>
							<div class="form-group cantidades">
								<input class="form-control validate[required]" name="cantPro[]"" placeholder="Cantidad"/>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			<button id="btnadd" class="btn btn-primary">Agregar Nuevo</button>
			<button id="btnsubmit" type="submit" class="btn btn-success">Vender</button>
			</form>
		</div>
	</div>
	</section>
</div>


<script type="text/javascript">
var count = 0;
$(function(){
	$(document).on("click", "#btnadd", function(event){
		count++;
		$('#tablaProd tr:last').after('<tr><td><div class="form-group codigos"><input class="form-control validate[required]" name="codPro[]" placeholder="Codigo Producto"/></div></td><td><div class="form-group cantidades"><input class="form-control validate[required]" name="cantPro[]" placeholder="Cantidad"/></div></td></tr>');
		event.preventDefault();
	});

	$( "#miform" ).submit(function( event ) {
		var frm = $(this);
		var formulario = $(this).serialize();

	if($('#miform').validationEngine('validate')){
		$.post( "guardar.php", formulario)
		.done(function(data){
			alert(data);
			$(frm)[0].reset();
		})
		.fail(function() {
        alert( "Error no pude enviar los datos" );
		});
  	}
	event.preventDefault();
	});
});


</script>

</body>
</html>