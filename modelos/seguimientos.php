<?php
require_once "controladores/seguimientos.controlador.php";
?>

<?php

class Seguimientos{
    

    private $pdo;

    private $ID;
    private $IDAdopcion;
    private $FechaSeguimiento;
    private $Comentario;

   

    public function getID() : ?int{
        return $this->ID;
    }

    public function setID(int $id){
        $this->ID=$id;
    }

    public function getIDAdopcion() : ?int{
        return $this->IDAdopcion;
    }

    public function setIDAdopcion(int $id){
        $this->IDAdopcion=$id;
    }

    public function getFechaSeguimiento() : ?string{
        return $this->FechaSeguimiento;
    }

    public function setFechaSeguimiento(string $fecha){
        $this->FechaSeguimiento=$fecha;
    }

    public function getComentario() : ?string{
        return $this->Comentario;
    }

    public function setComentario(string $terminos){
        $this->Comentario=$terminos;
    }



    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    //Aqui se lista la tabla seguimiento
    public function Listar(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM Seguimiento;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Aqui se realizan las busquedas individuales, se recibe el dato de bisqueda y se manda a consulta
    public function ListarBusqueda($parametro){
        try {
            if ($parametro !== null) {
                $consulta = $this->pdo->prepare("SELECT * FROM Seguimiento WHERE IDAdopcion LIKE :parametro OR id = :parametro");
                $consulta->bindValue(':parametro', $parametro, PDO::PARAM_INT);
            } else {
                $consulta = $this->pdo->prepare("SELECT * FROM Seguimiento");
            }
    
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Aqui se obtienen los datos de las filas a editar, se recibe el dato id y se manda a consulta
    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM Seguimiento WHERE ID=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Seguimientos();
            $p->setID($r->ID);
            $p->setIDAdopcion($r->IDAdopcion);
            $p->setFechaSeguimiento($r->FechaSeguimiento);
            $p->setComentario($r->Comentario);

            return $p;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Aqui se guardan los valores modificados de seguimientos
    public function Insertar(Seguimientos $p){
        try{
            $consulta="INSERT INTO Seguimiento(IDAdopcion,FechaSeguimiento,Comentario) VALUES (?,?,?);";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getIDAdopcion(),
                        $p->getFechaSeguimiento(),
                        $p->getComentario(),
          
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Aqui se guardan los valores modificados de seguimientos
    public function Actualizar(Seguimientos $p){
        try{
            $consulta = "UPDATE Seguimiento SET 
            IDAdopcion=?,
            FechaSeguimiento=?,
            Comentario=?
            WHERE ID=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getIDAdopcion(),
                        $p->getFechaSeguimiento(),
                        $p->getComentario(),
                        $p->getID() 
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    //Aqui se borran los registros de seguimientos, se obtiene el id y se enlistan los valores actualizados
    public function Eliminar($id){
        try{
            $consulta="DELETE FROM Seguimiento WHERE ID=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}