<?php

require_once "modelos/usuario.php";

class ProductoInicio{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Usuario;
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/productos/index.php";
        require_once "vistas/pie.php";
    }

    public function FormCrear(){
        $titulo="Registrar";
        $p=new Usuario();
        if(isset($_GET['id'])){
            $p=$this->modelo->Obtener($_GET['id']);
            $titulo="Modificar";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/productos/form.php";
        require_once "vistas/pie.php";
    }

    public function busqueda(){
        $p = new Usuario();

        if (isset($_GET['busqueda'])) {
            $p = $this->modelo->listarBusqueda($_GET['busqueda']);
        }
    
        require_once "vistas/encabezado.php";
        require_once "vistas/productos/busqueda.php";
        require_once "vistas/pie.php";

    }


    public function Buscar(){
        $titulo="Registrar";
        $p=new Usuario();
        if(isset($_GET['id'])){
            $p=$this->modelo->Obtener($_GET['id']);
            $titulo="Modificar";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/productos/form.php";
        require_once "vistas/pie.php";
    }


    public function Guardar(){
        $p=new Usuario();
        $p->setID(intval($_POST['ID']));
        $p->setNombre($_POST['Nombre']);
        $p->setApellido($_POST['Apellido']);
        $p->setCorreoElectronico($_POST['Correo']);
        $p->setContra($_POST['Contraseña']);
        $p->setTelefono($_POST['Telefono']);
        $p->setDireccion($_POST['Direccion']);
        $p->setTipoUsuario($_POST['tipoUsuario']);
        $p->setFechaNacimiento($_POST['fechaNacimiento']);
        $p->setGenero($_POST['Genero']);

        $p->getID() > 0 ?
        $this->modelo->Actualizar($p) :
        $this->modelo->Insertar($p);

        header("location:?c=usuario");
    }


    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=usuario");
    }
   


}