<?php

require_once RUTA_RAIZ_PHP . '/app/modelos/dao/CarritoDao.php';

class CarritoControlador {
    
    public function vacio() {
        if (isset($_SESSION['carrito'])) {
            if (count($_SESSION['carrito']) == 0) {
                return true;
            }
            return false;
        }
        return true;
    }

    public function estaAgregado($idProducto) {
        foreach ($_SESSION['carrito'] as $elemento) {
            if ($elemento['idProducto'] == $idProducto) {
                return true;
            }
        }
        return false;
    }

    public function calcularPrecioTotal() {
        $precioTotal = 0;
        foreach ($_SESSION['carrito'] as $producto) {
            $precioTotal += $producto['subtotal'];
        }
        return round($precioTotal, 2);
    }

    public function agregarProducto($idProducto, $cantidad, $precio, $stock) {
        $_SESSION['carrito'][] = array(
            'idProducto' => $idProducto, 
            'cantidad' => $cantidad, 
            'precio' => $precio,
            'stock' => $stock, 
            'subtotal' => ($cantidad * $precio)
        );
    }

    private function buscarProducto($idProducto) {
        foreach ($_SESSION['carrito'] as $elemento) {
            if ($elemento['idProducto'] == $idProducto) {
                $producto = $elemento;
            }
        }
        return array_search($producto, $_SESSION['carrito']);
    }

    public function actualizarProducto($idProducto, $cantidad, $subtotal) {
        $indice = $this->buscarProducto($idProducto);
        $_SESSION['carrito'][$indice]['cantidad'] = $cantidad;
        $_SESSION['carrito'][$indice]['subtotal'] = $subtotal;
    }

    public function eliminarProducto($idProducto) {
        $indice = $this->buscarProducto($idProducto);
        unset($_SESSION['carrito'][$indice]);
    }

    public function consultarProductos() {
        $carritoDao = new CarritoDao();
        $productos = [];
        foreach ($_SESSION['carrito'] as $elemento) {
            $producto = $carritoDao->buscarProducto($elemento['idProducto']);
            $elemento['nombre'] = $producto['nombre'];
            $elemento['imagen'] = $producto['imagen'];
            $productos[] = $elemento;
        }
        return $productos;
    }

    public function mostrarProductos($productos) {
        foreach($productos as $producto) {
            include RUTA_RAIZ_PHP . '/app/vistas/plantillas/carrito/CarritoProducto.php';
        }
    }
}
