<?php

require_once "modelos/registrarUsuario.php";


class RegistrarUsuarioInicio{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new RegistrarUsuario();
    }

    public function Inicio(){
            require_once "vistas/registrarUsuario.php";
    }

    //Aqui se realiza el registro de los usuarios se obtienen los valores del registro, se evaluan los datos y se muestran las validaciones
    function registrarU(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['correoElectronico']) && isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $correoElectronico = $_POST['correoElectronico'];
            $genero = $_POST['genero'];

          // Aqui se verifica si el correo electrónico ya está registrado
        if ($this->modelo->correoElectronicoExistente($correoElectronico)) {
            echo "El correo electrónico ya está registrado. Por favor, elige otro.";
        } else {
            // Continuar con el registro si no existe un usuario registrado
            $registroExitoso = $this->modelo->RegistrarNuevoUsuario($nombre, $apellido, $direccion, $telefono, $correoElectronico, $genero);

            if ($registroExitoso) {
                echo "Registro exitoso";
                require_once "vistas/inicioSesión.php";
            } else {
                echo "Error en el registro";
            }
        }
    }
    require_once "vistas/registrarUsuario.php";

        
    }
    

}