<?php

require_once "modelos/visitas.php";
require_once "modelos/producto.php";

class visitasInicio{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Visitas();
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/visitas/index.php";
        require_once "vistas/pie.php";
    }

    //Aqui se muestra a vista del usaurio rescatista o empleado
    public function rescatista(){
        require_once "vistas/encabezadoRescatista.php";
        require_once "vistas/visitas/index.php";
        require_once "vistas/pie.php";
    }

    //Aqui se realizan las busquedas individuales, se recibe el dato de busqueda y se manda a consulta
    public function busqueda(){
        $p = new Visitas();

        if (isset($_GET['busqueda'])) {
            $p = $this->modelo->listarBusqueda($_GET['busqueda']);
        }
    
        require_once "vistas/encabezado.php";
        require_once "vistas/visitas/busqueda.php";
        require_once "vistas/pie.php";

    }

    //Aqui se obtienen los datos de las filas a editar, se recibe el dato id y se manda a consulta
    public function FormCrear(){
        $titulo="Agregar";
        $p=new Visitas();
        if(isset($_GET['id'])){
            $p=$this->modelo->Obtener($_GET['id']);
            $titulo="Modificar";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/visitas/form.php";
        require_once "vistas/pie.php";
    }

    //Aqui se guardan los valores modificados de visitas
    public function Guardar(){
        $p=new Visitas();
        $p->setID(intval($_POST['ID']));
        $p->setIDUsuarioVisitante($_POST['IDUsuarioVisitante']);
        $p->setIDMascota($_POST['IDMascota']);
        $p->setFechaVisita($_POST['FechaVisita']);
        $p->setComentario($_POST['Comentario']);
        $p->getID() > 0 ?
        $this->modelo->Actualizar($p) :
        $this->modelo->Insertar($p);

        header("location:?c=visitas");
    }

    //Aqui se borran los registros de modificaciones, se obtiene el id y se enlistan los valores actualizados
    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=visitas");
    }


}