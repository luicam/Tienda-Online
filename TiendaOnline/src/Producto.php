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
        return false;
    }

    public function actualizar($_params){
        return false;
    }

    public function eliminar($id){
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
        return false;
    }





    
}
