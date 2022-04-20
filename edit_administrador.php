<?php 

$id = $_GET['id'];
$query="SELECT * FROM administradores WHERE idadministradores = $id";
$usuario = 'root';
$password = '';

$con = mysqli_connect("localhost",$usuario,$password,"chongon");

if ($result = mysqli_query($con,$query)) {
	
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

    <title>Administradores</title>
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
          <h1 class="text-center mt-2 mb-3 pb-3" style="font-weight: 700;color: #36aad9;">Lista de Administradores</h1>
        </div>
      </div>
      <div class="row my-5 mx-5">
      	<div class="col-sm-12">
      		<div class="col-sm-12 my-3">
      			<a href=""><button class="btn btn-secondary btn-lg">Nuevo</button></a>
      			<a href="listado_administradores.php" class="btn btn-danger btn-lg" role="button">Regresar</a>
      		</div>
      		<?php if ($result = mysqli_query($con,$query)) { 
      				$row=mysqli_fetch_assoc($result);

      			?>
				<form action="" id="formulario_edit">
      			<div class="form-group">
      				<label for="">Nombre</label>
      				<input id="nombre" name="nombre" class="form-control" type="text" placeholder="nombre de usuario" value=" <?php echo $row["usuario"] ?>">
      			</div>
      			<div class="form-group">
      				<label for="">Contraseña</label>
      				<input id="contrasena" name="contrasena" class="form-control" type="text" placeholder="contaseña" value=" <?php echo $row["contrasena"] ?>">      		
      			</div>
      			<input name="id" type="hidden" value="<?php echo $row["idadministradores"] ?>">
      		</form>
			<?php } else{ echo "<h2>No existen registros con ese identificador</h2>";} ?>
      		
      		<button class="btn btn-lg btn-primary" id="guardar">GUARDAR</button>
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
				    "sEmptyTable":     "Ningún dato disponible en esta tabla",
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
				        "sLast":     "Último",
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

	<script>
		$("#guardar").click(function(){

			formu = $("#formulario_edit").serialize();

			$.ajax({
	        url: 'administrador_controller.php',
	        type: 'POST',
	        dataType: 'JSON',
	        data: {formulario : formu, accion: "edit" },
	        success: function(data){
	 
	        }
	    })
	    .fail(function() {
	        console.log("error");
	    })

		});		
	</script>
  </body>

</html>


