<?php

require_once "vistas/cerrarSesionUsuario.php";


class cerrarSesionInicio{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new CerrarSesionUsuario();
    }

     //Aqui se manda a llamar la pagina que destruye la SESSION del usuario común
    public function Inicio(){
        require_once "vistas/cerrarSesionUsuario.php";
        
    }
    

}