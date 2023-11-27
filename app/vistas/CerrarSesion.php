<?php

session_start();

session_unset();

session_destroy();

header('Location: ' . RUTA_RAIZ_WEB . '/');

exit();