<?php

class Publicaciones {
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


    public function __construct() {
        $this->pdo = BasedeDatos::Conectar();
    }
    
    public function Insertar2(Publicaciones $p){
        try {
            $consulta = "INSERT INTO HistoriaDeExito (IDUsuario, Titulo, Descripcion, Imagenes, FechaPublicacion) VALUES (?, ?, ?, ?, ?)";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getIDUsuario(),
                    $p->getTitulo(),
                    $p->getDescripcion(),
                    $p->getImagenes(),
                    $p->getFechaPublicacion(),
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function Insertar(Publicaciones $p){
        try{
            $consulta="SELECT * from HistoriaDeExito(IDUsuario, Titulo, Descripcion, Imagenes, FechaPublicacion) VALUES (?,?,?,?,?);";
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

    public function listarHistorias() {
        try {
            $consulta = $this->pdo->prepare("SELECT HistoriaDeExito.IDUsuario, HistoriaDeExito.Descripcion, HistoriaDeExito.Imagenes, HistoriaDeExito.FechaPublicacion, HistoriaDeExito.Titulo, Usuarios.Nombre
                                            FROM HistoriaDeExito
                                            INNER JOIN Usuarios ON HistoriaDeExito.IDUsuario = Usuarios.ID");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}