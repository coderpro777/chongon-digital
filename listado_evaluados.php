<?php 
			$query="SELECT * FROM evaluados";
			include("conexion2.php");

			//Proba la conexion
			if (!$con = mysqli_connect("localhost",$usuario,$password,$database)) {
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

	


    <title>Software</title>
    <?php 

	include("bars.php");

 	?>
<!-- Sidebar -->
      <?php 

  include("sidebar.php");

  ?>
      
      <div id="content-wrapper">

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="text-center mt-2 mb-3 pb-3" style="font-weight: 700;color: #36aad9;">Lista de Evaluados</h1>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12">
      		<table id="table_evaluados" class="table">
			<thead class="thead-dark">
				<tr>
					<td>Nombre</td>
					<td>Apellido</td>
					<td>Modulo</td>
					<td>Nota</td>
				</tr>
			</thead>
			<tbody id="table_body">
				<?php 
				if ($result = mysqli_query($con,$query)){
					while ($row = mysqli_fetch_assoc($result)) { ?>
						<tr>
							<td><?php echo $row['nombre'] ?></td>
							<td><?php echo $row['apellido'] ?></td>
							<td><?php echo $row['modulo'] ?></td>
							<td><?php echo $row['nota'] ?></td>
						</tr>
						
				<?php	}
				}	
				?>
				
			</tbody>
			<tfoot>
				<tr>
					<td>Nombre</td>
					<td>Apellido</td>
					<td>Modulo</td>
					<td>Nota</td>
				</tr>
			</tfoot>
		</table>
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

    
  <input type="hidden" value="evaluados.php" id="locationid">
	<?php 

	include("jsref.php");



 	?>
 	<link rel="stylesheet" href="css/datatables.css">
	<script src="js/datatables.js"></script>

	<script>

		$(document).ready(function() {
    		$('#table_evaluados').DataTable({
    			"language":{
				    "sProcessing":     "Procesando...",
				    "sLengthMenu":     "Mostrar _MENU_ registros",
				    "sZeroRecords":    "No se encontraron resultados",
				    "sEmptyTable":     "Ning??n dato disponible en esta tabla",
				    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				    "sInfoPostFix":    "",
				    "sSearch":         "Buscar:",
				    "sUrl":            "",
				    "sInfoThousands":  ",",
				    "sLoadingRecords": "Cargando...",
				    "oPaginate": {
				        "sFirst":    "Primero",
				        "sLast":     "??ltimo",
				        "sNext":     "Siguiente",
				        "sPrevious": "Anterior"
				    },
				    "oAria": {
				        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
				    }
				}
    		});
		} );
	</script>
  </body>

</html>


