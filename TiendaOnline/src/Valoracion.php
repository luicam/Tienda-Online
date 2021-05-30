<?php

namespace tonline;

class Valoracion{

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
        $sql = "SELECT * FROM valoracion";
        
        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarPorId($id){
        $sql = "SELECT valoracion.USUARIO_ID_USUARIO, valoracion.PRODUCTO_ID_PRODUCTO, valoracion.PUNTUACION , valoracion.COMENTARIO, producto.NOMBRE_PRODUCTO, producto.PRECIO, categoria.NOMBRE_CATEGORIA, usuario.NOMBRE 
        FROM valoracion WHERE PRODUCTO_ID_PRODUCTO=:PRODUCTO_ID_PRODUCTO
        INNER JOIN producto, categoria
        ON valoracion.PRODUCTO_ID_PRODUCTO = producto.ID_PRODUCTO
        INNER JOIN usuario
        ON valoracion.USUARIO_ID_USUARIO = usuario.ID_USUARIO
        INNER JOIN categoria
        ON producto.CATEGORIA_ID_CATEGORIA = categoria.ID_CATEGORIA
        ";
        
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":PRODUCTO_ID_PRODUCTO" =>  $id
        );

        if($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }


    
}