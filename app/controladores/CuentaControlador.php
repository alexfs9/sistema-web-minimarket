<?php

require_once RUTA_RAIZ_PHP . '/app/modelos/dao/CuentaDao.php';

class CuentaControlador {

    private $cuentaDao;

    public function __construct() {
        $this->cuentaDao = new CuentaDao();
    }

    public function consultarCompras() {
        $compras = $this->cuentaDao->obtenerCompras($_SESSION['cuenta']['idCuenta']);
        if (isset($compras)) {
            foreach ($compras as $compra) {
                include RUTA_RAIZ_PHP . '/app/vistas/plantillas/cuenta/MiCompra.php';
            }
        } else {
            echo '<h1 class="text-danger-emphasis">Aún no ha realizado compras.</h1>';
        }
    }

    public function consultarSugerencias() {
        $sugerencias = $this->cuentaDao->obtenerSugerencias($_SESSION['cuenta']['idCuenta']);
        if (isset($sugerencias)) {
            foreach ($sugerencias as $sugerencia) {
                include RUTA_RAIZ_PHP . '/app/vistas/plantillas/cuenta/MiSugerencia.php';
            }
        } else {
            echo '<h1 class="text-danger-emphasis">Aún no ha realizado sugerencias.</h1>';
        }
    }

    public function consultarReclamos() {
        $reclamos = $this->cuentaDao->obtenerReclamos($_SESSION['cuenta']['idCuenta']);
        if (isset($reclamos)) {
            foreach ($reclamos as $reclamo) {
                include RUTA_RAIZ_PHP . '/app/vistas/plantillas/cuenta/MiReclamo.php';
            }
        } else {
            echo '<h1 class="text-danger-emphasis">Aún no ha realizado reclamos.</h1>';
        }
    }
}
