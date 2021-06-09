<?php
require '../vendor/autoload.php';

$producto = new tonline\Producto;

if($_SERVER['REQUEST_METHOD'] ==='POST'){

    if ($_POST['accion']==='Registrar'){

        if(empty($_POST['NOMBRE_PRODUCTO']))
            exit('Completar todos los datos');
        
        if(empty($_POST['DESCRIPCION']))
            exit('Completar todos los datos');

        if(empty($_POST['PRECIO']))
            exit('Completar todos los datos');

        if(!is_numeric($_POST['PRECIO']))
            exit('Completar con datos de tipo entero/o con decimales');

        if(empty($_POST['STOCK']))
            exit('Completar todos los datos');

        if(!is_numeric($_POST['STOCK']))
            exit('Completar con datos de tipo entero');

        //IMAGEN LLAMAR A METODO EN SU LUGAR

        if(empty($_POST['CATEGORIA_ID_CATEGORIA']))
            exit('Seleccionar una Categoria');

        if(!is_numeric($_POST['CATEGORIA_ID_CATEGORIA']))
            exit('Seleccionar una Categoria válida');

        
        $_params = array(
            'NOMBRE_PRODUCTO'=>$_POST['NOMBRE_PRODUCTO'],
            'DESCRIPCION'=>$_POST['DESCRIPCION'],
            'PRECIO'=>$_POST['PRECIO'],
            'STOCK'=>$_POST['STOCK'],
            'IMAGEN'=> subirFoto(),
            'CATEGORIA_ID_CATEGORIA'=>$_POST['CATEGORIA_ID_CATEGORIA']
            //'FECHA'=> date('Y-m-d')
        );

        $rpt = $producto->registrar($_params);

        if($rpt)
            header('Location: ./juegos/index.php');
        else
            print 'Error al registrar un nuevo producto.';
        

    }

    if ($_POST['accion']==='Actualizar'){

        if(empty($_POST['NOMBRE_PRODUCTO']))
            exit('Completar todos los datos');
        
        if(empty($_POST['DESCRIPCION']))
            exit('Completar todos los datos');

        if(empty($_POST['PRECIO']))
            exit('Completar todos los datos');

        if(!is_numeric($_POST['PRECIO']))
            exit('Completar con datos de tipo entero/o con decimales');

        if(empty($_POST['STOCK']))
            exit('Completar todos los datos');

        if(!is_numeric($_POST['STOCK']))
            exit('Completar con datos de tipo entero');

        //IMAGEN LLAMAR A METODO EN SU LUGAR

        if(empty($_POST['CATEGORIA_ID_CATEGORIA']))
            exit('Seleccionar una Categoria');

        if(!is_numeric($_POST['CATEGORIA_ID_CATEGORIA']))
            exit('Seleccionar una Categoria válida');

    
    $_params = array(
        'NOMBRE_PRODUCTO'=>$_POST['NOMBRE_PRODUCTO'],
        'DESCRIPCION'=>$_POST['DESCRIPCION'],
        'PRECIO'=>$_POST['PRECIO'],
        'STOCK'=>$_POST['STOCK'],
        'IMAGEN'=> subirFoto(),
        'CATEGORIA_ID_CATEGORIA'=>$_POST['CATEGORIA_ID_CATEGORIA'],
        'ID_PRODUCTO'=>$_POST['ID_PRODUCTO']
    );

    if(!empty($_POST['foto_temp']))
        $_params['IMAGEN'] = $_POST['foto_temp'];
    
    if(!empty($_FILES['IMAGEN']['name']))
        $_params['IMAGEN'] = subirFoto();

    $rpt = $producto->actualizar($_params);
    if($rpt)
        header('Location: ./juegos/index.php');
    else
        print 'Error al actualizar un producto.';

    }

}

if($_SERVER['REQUEST_METHOD'] ==='GET'){

    $id = $_GET['ID_PRODUCTO'];

    $rpt = $producto->eliminar($id);
    
    if($rpt)
        header('Location: ./juegos/index.php');
    else
        print 'Error al eliminar un producto.';


}


function subirFoto() {

    $carpeta = __DIR__.'/../upload/juegos/';

    $archivo = $carpeta.$_FILES['IMAGEN']['name'];
    //move_uploaded_file — Mueve un archivo subido a una nueva ubicación
    //parametros: un archivo subido válido y la dirección de destino.
    move_uploaded_file($_FILES['IMAGEN']['tmp_name'],$archivo);

    return 'upload/juegos/'.$_FILES['IMAGEN']['name'];


}




