<?php 
$querymenu = "SELECT * from menu";
$usuario = 'chongond_root';
$password = 'administrador';

//Proba la conexion
if (!$con = mysqli_connect("localhost",$usuario,$password,"chongond_chongon")) {
  echo "No se Puede crear la conexion.";
}

?>

<ul class="sidebar navbar-nav"style="background-color: #132839">

  <?php 
    if ($menu = mysqli_query($con,$querymenu)) { 
      while ( $result= mysqli_fetch_assoc($menu)) {
      ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span><?php echo utf8_encode($result["nombre"]) ?></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <?php 
        $qsub = "SELECT * FROM sub_menu WHERE id_menu = ".$result["idmenu"];

         if ($sub_menu = mysqli_query($con,$qsub)) {
           while ( $submm = mysqli_fetch_assoc($sub_menu)) { ?>
              <a class="dropdown-item" href="<?php echo $submm['url']  ?>"><?php echo utf8_encode($submm['nombre_sub']) ?></a>
           <?php }
         }

         ?>
          </div>
      </li>
   <?php }
    }
   ?>
</ul>