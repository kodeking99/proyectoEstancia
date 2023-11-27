<?php
require_once "controladores/visitas.controlador.php";
?>

<?php

class Visitas{
    

    private $pdo;

    private $ID;
    private $IDUsuarioVisitante;
    private $IDMascota;
    private $FechaVisita;
    private $Comentario;



    public function getID() : ?int{
        return $this->ID;
    }

    public function setID(int $id){
        $this->ID=$id;
    }

    public function getIDUsuarioVisitante() : ?int{
        return $this->IDUsuarioVisitante;
    }

    public function setIDUsuarioVisitante(int $id){
        $this->IDUsuarioVisitante=$id;
    }

    public function getIDMascota() : ?int{
        return $this->IDMascota;
    }

    public function setIDMascota(int $id){
        $this->IDMascota=$id;
    }

    public function getFechaVisita() : ?string{
        return $this->FechaVisita;
    }

    public function setFechaVisita(string $fechaVisita){
        $this->FechaVisita=$fechaVisita;
    }



    public function getComentario() : ?string{
        return $this->Comentario;
    }

    public function setComentario(string $Comentario){
        $this->Comentario=$Comentario;
    }



    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }


    public function Listar(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM Visitas;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarBusqueda($parametro){
        try {
            if ($parametro !== null) {
                $consulta = $this->pdo->prepare("SELECT * FROM Visitas WHERE IDUsuarioVisitante = :parametro OR IDMascota = :parametro");
                $consulta->bindValue(':parametro', $parametro, PDO::PARAM_INT);
                
            } else {
                $consulta = $this->pdo->prepare("SELECT * FROM Visitas");
            }
    
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM Visitas WHERE ID=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Visitas();
            $p->setID($r->ID);
            $p->setIDUsuarioVisitante($r->IDUsuarioVisitante);
            $p->setIDMascota($r->IDMascota);
            $p->setFechaVisita($r->FechaVisita);
            $p->setComentario($r->Comentario);
            return $p;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function Insertar(Visitas $p){
        try{
            $consulta="INSERT INTO Visitas(IDUsuarioVisitante,IDMascota,FechaVisita,Comentario) VALUES (?,?,?,?);";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getIDUsuarioVisitante(),
                        $p->getIDMascota(),
                        $p->getFechaVisita(),
                        $p->getComentario(),
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Visitas $p){
        try{
            $consulta = "UPDATE Visitas SET 
            IDUsuarioVisitante=?,
            IDMascota=?,
            FechaVisita=?,
            Comentario=?
            WHERE ID=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getIDUsuarioVisitante(),
                        $p->getIDMascota(),
                        $p->getFechaVisita(),
                        $p->getComentario(),
                        $p->getID() 
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function Eliminar($id){
        try{
            $consulta="DELETE FROM Visitas WHERE ID=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}