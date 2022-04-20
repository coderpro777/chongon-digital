<?php 
session_start();

include("conexion.php");

$usuarioi = $_POST["usuario"];
$passwordd = $_POST["password"];

$query = "SELECT * FROM administradores WHERE usuario = '$usuarioi' AND contrasena = '$passwordd'";

try {
	if ($result = mysqli_query($con2,$query)) {
		if (mysqli_num_rows($result) >= 1) {
			$_SESSION['user'] = mysqli_fetch_assoc($result)["usuario"];
			$_SESSION['login_user'] = 1;
			$mensaje = "confirmado";
			echo json_encode($mensaje);	
		}
		else{
			$mensaje = "error_datos";
			echo json_encode($mensaje);
		}
		
	} else{
		$mensaje = "error_base";
		echo json_encode($mensaje);
	}
	
} catch (Exception $e) {
	echo $e;
}

// echo $emaild;
// echo "-".$passwordd;
?>