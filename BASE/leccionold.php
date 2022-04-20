<?php 
$modulo = $_GET['mod'];
//$modulo = 1;
$usuario = 'chongond_root';
$password = 'administrador';
$respuestas = array();

$sql = "SELECT a.id,a.modulo,a.contenido,b.id id_respuesta,b.respuesta 
FROM preguntas a, respuestas b 
where a.modulo = $modulo
and b.modulo = $modulo
and a.id = b.pregunta
ORDER BY RAND() LIMIT 10";

//Proba la conexion
if (!$con = mysqli_connect("localhost",$usuario,$password,"chongond_chongon")) {
  echo "No se Puede crear la conexion.";
}
?>

<!DOCTYPE html>

<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Leccion Nu</title>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/interactjs@1.3.4/dist/interact.min.js"></script>
   

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/dragd.js"></script>
    <link rel="stylesheet" href="css/exam.css">

    <script src="js/toastr.min.js"></script>
    <link rel="stylesheet" href="css/toastr.min.css">

  </head>
  <body>
    <div class="container-fluid">
      <div class="row mb-3" >
        <div class="col-sm-12">
          <h2 class="text-center">Examen de Modulo Número <?php echo $modulo ?></h2>
        </div>
        <div class="col-sm-12 col-md-6 pregunta-container ml-2">
          <?php 
          //verificar la consulta.

          if ($result = mysqli_query($con,$sql)) {
            while ($row = mysqli_fetch_assoc($result)) { 
              //Guardar las respuestas en un array.
              $respuestas += [$row["id_respuesta"] => $row["respuesta"]]; 
              ?>
              <!-- Pregunta -->
               
                <div class="pregunta">  
                  <h4><?php echo $row["contenido"] ?></h4>
                  <div id="<?php echo $row['id'] ?>" class="dropzone text-center">
                    <div>
                      Arrastre aqui su Respuesta
                    </div>
                  </div>
                </div>
              <!-- Fin Pregunta -->
              <?php }
          } else {
            echo "Error de consulta";
          }?>
        </div>
        <div class="col-sm-12 col-md-5 respuesta-container ml-3">
          <?php
            //Funcion para desordenar un array asociativo.
            function shuffle_assoc(&$array) {
                $keys = array_keys($array);
                shuffle($keys);
                foreach($keys as $key) {
                    $new[$key] = $array[$key];
                }
                $array = $new;
                return true;
            }
              //Desordenar el arreglo de la respuestas para que no corresponan en orden.
              shuffle_assoc($respuestas);

              //imprimir los divs con las respuestas.
              foreach ( $respuestas  as $key => $value) { ?>
                <div id="<?php echo $key ?>" class="respuesta"> 
                  <?php echo $value ?>
                </div>
              <?php }
          ?>
          </div> 

          <div class="col-md-6 mt-2 mb-6">
            <button disabled="disabled" class="btn btn-block btn-primary" id="evaluar-btn">Evaluar Módulo</button>
          </div>
          <div class="col-md-6 mt-2 mb-6">
            <a href="index.php"><button  class="btn btn-block btn-info" id="evaluar-btn">Regresar</button></a>
            
          </div>
      </div>
			<!-- end cobtent-fluid -->
    </div>
   <!--  modal para respuesta -->
    <div class="modal" id="modal_puntaje" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Puntaje del Modulo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h4 class="text-center">Obtuviste un puntaje de:</h4>
            <h4 class="text-center" id="puntaje"></h4>
          </div>
          <div class="modal-footer">
            <button type="button" id="guardar_btn" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>


    <!--  modal para guardar -->
    <div class="modal" id="modal_guardar" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Puntaje del Modulo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" id="nombre"  placeholder="Nombre">
                <input type="hidden" name="puntaje" id="puntaje_oculto">
              <div class="form-group">
                <label for="exampleInputPassword1">Apellido</label>
                <input type="text" class="form-control" id="apellido" placeholder="Apellido">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Contraseña</label>
                <input type="password" class="form-control" id="contrasena"  placeholder="Contraseña de Supervisor">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="enviar" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
