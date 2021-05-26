<?php

session_start();

if($_SERVER['REQUEST_METHOD'] ==='POST'){

    require 'funciones.php';
    require 'vendor/autoload.php';

    if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
        $usuario = new tonline\Usuario;
    
        $_params = array(
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'nombre' => $_POST['nombre'],
            'apellidos' => $_POST['apellidos'],
            'direccion' => $_POST['direccion'],
            'admin' => $_POST['admin']
        );
    
        $usuario_id = $usuario->registrar($_params);
    
        $pedido = new tonline\Pedido;
    
        $_params = array(
            'comprado'=>1,
            //'total' => calcularTotal(),
            'fecha' => date('Y-m-d'),
            'usuario_id'=>$usuario_id,
        );
        
        $pedido_id =  $pedido->registrar($_params);
        
        //$producto_id =  $producto->mostrarPorId($id);
        foreach($_SESSION['carrito'] as $indice => $value){
            $_params = array(
                "pedido_id" => $pedido_id,
                "producto_id" => $id,
                "cantidad" => $value['cantidad'],
                "devuelto" => 0,
            );

            $pedido->registrarDetalle($_params);
        }

        $_SESSION['carrito'] = array();

        header('Location: gracias.php');

    }

    

     




}