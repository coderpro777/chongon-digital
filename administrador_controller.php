<?php 
$datos = $_POST['formulario'];
$accion= $_POST['accion'];



print_r($datos);
$usuario = 'root';
$password = '';
$con = mysqli_connect("localhost",$usuario,$password,"chongon");


if ($accion == "edit") {
	
	$query_edit= "UPDATE administradores set usuario = '".$datos['nombre']."', contrasena = '".$datos['contrasena']."' WHERE idadministrador = '".$datos['id']."' ";

	if (mysqli_query($con,$query_edit)) { 
		echo("update_exitoso");
	}

}elseif ($accion == "crear") {
		echo "entro por crear";
}


 ?>