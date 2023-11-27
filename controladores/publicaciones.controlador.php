
<?php

session_start();
error_reporting(0);

$validar = $_SESSION['tipo_usuario'];
$nombre = $_SESSION['Nombre'];
$id = $_SESSION['ID'];

?>


<?php

require_once "modelos/publicaciones.php";


class publicacionesInicio{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Publicaciones();
    }



    /*En esta función se listan y se mandan a registrar las publicaciones, las entradas son: Titulo, Descripción y las imagenes
     y las salidas son las publicaciones registradas. */
    public function Inicio(){
 
        session_start();
        $ID = $_SESSION['ID'];


        $dir_subida = 'img/';
        $nombreArchivo = basename($_FILES['archivo']['name']);
        $fichero_subido = $dir_subida . basename($_FILES['archivo']['name']);
        move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido);


        $p = new Publicaciones();
        $fechaActual = date('Y-m-d');
        $p->setIDUsuario($ID);
        $p->setFechaPublicacion($fechaActual); 
        $p->setTitulo($_POST['Titulo']);
        $p->setDescripcion($_POST['Descripcion']);
        $p->setImagenes($nombreArchivo);
        
        if (!empty($_POST['Titulo']) || !empty($_POST['Descripcion'])) {
            $this->modelo->Insertar2($p);
        }


       $foro = new Publicaciones();
       $foro = $this->modelo->listarHistorias();
       require_once "vistas/publicaciones/index.php"; 

    }
    
  
}