<?php

class CompraControlador {

    public function mostrarProductos($productos) {
        foreach ($productos as $producto) {
            include RUTA_RAIZ_PHP . '/app/vistas/plantillas/compra/InfoCompra.php';
        }
    }
}