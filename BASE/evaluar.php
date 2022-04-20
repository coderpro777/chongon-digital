<?php 
	//datos que llegan del ajax
	$data = $_POST['respuestas'];
	
	$usuario = 'chongond_root';
	$password = 'administrador';
	//variable para guadar la sumtoria de los puntajes
	$puntaje = 0;
	//conexion
	$con = mysqli_connect("localhost",$usuario,$password,"chongond_chongon");
	if (!$con = mysqli_connect("localhost",$usuario,$password,"chongond_chongon")) {
  		echo "No se Puede crear la conexion.";
	}
	//recorrer el array que llega del usuario
	foreach ($data as $key => $value) {
		//consulta de la respuesta correcta de la respuesta que ha dado el usuario
		$query = "SELECT preguntas_id FROM respuestas where id = $value[1]";

		if ($result = mysqli_query($con,$query)) {
			$pregunta_id = mysqli_fetch_assoc($result);
			//si la pregunta es corresponte a la respuesta se suma 1 a el puntaje.
			if ($pregunta_id["preguntas_id"] == $value[0]) {
				$puntaje++;
			}
		} else{
			echo "error".mysqli_error($con);
		}
	}
	//se retorna el valor del puntaje total alcanzado.
	echo(json_encode($puntaje));
 ?>
