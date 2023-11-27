<?php
require_once "controladores/reportes.controlador.php";
require_once('fpdf/fpdf.php');
?>

<?php

class Reportes{
    

    private $pdo;

    private $ID;
    private $IDAdopcion;
    private $IDUsuario;
    private $TerminosYCondiciones;
    private $FirmaDigital;
    private $FechaFirma;


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

    public function getIDUsuario() : ?int{
        return $this->IDUsuario;
    }

    public function setIDUsuario(int $id){
        $this->IDUsuario=$id;
    }

    public function getTerminosYCondiciones() : ?string{
        return $this->TerminosYCondiciones;
    }

    public function setTerminosYCondiciones(string $terminos){
        $this->TerminosYCondiciones=$terminos;
    }



    public function getFirmaDigital() : ?string{
        return $this->FirmaDigital;
    }

    public function setFirmaDigital(string $FirmaDigital){
        $this->FirmaDigital=$FirmaDigital;
    }

    public function getFechaFirma() : ?string{
        return $this->FechaFirma;
    }

    public function setFechaFirma(string $FechaFirma){
        $this->FechaFirma=$FechaFirma;
    }

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    public function crearGraficaMascotas(){
        
    }

    public function crearGraficaAdopciones(){
        $query = "SELECT EstadoAdopcion, COUNT(*) as total FROM Adopciones GROUP BY EstadoAdopcion";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerCantidadUsuarios(){
        $query = "SELECT Usuarios.Genero, COUNT(Adopciones.IDUsuarioAdoptante) as total
    FROM Usuarios
    LEFT JOIN Adopciones ON Usuarios.ID = Adopciones.IDUsuarioAdoptante
    GROUP BY Usuarios.Genero";
    $statement = $this->pdo->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
    }




    public function ListarBusqueda($parametro){
        try {
            if ($parametro !== null) {
                $consulta = $this->pdo->prepare("SELECT * FROM Contrato WHERE IDAdopcion LIKE :parametro OR id = :parametro");
                $consulta->bindValue(':parametro', '%' . $parametro . '%', PDO::PARAM_STR);
            } else {
                $consulta = $this->pdo->prepare("SELECT * FROM Contrato");
            }
    
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function Listar(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM Contrato;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM Contrato WHERE ID=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Contratos();
            $p->setID($r->ID);
            $p->setIDAdopcion($r->IDAdopcion);
            $p->setIDUsuario($r->IDUsuario);
            $p->setTerminosYCondiciones($r->TerminosYCondiciones);
            $p->setFirmaDigital($r->FirmaDigital);
            $p->setFechaFirma($r->FechaFirma);
            return $p;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function crearPDFAdopciones(){
        $datosAdopciones = $this->crearGraficaAdopciones();

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetTextColor(0, 0, 0);

         // Insertar el logo
        $logoPath = 'assets/img/Huellitas en Acción.png';
        $pdf->Image($logoPath, 10, 10, 30, 30);  // Ajusta las coordenadas y dimensiones según tus necesidades
    
        // Obtener el ancho de la página
        $anchoPagina = $pdf->GetPageWidth();
    
        // Obtener el ancho del título
        $anchoTitulo = $pdf->GetStringWidth('Informe de Adopciones');
    
        // Calcular la posición para centrar el título
        $posicionTitulo = ($anchoPagina - $anchoTitulo) / 2;
    
        // Mover a la posición calculada y agregar el título centrado
        $pdf->SetX($posicionTitulo);
        $pdf->Cell($anchoTitulo, 10, utf8_decode('Informe de Adopciones'), 0, 1);
    
        $pdf->Ln(8);
        $pdf->SetFont('Arial', '', 12);
    
        // Configurar el ancho de las celdas de la tabla
        $anchoCelda = $anchoPagina / 6; // Ajusta según sea necesario
    
        // Calcular la posición para centrar la tabla
        $posicionTabla = ($anchoPagina - $anchoCelda * 2) / 2;
    
        // Mover a la posición calculada y agregar las celdas de la tabla centradas
        $pdf->SetX($posicionTabla);
    
        // Agregar color de fondo a las celdas de título
        $pdf->SetFillColor(200, 220, 255);
        $pdf->Cell($anchoCelda, 6, utf8_decode('Estado'), 1, 0, 'C', true);
        $pdf->Cell($anchoCelda, 6, utf8_decode('Total'), 1, 1, 'C', true);
    
        // Agregar datos de adopciones
        foreach ($datosAdopciones as $dato) {
            $pdf->SetX($posicionTabla);
    
            // Cambiar el color de fondo para cada fila
            $pdf->SetFillColor(255, 255, 255);
            
            $pdf->Cell($anchoCelda, 7, utf8_decode($dato['EstadoAdopcion']), 1, 0, 'C', true);
            $pdf->Cell($anchoCelda, 7, utf8_decode($dato['total']), 1, 1, 'C', true);
        }

    
        $pdf->Output('Informe_Adopciones.pdf', 'D');
    }

    public function Insertar(Contratos $p){
        try{
            $consulta="INSERT INTO Contrato(IDAdopcion,IDUsuario,TerminosYCondiciones,FirmaDigital,FechaFirma) VALUES (?,?,?,?,?);";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getIDAdopcion(),
                        $p->getIDUsuario(),
                        $p->getTerminosYCondiciones(),
                        $p->getFirmaDigital(),
                        $p->getFechaFirma(),
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Contratos $p){
        try{
            $consulta = "UPDATE Contrato SET 
            IDAdopcion=?,
            IDUsuario=?,
            TerminosYCondiciones=?,
            FirmaDigital=?,
            FechaFirma=?
            WHERE ID=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getIDAdopcion(),
                        $p->getIDUsuario(),
                        $p->getTerminosYCondiciones(),
                        $p->getFirmaDigital(),
                        $p->getFechaFirma(),
                        $p->getID() 
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function Eliminar($id){
        try{
            $consulta="DELETE FROM Contrato WHERE ID=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}