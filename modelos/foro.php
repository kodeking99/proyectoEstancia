<?php
require_once "controladores/foro.controlador.php";
?>

<?php

class Foro{
    private $pdo;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
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