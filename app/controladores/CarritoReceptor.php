<?php

require_once '../../Constantes.php';
require_once RUTA_RAIZ_PHP . '/app/controladores/CarritoControlador.php';

session_start();

$carritoControlador = new CarritoControlador();

if ($_GET['accion'] == 'agregar') {
    if (!$carritoControlador->vacio()) {
        if ($carritoControlador->estaAgregado($_POST['idProducto'])) {
            echo json_encode(2);
        } else {
            $carritoControlador->agregarProducto($_POST['idProducto'], $_POST['cantidad'], $_POST['precio'], $_POST['stock']);
            echo json_encode(1);
        }
    } else {
        $carritoControlador->agregarProducto($_POST['idProducto'], $_POST['cantidad'], $_POST['precio'], $_POST['stock']);
        echo json_encode(1);
    }
} elseif ($_GET['accion'] == 'eliminar') {
    require_once RUTA_RAIZ_PHP . '/app/controladores/ProductoControlador.php';
    $carritoControlador->eliminarProducto($_POST['idProducto']);
    $productos = $carritoControlador->consultarProductos();
    $carritoControlador->mostrarProductos($productos);
} elseif ($_GET['accion'] == 'actualizar') {
    $carritoControlador->actualizarProducto($_POST['idProducto'], $_POST['cantidad'], $_POST['subtotal']);
    echo json_encode($carritoControlador->calcularPrecioTotal());
} elseif ($_GET['accion'] == 'actualizarPrecioTotal') {
    echo json_encode($carritoControlador->calcularPrecioTotal());
}
