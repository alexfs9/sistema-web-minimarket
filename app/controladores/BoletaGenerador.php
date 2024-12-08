<?php

require_once '../../Constantes.php';
require_once RUTA_RAIZ_PHP . '/app/controladores/VentaControlador.php';

$ventaControlador = new VentaControlador();

$venta = $ventaControlador->consultarVenta($_POST['codigo']);
$detalleVenta = $ventaControlador->consultarDetalleVenta($_POST['codigo']);

foreach ($detalleVenta as $detalle) {
    $indice = array_search($detalle, $detalleVenta);
    if (strlen($detalle['nombre']) > 60) {
        $detalleVenta[$indice]['nombre'] = substr_replace($detalle['nombre'], '...', 50);
    }
}

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/boleta/Boleta.php';
