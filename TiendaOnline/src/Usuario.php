<?php

namespace tonline;

class Usuario{

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
        $sql = "INSERT INTO `usuario`(`EMAIL`, `PASSWORD`, `NOMBRE`, `APELLIDOS`, `DIRECCION`, `ADMIN`) 
        VALUES (:EMAIL,:PASSWORD,:NOMBRE,:APELLIDOS,:DIRECCION,:ADMIN)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":EMAIL" => $_params['EMAIL'],
            ":PASSWORD" => $_params['PASSWORD'],
            ":NOMBRE" => $_params['NOMBRE'],
            ":APELLIDOS" => $_params['APELLIDOS'],
            ":DIRECCION" => $_params['DIRECCION'],
            ":ADMIN" => $_params['ADMIN']
        );

        if($resultado->execute($_array))
            return $this->cn->lastInsertId();

        return false;
    }

    public function mostrarPorId($id){
        
        $sql = "SELECT * FROM `usuario` WHERE `ID_USUARIO`=:USUARIO_ID_USUARIO ";
        
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            "USUARIO_ID_USUARIO" =>  $id
        );

        if($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }

    public function login($id, $pass){
        
        $sql = "SELECT NOMBRE FROM `usuario` WHERE EMAIL=:id AND PASSWORD=:pass AND ADMIN=1";
        
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" =>  $id,
            ":pass" =>  $pass
        );

        if($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }

    public function loginUsuario($id, $pass){
        
        $sql = "SELECT ID_USUARIO, NOMBRE FROM `usuario` WHERE EMAIL=:id AND PASSWORD=:pass";
        
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" =>  $id,
            ":pass" =>  $pass
        );

        if($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }


}