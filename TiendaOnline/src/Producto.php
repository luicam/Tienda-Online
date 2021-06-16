<?php

namespace tonline;

class Producto{

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
        $sql = "INSERT INTO `producto`(`NOMBRE_PRODUCTO`, `DESCRIPCION`, `PRECIO`, `STOCK`, `IMAGEN`, `CATEGORIA_ID_CATEGORIA`) 
        VALUES (:NOMBRE_PRODUCTO,:DESCRIPCION,:PRECIO,:STOCK,:IMAGEN,:CATEGORIA_ID_CATEGORIA)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":NOMBRE_PRODUCTO" => $_params['NOMBRE_PRODUCTO'],
            ":DESCRIPCION" => $_params['DESCRIPCION'],
            ":PRECIO" => $_params['PRECIO'],
            ":STOCK" => $_params['STOCK'],
            ":IMAGEN" => $_params['IMAGEN'],
            ":CATEGORIA_ID_CATEGORIA" => $_params['CATEGORIA_ID_CATEGORIA'],
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }

    public function actualizar($_params){
        $sql = "UPDATE `producto` SET `NOMBRE_PRODUCTO`=:NOMBRE_PRODUCTO,`DESCRIPCION`=:DESCRIPCION,`PRECIO`=:PRECIO,`STOCK`=:STOCK,`IMAGEN`=:IMAGEN,`CATEGORIA_ID_CATEGORIA`=:CATEGORIA_ID_CATEGORIA  WHERE `ID_PRODUCTO`=:ID_PRODUCTO";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":NOMBRE_PRODUCTO" => $_params['NOMBRE_PRODUCTO'],
            ":DESCRIPCION" => $_params['DESCRIPCION'],
            ":PRECIO" => $_params['PRECIO'],
            ":STOCK" => $_params['STOCK'],
            ":IMAGEN" => $_params['IMAGEN'],
            ":CATEGORIA_ID_CATEGORIA" => $_params['CATEGORIA_ID_CATEGORIA'],
            ":ID_PRODUCTO" =>  $_params['ID_PRODUCTO']
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }

    public function eliminar($id){
        $sql = "DELETE FROM `producto` WHERE `ID_PRODUCTO`=:ID_PRODUCTO ";

        $resultado = $this->cn->prepare($sql);
        
        $_array = array(
            ":ID_PRODUCTO" =>  $id
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }

    public function mostrar(){
        $sql = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, DESCRIPCION, PRECIO, STOCK, IMAGEN, CATEGORIA_ID_CATEGORIA FROM producto  
        
        INNER JOIN categoria
        ON producto.CATEGORIA_ID_CATEGORIA = categoria.ID_CATEGORIA ORDER BY producto.ID_PRODUCTO DESC
        ";
        
        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarPorId($id){
        
        $sql = "SELECT * FROM `producto` WHERE `ID_PRODUCTO`=:PRODUCTO_ID_PRODUCTO";
        
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":PRODUCTO_ID_PRODUCTO" =>  $id
        );

        if($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }

    public function mostrarAll(){
        $sql = "SELECT * FROM `producto` ";
        
        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarCompraPorIds($id_producto, $id_usuario){
        
        $sql = "SELECT * FROM producto 
        INNER JOIN compra ON compra.PRODUCTO_ID_PRODUCTO = producto.ID_PRODUCTO
        WHERE compra.PRODUCTO_ID_PRODUCTO = :ID_PRODUCTO AND compra.USUARIO_ID_USUARIO = :ID_USUARIO
        ";
        
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":ID_PRODUCTO" =>  $id_producto,
            ":ID_USUARIO" =>  $id_usuario
        );

        if($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }
      
}
