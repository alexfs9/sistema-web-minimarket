<?php

require_once '../../Constantes.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dto/Producto.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dao/ProductoDao.php';

$productoDao = new ProductoDao();

if ($_GET['tipo'] == 'registrar') {
    $nombreImagen = $_FILES['imagen']['name'];
    $rutaTemp = $_FILES['imagen']['tmp_name'];
    $rutaFinal = RUTA_RAIZ_PHP . '/app/vistas/img/subidas/';
    $producto = new Producto("", $_POST['nombre'], $_POST['categoria'], $_POST['proveedor'], $_POST['precio'], 
    $_POST['stock'], $_POST['oferta'], $nombreImagen);
    move_uploaded_file($rutaTemp, $rutaFinal . $nombreImagen);
    if($productoDao->registrar($producto)) {
        echo json_encode('registrado');
    } else {
        echo json_encode('error');
    }
} elseif ($_GET['tipo'] == 'modificar') {
    if (!isset($_POST['imagenNueva'])) {
        $rutaFinal = RUTA_RAIZ_PHP . '/app/vistas/img/subidas/';
        unlink($rutaFinal . $_POST['imagenActual']);
        $nombreImagen = $_FILES['imagenNueva']['name'];
        $rutaTemp = $_FILES['imagenNueva']['tmp_name'];
        move_uploaded_file($rutaTemp, $rutaFinal . $nombreImagen);
    } else {
        $nombreImagen = $_POST['imagenActual'];
    }
    $producto = new Producto($_POST['idProducto'], $_POST['nombre'], $_POST['categoria'], $_POST['proveedor'], $_POST['precio'], 
    $_POST['stock'], $_POST['oferta'], $nombreImagen);
    if ($productoDao->modificar($producto)) {
        echo json_encode('modificado');
    } else {
        echo json_encode("error");
    }
}