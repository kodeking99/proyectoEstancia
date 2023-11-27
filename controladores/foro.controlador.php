<?php

require_once "modelos/foro.php";


class foroInicio{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Foro();
    }

    //Aqui se inicializa la vista del foro, se listan la historias de exito
    public function Inicio(){
        $foro = new Foro();
        $foro = $this->modelo->listarHistorias();
        require_once "vistas/foro/index.php"; 
    }


  
}