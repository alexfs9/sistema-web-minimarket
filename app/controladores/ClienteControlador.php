<?php

require_once RUTA_RAIZ_PHP . '/app/modelos/dao/ClienteDao.php';

class ClienteControlador {

    private $clienteDao;

    public function __construct() {
        $this->clienteDao = new ClienteDao();
    }

    public function consultarCantidadClientes() {
        return $this->clienteDao->obtenerCantidadClientes();
    }

    public function consultarClientes() {
        $clientes = $this->clienteDao->obtenerClientes();
        if (isset($clientes)) {
            foreach ($clientes as $cliente) {
                include RUTA_RAIZ_PHP . '/app/vistas/plantillas/cliente/MiCliente.php';
            }
        } else {
            echo '<h1 class="text-danger-emphasis">Aún no se han registrado clientes.</h1>';
        }
    }
}