<?php

require_once '../../Constantes.php';
require_once RUTA_RAIZ_PHP . '/app/controladores/ProductoControlador.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dao/ProductoDao.php';
require_once RUTA_RAIZ_PHP . '/app/controladores/FiltrosControlador.php';

$filtrosControlador = new FiltrosControlador();

if ($_GET['tipo'] == 1) {
    $nombre = null;
    $categoria = null;
    $precio = null;
    
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
    }
    if (isset($_POST['categoria'])) {
        $categoria = $_POST['categoria'];
    }
    if (isset($_POST['precio'])) {
        $precio = $_POST['precio'];
    }
    
    $productos = $filtrosControlador->filtrarCatalogo($nombre, $categoria, $precio);
    
    if (isset($productos)) {
        foreach($productos as $producto) {
            include RUTA_RAIZ_PHP . '/app/vistas/plantillas/catalogo/InfoProducto.php';
        }
    } else {
        echo '<h2 class="m-2 text-danger">No se encontraron productos.</h2>';
    }
} elseif ($_GET['tipo'] == 2) {
    $idProducto = null;
    $nombre = null;
    $categoria = null;
    $stock = null;
    $precio = null;

    if (isset($_POST['idProducto'])) {
        $idProducto = $_POST['idProducto'];
    } else {
        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
        }
        if (isset($_POST['categoria'])) {
            $categoria = $_POST['categoria'];
        }
        if (isset($_POST['stock'])) {
            $stock = $_POST['stock'];
        }
        if (isset($_POST['precio'])) {
            $precio = $_POST['precio'];
        }
    }

    $productos = $filtrosControlador->filtrarLista($idProducto, $nombre, $categoria, $stock, $precio);
    if (isset($productos)) {
        foreach($productos as $producto) {
            include RUTA_RAIZ_PHP . '/app/vistas/plantillas/listaProductos/DetalleProductos.php';
        }
    } else {
        echo '<h2 class="m-2 text-danger">No se encontraron productos.</h2>';
    }
}
