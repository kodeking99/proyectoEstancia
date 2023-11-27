<?php

require_once "modelos/contratos.php";
require_once "modelos/producto.php";

class contratosInicio{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Contratos();
    }

    // Aqui se inicializa la vista de contratos
    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/contratos/index.php";
        require_once "vistas/pie.php";
    }

    
   // Aqui se inicializa la vista de avisos del rescatista
    public function rescatista(){
        require_once "vistas/encabezadoRescatista.php";
        require_once "vistas/contratosRescatista/index.php";
        require_once "vistas/pie.php";
    }

    //Aqui se realizan las busquedas individuales, se recibe el dato de bisqueda y se manda a consulta
    public function busqueda(){
        $p = new Contratos();

        if (isset($_GET['busqueda'])) {
            $p = $this->modelo->listarBusqueda($_GET['busqueda']);
        }
    
        require_once "vistas/encabezado.php";
        require_once "vistas/contratos/busqueda.php";
        require_once "vistas/pie.php";

    }

     //Aqui se obtienen los datos de las filas a editar, se recibe el dato id y se manda a consulta
    public function FormCrear(){
        $titulo="Agregar";
        $p=new Contratos();
        if(isset($_GET['id'])){
            $p=$this->modelo->Obtener($_GET['id']);
            $titulo="Modificar";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/contratos/form.php";
        require_once "vistas/pie.php";
    }

    //Aqui se guardan los valores modificados de contratos
    public function Guardar(){
        $p=new Contratos();
        $p->setID(intval($_POST['ID']));
        $p->setIDAdopcion($_POST['IDAdopcion']);
        $p->setIDUsuario($_POST['IDUsuario']);
        $p->setTerminosYCondiciones($_POST['TerminosYCondiciones']);
        $p->setFirmaDigital($_POST['FirmaDigital']);
        $p->setFechaFirma($_POST['FechaFirma']);
        $p->getID() > 0 ?
        $this->modelo->Actualizar($p) :
        $this->modelo->Insertar($p);

        header("location:?c=contratos");
    }

     //Aqui se borran los registros de contratos, se obtiene el id y se enlistan los valores actualizados
    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=contratos");
    }

    //Aqui se llama la funcion para generar el pdf del contrato, se obtiene el id del contrato y se devuelve el contrato en pdf
    public function DescargarContratoPDF(){
        $p = new Contratos();
        $p = $this->modelo->generarPDF($_GET["id"]);
        
        require_once "vistas/encabezadoRescatista.php";
        require_once "vistas/contratosRescatista/index.php";
        require_once "vistas/pie.php";
    }


}