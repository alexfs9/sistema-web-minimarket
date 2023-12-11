<?php

require_once RUTA_RAIZ_PHP . '/libs/fpdf186/fpdf.php';

$pdf = new FPDF();

$pdf->AddPage();

$pdf->image(RUTA_RAIZ_PHP . '/app/vistas/img/aplicacion/icono.png', 185, 5, 20);
$pdf->SetFont('Arial', 'B', 19);
$pdf->Cell(45);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(110, 15, 'MINIMARKET MENDOZA', 1, 1, 'C', 0);
$pdf->Ln(3);

$pdf->SetFont('Arial', '', 12);

$pdf->Cell(40, 10, utf8_decode('CÓDIGO DE VENTA: ') . $venta['idVenta']);
$pdf->Ln();
$pdf->Cell(40, 10, utf8_decode('CÓDIGO DE CLIENTE: ') . $venta['idCuenta']);
$pdf->Ln();
$pdf->Cell(40, 10, utf8_decode('NOMBRE DE CLIENTE: ') . $venta['nombre']);
$pdf->Ln();
$pdf->Cell(40, 10, 'FECHA: ' . $venta['fecha']);

$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(20, 10, utf8_decode('CÓDIGO'), 1, 0, 'C');
$pdf->Cell(120, 10, 'PRODUCTO', 1, 0, 'C');
$pdf->Cell(25, 10, 'CANTIDAD', 1, 0, 'C');
$pdf->Cell(25, 10, 'SUBTOTAL', 1, 0, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Ln();

foreach ($detalleVenta as $detalle) {
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(20, 10, $detalle['idProducto'], 1, 0, 'C');
    $pdf->Cell(120, 10, utf8_decode($detalle['nombre']), 1, 0);
    $pdf->Cell(25, 10, $detalle['cantidad'], 1, 0, 'C');
    $pdf->SetTextColor(63, 72, 204);
    $pdf->Cell(25, 10, 'S/. ' . $detalle['subtotal'], 1, 0, 'C');
    $pdf->Ln();
}

$pdf->SetTextColor(55, 126, 71);

$pdf->Cell(140, 10, '', 0);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(50, 10, 'TOTAL: S/. ' . $venta['precioTotal'], 0, 0, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);

$pdf->Ln();

if (count($detalleVenta) > 10) {
    $pdf->AddPage();
}

$pdf->Output('boleta-' . $venta['idVenta'] . '.pdf', 'I');