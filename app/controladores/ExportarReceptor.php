<?php

require_once '../../Constantes.php';
require_once RUTA_RAIZ_PHP . '/app/controladores/ExportarControlador.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dao/VentaDao.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dao/ClienteDao.php';

$ventaControlador = new VentaDao();
$exportarControlador = new ExportarControlador();

if ($_GET['tipo'] == 'ventas') {
    $ventas = $ventaControlador->obtenerVentas();
    $nombreArchivo = "ventasRealizadas.xls";
    $exportarControlador->exportarExcel($ventas, $nombreArchivo);
} elseif ($_GET['tipo'] == 'productos') {
    $productos = $ventaControlador->obtenerProductos();
    $productosNuevo = [];
    foreach ($productos as $producto) {
        unset($producto['imagen']);
        $productosNuevo[] = $producto;
    }
    $nombreArchivo = "productosVendidos.xls";
    $exportarControlador->exportarExcel($productosNuevo, $nombreArchivo);
} elseif ($_GET['tipo'] == 'clientes') {
    $clienteDao = new ClienteDao();
    $clientes = $clienteDao->obtenerClientes();
    $clientesNuevo = [];
    foreach ($clientes as $cliente) {
        unset($cliente['foto']);
        $clientesNuevo[] = $cliente;
    }
    $nombreArchivo = "clientes.xls";
    $exportarControlador->exportarExcel($clientesNuevo, $nombreArchivo);
}
