
<?php
require_once "controladores/producto.controlador.php";
?>

<?php

class Usuario{
    private $pdo;

    private $ID;
    private $Nombre;
    private $Apellido;
    private $CorreoElectronico;
    private $Contra;
    private $Telefono;
    private $Direccion;
    private $TipoUsuario;
    private $FechaNacimiento;
    private $Genero;


    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    public function getID() : ?int{
        return $this->ID;
    }

    public function setID(int $id){
        $this->ID=$id;
    }


    public function getNombre() : ?string{
        return $this->Nombre;
    }

    public function setNombre(string $nom){
        $this->Nombre=$nom;
    }

    public function getApellido() : ?string{
        return $this->Apellido;
    }

    public function setApellido(string $ape){
        $this->Apellido=$ape;
    }

    public function getCorreoElectronico() : ?string{
        return $this->CorreoElectronico;
    }

    public function setCorreoElectronico(string $ema){
        $this->CorreoElectronico=$ema;
    }


    public function getContra() : ?string{
        return $this->Contra;
    }

    public function setContra(string $contra){
        $this->Contra=$contra;
    }

    public function getTelefono() : ?string{
        return $this->Telefono;
    }

    public function setTelefono(string $telefono){
        $this->Telefono=$telefono;
    }

    public function getDireccion() : ?string{
        return $this->Direccion;
    }

    public function setDireccion(string $direccion){
        $this->Direccion=$direccion;
    }

    public function getTipoUsuario() : ?String{
        return $this->TipoUsuario;
    }

    public function setTipoUsuario(String $rol){
        $this->TipoUsuario=$rol;
    }

    public function getFechaNacimiento() : ?string{
        return $this->FechaNacimiento;
    }

    public function setFechaNacimiento(string $fechaNacimiento){
        $this->FechaNacimiento=$fechaNacimiento;
    }

    public function getGenero() : ?string{
        return $this->Genero;
    }

    public function setGenero(string $genero){
        $this->Genero=$genero;
    }

    public function ListarBusqueda($parametro){
        try {
            if ($parametro !== null) {
                $consulta = $this->pdo->prepare("SELECT * FROM Usuarios WHERE nombre LIKE :parametro OR id = :parametro");
                $consulta->bindValue(':parametro', '%' . $parametro . '%', PDO::PARAM_STR);
            } else {
                $consulta = $this->pdo->prepare("SELECT * FROM Usuarios");
            }
    
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM Usuarios;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM Usuarios WHERE ID=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Usuario();
            $p->setID($r->ID);
            $p->setNombre($r->Nombre);
            $p->setApellido($r->Apellido);
            $p->setCorreoElectronico($r->CorreoElectronico);
            $p->setContra($r->Contraseña);
            $p->setTelefono($r->Telefono);
            $p->setDireccion($r->Direccion);
            $p->setTipoUsuario($r->TipoDeUsuario);
            $p->setFechaNacimiento($r->FechaDeNacimiento);
            $p->setGenero($r->Genero);
            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function Insertar(Usuario $p){
        try{
            $consulta="INSERT INTO Usuarios(Nombre,Apellido,CorreoElectronico,Contraseña,Telefono, Direccion, TipoDeUsuario, FechaDeNacimiento, Genero) VALUES (?,?,?,?,?,?,?,?,?);";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getNombre(),
                        $p->getApellido(),
                        $p->getCorreoElectronico(),
                        $p->getContra(),
                        $p->getTelefono(),
                        $p->getDireccion(),
                        $p->getTipoUsuario(),
                        $p->getFechaNacimiento(),
                        $p->getGenero()
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Usuario $p){
        try{
            $consulta = "UPDATE Usuarios SET 
            Nombre=?,
            Apellido=?,
            CorreoElectronico=?,
            Contraseña=?,
            Telefono=?,
            Direccion=?,
            TipoDeUsuario=?,
            FechaDeNacimiento=?,
            Genero=?
            WHERE ID=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getNombre(),
                        $p->getApellido(),
                        $p->getCorreoElectronico(),
                        $p->getContra(),
                        $p->getTelefono(),
                        $p->getDireccion(),
                        $p->getTipoUsuario(),
                        $p->getFechaNacimiento(),
                        $p->getGenero(),
                        $p->getID() 

                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function Eliminar($id){
        try{
            $consulta="DELETE FROM Usuarios WHERE ID=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}