<?php

require_once "modelos/solicitudes.php";

class solicitudesInicio{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Solicitudes();
    }

    public function Inicio(){
        require_once "vistas/principal.php";
    }

    //Aqui se muestra el listado de las solicitudes de adopciones de los usuarios
    public function rescatista(){
        require_once "vistas/encabezadoRescatista.php";
        require_once "vistas/solicitudes/index.php";
        require_once "vistas/pie.php";
    }
    
}