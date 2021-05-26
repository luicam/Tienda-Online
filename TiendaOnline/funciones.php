<?php
//EJEMPLO
//TODO: FALTAN CAMPOS COMPLETAR
function agregarProducto($resultado, $id, $cantidad = 1){
    $_SESSION['carrito'][$id] = array(
        'ID_PRODUCTO' => $resultado['ID_PRODUCTO'],
        'NOMBRE_PRODUCTO' => $resultado['NOMBRE_PRODUCTO'],
        'DESCRIPCION' => $resultado['DESCRIPCION'],
        'PRECIO' => $resultado['PRECIO'],
        'STOCK' => $resultado['STOCK'],
        'IMAGEN' => $resultado['IMAGEN'],
        'CATEGORIA_ID_CATEGORIA' => $resultado['CATEGORIA_ID_CATEGORIA'],
        'cantidad' => $cantidad
   );
}

//TODO: FALTAN CAMPOS COMPLETAR
function actualizarProducto($id,$cantidad = FALSE){

    if($cantidad)
        $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
    else
        $_SESSION['carrito'][$id]['cantidad']+=1;
}

//TODO: FALTAN CAMPOS COMPLETAR
function calcularTotal(){

    $total = 0;
    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $indice => $value){
            $total += $value['PRECIO'] * $value['cantidad'];
        }
    }
    return $total;

}
//TODO: FALTAN CAMPOS COMPLETAR
function cantidadProducto(){
    $cantidad = 0;
    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $indice => $value){
           $cantidad++;
        }
    }

    return $cantidad;
}