<?php

require_once RUTA_RAIZ_PHP . '/app/modelos/dto/MetodosVista.php';

class ProveedorControlador implements MetodosVista {

    public function cargarVistaLista() {
        echo 'lista de proveedores';
    }

    public function CargarVistaRegistrar() {
        echo 'registrar proveedor';
    }

    public function cargarVistaModificar() {
        echo 'modificar proveedor - ' . $_GET['id'];
    }

    public function cargarVistaEliminar() {
        echo 'eliminar proveedor - ' . $_GET['id'];
    }
}