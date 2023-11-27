<?php

require_once RUTA_RAIZ_PHP . '/app/modelos/dto/MetodosVista.php';

class ProveedorControlador implements MetodosVista {

    public function cargarVistaLista() {
        mostrarVista('ListaProveedores', null, null);
    }

    public function CargarVistaRegistrar() {
        mostrarVista('RegistrarProveedor', null, null);
    }

    public function cargarVistaModificar() {
        mostrarVista('ModificarProveedor', null, null);
    }

    public function cargarVistaEliminar() {
        mostrarVista('EliminarProveedor', null, null);
    }
}