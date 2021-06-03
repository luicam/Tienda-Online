<?php

namespace tonline;

class Compra{

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;

        $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
        //fichero config.ini usuario y clave. 
    }

    public function mostrar(){
        $sql = "SELECT * FROM compra";
        
        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarDetallePorIdUsuario($id){
        $sql = "SELECT c.USUARIO_ID_USUARIO, NOMBRE, APELLIDOS, DIRECCION, ADMIN FROM compra c
        INNER JOIN usuario u ON c.USUARIO_ID_USUARIO = p.ID_USUARIO WHERE c.USUARIO_ID_USUARIO = :USUARIO_ID_USUARIO";
        
        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':USUARIO_ID_USUARIO'=>$id
        );

        if($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarDetallePorIdProducto($id){
        $sql = "SELECT c.PRODUCTO_ID_PRODUCTO, NOMBRE_PRODUCTO, DESCRIPCION, PRECIO, CATEGORIA_ID_CATEGORIA FROM compra c
        INNER JOIN producto p ON c.PRODUCTO_ID_PRODUCTO = p.ID_PRODUCTO WHERE c.PRODUCTO_ID_PRODUCTO = :PRODUCTO_ID_PRODUCTO";
        
        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':PRODUCTO_ID_PRODUCTO'=>$id
        );

        if($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

}

    