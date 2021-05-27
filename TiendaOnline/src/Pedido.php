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
        VALUES (:comprado,:fecha,:usuario_id)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":comprado" => $_params['comprado'],
            ":fecha" => $_params['fecha'],
            ":usuario_id" => $_params['usuario_id'],
            
        );

        if($resultado->execute($_array))
            return $this->cn->lastInsertId();

        return false;
    }

    public function registrarDetalle($_params){
        $sql = "INSERT INTO `detalle_pedido`(`PEDIDO_ID_PEDIDO`, `PRODUCTO_ID_PRODUCTO`, `CANTIDAD`, `DEVUELTO`) 
        VALUES (:pedido_id,:producto_id,:cantidad,:devuelto)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":pedido_id" => $_params['pedido_id'],
            ":producto_id" => $_params['producto_id'],
            ":cantidad" => $_params['cantidad'],
            ":devuelto" => $_params['devuelto'],
        );

        if($resultado->execute($_array))
            return  true;

        return false;
    }

    public function mostrar(){
        $sql = "SELECT p.USUARIO_ID_USUARIO, p.FECHA, EMAIL, PASSWORD, NOMBRE, APELLIDOS, DIRECCION, ADMIN FROM pedido p 
        INNER JOIN usuario u ON p.USUARIO_ID_USUARIO = u.ID_USUARIO ORDER BY p.USUARIO_ID_USUARIO DESC";

        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return  $resultado->fetchAll();

        return false;

    }

    public function mostrarUltimos(){
        $sql = "SELECT p.USUARIO_ID_USUARIO, p.FECHA, EMAIL, PASSWORD, NOMBRE, APELLIDOS, DIRECCION, ADMIN FROM pedido p 
        INNER JOIN usuario u ON p.USUARIO_ID_USUARIO = u.ID_USUARIO ORDER BY p.USUARIO_ID_USUARIO DESC LIMIT 10";

        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return  $resultado->fetchAll();

        return false;

    }

    public function mostrarPorId($id){
        $sql = "SELECT p.USUARIO_ID_USUARIO, EMAIL, PASSWORD, NOMBRE, APELLIDOS, DIRECCION, ADMIN FROM pedido p 
        INNER JOIN usuario u ON p.USUARIO_ID_USUARIO = u.ID_USUARIO WHERE p.USUARIO_ID_USUARIO = :id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':id'=>$id
        );

        if($resultado->execute($_array ))
            return  $resultado->fetch();

        return false;
    }

    

    public function mostrarDetallePorIdPedido($id){
        /*$sql = "SELECT 
                dp.id,
                pe.titulo,
                dp.precio,
                dp.cantidad,
                pe.foto
                FROM detalle_pedidos dp
                INNER JOIN peliculas pe ON pe.id= dp.pelicula_id
                WHERE dp.pedido_id = :id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':id'=>$id
        );

        if($resultado->execute( $_array))
            return  $resultado->fetchAll();*/

        return false;

    }


}