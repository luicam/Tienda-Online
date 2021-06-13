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
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/estilos.css">

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
          <a class="navbar-brand" href="../mainpanel.php">CLOUD GAMING STORE</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li>
              <a href="../pedidos/index.php" class="btn">Pedidos</a>
            </li> 
            <li class="active">
              <a href="index.php" class="btn">Juegos</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <?php print $_SESSION['usuario_info']['NOMBRE'] ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="../cerrar_session.php">Salir</a></li>
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
            <legend>Datos del Juego</legend>
            <form method="POST" action="../funciones_admin.php" enctype="multipart/form-data" >
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Nombre</label>
                          <input type="text" class="form-control" name="NOMBRE_PRODUCTO" required>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Descripción</label>
                          <textarea class="form-control" name="DESCRIPCION" id="" cols="3" required></textarea>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-3">
                      <div class="form-group">
                          <label>Precio</label>
                          <input type="text" class="form-control" name="PRECIO" placeholder="0.00" required>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Stock</label>
                          <input type="text" class="form-control" name="STOCK" placeholder="Valores enteros" required>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Foto</label>
                          <input type="file" class="form-control" name="IMAGEN">
                          <input type="hidden" name="foto_temp">
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Categorias</label>
                          <select class="form-control" name="CATEGORIA_ID_CATEGORIA" required>
                            <option value="">--SELECCIONE--</option>
                            <?php
                             require '../../vendor/autoload.php';
                              $categoria = new tonline\Categoria;
                              $info_categoria = $categoria->mostrar();
                              $cantidad = count($info_categoria);
                                for($x =0; $x< $cantidad;$x++){
                                  $item = $info_categoria[$x];
                              ?>
                                <option value="<?php print $item['ID_CATEGORIA'] ?>">
                                 <?php print $item['NOMBRE_CATEGORIA'] ?></option>
                              <?php

                                }
                              ?>
                          </select>
                      </div>
                  </div>
              </div>
              <hr>
              <div class="row">
                <div class="pull-left">
                     <a href="index.php" class="btn btn-danger">Cancelar</a>
                </div>
                <div class="pull-right">
                    <input type="submit" class="btn btn-success" name="accion" value="Registrar">
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
  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>

</body>
</html>