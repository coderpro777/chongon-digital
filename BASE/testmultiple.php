<?php 
$modulo = $_GET['mod'];
//$modulo = 1;
$usuario = 'chongond_root';
$password = 'administrador';
$respuestas_mu = array();
$preguntas_mu = array();
$sql = "SELECT * from preguntas_m where  modulo = $modulo ORDER BY RAND() LIMIT 4";
//Proba la conexion
if (!$con = mysqli_connect("localhost",$usuario,$password,"chongond_chongon")) {
  echo "No se Puede crear la conexion.";
}
if ($result2 = mysqli_query($con,$sql)) {
  
  while ( $row2 = mysqli_fetch_assoc($result2)) {
    $preguntas_mu += [$row2["id"] => $row2["pregunta"]];
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
		<style>
			.cud{
				border:2px solid #152056;
				margin-top: 1rem;
				margin-bottom: 1rem;
				padding-right: 1rem;
				padding-left: 1rem;
				border-radius: 8px;
			}
		</style>

    <title>Test</title>
		
    <?php 

	include("bars.php");

 	?>
<!-- Sidebar -->
      <?php 

  include("sidebar.php");

  ?>
        
<div id="content-wrapper">
	<div class="container">
		<div class="row mx-1">
			
				<?php 
					foreach ($preguntas_mu as $key => $value) { ?>
					<div class="col-sm-12 col-md-6 cud">
						<h5 class="text-justify"><?php echo utf8_encode($value) ?>:</h5>
						<ul class="list-group py-1">
						<?php 
							$query2 = "SELECT id, respuesta from respuestas_m WHERE pregunta_id = ".$key."";
							if ($resul_res = mysqli_query($con,$query2)) {
								while ($row_res = mysqli_fetch_assoc($resul_res)) { ?>
									<li class="respuestasli">-<?php echo utf8_encode($row_res["respuesta"]) ?></li>
									
							<?php	}
							}else{
								echo "mala consulta";
							}
						?>
						</ul>
						<div class="text-center">
							<select style="margin-bottom:1rem;" class="form-control form-control-sm">
								<option id="0">Seleccione Respuesta</option>
								<?php 
									$query2 = "SELECT id, respuesta from respuestas_m WHERE pregunta_id = ".$key."";
									if ($resul_res = mysqli_query($con,$query2)) {
										// $row_res = mysqli_fetch_assoc($resul_res);
										while ($row_res = mysqli_fetch_assoc($resul_res)) { ?>
											<option id="<?php echo $row_res["id"] ?>"><?php echo utf8_encode($row_res["respuesta"]) ?></option>
									<?php	}
									}else{
										echo "mala consulta";
									}
								?>
							</select>
						</div>
		
					</div>	
				<?php	}
				?>
				
		</div>
	</div>
</div>

      <!-- /.content-wrapper -->

   
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    
<input type="hidden" value="testmultiple.php?mod=<?php echo $modulo?>" id="locationid">
	<?php 

	include("jsref.php");

 	?>

  </body>

</html>
