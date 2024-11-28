<?php
require('./fpdf.php');

class PDF extends FPDF
{
   function Header()
   {
        include '../../modelo/conexion.php'; 

        $consulta_info = $conexion->query(" select * from mercancia "); 
        $dato_info = $consulta_info->fetch_object();
      $this->Image('icono.jpg', 270, 5, 20); 
      $this->SetFont('Arial', 'B', 19); 
      $this->Cell(95); 
      $this->SetTextColor(0, 0, 0); 
      $this->Cell(110, 15, utf8_decode('SIALCI-SAS'), 1, 1, 'C', 0);
      $this->Ln(3);
      $this->SetTextColor(103); 

      /* TITULO DE LA TABLA */
      $this->SetTextColor(0, 95, 189);
      $this->Cell(100); 
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE MERCANCÍAS "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      $this->SetFillColor(125, 173, 221); 
      $this->SetTextColor(0, 0, 0);
      $this->SetDrawColor(163, 163, 163); 
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(15, 10, utf8_decode('ID'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Paquetes'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Valor'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Peso'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Largo'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Ancho'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Alto'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('Peso Units'), 1, 0, 'C', 1);
      $this->Cell(50, 10, utf8_decode('Descripción'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('ID Destinatario'), 1, 1, 'C', 1);
   }

   function Footer()
   {
      $this->SetY(-15); 
      $this->SetFont('Arial', 'I', 8); 
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); 

      $this->SetY(-15); 
      $this->SetFont('Arial', 'I', 8); 
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); 
   }
}

include '../../modelo/conexion.php';

$pdf = new PDF();
$pdf->AddPage("landscape"); 
$pdf->AliasNbPages(); 

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); 

$consulta_reporte_mercancia = $conexion->query("
    SELECT 
        id_Mercancia,
        paquetes,
        valor_Mercancia,
        peso,
        largo,
        ancho,
        alto,
        peso_Units,
        descripcion_Paque,
        id_Destinatario
    FROM 
        mercancia
");

while ($datos_reporte = $consulta_reporte_mercancia->fetch_object()) {
   $i = $i + 1;
   /* TABLA */
   $pdf->Cell(15, 10, utf8_decode($i), 1, 0, 'C', 0);
   $pdf->Cell(20, 10, utf8_decode($datos_reporte->paquetes), 1, 0, 'L', 0);
   $pdf->Cell(30, 10, utf8_decode($datos_reporte->valor_Mercancia), 1, 0, 'L', 0);
   $pdf->Cell(20, 10, utf8_decode($datos_reporte->peso), 1, 0, 'L', 0);
   $pdf->Cell(20, 10, utf8_decode($datos_reporte->largo), 1, 0, 'L', 0);
   $pdf->Cell(20, 10, utf8_decode($datos_reporte->ancho), 1, 0, 'L', 0);
   $pdf->Cell(20, 10, utf8_decode($datos_reporte->alto), 1, 0, 'L', 0);
   $pdf->Cell(25, 10, utf8_decode($datos_reporte->peso_Units), 1, 0, 'L', 0);
   $pdf->Cell(50, 10, utf8_decode($datos_reporte->descripcion_Paque), 1, 0, 'L', 0);
   $pdf->Cell(30, 10, utf8_decode($datos_reporte->id_Destinatario), 1, 1, 'C', 0);
}

$pdf->Output('Reporte_mercancia.pdf', 'I');
?>
