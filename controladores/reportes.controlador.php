<?php

require_once "modelos/reportes.php";
require_once "modelos/producto.php";

class reportesInicio{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Reportes();
    }

    //Aqui se inicializa la vista de los reportes
    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/reportes/index.php";
        require_once "vistas/pie.php";
    }

    //Aqui se muestaran los reportes del rescatista o empleado
    public function reportesRescatista(){
        require_once "vistas/encabezadoRescatista.php";
        require_once "vistas/reportes/index.php";
        require_once "vistas/pie.php";
    }


    //Aqui se realiza el reporte de las mascotas, la salida es un pdf con el reporte 
    public function generarReporteMascotas() {
        $p = $this->modelo->crearGraficaMascotas();

        require_once "vistas/encabezado.php";
        require_once "vistas/reportes/index.php";
        require_once "vistas/pie.php";
    }

    //Aqui se genera ek reporte de adopciones se calcula las mascotas adoptadas y las disponibles
    public function generarReporteAdopciones() {
        $p = new Reportes();
        $p = $this->modelo->crearGraficaAdopciones();

        require_once "vistas/encabezado.php";
        require_once "vistas/reportes/index.php";
        require_once "vistas/pie.php";
    }


    //Aqui se genera el reporte de las adopciones, muestra el pdf generado
    public function generarPDFAdopciones(){
    $this->modelo->crearPDFAdopciones(); 
        require_once "vistas/encabezado.php";
        require_once "vistas/reportes/index.php";
        require_once "vistas/pie.php";

    }

    
    //Aqui se realizan las busquedas individuales, se recibe el dato de busqueda y se manda a consulta
    public function busqueda(){
        $p = new Mascotas();

        if (isset($_GET['busqueda'])) {
            $p = $this->modelo->listarBusqueda($_GET['busqueda']);
        }
    
        require_once "vistas/encabezado.php";
        require_once "vistas/reportes/busqueda.php";
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
        require_once "vistas/reportes/form.php";
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