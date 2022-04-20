<!DOCTYPE html>

<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Busqueda</title>
    <?php 

	include("bars.php");

 	?>
<!-- Sidebar -->
       <?php 

  include("sidebarbusqueda.php");

  ?>
         <li>
         <div class="ml-5">
        <a href="busqueda.php"><i class="fas fa-arrow-circle-left"></i></a>
        <a href="busqueda3.php"><i class="fas fa-arrow-circle-right"></i></a>
         </div>
        </li>
      </ul>
      <div id="content-wrapper">

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="text-center mt-2" style="font-weight: 700;color: #36aad9;">Busqueda en Internet</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-11 ml-5">
          <ol type="1" class="mt-3">
            <li><h3 style="color:#36aad9;">Pasos</h3><p ALIGN="justify"><b>Paso 1:</b><br>
Abre tu navegador de preferencia y escribe en la barra de direcciones www.google.com.<br><br>
<b>Paso 2:</b><br>
Escribe, en el espacio en blanco que allí aparece, el tema que quieres buscar.<br><br>
<b>Paso 3:</b><br>
Haz clic en el botón Buscar con Google o presiona la tecla Enter. Verás que aparecen diferentes sitios que contienen el tema que ingresaste.


            </p><img class="img-fluid" src="imagenes/busqueda.jpg" alt="" width="450" height="450"></li>
          
          </ol>
        </div>
       </div>
      

			
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

    

	<?php 

	include("jsref.php");

 	?>

  </body>

</html>
