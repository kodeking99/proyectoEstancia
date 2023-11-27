<?php

require_once "vistas/cerrarSesion.php";


class cerrarSesionInicio{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new CerrarSesion();
    }

    //Aqui se manda a llamar la pagina que destruye la SESSION del usuario administrador
    public function Inicio(){
        require_once "vistas/cerrarSesion.php";
        
    }
    

}