<?php
//ACTIVAR LAS SESSIONES EN PHP
session_start();
require 'funciones.php';
//if(isset($_GET['ID_PRODUCTO']) && is_numeric($_GET['ID_PRODUCTO'])){
if(isset($_GET['ID_PRODUCTO']) && is_numeric($_GET['ID_PRODUCTO'])){
    $id = $_GET['ID_PRODUCTO'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <meta name="description" content="">
    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">-->
    <title>CGS</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">

</head>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">CLOUD GAMING STORE</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li>
              <a href="carrito.php" class="btn">CARRITO <span class="glyphicon glyphicon-shopping-cart"> <?php print cantidadProducto(); ?></span></a>
            </li> 
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <!-- Container -->
    <div class="container" id="main">
    	<div class="row">
          <div class="col-md-12">
            <fieldset>
              <legend>Todas las Valoraciones de los Usuarios</legend>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Producto</th>
                      <th>Usuario</th>
                      <th>Puntuaciones</th>
                      <th>Comentarios</th>
                      <th>Categoria</th>
                      <th>Precio</th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php
                        require 'vendor/autoload.php';
                        
                        $valoraciones  = new tonline\Valoracion;
                        $info_valoracion = $valoraciones->mostrarPorId($id);
                        $categoria = new tonline\Categoria;

                        $cantidad = count($info_valoracion);
                        if($cantidad > 0){
                            $c=0;
                        for($x =0; $x < $cantidad; $x++){
                            $c++;
                            $item = $info_valoracion[$x];
                            $nombre_categoria = $categoria->mostrarPorId($item['CATEGORIA_ID_CATEGORIA']);
                    ?>


                    <tr>
                      <td><?php print $c?></td>
                      <td><?php print $item['NOMBRE_PRODUCTO']?></td>
                      <td><?php print $item['NOMBRE']?></td>
                      <td><?php print $item['PUNTUACION']?></td>
                      <td><?php print $item['COMENTARIO']?></td>
                      <td><?php print $nombre_categoria[$x]?></td>
                      <td><?php print $item['PRECIO']?> €</td>
                      
                    </tr>

                    <?php
                      }
                    }else{

                    ?>
                    <tr>
                      <td colspan="7">NO HAY VALORACIONES PARA ESTE PRODUCTO</td>
                    </tr>

                    <?php }?>
                  
                  
                  </tbody>

                </table>
            </fieldset>
          </div>
        </div>

        <div class="row">
        	<div class="main-login">
	            <form action="login_valoracion_devolucion.php" method="post">
	                <div class="panel panel-default">
	                    <div class="panel-heading">
	                        <h3 class="text-center">¿QUIERES DAR TU VALORACION O REALIZAR UNA DEVOLUCION?</h3>
	                    </div>
	                    <div class="panel-body">
	                        <p class="text-center">
	                            <img src="./assets/imagenes/logo.png" alt="login image" width="210" >
	                        </p>
	                        <div class="form-group">
	                            <label>Email</label>
	                            <input type="email" class="form-control" name="EMAIL" placeholder="Email" required>
	                        </div>
	                        <div class="form-group">
	                            <label>Password</label>
	                            <input type="password" class="form-control" name="PASSWORD" placeholder="Password" required>
	                            <input type="hidden" name="ID_PRODUCTO" value="<?php print $_GET['ID_PRODUCTO']; ?>" required>
	                        </div>
	                        <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
	                    </div>
	                </div>
	            </form>
	        </div>
        </div>

    </div>
    <!-- /container -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>-->

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>