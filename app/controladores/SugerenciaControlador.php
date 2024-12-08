<?php

require_once '../../Constantes.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dao/SugerenciaDao.php';

session_start();

if (isset($_POST['registrar'])) {
    $fecha = date("Y-m-d H:i:s");
    $sugerenciaDao = new SugerenciaDao();
    $sugerenciaDao->registrar($_SESSION['cuenta']['idCuenta'], $_POST['asunto'], $_POST['sugerencia'], $fecha);
    header('Location: ' . RUTA_RAIZ_WEB . '/');
}
