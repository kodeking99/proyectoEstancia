<?php

require_once "modelos/historias.php";
require_once "modelos/producto.php";

class historiasInicio{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Historias();
    }

    //Aqui se inicializa la vista de las historias y se listan los registros
    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/historias/index.php";
        require_once "vistas/pie.php";
    }

    
     //Aqui se realizan las busquedas individuales, se recibe el dato de bisqueda y se manda a consulta
    public function busqueda(){
        $p = new Historias();

        if (isset($_GET['busqueda'])) {
            $p = $this->modelo->listarBusqueda($_GET['busqueda']);
        }
    
        require_once "vistas/encabezado.php";
        require_once "vistas/historias/busqueda.php";
        require_once "vistas/pie.php";

    }

    //Aqui se obtienen los datos de las filas a editar, se recibe el dato id y se manda a consulta
    public function FormCrear(){
        $titulo="Agregar";
        $p=new Historias();
        if(isset($_GET['id'])){
            $p=$this->modelo->Obtener($_GET['id']);
            $titulo="Modificar";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/historias/form.php";
        require_once "vistas/pie.php";
    }

    //Aqui se guardan los valores modificados de las historias
    public function Guardar(){
        $p=new Historias();
        $p->setID(intval($_POST['ID']));
        $p->setIDUsuario($_POST['IDUsuario']);
        $p->setTitulo($_POST['Titulo']);
        $p->setDescripcion($_POST['Descripcion']);
        $p->setImagenes($_POST['Imagenes']);
        $p->setFechaPublicacion($_POST['FechaPublicacion']);
        $p->getID() > 0 ?
        $this->modelo->Actualizar($p) :
        $this->modelo->Insertar($p);

        header("location:?c=historias");
    }

    //Aqui se borran los registros de historias, se obtiene el id y se enlistan los valores actualizados
    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=historias");
    }


}