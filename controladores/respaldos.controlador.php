<?php

require_once "modelos/respaldos.php";
require_once "modelos/producto.php";

class respaldosInicio{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Respaldos();
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/respaldos/index.php";
        require_once "vistas/pie.php";
    }


    //Aqui se genera el respaldo de la BD, la entrada es el archivo.sql y se devuelve la respuesta del servidor
    public function generarRespaldo (){
        $modelo = new Respaldos();
        $rutaArchivo = 'backup/backup.sql';
        $modelo->respaldarBaseDeDatos($rutaArchivo);

        require_once "vistas/encabezado.php";
        require_once "vistas/respaldos/index.php";
        require_once "vistas/pie.php";
    }


    //Aqui se genera la restauración de la base de datos se toma en cuenta el archivo seleccionado
    //Se recibe: archivo.sql
    //Se devuelve: la base de datos restaurada
    public function generarRestauracion(){
        $modelo = new Respaldos();

    //Aqui se verifica si se ha enviado un archivo
    if (isset($_FILES['archivo_sql'])) {
        // Aqui se pasa el el archivo a la función restaurarBaseDeDatos
        $modelo->restaurarBaseDeDatos($_FILES['archivo_sql']);
    } else {
        echo 'No se ha seleccionado ningún archivo SQL.';
    }

    require_once "vistas/encabezado.php";
    require_once "vistas/respaldos/index.php";
    require_once "vistas/pie.php";

}
    
     //Aqui se realizan las busquedas individuales
     //se recibe: un dato de busqueda
     //se devuelve: la consulta de la bd
    public function busqueda(){
        $p = new Mascotas();

        if (isset($_GET['busqueda'])) {
            $p = $this->modelo->listarBusqueda($_GET['busqueda']);
        }
    
        require_once "vistas/encabezado.php";
        require_once "vistas/respaldos/busqueda.php";
        require_once "vistas/pie.php";

    }
    
    public function FormCrear(){
        $FechaSeguimiento="Agregar";
        $p=new Seguimientos();
        if(isset($_GET['id'])){
            $p=$this->modelo->Obtener($_GET['id']);
            $FechaSeguimiento="Modificar";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/respaldos/form.php";
        require_once "vistas/pie.php";
    }

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

    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=seguimientos");
    }


}