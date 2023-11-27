<?php

require_once RUTA_RAIZ_PHP . '/app/modelos/dto/Producto.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dao/ProductoDao.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dto/MetodosVista.php';

class ProductoControlador implements MetodosVista {

    public function cargarVistaCatalogo() {
        mostrarVista('CatalogoProductos', null, null);
    }

    public function cargarVistaLista() {
        mostrarVista('ListaProductos', null, null);
    }

    public function cargarVistaVer() {
        mostrarVista('VerProducto', null, null);
    }

    public function cargarVistaRegistrar() {
        mostrarVista('RegistrarProducto', null, null);
    }

    public function cargarVistaModificar() {
        mostrarVista('ModificarProducto', null, null);
    }

    public function cargarVistaEliminar() {
        mostrarVista('EliminarProducto', null, null);
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