<?php

if($_SERVER['REQUEST_METHOD'] ==='POST'){

	$id = $_POST['EMAIL'];
	$pass = $_POST['PASSWORD'];

	require '../vendor/autoload.php';
    $usuario = new tonline\Usuario;
    $resultado = $usuario->login($id, $pass);

    if($resultado){
    	session_start();
    	$_SESSION['usuario_info'] = array(
    		'NOMBRE'=>$resultado['NOMBRE'],
    		'ESTADO'=>1
    	);
    	//print 'Login ok';
    	header('Location: mainpanel.php');
    }else{
    	//print 'Login fail'
		exit(json_encode(array('estado'=>FALSE, 'mensaje'=>'Error al iniciar sesion. Recuerde que sebe ser administrador de la tienda para poder acceder.')));
    }
}

?>