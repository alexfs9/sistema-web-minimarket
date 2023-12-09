<?php

require_once '../../Constantes.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dao/IngresoDao.php';

$ingresoDao = new IngresoDao();
$respuesta = $ingresoDao->registrar($_POST['nombres'], $_POST['apellidos'], 
$_POST['dni'], $_POST['telefono'], $_POST['correo'], md5($_POST['contrasena']), 2);

if ($respuesta) {
    echo json_encode("registrado");
} else {
    echo json_encode("error");
}
