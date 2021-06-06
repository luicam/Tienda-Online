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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">admin <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="./index.php">Salir</a></li>
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
                    $id = $_GET['USUARIO_ID_USUARIO'];
                    $cliente = new tonline\Usuario;

                    $info_cliente = $cliente->mostrarPorId($id);

                ?>

                <legend>Información del Usuario</legend>
                <div class="form-group">
                    <label>ID Usuario</label>
                    <input value="<?php print $info_cliente['ID_USUARIO'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input value="<?php print $info_cliente['EMAIL'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input value="<?php print $info_cliente['PASSWORD'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Nombre</label>
                    <input value="<?php print $info_cliente['NOMBRE'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Apellidos</label>
                    <input value="<?php print $info_cliente['APELLIDOS'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Dirección</label>
                    <input value="<?php print $info_cliente['DIRECCION'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Administrador</label>
                    <input value="<?php print $info_cliente['ADMIN'] ?>" type="text" class="form-control" readonly>
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