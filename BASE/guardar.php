<?php 
	//datos que llegan del ajax
	$data = $_POST['respuestas'];
	$nombre = $_POST['nom'];
	$apellido = $_POST['ape'];
	$puntaje = $_POST['pun'];
	$passdado = $_POST['con'];
	$passAdmin = '';

	$usuario = 'chongond_root';
	$password = 'administrador';
	//variable para guadar la sumtoria de los puntajes
	
	//conexion
	$con = mysqli_connect("localhost",$usuario,$password,"chongond_chongon");
	if (!$con = mysqli_connect("localhost",$usuario,$password,"chongond_chongon")) {
  		echo "No se Puede crear la conexion.";
	}
	
	$id = $data[0][0];
	$modulo = "";

	$query = "SELECT * FROM preguntas WHERE id = $id";
	$passQ= "SELECT *  from administradores";

	if ($result = mysqli_query($con,$query)) {
		$row = mysqli_fetch_assoc($result);
		$modulo = $row["modulo"];
	}
	//revisar la contraseñas de administradores;
	if ($result2 = mysqli_query($con,$passQ)) {
		$row2 = mysqli_fetch_assoc($result2);
		$passAdmin = $row2["contrasena"];
	}

	//si las contraseñas coinciden se hace el guardado
	if ($passdado == $passAdmin) {
		$saveQ = "INSERT INTO evaluados (nombre,apellido,nota,modulo) 
		VALUES ('$nombre','$apellido',$puntaje,$modulo)";

		if (mysqli_query($con,$saveQ)) {
			$mensaje = "guardado";
			echo(json_encode($mensaje));
		} else{
			$mensaje = "NOguardado";
			echo(json_encode($mensaje));
		}
	}else{
		echo(json_encode("invalidPass"));
	}
 ?>