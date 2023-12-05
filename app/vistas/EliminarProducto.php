<?php

require_once RUTA_RAIZ_PHP . '/app/modelos/dao/ProductoDao.php';

$productoDao = new ProductoDao();
$producto = $productoDao->consultar($_GET['id']);
unlink(RUTA_RAIZ_PHP . '/app/vistas/img/subidas/' . $producto->getImagen());
if ($productoDao->eliminar($_GET['id'])) {
    header('Location: ' . RUTA_RAIZ_WEB . '/productos');
}