<?php
  session_start();
  //datos de usuaurio
  //print_r($_SESSION['usuario_info']);
  //$_SESSION['usuario_info']['NOMBRE'];

  $_SESSION['usuario_info'] = array();
  header('Location: index.php');
  
?>