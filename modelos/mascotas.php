<?php
require_once "controladores/mascotas.controlador.php";
?>


<?php

class Mascotas{
    

    private $pdo;

    private $ID;
    private $Nombre;
    private $Raza;
    private $Edad;
    private $Genero;
    private $Descripcion;
    private $Imagenes;
    private $EstadoAdopcion;
    private $Refugio;



    public function getID() : ?int{
        return $this->ID;
    }

    public function setID(int $id){
        $this->ID=$id;
    }

    public function getNombre() : ?string{
        return $this->Nombre;
    }

    public function setNombre(string $nombre){
        $this->Nombre=$nombre;
    }

    public function getRaza() : ?string{
        return $this->Raza;
    }

    public function setRaza(string $raza){
        $this->Raza=$raza;
    }

    public function getEdad() : ?int{
        return $this->Edad;
    }

    public function setEdad(int $edad){
        $this->Edad=$edad;
    }

    public function getGenero() : ?string{
        return $this->Genero;
    }

    public function setGenero(string $genero){
        $this->Genero=$genero;
    }

    public function getDescripcion() : ?string{
        return $this->Descripcion;
    }

    public function setDescripcion(string $descripcion){
        $this->Descripcion=$descripcion;
    }

    public function getImagenes() : ?string{
        return $this->Imagenes;
    }

    public function setImagenes(string $imagenes){
        $this->Imagenes=$imagenes;
    }

    public function getEstadoAdopcion() : ?string{
        return $this->EstadoAdopcion;
    }

    public function setEstadoAdopcion(string $estado){
        $this->EstadoAdopcion=$estado;
    }

    public function getRefugio() : ?int{
        return $this->Refugio;
    }

    public function setRefugio(int $Refugio){
        $this->Refugio=$Refugio;
    }


    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    public function ListarBusqueda($parametro){
    try {
        if ($parametro !== null) {
            $consulta = $this->pdo->prepare("SELECT * FROM Mascotas WHERE nombre LIKE :parametro OR id = :parametro");
            $consulta->bindValue(':parametro', '%' . $parametro . '%', PDO::PARAM_STR);
        } else {
            $consulta = $this->pdo->prepare("SELECT * FROM Mascotas");
        }

        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        die($e->getMessage());
    }
    }

    public function Listar(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM Mascotas");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM Mascotas WHERE ID=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Mascotas();
            $p->setID($r->ID);
            $p->setNombre($r->Nombre);
            $p->setRaza($r->Raza);
            $p->setEdad($r->Edad);
            $p->setGenero($r->Genero);
            $p->setDescripcion($r->Descripcion);
            $p->setImagenes($r->Imagenes);
            $p->setEstadoAdopcion($r->EstadoAdopcion);
            $p->setRefugio($r->Refugio);
            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function Insertar(Mascotas $p){
        try{
            $consulta="INSERT INTO Mascotas(Nombre,Raza,Edad,Genero,Descripcion, Imagenes, EstadoAdopcion, Refugio) VALUES (?,?,?,?,?,?,?,?);";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getNombre(),
                        $p->getRaza(),
                        $p->getEdad(),
                        $p->getGenero(),
                        $p->getDescripcion(),
                        $p->getImagenes(),
                        $p->getEstadoAdopcion(),
                        $p->getRefugio()
                       
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Mascotas $p){
        try{
            $consulta = "UPDATE Mascotas SET 
            Nombre=?,
            Raza=?,
            Edad=?,
            Genero=?,
            Descripcion=?,
            Imagenes=?,
            EstadoAdopcion=?,
            Refugio=?
            WHERE ID=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getNombre(),
                        $p->getRaza(),
                        $p->getEdad(),
                        $p->getGenero(),
                        $p->getDescripcion(),
                        $p->getImagenes(),
                        $p->getEstadoAdopcion(),
                        $p->getRefugio(),
                        $p->getID() 
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function Eliminar($id){
        try{
            $consulta="DELETE FROM Mascotas WHERE ID=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}