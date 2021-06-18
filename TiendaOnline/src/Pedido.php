<?php

namespace tonline;

class Pedido{

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;

        $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
        //fichero config.ini usuario y clave. 
    }
    
    public function registrar($_params){
        $sql = "INSERT INTO `pedido`(`COMPRADO`, `FECHA`, `USUARIO_ID_USUARIO`) 
        VALUES (:COMPRADO, :FECHA, :USUARIO_ID_USUARIO)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":COMPRADO" => $_params['COMPRADO'],
            ":FECHA" => $_params['FECHA'],
            ":USUARIO_ID_USUARIO" => $_params['USUARIO_ID_USUARIO']
        );

        if($resultado->execute($_array))
            return $this->cn->lastInsertId();

        return false;
    }

    public function registrarPedido($_params){
        $sql = "INSERT INTO `detalle_pedido`(`PEDIDO_ID_PEDIDO`, `PRODUCTO_ID_PRODUCTO`, `CANTIDAD`, `DEVUELTO`) 
        VALUES (:PEDIDO_ID_PEDIDO,:PRODUCTO_ID_PRODUCTO,:CANTIDAD,:DEVUELTO)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":PEDIDO_ID_PEDIDO" => $_params['ID_PEDIDO'],
            ":PRODUCTO_ID_PRODUCTO" => $_params['ID_PRODUCTO'],
            ":CANTIDAD" => $_params['CANTIDAD'],
            ":DEVUELTO" => $_params['DEVUELTO']
        );

        if($resultado->execute($_array))
            return  true;

        return false;
    }

    public function registrarCompra($_params2){
        $sql = "INSERT INTO `compra`(`USUARIO_ID_USUARIO`, `PRODUCTO_ID_PRODUCTO`) 
        VALUES (:USUARIO_ID_USUARIO,:PRODUCTO_ID_PRODUCTO)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":USUARIO_ID_USUARIO" => $_params2['USUARIO_ID_USUARIO'],
            ":PRODUCTO_ID_PRODUCTO" => $_params2['PRODUCTO_ID_PRODUCTO']
        );

        if($resultado->execute($_array))
            return  true;

        return false;
    }

    //innecesario, -> Poner en mostrar ultimoas p.id_pedido
    public function mostrarId(){
        $sql = "SELECT ID_PEDIDO FROM pedido 
        ORDER BY ID_PEDIDO ASC";

        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return  $resultado->fetchAll();

        return false;

    }

    public function mostrar(){
        $sql = "SELECT p.ID_PEDIDO, p.USUARIO_ID_USUARIO, p.FECHA, NOMBRE, APELLIDOS, DIRECCION, ADMIN FROM pedido p 
        INNER JOIN usuario u ON p.USUARIO_ID_USUARIO = u.ID_USUARIO ORDER BY p.USUARIO_ID_USUARIO ASC";

        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return  $resultado->fetchAll();

        return false;

    }

    public function mostrarUltimos(){
        $sql = "SELECT p.ID_PEDIDO, p.USUARIO_ID_USUARIO, p.FECHA, NOMBRE, APELLIDOS, DIRECCION, ADMIN FROM pedido p 
        INNER JOIN usuario u ON p.USUARIO_ID_USUARIO = u.ID_USUARIO ORDER BY p.USUARIO_ID_USUARIO DESC LIMIT 10";

        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return  $resultado->fetchAll();

        return false;

    }

    public function mostrarPorId($id){
        $sql = "SELECT p.USUARIO_ID_USUARIO,  p.FECHA, EMAIL, PASSWORD, NOMBRE, APELLIDOS, DIRECCION, ADMIN FROM pedido p 
        INNER JOIN usuario u ON p.USUARIO_ID_USUARIO = u.ID_USUARIO WHERE p.ID_PEDIDO = :ID_PEDIDO";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':ID_PEDIDO'=>$id
        );

        if($resultado->execute($_array))
            return  $resultado->fetch();

        return false;
    }

    

    public function mostrarDetallePorIdPedido($id){
        $sql = "SELECT 
                dp.PEDIDO_ID_PEDIDO,
                dp.PRODUCTO_ID_PRODUCTO,
                p.NOMBRE_PRODUCTO,
                p.PRECIO,
                dp.CANTIDAD,
                p.IMAGEN
                FROM detalle_pedido dp
                INNER JOIN producto p ON p.ID_PRODUCTO = dp.PRODUCTO_ID_PRODUCTO
                WHERE dp.PEDIDO_ID_PEDIDO = :ID_PEDIDO AND dp.DEVUELTO = 0";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':ID_PEDIDO'=>$id
        );

        if($resultado->execute($_array))
            return  $resultado->fetchAll();

        return false;

    }

    //todo. al final no lo necesito. Limpiar a l final
    public function mostrarDetallePedidoPorIdPedido($id){
        $sql = "SELECT 
                dp.PEDIDO_ID_PEDIDO,
                p.NOMBRE_PRODUCTO,
                dp.PRECIO,
                dp.CANTIDAD,
                p.IMAGEN
                FROM detalle_pedidos dp
                INNER JOIN producto p ON p.ID_PRODUCTO= dp.PRODUCTO_ID_PRODUCTO
                WHERE dp.USUARIO_ID_USUARIO = :id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':id'=>$id
        );

        if($resultado->execute( $_array))
            return  $resultado->fetchAll();

        return false;

    }

}