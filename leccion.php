<?php 
$modulo = $_GET['mod'];
//$modulo = 1;
include("conexion2.php");
$respuestas = array();
$preguntas = array();
$sql = "SELECT a.id,a.modulo,a.contenido,b.id id_respuesta,b.respuesta 
FROM preguntas a, respuestas b 
where a.modulo = $modulo
and b.modulo = $modulo
and a.id = b.preguntas_id
ORDER BY RAND() LIMIT 4";
//Proba la conexion
if (!$con = mysqli_connect("localhost",$usuario,$password,$database)) {
  echo "No se Puede crear la conexion.";
}

// llenado del array
if ($result2 = mysqli_query($con,$sql)) {
  
  while ( $row2 = mysqli_fetch_assoc($result2)) {
    $respuestas += [$row2["id_respuesta"] => $row2["respuesta"]];
    $preguntas += [$row2["id"] => $row2["contenido"]];
  }
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

    <title>Leccion</title>


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
        <div class="col-md-12">
          <div class="d-inline-block">
            <img class="img-fluid" src="imagenes/chongondigital.jpg" alt="" width="140" height="192">
          </div>
          <div class="d-inline-block">
            <h2 class="text-center">Examen de Modulo Número <?php echo $modulo ?></h2>  
          </div>
        </div>
        <div class="col-sm-12 col-md-12 respuesta-container ml-3">
          <div class="container">
            <div class="row">
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
                <div id="<?php echo $key ?>" class="respuesta text-center col-md-6" style="font-size:1Rem;"> 
                  <?php echo utf8_encode($value) ?>
                </div>
              <?php }
              ?>  
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 pregunta-container ml-2">
          <div class="container">
            <div class="row">
            
                <?php foreach ( $preguntas  as $key => $value) {  ?>
                    <div class="pregunta col-md-6">  
                    <h5><?php echo utf8_encode($value) ?></h5>
                    <div id="<?php echo $key ?>" class="dropzone text-center">
                      <div style="font-weight: bold">
                        Arrastre aqui su Respuesta
                      </div>
                    </div>
                  </div>
                <?php } ?>



              
            </div>
          </div>
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
              <!-- <div class="form-group">
                <label for="exampleInputEmail1">Contraseña</label> -->
                <input type="hidden" class="form-control" id="contrasena"   value="administradorchongon">
              <!-- </div> -->
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