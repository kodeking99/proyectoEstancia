<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    
    function generarContenido()
    {
        $this->Image('logo.png',10,8,33);
        $this->SetFont('Times','',12);
        for($i=1;$i<=40;$i++)
            $this->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->generarContenido();
$pdf->Output();
?>