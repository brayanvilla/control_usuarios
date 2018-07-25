<?php
if (isset($_GET['editar'])) {
		$editar_cod_jornada= $_GET['editar'];
		$consulta = "SELECT * FROM jornada WHERE cod_jornada=$editar_cod_jornada";
		$ejecutar =mysqli_query($con, $consulta);

		$fila = mysqli_fetch_array($ejecutar);
    
        $nombre_jornada = $fila['nombre_jornada'];
		$descripcion_jornada = $fila['descripcion_jornada'];
        $fecha_creacion = $fila['fecha_creacion'];
	
	

	}

?>

<br	/>
<div class="container">
		<form method="POST" action="">
		<!--**********************creacion cajas de la insercion en editar en pantalla*******************************************-->
			
	<div class="form-group">
			<label>Editar Nombre de la Jornada</label>
				<input type="text" name="nombre" class="form-control" placeholder="Escriba el Nombre de la jornada"> 
			</div>
			
				<div class="form-group">
			<label>Editar Descripcion de la jornada</label>
				<input type="text" name="descripcion" class="form-control" placeholder="Escriba la descripcion de la jornada a crear"> 
			</div>
			
			<div class="form-group">
			<label>Editar Fecha de creacion</label>
				<input type="text" name="fecha" class="form-control" placeholder="Ingrese la fecha ej. ####/##/##"> 
			</div>
			
			
			<!--**********************creacion boton de actualizar en pantalla*******************************************-->
			<div class="form-group">
				<input type="submit" name="actualizar" class="btn btn-warning" value="ACTUALIZAR DATOS">
			</div>
			
			
		</form>
	</div>

	<?php
	if (isset($_POST['actualizar'])) {
        
        $ACTUALIZAR_nombre_jornada = $_POST['nombre'];
        $ACTUALIZAR_descripcion_jornada =$_POST['descripcion'];
        $ACTUALIZAR_fecha_creacion=$_POST['fecha'];
		

		$consulta = "UPDATE jornada SET nombre_jornada='$ACTUALIZAR_nombre_jornada', descripcion_jornada='$ACTUALIZAR_descripcion_jornada', fecha_creacion='$ACTUALIZAR_fecha_creacion' WHERE cod_jornada='$editar_cod_jornada'";
	
		$ejecutar =mysqli_query($con, $consulta);
			if ($ejecutar) {
			echo "<script>alert('Datos Actualizados Correctamente :D')</script>"; 
			echo "<script>window.open('formulario_jornada.php', '_self')</script>";
		}

	}

?>