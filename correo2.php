<!DOCTYPE html>

<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Email</title>
    <?php 

	include("bars.php");

 	?>
<!-- Sidebar -->
      <?php 

  include("sidebarcorreo.php");

  ?>
         <li>
         <div class="ml-5">
        <a href="correo.php"><i class="fas fa-arrow-circle-left"></i></a>
        <a href="correo3.php"><i class="fas fa-arrow-circle-right"></i></a>
         </div>
        </li>
      </ul>
      <div id="content-wrapper">

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="text-center mt-2" style="font-weight: 700;color: #36aad9;">Correo</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-11 ml-5">
          <ol type="1" class="mt-3">
            <li><h3 style="color:#36aad9;">Campos de un mensaje de correo electrónico</h3><p ALIGN="justify">
              A continuación, los campos que debes completar cuando envías un correo electrónico: <br><br>

<b>De:</b> tu dirección de correo electrónico. La mayoría de las veces no tendrás que completar este campo porque generalmente lo determina el cliente del correo electrónico. <br>

<b>Para:</b> este campo se utiliza para la dirección de correo electrónico del destinatario.<br> 

<b>Asunto:</b> es el título que el destinatario ve cuando quiere leer el correo electrónico. <br>

<b>CC (copia carbón):</b> este campo permite que un correo electrónico se envíe a una gran cantidad de personas al escribir las direcciones respectivas separadas por comas. <br>

<b>CCO (copia carbón oculta):</b> es una CC excepto que el receptor no vea la lista de personas en el campo CCO.<br> 

<b>Mensaje:</b> es el cuerpo del correo electrónico. <br>

La función copia carbón es enviar una copia a las personas que no están directamente involucradas con el mensaje pero a quienes se pretende mantener informadas del contenido del mismo o para mostrarles que se ha enviado el correo electrónico a el(los) destinatario(s). <br>

La función copia carbón oculta hace posible enviar mensajes sin que ninguno de los destinatarios o destinatarios ocultos vean que se les ha enviado un mensaje. Por lo general, se recomienda que al enviar un correo electrónico a muchas personas, se use copia carbón oculta para evitar que uno de los destinatarios responda a todos o que arme una lista de direcciones.<br> 

Otras funciones del correo electrónico son: <br><br>

<b>Archivos Adjuntos, Adjuntos:</b> se puede adjuntar un archivo a un correo electrónico especificando su ubicación en el disco duro.<br> 

<b>Firma:</b> si el cliente del correo electrónico lo permite, generalmente se puede configurar una firma, es decir, unas pocas líneas de texto que se agregarán al final del documento. 


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
