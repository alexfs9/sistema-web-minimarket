<?php

require_once '../../Constantes.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dao/IngresoDao.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dao/CuentaDao.php';

$correo = $_POST["correo"];
$contrasena = $_POST["contrasena"];

$ingreso = new IngresoDao();

if ($ingreso->conectar() == 1) {
    $respuesta = $ingreso->iniciarSesion($correo, md5($contrasena));
    session_start();
    $cuentaDao = new CuentaDao();
    $_SESSION['cuenta'] = $cuentaDao->obtenerCuenta($correo, md5($contrasena));
} else {
    $respuesta = "error";
}

echo json_encode($respuesta);
