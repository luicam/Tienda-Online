<?php
//ACTIVAR LAS SESSIONES EN PHP
session_start();
require 'funciones.php';
if(!isset($_SESSION['usuario_datos']) OR empty($_SESSION['usuario_datos']))
    header('Location: index.php');
//
//if(isset($_GET['ID_PRODUCTO']) && is_numeric($_GET['ID_PRODUCTO'])){
if(isset($_GET['ID_PRODUCTO']) && is_numeric($_GET['ID_PRODUCTO']) AND isset($_GET['ID_USUARIO']) && is_numeric($_GET['ID_USUARIO'])){
    $id_producto = $_GET['ID_PRODUCTO'];
    $id_usuario = $_GET['ID_USUARIO'];

}else{
	header('Location: cerrar_sesion_valoracion_devolucion.php');
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
    
    <!-- contenido -->
    <div class="container" id="main">
      <div class="row">
        <div class="col-md-12">
          <fieldset>
            <legend>Formulario de valoración:</legend>
            <form method="POST" action="valorado_gracias.php" enctype="multipart/form-data" >
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Comentario</label>
                          <textarea class="form-control" name="COMENTARIO" id="" cols="3" required></textarea>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-3">
                      <div class="form-group">
                          <label>Puntuación</label>
                          <input type="text" class="form-control" name="PUNTUACION" placeholder="0" required>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>ID Usuario</label>
                          <!-- si pongo disable el campo me llega vacio a mi fichero valorado gracias-->
                          <input type="text" class="form-control" name="USUARIO_ID_USUARIO" placeholder="" value="<?php print $id_usuario ?>" required>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>ID Producto</label>
                          <!-- si pongo disable el campo me llega vacio a mi fichero valorado gracias-->
                          <input type="text" class="form-control" name="PRODUCTO_ID_PRODUCTO" placeholder="" value="<?php print $id_producto ?>" required>
                      </div>
                  </div>
              </div>
              <hr>
              <div class="row">
                <div class="pull-left">
                     <a href="valoracion_devolucion.php" class="btn btn-danger">Cancelar</a>
                </div>
                <div class="pull-right">
                    <input type="submit" class="btn btn-success" name="accion" value="Valorar Producto">
                </div>
              </div>
              <br>
              <br>
            </form>
          </fieldset>
        
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