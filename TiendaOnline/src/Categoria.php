<?php

namespace tonline;

class Categoria{

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
        $sql = "SELECT * FROM categoria";
        
        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarPorId($id){
        $sql = "SELECT NOMBRE_CATEGORIA FROM categoria WHERE ID_CATEGORIA = :CATEGORIA_ID_CATEGORIA";
        
        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":CATEGORIA_ID_CATEGORIA" => $id
        );
        if($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }

    
}