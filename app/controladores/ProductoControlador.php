<?php

require_once RUTA_RAIZ_PHP . '/app/modelos/dto/Producto.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dao/ProductoDao.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dto/MetodosVista.php';

class ProductoControlador implements MetodosVista {

    public function cargarVistaCatalogo() {
        require_once RUTA_RAIZ_PHP . '/app/vistas/CatalogoProductos.php';
    }

    public function cargarVistaLista() {
        require_once RUTA_RAIZ_PHP . '/app/vistas/ListaProductos.php';
    }

    public function cargarVistaVer() {
        echo 'info. de: ' . $_GET['nombre'];
    }

    public function cargarVistaRegistrar() {
        echo 'registro de producto';
    }

    public function cargarVistaModificar() {
        echo 'modificar producto - ' . $_GET['id'];
    }

    public function cargarVistaEliminar() {
        echo 'eliminar producto - ' . $_GET['id'];
    }

    public function cargarProductosCatalogo() {
        $productoDao = new ProductoDao();
        $productos = $productoDao->catalogar();
        foreach ($productos as $producto) {
            include RUTA_RAIZ_PHP . '/app/vistas/plantillas/catalogo/InfoProducto.php';
        }
    }

    public function cargarProductosLista() {
        $productoDao = new ProductoDao();
        $productos = $productoDao->listar();
        foreach ($productos as $producto) {
            include RUTA_RAIZ_PHP . '/app/vistas/plantillas/listaProductos/DetalleProductos.php';
        }
    }
}