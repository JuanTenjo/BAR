

<?php

require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{

    // Logo
    $this->Image('imagenes/logo.jpg',10,8,20);
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(40);
    // Título
    $this->Cell(30,10,utf8_decode('Facturacion'));
    // Salto de línea
    $this->Ln(10);
    

    //En el header va von this los valores son: cell(ancho de la celda, alto de la celda, texto, borde, salto de linea, justificado C = centrado)

    $this->cell(30,10,'snum_pedido',0,0,'C');
    $this->cell(30,10,'Cantidad',0,0,'C');
    $this->cell(30,10,'Total',0,1,'C');     
    $this->cell(30,10,'Producto',0,0,'C');
    $this->cell(30,10,'Precio',0,0,'C');
    $this->cell(30,10,'Cantidad',0,0,'C');
    $this->cell(30,10,'Total',0,1,'C');
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=10;$i++)
    $pdf->Cell(0,10,utf8_decode('Imprimiendo línea número ').$i,0,1);
$pdf->Output();

?>
