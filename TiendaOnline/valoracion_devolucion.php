<?php
//añadir este bloque a todas las paginas
  session_start();
  require 'funciones.php';

  //datos de usuaurio f12 para verlo
  //print_r($_SESSION['usuario_info']);
  //$_SESSION['usuario_info']['NOMBRE'];
  if(!isset($_SESSION['usuario_datos']) OR empty($_SESSION['usuario_datos']))
    header('Location: index.php');

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
          <div class="pull-right">
               <a href="cerrar_sesion_valoracion_devolucion.php" class="btn btn-danger hidden-print">Cerrar Sesion</a>
          </div>
        </div>
        <hr>
    	  <div class="row">
          <div class="col-md-12">
            <fieldset>
              <legend>Bienvenido de vuelta: <?php print_r($_SESSION['usuario_datos']['NOMBRE']);?>, usted realizó, o nó, la compra de este producto:</legend>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>ID</th>
                      <th>Producto</th>
                      <th>Descripción</th>
                      <th>Precio</th>
                      <th>Imagen</th>
                      <th>Categoria</th>
                      <th>Valorar/Devolver</th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php
                        $id_producto = $_SESSION['usuario_datos']['ID_PRODUCTO'];
                        $id_usuario = $_SESSION['usuario_datos']['ID_USUARIO'];

                        require 'vendor/autoload.php';
                        
                        $producto  = new tonline\Producto;
                        $info_producto = $producto->mostrarCompraPorIds($id_producto, $id_usuario);
                        
                        $categoria = new tonline\Categoria;

                        //$cantidad = count($info_producto);
                        //if($cantidad > 0){
                       	if($info_producto != false){
                          $nombre_categoria = $categoria->mostrarPorId($info_producto['CATEGORIA_ID_CATEGORIA']);
                    ?>


                    <tr>
                      <td><?php print 1?></td>
                      <td><?php print $info_producto['ID_PRODUCTO']?></td>
                      <td><?php print $info_producto['NOMBRE_PRODUCTO']?></td>
                      <td><?php print $info_producto['DESCRIPCION']?></td>
                      <td><?php print $info_producto['PRECIO']?>  €</td>
                      <td><?php print $info_producto['IMAGEN']?></td>
                      <td><?php print $nombre_categoria['NOMBRE_CATEGORIA']?></td>
                      <td class="text-center">
                        <a href="" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Valoración</a>
                        <a href="" class="btn btn-danger"><span class="glyphicon glyphicon-erase"></span> Devolución</a>
                      </td>
                    </tr>

                    <?php
                    
                    }else{

                    ?>
                    <tr>
                      <td colspan="8">NO HAS COMPRADO ESTE PRODUCTO</td>
                    </tr>

                    <?php }?>
                  
                  
                  </tbody>

                </table>
            </fieldset>
          </div>
        </div>
        <div class="row">
          
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