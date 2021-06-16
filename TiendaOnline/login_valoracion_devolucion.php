<?php

if($_SERVER['REQUEST_METHOD'] ==='POST'){

	$id = $_POST['EMAIL'];
	$pass = $_POST['PASSWORD'];
    $id_producto = $_POST['ID_PRODUCTO'];

	require './vendor/autoload.php';
    $usuario = new tonline\Usuario;
    $resultado = $usuario->loginUsuario($id, $pass);

    if($resultado){
    	session_start();
    	$_SESSION['usuario_datos'] = array(
    		'ID_USUARIO'=>$resultado['ID_USUARIO'],
            'NOMBRE'=>$resultado['NOMBRE'],
            'ID_PRODUCTO'=>$id_producto,
    		'ESTADO'=>1
    	);
    	//print 'Login ok';
    	header('Location: valoracion_devolucion.php');
    }else{
    	//print 'Login fail'
		exit(json_encode(array('estado'=>FALSE, 'mensaje'=>'Error al iniciar sesion. Recuerde que sebe ser administrador de la tienda para poder acceder.')));
    }
}

?>