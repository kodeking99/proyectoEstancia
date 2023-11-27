<?php

require_once "modelos/mascotas.php";


class PanelRescatistaInicio{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Mascotas();
    }

    //Aqui se inicializa la vista del rescatista o empleado
    public function Inicio(){
        require_once "vistas/encabezadoRescatista.php";
        require_once "vistas/mascotas/index.php";
        require_once "vistas/pie.php";
    }


}