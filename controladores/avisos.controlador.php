<?php

require_once "modelos/avisos.php";
require_once "modelos/producto.php";

class avisosInicio{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Avisos();
    }

    // Aqui se inicializa la vista de avisos
    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/avisos/index.php";
        require_once "vistas/pie.php";
    }

      //Aqui se realizan las busquedas individuales, se recibe el dato de bisqueda y se manda a consulta
    public function busqueda(){
        $p = new Avisos();

        if (isset($_GET['busqueda'])) {
            $p = $this->modelo->listarBusqueda($_GET['busqueda']);
        }
    
        require_once "vistas/encabezado.php";
        require_once "vistas/avisos/busqueda.php";
        require_once "vistas/pie.php";

    }

    //Aqui se obtienen los datos de las filas a editar, se recibe el dato id y se manda a consulta
    public function FormCrear(){
        $titulo="Agregar";
        $p=new Avisos();
        if(isset($_GET['id'])){
            $p=$this->modelo->Obtener($_GET['id']);
            $titulo="Modificar";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/avisos/form.php";
        require_once "vistas/pie.php";
    }

    //Aqui se guardan los valores modificados de avisos
    public function Guardar(){
        $p=new Avisos();
        $p->setID(intval($_POST['ID']));
        $p->setIDUsuarioAnunciante($_POST['IDUsuarioAnunciante']);
        $p->setTitulo($_POST['Titulo']);
        $p->setDescripcion($_POST['Descripcion']);
        $p->setFechaPublicacion($_POST['FechaPublicacion']);
        $p->setImagenAnuncio($_POST['ImagenAnuncio']);
        $p->getID() > 0 ?
        $this->modelo->Actualizar($p) :
        $this->modelo->Insertar($p);

        header("location:?c=avisos");
    }

     //Aqui se borran los registros de avisos, se obtiene el id y se enlistan los valores actualizados
    public function Borrar(){
        //Agregar ventana de confirmación
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=avisos");
        
    }


}