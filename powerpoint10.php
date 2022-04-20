<!DOCTYPE html>

<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PowerPoint</title>
    <?php 

	include("bars.php");

 	?>
<!-- Sidebar -->
      <?php 

  include("sidebarpowerpoint.php");

  ?>
         <li>
         <div class="ml-5">
        <a href="powerpoint9.php"><i class="fas fa-arrow-circle-left"></i></a>
        <a href="leccion.php?mod=2"><i class="fas fa-arrow-circle-right"></i></a>
         </div>
        </li>
      </ul>
      <div id="content-wrapper">

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="text-center mt-2" style="font-weight: 700;color: #36aad9;">PowerPoint</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-11 ml-5">
          <ol type="1" class="mt-3">
            <li><h3 style="color:#36aad9;">Incrusta archivos de video</h3><p ALIGN="justify">Podrás agregar archivos de video en las diapositivas. Hacerlo podría serte útil para los informes o cualquier otro archivo de video que pueda estar relacionado a tu presentación. El archivo de video se reproducirá cuando aparezca la diapositiva.<br><br>
Haz clic en el botón de “Video” en la pestaña “Insertar”. Podrás buscar los archivos de vídeo en tu computadora.<br><br>
Si bien no será tan sencillo, también será posible incrustar videos de YouTube. Lee aquí para aprender a hacerlo.

            </p></li>
          
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
