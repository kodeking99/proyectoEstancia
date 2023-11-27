<?php
require_once "controladores/avisos.controlador.php";
?>

<?php

class Avisos{
    

    private $pdo;

    private $ID;
    private $IDUsuarioAnunciante;
    private $Titulo;
    private $Descripcion;
    private $FechaPublicacion;
    private $ImagenAnuncio;

    public function getID() : ?int{
        return $this->ID;
    }

    public function setID(int $id){
        $this->ID=$id;
    }

    public function getIDUsuarioAnunciante() : ?int{
        return $this->IDUsuarioAnunciante;
    }

    public function setIDUsuarioAnunciante(int $id){
        $this->IDUsuarioAnunciante=$id;
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

    public function setDescripcion(string $terminos){
        $this->Descripcion=$terminos;
    }

    public function getFechaPublicacion() : ?string{
        return $this->FechaPublicacion;
    }

    public function setFechaPublicacion(string $FechaPublicacion){
        $this->FechaPublicacion=$FechaPublicacion;
    }

    public function getImagenAnuncio() : ?string{
        return $this->ImagenAnuncio;
    }

    public function setImagenAnuncio(string $ImagenAnuncio){
        $this->ImagenAnuncio=$ImagenAnuncio;
    }



    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    
    public function ListarBusqueda($parametro){
        try {
            if ($parametro !== null) {
                $consulta = $this->pdo->prepare("SELECT * FROM Avisos WHERE IDUsuarioAnunciante LIKE :parametro OR id = :parametro");
                $consulta->bindValue(':parametro', '%' . $parametro . '%', PDO::PARAM_STR);
            } else {
                $consulta = $this->pdo->prepare("SELECT * FROM Avisos");
            }
    
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM Avisos;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM Avisos WHERE ID=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Avisos();
            $p->setID($r->ID);
            $p->setIDUsuarioAnunciante($r->IDUsuarioAnunciante);
            $p->setTitulo($r->Titulo);
            $p->setDescripcion($r->Descripcion);
            $p->setFechaPublicacion($r->FechaPublicacion);
            $p->setImagenAnuncio($r->ImagenAnuncio);
            return $p;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function Insertar(Avisos $p){
        try{
            $consulta="INSERT INTO Avisos(IDUsuarioAnunciante,Titulo,Descripcion,FechaPublicacion, ImagenAnuncio) VALUES (?,?,?,?,?);";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getIDUsuarioAnunciante(),
                        $p->getTitulo(),
                        $p->getDescripcion(),
                        $p->getFechaPublicacion(),
                        $p->getImagenAnuncio(),
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Avisos $p){
        try{
            $consulta = "UPDATE Avisos SET 
            IDUsuarioAnunciante=?,
            Titulo=?,
            Descripcion=?,
            FechaPublicacion=?,
            ImagenAnuncio=?
            WHERE ID=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getIDUsuarioAnunciante(),
                        $p->getTitulo(),
                        $p->getDescripcion(),
                        $p->getFechaPublicacion(),
                        $p->getImagenAnuncio(),
                        $p->getID() 
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function Eliminar($id){
        try{
            $consulta="DELETE FROM Avisos WHERE ID=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}