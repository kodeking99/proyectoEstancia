<?php

class Solicitudes {
    private $pdo;

    public function __construct() {
        $this->pdo = BasedeDatos::Conectar();
    }

    public function obtenerMascotas() {
        $query = "SELECT * FROM mascotas";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Listar(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM Solicitudes");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function obtenerAvisos(){
        $query = "SELECT * FROM avisos";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}