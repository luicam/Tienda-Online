<?php
//añadir este bloque a todas las paginas
  session_start();
  //datos de usuaurio f12 para verlo
  //print_r($_SESSION['usuario_info']);
  //$_SESSION['usuario_info']['NOMBRE'];
  if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info']))
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
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/estilos.css">

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
          <a class="navbar-brand" href="./mainpanel.php">CLOUD GAMING STORE</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li class="active">
              <a href="./pedidos/index.php" class="btn">Pedidos</a>
            </li> 
            <li>
              <a href="./juegos/index.php" class="btn">Juegos</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <?php print $_SESSION['usuario_info']['NOMBRE'] ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="cerrar_session.php">Salir</a></li>
                </ul>
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
                <?php
                    require '../vendor/autoload.php';
                    $id = $_GET['PRODUCTO_ID_PRODUCTO'];
                    $producto = new tonline\Producto;

                    $info_producto = $producto->mostrarPorId($id);

                ?>

                <legend>Información del Producto</legend>
                <div class="form-group">
                    <label>ID Producto</label>
                    <input value="<?php print $info_producto['ID_PRODUCTO'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Nombre Producto</label>
                    <input value="<?php print $info_producto['NOMBRE_PRODUCTO'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea rows="4" class="form-control" readonly>
                      <?php print $info_producto['DESCRIPCION'] ?>
                    </textarea>
                </div>
                <div class="form-group">
                    <label>Precio</label>
                    <input value="<?php print $info_producto['PRECIO'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Stock</label>
                    <input value="<?php print $info_producto['STOCK'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>URL Imagen</label>
                    <input value="<?php print $info_producto['IMAGEN'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Id Categoría</label>
                    <input value="<?php print $info_producto['CATEGORIA_ID_CATEGORIA'] ?>" type="text" class="form-control" readonly>
                </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="pull-left">
               <a href="./mainpanel.php" class="btn btn-danger hidden-print">Cancelar</a>
          </div>

          <div class="pull-right">
              <a href="javascript:;" id="btnImprimir" class="btn btn-success hidden-print">Imprimir</a>
          </div>
        </div>
        <br><br>
    </div>
    <!-- /container -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>-->

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script>
        $('#btnImprimir').on('click',function(){

            window.print();

            return false;

        })
                        
  </script>
</body>
</html>