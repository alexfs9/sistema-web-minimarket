<?php

require_once RUTA_RAIZ_PHP . '/app/modelos/dto/Producto.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dao/ProductoDao.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dto/MetodosVista.php';

class ProductoControlador implements MetodosVista {

    public function cargarVistaCatalogo() {
        mostrarVista('CatalogoProductos', array('catalogoProductos'), array('filtrarCatalogo', 'cantidadProducto'));
    }

    public function cargarVistaLista() {
        mostrarVista('ListaProductos', null, array('filtrarLista'));
    }

    public function cargarVistaVer() {
        mostrarVista('VerProducto', null, array('cantidadProducto', 'verProducto'));
    }

    public function cargarVistaRegistrar() {
        mostrarVista('RegistrarProducto', null, array('registrarProducto'));
    }

    public function cargarVistaModificar() {
        mostrarVista('ModificarProducto', null, array('registrarProducto', 'modificarProducto'));
    }

    public function cargarVistaEliminar() {
        mostrarVista('EliminarProducto', null, null);
    }

    public function cargarCantidad($idProducto, $stock, $tamano) {
        include RUTA_RAIZ_PHP . '/app/vistas/plantillas/producto/Cantidad.php';
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