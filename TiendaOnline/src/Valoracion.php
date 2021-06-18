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

    public function existeValoracion($_params){
        
        $sql = "SELECT * FROM valoracion WHERE USUARIO_ID_USUARIO=:USUARIO_ID_USUARIO AND PRODUCTO_ID_PRODUCTO=:PRODUCTO_ID_PRODUCTO";
        
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":USUARIO_ID_USUARIO" => $_params['USUARIO_ID_USUARIO'],
            ":PRODUCTO_ID_PRODUCTO" => $_params['PRODUCTO_ID_PRODUCTO']
        );

        if($resultado->execute($_array))
            return $resultado->fetchAll();

        return false;
    }

    public function mostrar(){
        $sql = "SELECT * FROM valoracion";
        
        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarPorId($id){
        $sql = "SELECT v.USUARIO_ID_USUARIO, v.PRODUCTO_ID_PRODUCTO, v.PUNTUACION , v.COMENTARIO, p.NOMBRE_PRODUCTO, p.PRECIO,
         u.NOMBRE, u.APELLIDOS, p.CATEGORIA_ID_CATEGORIA 
        FROM valoracion v
        INNER JOIN producto p ON v.PRODUCTO_ID_PRODUCTO = p.ID_PRODUCTO
        INNER JOIN usuario u ON v.USUARIO_ID_USUARIO = u.ID_USUARIO
        WHERE v.PRODUCTO_ID_PRODUCTO = :ID_PRODUCTO";
        
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":ID_PRODUCTO" => $id
        );

        if($resultado->execute($_array))
            return  $resultado->fetchAll();

        return false;
    }

    public function registrarValoracion($_params){
        $sql = "INSERT INTO `valoracion`(`COMENTARIO`, `PUNTUACION`, `USUARIO_ID_USUARIO`, `PRODUCTO_ID_PRODUCTO`) 
        VALUES (:COMENTARIO,:PUNTUACION,:USUARIO_ID_USUARIO,:PRODUCTO_ID_PRODUCTO)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":COMENTARIO" => $_params['COMENTARIO'],
            ":PUNTUACION" => $_params['PUNTUACION'],
            ":USUARIO_ID_USUARIO" => $_params['USUARIO_ID_USUARIO'],
            ":PRODUCTO_ID_PRODUCTO" => $_params['PRODUCTO_ID_PRODUCTO']
        );

        if($resultado->execute($_array))
            return  true;

        return false;
    }

    public function actualizarValoracion($_params){
        $sql = "UPDATE valoracion SET COMENTARIO =:COMENTARIO, PUNTUACION =:PUNTUACION 
        WHERE USUARIO_ID_USUARIO =:USUARIO_ID_USUARIO AND PRODUCTO_ID_PRODUCTO =:PRODUCTO_ID_PRODUCTO ";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":COMENTARIO" => $_params['COMENTARIO'],
            ":PUNTUACION" => $_params['PUNTUACION'],
            ":USUARIO_ID_USUARIO" => $_params['USUARIO_ID_USUARIO'],
            ":PRODUCTO_ID_PRODUCTO" => $_params['PRODUCTO_ID_PRODUCTO']
        );

        if($resultado->execute($_array))
            return  true;

        return false;
    }


    
}