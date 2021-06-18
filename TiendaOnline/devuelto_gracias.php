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

    require 'vendor/autoload.php';
    $detalle_pedido  = new tonline\DetallePedido;
    $result = $detalle_pedido->mostrarDatosNecesito($id_producto, $id_usuario);
    if(count($result)>0){
    	$id_pedido = $result[0]['ID_PEDIDO'];
    	$rfinal = $detalle_pedido->actualizarDetallePedido($id_producto, $id_pedido);
    	if($rfinal = false){
    		header('Location: cerrar_sesion_valoracion_devolucion.php');
    	}
    }else{
    	header('Location: cerrar_sesion_valoracion_devolucion.php');
    }
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
            <div class="jumbotron">
                <p>Has devuelto el producto satisfactoriamente, gracias.</p>
                <p>
                    <a href="cerrar_sesion_valoracion_devolucion.php">Regresar</a>
                </p>
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