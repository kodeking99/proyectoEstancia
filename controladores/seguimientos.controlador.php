<?php

require_once "modelos/seguimientos.php";
require_once "modelos/producto.php";

class seguimientosInicio{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Seguimientos();
    }

    //Aqui se muestra la vista de seguimientos del administrador
    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/seguimientos/index.php";
        require_once "vistas/pie.php";
    }

    //Aqui se muestra la vista de seguimientos del rescatista o empleado
    public function rescatista(){
        require_once "vistas/encabezadoRescatista.php";
        require_once "vistas/seguimientos/index.php";
        require_once "vistas/pie.php";
    }

    //Aqui se realizan las busquedas individuales, se recibe el dato de bisqueda y se manda a consulta
    public function busqueda(){
        $p = new Seguimientos();

        if (isset($_GET['busqueda'])) {
            $p = $this->modelo->listarBusqueda($_GET['busqueda']);
        }
    
        require_once "vistas/encabezado.php";
        require_once "vistas/seguimientos/busqueda.php";
        require_once "vistas/pie.php";

    }
    
    //Aqui se obtienen los datos de las filas a editar, se recibe el dato id y se manda a consulta
    public function FormCrear(){
        $FechaSeguimiento="Agregar";
        $p=new Seguimientos();
        if(isset($_GET['id'])){
            $p=$this->modelo->Obtener($_GET['id']);
            $FechaSeguimiento="Modificar";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/seguimientos/form.php";
        require_once "vistas/pie.php";
    }

    //Aqui se guardan los valores modificados de seguimientos
    public function Guardar(){
        $p=new Seguimientos();
        $p->setID(intval($_POST['ID']));
        $p->setIDAdopcion($_POST['IDAdopcion']);
        $p->setFechaSeguimiento($_POST['FechaSeguimiento']);
        $p->setComentario($_POST['Comentario']);
        $p->getID() > 0 ?
        $this->modelo->Actualizar($p) :
        $this->modelo->Insertar($p);

        header("location:?c=seguimientos");
    }

    //Aqui se borran los registros de modificaciones, se obtiene el id y se enlistan los valores actualizados
    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=seguimientos");
    }


}