<?php

require_once '../../Constantes.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dao/IngresoDao.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dao/CuentaDao.php';

$correo = $_POST["correo"];
$contrasena = $_POST["contrasena"];

$ingresoDao = new IngresoDao();

$respuesta = $ingresoDao->iniciarSesion($correo, md5($contrasena));
if ($respuesta == 1) {
    session_start();
    $cuentaDao = new CuentaDao();
    $_SESSION['cuenta'] = $cuentaDao->obtenerCuenta($correo, md5($contrasena));
}

echo json_encode($respuesta);