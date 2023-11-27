<?php

require_once "modelos/inicioSesion.php";


class inicioSesionInicio{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new InicioSesion(); 

    }

    //Aqui se inicializa la vista del apartado iniciar sesión
    public function Inicio(){
        require_once "vistas/inicioSesión.php";
        
    }

    /*En esta función se validan las credenciales del usuario y se guardan en la variable $_SESSION
    se toman los datos contraseña y correo electronico como entrada y se devuelve la vista del tipo de usuario*/
    //Se recibe: contraseña y correo eelctronico
    //Se devuelve: la vista al usuario especifico
    public function Validar(){
        if (isset($_POST['correoElectronico']) && isset($_POST['contra'])) {
            $correo = $_POST['correoElectronico'];
            $contraseña = $_POST['contra'];
           

            $modeloUsuarios = new InicioSesion(); 
            $tipoUsuario = $modeloUsuarios->validarCredenciales($correo, $contraseña);
            $nombre = $modeloUsuarios->validarNombre($correo, $contraseña);
        
            if ($tipoUsuario === 'Administrador' || $tipoUsuario === 'UsuarioComun' || $tipoUsuario === 'Rescatista') {
                session_start();

                $_SESSION['tipo_usuario'] = $tipoUsuario;
                $_SESSION['Nombre'] = $nombre['Nombre'];
                $_SESSION['ID'] = $nombre['ID'];
    
                if ($tipoUsuario === 'Administrador') {
                    header("location:?c=panelAdministrador");
                } elseif ($tipoUsuario === 'UsuarioComun') {
                    header("location:?c=principal");
                } elseif($tipoUsuario == 'Rescatista'){
                    header("location:?c=panelRescatista");
                }
            } else {
                    header("location:?c=registrarUsuario");
                    $error_message = "Credenciales inválidas. Por favor, inténtalo de nuevo.";
            }
        }
        require_once "vistas/inicioSesión.php";
        
    }

    

}