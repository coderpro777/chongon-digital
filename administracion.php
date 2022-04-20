<?php 
session_start();
if (!isset($_SESSION['login_user'])) {
  echo "<script type='text/javascript'> location.href = 'login/';</script>";
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

	


    <title>Menu de Administración</title>
    <?php 

	include("bars.php");

 	?>
<!-- Sidebar -->
      <?php 

  include("sidebar.php");

  ?>
      
      <div id="content-wrapper">

    <div class="container-fluid">
      
      <a href="listado_administradores.php" class="btn btn-primary" role="button">Tabla Administradores</a><br><br>
      <a href="listado_evaluados.php" class="btn btn-primary" role="button">Tabla Evaluados</a><br><br>
      <a href="listado_menu.php" class="btn btn-primary" role="button">Tabla Menú</a><br><br>
      <a href="listado_submenu.php" class="btn btn-primary" role="button">Tabla Submenú</a><br><br>
      <a href="listado_preguntas_y_respuestas.php" class="btn btn-primary" role="button">Tabla de preguntas y tabla de respuestas drag and drop</a><br><br>
      <a href="listado_preguntas_y_respuestas_om.php" class="btn btn-primary" role="button">Tabla de preguntas y tabla de respuestas de opciones multiples</a><br><br><br>
      <a href="index.php" class="btn btn-warning" role="button">Regresar</a>

      <a href="login/logout.php" class="btn btn-warning" role="button">salir</a>
			
		</div>
        <!-- /.container-fluid -->

        <?php 

		include("footer.php");

 		?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    
  <input type="hidden" value="evaluados.php" id="locationid">
	<?php 

	include("jsref.php");



 	?>
 
  </body>

</html>


