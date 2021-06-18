<?php

namespace tonline;

class DetallePedido{

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;

        $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
        //fichero config.ini usuario y clave. 
    }


    public function mostrarDatosNecesito($id_producto, $id_usuario){
        $sql = "SELECT* FROM detalle_pedido
        INNER JOIN pedido ON detalle_pedido.PEDIDO_ID_PEDIDO = pedido.ID_PEDIDO
        WHERE detalle_pedido.PRODUCTO_ID_PRODUCTO = :ID_PRODUCTO AND pedido.USUARIO_ID_USUARIO = :ID_USUARIO";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":ID_PRODUCTO" =>  $id_producto,
            ":ID_USUARIO" =>  $id_usuario
        );

        if($resultado->execute($_array))
            return  $resultado->fetchAll();

        return false;
    }

    public function actualizarDetallePedido($id_producto, $id_pedido){
        $sql = "UPDATE detalle_pedido SET detalle_pedido.DEVUELTO = 1 
        WHERE detalle_pedido.PRODUCTO_ID_PRODUCTO = :ID_PRODUCTO AND detalle_pedido.PEDIDO_ID_PEDIDO = :ID_PEDIDO";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":ID_PRODUCTO" =>  $id_producto,
            ":ID_PEDIDO" =>  $id_pedido
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }
}