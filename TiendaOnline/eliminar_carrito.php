<?php
session_start();

if(!isset($_GET['ID_PRODUCTO']) OR !is_numeric($_GET['ID_PRODUCTO']))
    header('Location: carrito.php');

$id = $_GET['ID_PRODUCTO'];

if(isset($_SESSION['carrito'])){
    unset($_SESSION['carrito'][$id]);   
    header('Location: carrito.php');
}else{
    header('Location: index.php');
}