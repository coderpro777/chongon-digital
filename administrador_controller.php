<?php 
$datos = $_POST['formulario'];
$accion= $_POST['accion'];



print_r($datos);
include("conexion2.php");
$con = mysqli_connect("localhost",$usuario,$password,$database);


if ($accion == "edit") {
	
	$query_edit= "UPDATE administradores set usuario = '".$datos['nombre']."', contrasena = '".$datos['contrasena']."' WHERE idadministrador = '".$datos['id']."' ";

	if (mysqli_query($con,$query_edit)) { 
		echo("update_exitoso");
	}

}elseif ($accion == "crear") {
		echo "entro por crear";
}


 ?>