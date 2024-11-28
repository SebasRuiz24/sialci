<?php
require('./fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        include '../../modelo/conexion.php';
        $consulta_info = $conexion->query("SELECT * FROM destinatario"); 
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
        $this->Cell(100, 10, utf8_decode("REPORTE DE DESTINATARIOS "), 0, 1, 'C', 0);
        $this->Ln(7);

        /* CAMPOS DE LA TABLA */
        $this->SetFillColor(125, 173, 221); 
        $this->SetTextColor(0, 0, 0);
        $this->SetDrawColor(163, 163, 163); 
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(15, 10, utf8_decode('ID'), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
        $this->Cell(40, 10, utf8_decode('Nombre Empresa'), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode('País'), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode('Departamento'), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode('Ciudad'), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode('Código Postal'), 1, 0, 'C', 1);
        $this->Cell(50, 10, utf8_decode('Email'), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode('Teléfono'), 1, 1, 'C', 1);
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

$consulta_reporte_destinatario = $conexion->query("
    SELECT 
        id_Destinatario,
        nombre_Des,
        nombreempresa_Des,
        pais_Des,
        depar_Des,
        ciudad_Des,
        codigo_Postal,
        email_Des,
        telefono
    FROM 
        destinatario
");

while ($datos_reporte = $consulta_reporte_destinatario->fetch_object()) {
    $i++;
    /* TABLA */
    $pdf->Cell(15, 10, utf8_decode($datos_reporte->id_Destinatario), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($datos_reporte->nombre_Des), 1, 0, 'L', 0);
    $pdf->Cell(40, 10, utf8_decode($datos_reporte->nombreempresa_Des), 1, 0, 'L', 0);
    $pdf->Cell(30, 10, utf8_decode($datos_reporte->pais_Des), 1, 0, 'L', 0);
    $pdf->Cell(30, 10, utf8_decode($datos_reporte->depar_Des), 1, 0, 'L', 0);
    $pdf->Cell(30, 10, utf8_decode($datos_reporte->ciudad_Des), 1, 0, 'L', 0);
    $pdf->Cell(30, 10, utf8_decode($datos_reporte->codigo_Postal), 1, 0, 'L', 0);
    $pdf->Cell(50, 10, utf8_decode($datos_reporte->email_Des), 1, 0, 'L', 0);
    $pdf->Cell(30, 10, utf8_decode($datos_reporte->telefono), 1, 1, 'L', 0);
}

$pdf->Output('Reporte_destinatarios.pdf', 'I');
?>
