<?php

require_once '../../Constantes.php';
require_once RUTA_RAIZ_PHP . '/app/controladores/CarritoControlador.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dao/CompraDao.php';

date_default_timezone_set("America/Lima");
session_start();

if ($_GET['accion'] == 'registrar') {
    $idCuenta = $_SESSION['cuenta']['idCuenta'];
    $fecha = date("Y-m-d H:i:s");
    if (isset($_POST['direccion'])) {
        $direccion = $_POST['direccion'];
    } else {
        $direccion = '-';
    }
    $carritoControlador = new CarritoControlador();
    $precioTotal = $carritoControlador->calcularPrecioTotal();
    $compraDao = new CompraDao();
    $idVenta = $compraDao->registrarVenta($idCuenta, $fecha, $_POST['tipoPago'], 
                $_POST['tipoEntrega'], $direccion, $precioTotal);
    foreach ($_SESSION['carrito'] as $producto) {
        $compraDao->registrarDetalleVenta($idVenta['@idUltimaVenta'], $producto['idProducto'], 
        $producto['cantidad'], $producto['subtotal']);
    }
    $_SESSION['carrito'] = [];
    echo json_encode("ok");
}