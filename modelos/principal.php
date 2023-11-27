<?php

class Principal {
    private $pdo;

    private $nombre;
    private $apellido;
    private $correo;
    private $ciudad;
    private $colonia;
    private $telefono;
    private $idMascota;
    private $idUsuario;

    
    public function getIdUsuario() : ?int{
        return $this->idUsuario;
    }

    public function setIdUsuario(int $idUsuario){
        $this->idUsuario=$idUsuario;
    }

    public function getIdMascota() : ?int{
        return $this->idMascota;
    }

    public function setIdMascota(int $idMascota){
        $this->idMascota=$idMascota;
    }

    public function getNombre() : ?string{
        return $this->nombre;
    }

    public function setNombre(string $nombre){
        $this->nombre=$nombre;
    }

    public function getApellido() : ?string{
        return $this->apellido;
    }

    public function setApellido(string $apellido){
        $this->apellido=$apellido;
    }

    public function getCorreo() : ?string{
        return $this->correo;
    }

    public function setCorreo(string $correo){
        $this->correo=$correo;
    }

    public function getCiudad() : ?string{
        return $this->ciudad;
    }

    public function setCiudad(string $ciudad){
        $this->ciudad=$ciudad;
    }

    public function getColonia() : ?string{
        return $this->colonia;
    }

    public function setColonia(string $colonia){
        $this->colonia=$colonia;
    }

    public function getTelefono() : ?string{
        return $this->telefono;
    }

    public function setTelefono(string $telefono){
        $this->telefono=$telefono;
    }


    public function __construct() {
        $this->pdo = BasedeDatos::Conectar();
    }

    public function obtenerMascotas() {
        $query = "SELECT * FROM mascotas";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function obtenerAvisos(){
        $query = "SELECT * FROM avisos";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function enviarSolicitud(Principal $solicitud){
        try {
            $consulta = "INSERT INTO Solicitudes (Nombre, Apellido, Correo, Ciudad, Colonia, Telefono, IdMascota, IdUsuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $this->pdo->prepare($consulta)->execute([
                $solicitud->getNombre(),
                $solicitud->getApellido(),
                $solicitud->getCorreo(),
                $solicitud->getCiudad(),
                $solicitud->getColonia(),
                $solicitud->getTelefono(),
                $solicitud->getIdMascota(),
                $solicitud->getIdUsuario()
            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}