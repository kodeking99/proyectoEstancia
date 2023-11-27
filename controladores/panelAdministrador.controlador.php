<?php

require_once "modelos/usuario.php";


class PanelAdministradorInicio{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Usuario();
    }

    //Aqui se inicializa la vista del administrador, se enlistan las usuarios
    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/productos/index.php";
        require_once "vistas/pie.php";
    }


}