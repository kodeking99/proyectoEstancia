<?php
require_once "controladores/historias.controlador.php";
?>

<?php

class Historias{
    

    private $pdo;

    private $ID;
    private $IDUsuario;
    private $Titulo;
    private $Descripcion;
    private $Imagenes;
    private $FechaPublicacion;




    public function getID() : ?int{
        return $this->ID;
    }

    public function setID(int $id){
        $this->ID=$id;
    }

    public function getIDUsuario() : ?int{
        return $this->IDUsuario;
    }

    public function setIDUsuario(int $id){
        $this->IDUsuario=$id;
    }

    public function getTitulo() : ?string{
        return $this->Titulo;
    }

    public function setTitulo(string $titulo){
        $this->Titulo=$titulo;
    }

    public function getDescripcion() : ?string{
        return $this->Descripcion;
    }

    public function setDescripcion(string $Descripcion){
        $this->Descripcion=$Descripcion;
    }

    public function getImagenes() : ?string{
        return $this->Imagenes;
    }

    public function setImagenes(string $Imagenes){
        $this->Imagenes=$Imagenes;
    }

    public function getFechaPublicacion() : ?string{
        return $this->FechaPublicacion;
    }

    public function setFechaPublicacion(string $FechaPublicacion){
        $this->FechaPublicacion=$FechaPublicacion;
    }



    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    
    public function ListarBusqueda($parametro){
        try {
            if ($parametro !== null) {
                $consulta = $this->pdo->prepare("SELECT * FROM HistoriaDeExito WHERE IDUsuario LIKE :parametro OR id = :parametro");
                $consulta->bindValue(':parametro', '%' . $parametro . '%', PDO::PARAM_STR);
            } else {
                $consulta = $this->pdo->prepare("SELECT * FROM HistoriaDeExito");
            }
    
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM HistoriaDeExito;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM HistoriaDeExito WHERE ID=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Historias();
            $p->setID($r->ID);
            $p->setIDUsuario($r->IDUsuario);
            $p->setTitulo($r->Titulo);
            $p->setDescripcion($r->Descripcion);
            $p->setImagenes($r->Imagenes);
            $p->setFechaPublicacion($r->FechaPublicacion);
            return $p;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function Insertar(Historias $p){
        try{
            $consulta="INSERT INTO HistoriaDeExito(IDUsuario, Titulo, Descripcion, Imagenes, FechaPublicacion) VALUES (?,?,?,?,?);";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getIDUsuario(),
                        $p->getTitulo(),
                        $p->getDescripcion(),
                        $p->getImagenes(),
                        $p->getFechaPublicacion(),
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Historias $p){
        try{
            $consulta = "UPDATE HistoriaDeExito SET 
            IDUsuario=?,
            Titulo=?,
            Descripcion=?,
            Imagenes=?,
            FechaPublicacion=?
            WHERE ID=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getIDUsuario(),
                        $p->getTitulo(),
                        $p->getDescripcion(),
                        $p->getImagenes(),
                        $p->getfechaPublicacion(),
                        $p->getID() 
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function Eliminar($id){
        try{
            $consulta="DELETE FROM HistoriaDeExito WHERE ID=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}