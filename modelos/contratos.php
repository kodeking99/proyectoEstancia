<?php
require_once "controladores/contratos.controlador.php";
require_once('fpdf/fpdf.php');
?>

<?php

class Contratos{
    

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


    public function ListarBusqueda($parametro){
        try {
            if ($parametro !== null) {
                $consulta = $this->pdo->prepare("SELECT * FROM Contrato WHERE IDAdopcion LIKE :parametro OR id = :parametro");
                $consulta->bindValue(':parametro', $parametro, PDO::PARAM_INT);
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


    public function Insertar(Contratos $p){
        try{
            $consulta="INSERT INTO Contrato(IDAdopcion,IDUsuario,TerminosYCondiciones,FirmaDigital,FechaFirma) VALUES (?,?,?,?,?);";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getIDAdopcion(),
                        $p->getIDUsuario(),
                        $p->getTerminosYCondiciones(),
                        $p->getFirmaDigital(),
                        $p->getFechaFirma()
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

    public function obtenerUsuario($id){
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



    
    public function obtenerMascota($id){
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

    public function generarPDF($id){
        try {
         
            $datosContratos= $this->Obtener($id);
            $datosUsuarios = $this->obtenerUsuario($datosContratos->getIDUsuario());
       
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
        $anchoTitulo = $pdf->GetStringWidth('Contrato');
    
        // Calcular la posición para centrar el título
        $posicionTitulo = ($anchoPagina - $anchoTitulo) / 2;
        $posicionNumero = ($anchoPagina - $anchoTitulo) / 1.3;
    
        // Mover a la posición calculada y agregar el título centrado
        $pdf->SetX($posicionTitulo);
        $pdf->Cell($anchoTitulo, 10, utf8_decode('Contrato'), 0, 0);
        $pdf->SetX($posicionNumero);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell($anchoTitulo, 30, utf8_decode('No. con: '), 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(70, 30, utf8_decode($datosContratos->getID()), 0, 0, 'L');
        $pdf->SetX($posicionNumero);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell($anchoTitulo, 45, utf8_decode('Fecha: '), 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(70, 45, utf8_decode($datosContratos->getFechaFirma()), 0, 0, 'L');
        

    
        $pdf->Ln(8);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(-1, 60, utf8_decode('Datos del adoptante:'), 0, 0);
    

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(20, 75, utf8_decode('Nombre:'), 0, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(40, 75, utf8_decode($datosUsuarios->getNombre()), 0, 0, 'L');
        

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(20, 75, utf8_decode('Apellido:'), 0, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(40, 75, utf8_decode($datosUsuarios->getApellido()), 0, 0, 'L');

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(22, 75, utf8_decode('Dirección:'), 0, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(-142, 75, utf8_decode($datosUsuarios->getDireccion()), 0, 0, 'L');

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(20, 95, utf8_decode('Correo:'), 0, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(70, 95, utf8_decode($datosUsuarios->getCorreoElectronico()), 0, 0, 'L');
        
        
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(20, 95, utf8_decode('Genero:'), 0, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(-110, 95, utf8_decode($datosUsuarios->getGenero()), 0, 0, 'L');


   
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(55, 125, utf8_decode('Términos y condiciones :'), 0, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(35, 125, utf8_decode($datosContratos->getTerminosYCondiciones()), 0, 0, 'L');

       
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(-10, 170, utf8_decode($datosContratos->getFirmaDigital()), 0, 0, 'L');
        $pdf->Cell(8, 180, utf8_decode('_____________'), 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(-105, 190, utf8_decode('Firma'), 0, 0, 'L');




      

     

            $pdf->Output('Informe_Contratos.pdf', 'D');
        } catch (Exception $e) {
            echo "Error al generar el PDF: " . $e->getMessage();
        }
    }

    

}