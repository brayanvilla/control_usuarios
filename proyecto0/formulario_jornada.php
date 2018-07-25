<!DOCTYPE html>
<!--******* mandamos a llamar la conexion que generamos anteriormente para la base de datos ****-->
<?php
include("conexion.php");
?>
<meta charset="UTF-8">

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>FORMULARIO JORNADA</title>
		<!--*************llamada a la libreria bootstrap para mejorar el diseño de la pagina -->
		 <link href="css/bootstrap.min.css" rel="stylesheet">
	  </head>
<body>
	<!--<div class="col-md-8 col-md-offset-2">-->
	<div class="container">
		<h1 align='center'>FORMULARIO JORNADA</h1>
		<form method="POST" action="formulario_jornada.php">
		<!--**********************creacion cajas de insercion en pantalla*******************************************-->
			<div class="form-group">
			<label>Ingrese Id de la jornada</label>
				<input type="text" name="codigo" class="form-control" placeholder="Escriba el ID de la jornada"> 
			</div>
			
			<div class="form-group">
			<label>Nombre Jornada</label>
				<input type="text" name="nombre" class="form-control" placeholder="Escriba el Nombre de la jornada"> 
			</div>
			
				<div class="form-group">
			<label>Descripcion de la jornada</label>
				<input type="text" name="descripcion" class="form-control" placeholder="Escriba la descripcion de la jornada a crear"> 
			</div>
			
			<div class="form-group">
			<label>Fecha de creacion</label>
				<input type="text" name="fecha" class="form-control" placeholder="Ingrese la fecha ej. ####/##/##"> 
			</div>
			
			
			<!--**********************creacion boton de insercion en pantalla*******************************************-->
			<div class="form-group">
				<input type="submit" name="insert" class="btn btn-warning" value="INSERTAR DATOS">
			</div>
		</form>
	</div>
	
<br /><br /><br />
<!-- *******codigo para llamar a la insercion en la base de datos ******** -->
<?php
	if (isset($_POST['insert'])) {
		$cod_jornada = $_POST['codigo'];
		$nombre_jornada = $_POST['nombre'];
        $descripcion_jornada = $_POST['descripcion'];
		$fecha_creacion = $_POST['fecha'];
		

		$insertar = "INSERT INTO jornada(cod_jornada,nombre_jornada,descripcion_jornada,fecha_creacion) VALUES ('$cod_jornada','$nombre_jornada','$descripcion_jornada','$fecha_creacion')";
		
		$ejecutar =mysqli_query($con, $insertar);

		if ($ejecutar) {
			echo "<script>alert('Datos Insertados Correctamente :D')</script>"; 
			echo "<script>window.open('formulario_jornada.php', '_self')</script>";
		}
	}
?>
<!-- ****************creacion de la tabla mostrar************** -->
	<!--<div class="col-md-8 col-md-offset-2">-->
	<div class="container">
	<table class="table table-bordered table-responsive">
		<tr>
			<td>ID JORNADA</td>
			<td>NOMBRE DE LA JORNADA</td>
			<td>DESCRIPCION DE LA JORNADA</td>
			<td>FECHA CREACION DE LA JORNADA</td>
			<td>Accion</td>
			<td>Accion</td>
		</tr>

		<?php
			$consulta = "SELECT * FROM jornada";
			$ejecutar =mysqli_query($con, $consulta);
			$i = 0;
			while ($fila = mysqli_fetch_array($ejecutar)) {
                
		$cod_jornada = $fila['cod_jornada'];
		$nombre_jornada = $fila['nombre_jornada'];
		$descripcion_jornada = $fila['descripcion_jornada'];
        $fecha_creacion = $fila['fecha_creacion'];

		$i++;
			


		?>
		<tr align='center'>
			<td><?php echo $cod_jornada; ?></td>
			<td><?php echo $nombre_jornada; ?></td>
			<td><?php echo $descripcion_jornada; ?></td>
			<td><?php echo $fecha_creacion; ?></td>
		
			
			
			
			<td><a href="formulario_jornada.php?editar=<?php echo $cod_jornada; ?>">Editar</a></td>
			<td><a href="formulario_jornada.php?borrar=<?php echo $cod_jornada; ?>">Borrar</a></td>
		</tr>
		<?php } ?>
	</table>
	</div>
	<!-- ****************para editar lo enviamos a otro formulario ************** -->
	<?php
	if (isset($_GET['editar'])) {
		include("editar_formulario_jornada.php");

	}		
?>
	
	<!-- ****************Codigo para borrar un registro************** -->
<?php
if (isset($_GET['borrar'])) {
		$borrar_cod_jornada = $_GET['borrar'];
		$borrar = "DELETE FROM jornada WHERE cod_jornada='$borrar_cod_jornada'";
		$ejecutar =mysqli_query($con, $borrar);

		if ($ejecutar) {
			echo "<script>alert('Datos eliminados Correctamente :D')</script>"; 
			echo "<script>window.open('formulario_jornada.php', '_self')</script>";
		}
	}

?>

</body>
</html>