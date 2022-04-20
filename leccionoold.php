<?php 
// $modulo = $_GET['mod'];
$modulo = 1;
$usuario = 'root';
$password = '';
$respuestas = array();

$sql = "SELECT a.id,a.modulo,a.contenido,b.id id_respuesta,b.respuesta 
FROM preguntas a, respuestas b 
where a.modulo = $modulo
and b.modulo = $modulo
and a.id = b.pregunta
ORDER BY RAND() LIMIT 10";

//Proba la conexion
if (!$con = mysqli_connect("localhost",$usuario,$password,"chongon")) {
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/interactjs@1.3.4/dist/interact.min.js"></script>
    <script src="js/dragd.js"></script>
    <link rel="stylesheet" href="css/exam.css">
    <?php 

	include("bars.php");

 	?>
<!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Menu</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Capitulo 1</span>
          </a>
          <div class="dropdown-menu show" aria-labelledby="pagesDropdown2">
            <a class="dropdown-item" href="tema1.php">Fundamentos:</a>
            <a class="dropdown-item" href="hardware.php" >Hardware</a>
            <a class="dropdown-item" href="software.php" >Software</a>
            <a class="dropdown-item" href="#">Windows</a>
            <a class="dropdown-item" href="leccion.php?mod=1" style="font-weight: bold";>Lección Capitulo 1</a>
          </div>
        </li>
         
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Capitulo 2</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="#">Ofimática:</a>
            <a class="dropdown-item" href="#">Word</a>
            <a class="dropdown-item" href="#">Excel</a>
            <a class="dropdown-item" href="#">Powerpoint</a>
            <a class="dropdown-item" href="#">Lección Capitulo 2</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Capitulo 3</span>
          </a>
          <div class="dropdown-menu aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="#">Internet:</a>
            <a class="dropdown-item" href="#">Conectarse</a>
            <a class="dropdown-item" href="#">Navegadores</a>
            <a class="dropdown-item" href="#">Busqueda</a>
            <a class="dropdown-item" href="#">YouTube</a>
            <a class="dropdown-item" href="#">Correo</a>
            <a class="dropdown-item" href="#">Skype</a>
            <a class="dropdown-item" href="#">Lección Capitulo 3</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Capitulo 4</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="#">Redes Sociales:</a>
            <a class="dropdown-item" href="#">Facebook</a>
            <a class="dropdown-item" href="#">Twitter</a>
            <a class="dropdown-item" href="#">Buen Uso</a>
            <a class="dropdown-item" href="#">Lección Capitulo 4</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Capitulo 5</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="#">Mantenimiento:</a>
            <a class="dropdown-item" href="#">Mantenimiento</a>
            <a class="dropdown-item" href="#">Cuidados</a>
            <a class="dropdown-item" href="#">Lección Capitulo 5</a>
          </div>
        </li>
         <li>
         <div class="ml-5">
        <a href="mantenimiento9.php"><i class="fas fa-arrow-circle-left"></i></a>
        <a href="leccion5.php"><i class="fas fa-arrow-circle-right"></i></a>
         </div>
        </li>
      </ul>
      <div id="content-wrapper">

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="text-center">Examen de Modulo Número 1</h2>
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

          <div class="col-md-12 mt-2 mb-5">
            <button class="btn btn-block btn-primary" id="evaluar-btn">Evaluar Módulo</button>
          </div>
      </div>
			<!-- end cobtent-fluid -->
		</div>
        <!-- /.container-fluid -->

        <?php 

		// include("footer.php");

 		?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    

	<?php 

	include("jsref.php");

 	?>

  </body>

</html>
