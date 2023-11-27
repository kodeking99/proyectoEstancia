<?php
require_once "controladores/adopciones.controlador.php";
?>

<?php

class Adopciones{
    

    private $pdo;

    private $ID;
    private $IDUsuarioAdoptante;
    private $IDMascota;
    private $FechaAdopcion;
    private $EstadoAdopcion;

    public function getID() : ?int{
        return $this->ID;
    }

    public function setID(int $id){
        $this->ID=$id;
    }

    public function getIDUsuarioAdoptante() : ?int{
        return $this->IDUsuarioAdoptante;
    }

    public function setIDUsuarioAdoptante(int $id){
        $this->IDUsuarioAdoptante=$id;
    }

    public function getIDMascota() : ?int{
        return $this->IDMascota;
    }

    public function setIDMascota(int $id){
        $this->IDMascota=$id;
    }

    public function getFechaAdopcion() : ?string{
        return $this->FechaAdopcion;
    }

    public function setFechaAdopcion(string $terminos){
        $this->FechaAdopcion=$terminos;
    }



    public function getEstadoAdopcion() : ?string{
        return $this->EstadoAdopcion;
    }

    public function setEstadoAdopcion(string $EstadoAdopcion){
        $this->EstadoAdopcion=$EstadoAdopcion;
    }


    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

     //Aqui se realizan las busquedas individuales, se recibe el dato de busqueda y se manda a consulta 
    public function ListarBusqueda($parametro){
        try {
            if ($parametro !== null) {
                $consulta = $this->pdo->prepare("SELECT * FROM Adopciones WHERE IDUsuarioAdoptante LIKE :parametro OR id = :parametro");
                $consulta->bindValue(':parametro', '%' . $parametro . '%', PDO::PARAM_STR);
            } else {
                $consulta = $this->pdo->prepare("SELECT * FROM Adopciones");
            }
    
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Aqui se realiza la busqueda general de las adopciones
    public function Listar(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM Adopciones;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Aqui se obtienen los datos de las filas a editar, se recibe el dato id y se manda a consulta
    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM Adopciones WHERE ID=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Adopciones();
            $p->setID($r->ID);
            $p->setIDUsuarioAdoptante($r->IDUsuarioAdoptante);
            $p->setIDMascota($r->IDMascota);
            $p->setFechaAdopcion($r->FechaAdopcion);
            $p->setEstadoAdopcion($r->EstadoAdopcion);
            return $p;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

     //Aqui se guardan los nuevos registros de adopciones
    public function Insertar(Adopciones $p){
        try{
            $consulta="INSERT INTO Adopciones(IDUsuarioAdoptante,IDMascota,FechaAdopcion,EstadoAdopcion) VALUES (?,?,?,?);";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getIDUsuarioAdoptante(),
                        $p->getIDMascota(),
                        $p->getFechaAdopcion(),
                        $p->getEstadoAdopcion(),
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Aqui se guardan los valores modificados de adopciones
    public function Actualizar(Adopciones $p){
        try{
            $consulta = "UPDATE Adopciones SET 
            IDUsuarioAdoptante=?,
            IDMascota=?,
            FechaAdopcion=?,
            EstadoAdopcion=?,
            WHERE ID=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getIDUsuarioAdoptante(),
                        $p->getIDMascota(),
                        $p->getFechaAdopcion(),
                        $p->getEstadoAdopcion(),
                        $p->getID() 
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Aqui se borran los registros de modificaciones, se obtiene el id y se enlistan los valores actualizados
    public function Eliminar($id){
        try{
            $consulta="DELETE FROM Adopciones WHERE ID=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}