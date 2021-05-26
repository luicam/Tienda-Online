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
        VALUES (:email,:password,:nombre,:apellidos,:direccion,:admin)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":email" => $_params['email'],
            ":password" => $_params['password'],
            ":nombre" => $_params['nombre'],
            ":apellidos" => $_params['apellidos'],
            ":direccion" => $_params['direccion'],
            ":admin" => $_params['admin']
        );

        if($resultado->execute($_array))
            return $this->cn->lastInsertId();

        return false;
    }


}