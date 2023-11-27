<?php

require_once "modelos/mascotas.php";
require_once "modelos/producto.php";

class mascotasInicio{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Mascotas();
    }

    //Aqui se inicializa la vista del catalogo de mascotas
    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/mascotas/index.php";
        require_once "vistas/pie.php";
    }

    //Aqui se inicializa la vista de las mascotas del rescatista
    public function rescatista(){
        require_once "vistas/encabezadoRescatista.php";
        require_once "vistas/mascotas/index.php";
        require_once "vistas/pie.php";
    }

         //Aqui se realizan las busquedas individuales, se recibe el dato de bisqueda y se manda a consulta para mostrar la vista
    public function busqueda(){
        $p = new Mascotas();

        if (isset($_GET['busqueda'])) {
            $p = $this->modelo->listarBusqueda($_GET['busqueda']);
        }
    
        require_once "vistas/encabezado.php";
        require_once "vistas/mascotas/busqueda.php";
        require_once "vistas/pie.php";

    }

    //Aqui se obtienen los datos de las filas a editar, se recibe el dato id y se manda a consulta
    public function FormCrear(){
        $titulo="Agregar";
        $p=new Mascotas();
        if(isset($_GET['id'])){
            $p=$this->modelo->Obtener($_GET['id']);
            $titulo="Modificar";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/mascotas/form.php";
        require_once "vistas/pie.php";
    }

    //Aqui se guardan los valores modificados de las mascotas
    public function Guardar(){
        $p=new Mascotas();
        $p->setID(intval($_POST['ID']));
        $p->setNombre($_POST['Nombre']);
        $p->setRaza($_POST['Raza']);
        $p->setEdad($_POST['Edad']);
        $p->setGenero($_POST['Genero']);
        $p->setDescripcion($_POST['Descripcion']);
        $p->setImagenes($_POST['Imagenes']);
        $p->setEstadoAdopcion($_POST['EstadoAdopcion']);
        $p->setRefugio($_POST['Refugio']);
        $p->getID() > 0 ?
        $this->modelo->Actualizar($p) :
        $this->modelo->Insertar($p);

        header("location:?c=mascotas");
    }

    //Aqui se borran los registros de las mascotas, se obtiene el id y se enlistan los valores actualizados
    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=mascotas");
    }


}