<?php

require_once RUTA_RAIZ_PHP . '/app/modelos/dao/ClienteDao.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dao/SugerenciaDao.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dao/ReclamoDao.php';

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

    public function consultarSugerencias() {
        $sugerenciaDao = new SugerenciaDao();
        $sugerencias = $sugerenciaDao->obtenerSugerencias();
        if (isset($sugerencias)) {
            foreach ($sugerencias as $sugerencia) {
                include RUTA_RAIZ_PHP . '/app/vistas/plantillas/cliente/MiSugerencia.php';
            }
        } else {
            echo '<h1 class="text-danger-emphasis">Aún no se han recibido sugerencias.</h1>';
        }
    }

    public function consultarReclamos() {
        $reclamoDao = new ReclamoDao();
        $reclamos = $reclamoDao->obtenerReclamos();
        if (isset($reclamos)) {
            foreach ($reclamos as $reclamo) {
                include RUTA_RAIZ_PHP . '/app/vistas/plantillas/cliente/MiReclamo.php';
            }
        } else {
            echo '<h1 class="text-danger-emphasis">Aún no se han recibido reclamos.</h1>';
        }
    }
}
