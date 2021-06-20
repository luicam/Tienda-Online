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
              <legend>Todos los Pedidos</legend>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>ID Pedido</th>
                      <th>ID Producto</th>
                      <th>Nombre Producto</th>
                      <th>ID Cliente</th>
                      <th>Datos Cliente</th>
                      <th>Admin</th>
                      <th>Direccion</th>
                      <th>Fecha</th>
                      <th>Total</th>
                      <th>Ver</th>
                      <th>Finalizar pedido</th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php
                      require '../../vendor/autoload.php';
                      $pedido = new tonline\Pedido;
                      $info_pedido = $pedido->mostrar();
                    
                      $cantidad = count($info_pedido);
                      if($cantidad > 0){
                        $c=0;
                      for($x =0; $x < $cantidad; $x++){
                        //$c++;
                        $item = $info_pedido[$x];
                        $acumulador = 0;
                        $id_producto = '';
                        $nombre_producto = '';
                        $info_detalle_pedido = $pedido->mostrarDetallePorIdPedido($item['ID_PEDIDO']);
                        for ($y=0; $y < count($info_detalle_pedido); $y++) { 
                          $c++;
                          if($y>0){
                            $acumulador = 0;
                          }
                          $acumulador = $acumulador + ($info_detalle_pedido[$y]['CANTIDAD']*$info_detalle_pedido[$y]['PRECIO']);
                          $nombre_producto = $info_detalle_pedido[$y]['NOMBRE_PRODUCTO'];
                          $id_producto = $info_detalle_pedido[$y]['PRODUCTO_ID_PRODUCTO'];
                        //}
                        

                    ?>


                    <tr>
                      <td><?php print $c?></td>
                      <td><?php print $item['ID_PEDIDO']?></td>
                      <td><?php print $id_producto?></td>
                      <td><?php print $nombre_producto?></td>
                      <td><?php print $item['USUARIO_ID_USUARIO']?></td>
                      <td><?php print $item['NOMBRE'].' '.$item['APELLIDOS']?></td>
                      <td><?php print $item['ADMIN']?></td>
                      <td><?php print $item['DIRECCION']?></td>
                      <td><?php print $item['FECHA']?></td>
                      <td><?php print $acumulador ?> €</td>
                       
                      <td class="text-center">
                        <a href="ver.php?ID_PEDIDO=<?php print $item['ID_PEDIDO'] ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                      </td>
                      <td class="text-center">
                        <a href=""class="btn btn-success"><span class="glyphicon glyphicon-envelope"></span> Enviar Key</a>
                      </td>
                    </tr>

                    <?php
                        }
                      }
                    }else{

                    ?>
                    <tr>
                      <td colspan="11">NO HAY REGISTROS</td>
                    </tr>

                    <?php }?>
                  
                  
                  </tbody>

                </table>
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