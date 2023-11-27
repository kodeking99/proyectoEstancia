<?php

require_once "modelos/adopciones.php";
require_once "modelos/producto.php";

class adopcionesInicio{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Adopciones();
    }

    //Aqui se inicializa la vista de la pagina adopciones
    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/adopciones/index.php";
        require_once "vistas/pie.php";
    }

    //Aqui se inicializa la vista de las adopciones del rescatista

    public function rescatista(){
        require_once "vistas/encabezadoRescatista.php";
        require_once "vistas/adopciones/index.php";
        require_once "vistas/pie.php";
    }

     //Aqui se realizan las busquedas individuales, se recibe el dato de bisqueda y se manda a consulta
    public function busqueda(){
        $p = new Adopciones();

        if (isset($_GET['busqueda'])) {
            $p = $this->modelo->listarBusqueda($_GET['busqueda']);
        }
    
        require_once "vistas/encabezado.php";
        require_once "vistas/adopciones/busqueda.php";
        require_once "vistas/pie.php";

    }

      //Aqui se obtienen los datos de las filas, se recibe el dato id y se manda a consulta
    public function FormCrear(){
        $titulo="Agregar";
        $p=new Adopciones();
        if(isset($_GET['id'])){
            $p=$this->modelo->Obtener($_GET['id']);
            $titulo="Agregar";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/adopciones/form.php";
        require_once "vistas/pie.php";
    }

    //Aqui se guardan los valores modificados de adopciones
    public function Guardar(){
        $p=new Adopciones();
        $p->setID(intval($_POST['ID']));
        $p->setIDUsuarioAdoptante($_POST['IDUsuarioAdoptante']);
        $p->setIDMascota($_POST['IDMascota']);
        $p->setFechaAdopcion($_POST['FechaAdopcion']);
        $p->setEstadoAdopcion($_POST['EstadoAdopcion']);
        $p->getID() > 0 ?
        $this->modelo->Actualizar($p) :
        $this->modelo->Insertar($p);

        header("location:?c=adopciones");
    }

    //Aqui se borran los registros de modificaciones, se obtiene el id y se enlistan los valores actualizados
    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=adopciones");
    }


}