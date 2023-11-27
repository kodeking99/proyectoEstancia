<?php

session_start();
error_reporting(0);

$validar = $_SESSION['tipo_usuario'];
$nombre = $_SESSION['Nombre'];
$id = $_SESSION['ID'];

?>


<?php
require_once "modelos/principal.php";
require_once "modelos/basededatos.php";

class principalInicio {
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Principal();
    }

    //Aqui se obtienen las mascotas y los avisos para visualizarlos en la pagina principal
    public function Inicio(){
        $mascotas = $this->modelo->obtenerMascotas();
        $avisos = $this->modelo->obtenerAvisos();
        require_once "vistas/principal.php";
    }

    //Aqui se obtienen los valores del formulario de adopciones, y se hace realiza su registro
    //Se recibe: mascota_id, telefono, nombre, apellido, email, ciudad, colonia.
    //Se devuelve: la vista de la publicación enviada se muestra en el foro.
    public function Solicitar(){
        session_start();
        $ID = $_SESSION['ID'];
        $idMascota =  $_POST['mascota_id'];
        $solicitud = new Principal();
        $solicitud->setTelefono($_POST['telefono']);
        $solicitud->setIdUsuario($ID);
        $solicitud->setIdMascota($idMascota);
        $solicitud->setNombre($_POST['nombre']);
        $solicitud->setApellido($_POST['apellido']);
        $solicitud->setCorreo($_POST['email']);
        $solicitud->setCiudad($_POST['ciudad']);
        $solicitud->setColonia($_POST['colonia']);

        if (!empty($_POST['nombre']) || !empty($_POST['email']) || !empty($_POST['telefono'])) {
            $this->modelo->enviarSolicitud($solicitud);
        }

        $mascotas = $this->modelo->obtenerMascotas();
        $avisos = $this->modelo->obtenerAvisos();
        require_once "vistas/principal.php";
    }
}
