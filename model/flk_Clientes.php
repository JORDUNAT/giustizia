

<?php	
	session_start();

	header("Content-Type: text/html;charset=utf-8");
	echo "<meta charset='utf-8'>";

	require('conexion.php');
	
	if(isset($_SESSION['s_usuario'])){
		$sesion = True;
	}
	else{
		$sesion = False;
	}

	$tipousuario=$_SESSION['s_tipusu'];
	$ususession=$_SESSION['s_usuario'];
	$Logo=$_SESSION['s_logo'];	
	


	$TipDoc 			=$_POST['sel_TipDoc'];
	$documento 			=$_POST['txt_documento'];
	$nombre1 			=$conexion->real_escape_string(strtoupper($_POST['txt_nombre']));
	$nombre 			= strtr($nombre1, 'áéíóúñ', 'ÁÉÍÓÚÑ');
	$apellidos1 		=$conexion->real_escape_string(strtoupper($_POST['txt_apellidos']));
	$apellidos 			= strtr($apellidos1, 'áéíóúñ', 'ÁÉÍÓÚÑ');
	$direccion1			=$conexion->real_escape_string(strtoupper($_POST['txt_direccion']));
	$direccion 			= strtr($direccion1, 'áéíóúñ', 'ÁÉÍÓÚÑ');	
	$telefono 			=$conexion->real_escape_string($_POST['txt_telefono']);
	$celular 			=$conexion->real_escape_string($_POST['txt_celular']);
	$email 				=strtoupper($_POST['txt_email']);
	$genero 			=$_POST['sel_genero'];
	$estado 			=$_POST['sel_estado'];
	$fecha 				=$_POST['txt_fecha'];	


if($tipousuario=='1' || $tipousuario=='5' || $ususession==$documento){
	$query="UPDATE tbl_usuarios SET usu_TipoDoc='$TipDoc', usu_Documento='$documento', usu_Nombres='$nombre', usu_Apellidos='$apellidos', usu_Email='$email', usu_FechaNacimiento='$fecha', usu_Genero='$genero', usu_Direccion='$direccion', usu_Telefono='$telefono', usu_Celular='$celular', usu_Estado='$estado'  WHERE (usu_Documento='$documento')";
	$resultado=$conexion->query($query);

	if($resultado>0){
		echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Se ha guardado los cambios realizados al usuario '.$nombre.' '.$apellidos;
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaClientes.php'>";		
	} else {
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar Cliente, por favor contacta con el Administrador  </div>';
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaClientes.php'>";

	}
}
	else
	{	echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span>Solo se puede modificar  un Cliente cuando se es Administrador o cuando se es el usuario que se esta modificando </div>';		
	echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaClientes.php'>";

	}
?>