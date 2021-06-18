<?php

session_start();

if($_SERVER['REQUEST_METHOD'] ==='POST'){

    require 'funciones.php';
    require 'vendor/autoload.php';

    if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
        $usuario = new tonline\Usuario;
        $_params = array(
            'EMAIL' => $_POST['EMAIL'],
            'PASSWORD' => $_POST['PASSWORD'],
            'NOMBRE' => $_POST['NOMBRE'],
            'APELLIDOS' => $_POST['APELLIDOS'],
            'DIRECCION' => $_POST['DIRECCION'],
            'ADMIN' => $_POST['ADMIN']
        );
    	
        $existe_usuario = $usuario->existeUsuario($_params);
    	if (!$existe_usuario) {
    		$usuario_id = $usuario->registrar($_params);
    	} else{
            $usuario_id = $existe_usuario[0]['ID_USUARIO'];
        }
        //$usuario_id = $usuario->registrar($_params);
    
        $pedido = new tonline\Pedido;
    
        $_params = array(
            'COMPRADO'=>1,
            //'total' => calcularTotal(),
            'FECHA' => date('Y-m-d'),
            'USUARIO_ID_USUARIO'=>$usuario_id,
        );
        
        $pedido_id =  $pedido->registrar($_params);
        
        

        foreach($_SESSION['carrito'] as $indice => $value){
            $_params = array(
                'ID_PEDIDO' => $pedido_id,
                'ID_PRODUCTO' => $value['ID_PRODUCTO'],
                'CANTIDAD' => $value['cantidad'],
                'DEVUELTO' => 0
            );

            $pedido->registrarPedido($_params);

            $_params2 = array(
            'USUARIO_ID_USUARIO'=>$usuario_id,
            'PRODUCTO_ID_PRODUCTO'=> $value['ID_PRODUCTO']
            );

            $existe_compra = $pedido->existeCompra($_params2);
            if (!$existe_compra) {
                $pedido->registrarCompra($_params2);
            }
            //$pedido->registrarCompra($_params2);
        }

        $_SESSION['carrito'] = array();

        header('Location: gracias.php');

    }

    

     




}