<?php

$rutaRaizWeb = str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', __DIR__));
$rutaRaizPhp = str_replace('\\', '/', __DIR__);

define('RUTA_RAIZ_WEB', $rutaRaizWeb);
define('RUTA_RAIZ_PHP', $rutaRaizPhp);

require_once RUTA_RAIZ_PHP . '/app/modelos/dto/Cuenta.php';

if (isset($_SESSION['cuenta'])) {
    $cuenta = new Cuenta($_SESSION['cuenta']['idCuenta'], 
        $_SESSION['cuenta']['dni'], $_SESSION['cuenta']['nombres'], 
        $_SESSION['cuenta']['apellidos'], $_SESSION['cuenta']['fechaNacimiento'], 
        $_SESSION['cuenta']['telefono'], $_SESSION['cuenta']['correo'], 
        $_SESSION['cuenta']['contrasena'], $_SESSION['cuenta']['foto'], 
        $_SESSION['cuenta']['rol']);
    define('CUENTA_ACTUAL', $cuenta);
}