<?php

$rutaRaizWeb = str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', __DIR__));
$rutaRaizPhp = str_replace('\\', '/', __DIR__);

define('RUTA_RAIZ_WEB', $rutaRaizWeb);
define('RUTA_RAIZ_PHP', $rutaRaizPhp);
