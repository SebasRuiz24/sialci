<?php
require('./fpdf.php');

class PDF extends FPDF
{
   function Header()
   {
      include '../../modelo/conexion.php'; 

      $consulta_info = $conexion->query(" select * from pedidos "); 
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
      $this->Cell(100, 10, utf8_decode("REPORTE DE PEDIDOS "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      $this->SetFillColor(125, 173, 221); 
      $this->SetTextColor(0, 0, 0);
      $this->SetDrawColor(163, 163, 163); 
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(15, 10, utf8_decode('ID'), 1, 0, 'C', 1);
      $this->Cell(85, 10, utf8_decode('Correo Usuario'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('Dirección Remitente'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Teléfono'), 1, 0, 'C', 1);
      $this->Cell(50, 10, utf8_decode('Nombre Empresa'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('ID Mercancia'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('Fecha'), 1, 1, 'C', 1);
      
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

$consulta_reporte_pedidos = $conexion->query("
    SELECT 
        id_pedidos,
        correo_Usua,
        direccion_Remi,
        telefono_Remi,
        nombreempresa_Remi,
        id_Mercancia,
        fecha
    FROM 
        pedidos
");


while ($datos_reporte = $consulta_reporte_pedidos->fetch_object()) {
   $i = $i + 1;
   /* TABLA */
   $pdf->Cell(15, 10, utf8_decode($i), 1, 0, 'C', 0);
   $pdf->Cell(85, 10, utf8_decode($datos_reporte->correo_Usua), 1, 0, 'L', 0);
   $pdf->Cell(40, 10, utf8_decode($datos_reporte->direccion_Remi), 1, 0, 'L', 0);
   $pdf->Cell(30, 10, utf8_decode($datos_reporte->telefono_Remi), 1, 0, 'L', 0);
   $pdf->Cell(50, 10, utf8_decode($datos_reporte->nombreempresa_Remi), 1, 0, 'L', 0);
   $pdf->Cell(25, 10, utf8_decode($datos_reporte->id_Mercancia), 1, 0, 'C', 0);
   $pdf->Cell(25, 10, utf8_decode($datos_reporte->fecha), 1, 1, 'C', 0);
   
   
}


$pdf->Output('Reporte reporte pedidos.pdf', 'I');
?>