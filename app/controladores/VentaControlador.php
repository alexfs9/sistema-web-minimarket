<?php

require_once RUTA_RAIZ_PHP . '/app/modelos/dao/VentaDao.php';

class VentaControlador {

    private $ventaDao;

    public function __construct() {
        $this->ventaDao = new VentaDao();
    }

    public function consultarCantidadVentas() {
        return $this->ventaDao->obtenerCantidadVentas();
    }

    public function consultarVentas() {
        $ventas = $this->ventaDao->obtenerVentas();
        if (isset($ventas)) {
            foreach ($ventas as $venta) {
                include RUTA_RAIZ_PHP . '/app/vistas/plantillas/venta/MiVenta.php';
            }
        } else {
            echo '<h1 class="text-danger-emphasis">Aún no ha realizado ventas.</h1>';
        }
    }

    public function consultarProductos() {
        $productos = $this->ventaDao->obtenerProductos();
        if (isset($productos)) {
            foreach ($productos as $producto) {
                include RUTA_RAIZ_PHP . '/app/vistas/plantillas/venta/MiProducto.php';
            }
        } else {
            echo '<h1 class="text-danger-emphasis">Aún no ha realizado ventas.</h1>';
        }
    }
}