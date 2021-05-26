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
        VALUES (:nombre,:descripcion,:precio,:stock,:imagen,:categoria_id)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre" => $_params['nombre'],
            ":descripcion" => $_params['descripcion'],
            ":precio" => $_params['precio'],
            ":stock" => $_params['stock'],
            ":imagen" => $_params['imagen'],
            ":categoria_id" => $_params['categoria_id'],
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }

    public function actualizar($_params){
        $sql = "UPDATE `producto` SET `NOMBRE_PRODUCTO`=:nombre,`DESCRIPCION`=:descripcion,`PRECIO`=:precio,`STOCK`=:stock,`IMAGEN`=:imagen,`CATEGORIA_ID_CATEGORIA`=:categoria_id  WHERE `ID_PRODUCTO`=:id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre" => $_params['nombre'],
            ":descripcion" => $_params['descripcion'],
            ":precio" => $_params['precio'],
            ":stock" => $_params['stock'],
            ":imagen" => $_params['imagen'],
            ":categoria_id" => $_params['categoria_id'],
            ":id" =>  $_params['id']
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }

    public function eliminar($id){
        $sql = "DELETE FROM `producto` WHERE `ID_PRODUCTO`=:id ";

        $resultado = $this->cn->prepare($sql);
        
        $_array = array(
            ":id" =>  $id
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
        
        $sql = "SELECT * FROM `producto` WHERE `ID_PRODUCTO`=:id ";
        
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            "ID_PRODUCTO" =>  $id
        );

        if($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }
      
}
