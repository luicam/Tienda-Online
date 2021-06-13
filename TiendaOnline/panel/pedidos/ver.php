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
            <li class="active">
              <a href="index.php" class="btn">Pedidos</a>
            </li> 
            <li>
              <a href="../juegos/index.php" class="btn">Juegos</a>
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
                <?php
                    require '../../vendor/autoload.php';
                    $id = $_GET['ID_PEDIDO'];
                    $pedido = new tonline\Pedido;

                    $info_pedido = $pedido->mostrarPorId($id);

                    $info_detalle_pedido = $pedido->mostrarDetallePorIdPedido($id);

                ?>


                <legend>Información de la Compra</legend>
                <div class="form-group">
                    <label>Nombre</label>
                    <input value="<?php print $info_pedido['NOMBRE'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Apellidos</label>
                    <input value="<?php print $info_pedido['APELLIDOS'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input value="<?php print $info_pedido['EMAIL'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Fecha</label>
                    <input value="<?php print $info_pedido['FECHA'] ?>" type="text" class="form-control" readonly>
                </div>
               


                <hr>
                    Productos Comprados
                <hr>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Titulo</th>
                      <th>Foto</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>
                          Total
                      </th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php
                   
                    
                      $cantidad = count($info_detalle_pedido);
                      if($cantidad > 0){
                        $c=0;
                      for($x =0; $x < $cantidad; $x++){
                        $c++;
                        $item = $info_detalle_pedido[$x];
                        $total = $item['PRECIO'] * $item['CANTIDAD'];
                    ?>


                    <tr>
                      <td><?php print $c?></td>
                      <td><?php print $item['NOMBRE_PRODUCTO']?></td>
                      <td>
                      <?php
                          $foto = '../../'.$item['IMAGEN'];
                          if(file_exists($foto)){
                        ?>
                          <img src="<?php print $foto; ?>" width="35">
                      <?php }else{?>
                          SIN FOTO
                      <?php }?>
                      </td>
                      <td><?php print $item['PRECIO']?> €</td>
                      <td><?php print $item['CANTIDAD']?></td>
                    <td>
                    <?php print $total?>
                    </td>
                    </tr>

                    <?php
                      }
                    }else{

                    ?>
                    <tr>
                      <td colspan="6">NO HAY REGISTROS</td>
                    </tr>

                    <?php }?>
                  
                  
                  </tbody>

                </table>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Total Compra</label>
                        <input value="<?php print $item['PRECIO'] * $item['CANTIDAD'] ?>" type="text" class="form-control" readonly>
                    </div>
                </div>
                
            </fieldset>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="pull-left">
            <a href="./index.php" class="btn btn-danger hidden-print">Cancelar</a>
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
  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <script>
        $('#btnImprimir').on('click',function(){

            window.print();

            return false;

        })
                        
    </script>
</body>
</html>