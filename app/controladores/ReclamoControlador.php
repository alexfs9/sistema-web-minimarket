<?php

require_once '../../Constantes.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dao/ReclamoDao.php';

session_start();

if (isset($_POST['registrar'])) {
    $fecha = date("Y-m-d H:i:s");
    $reclamoDao = new ReclamoDao();
    $reclamoDao->registrar($_SESSION['cuenta']['idCuenta'], $_POST['reclamo'], $fecha);
    header('Location: ' . RUTA_RAIZ_WEB . '/');
}
