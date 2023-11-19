<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href=<?php echo '"' . RUTA_RAIZ_WEB . '/"';?>>
            <img src="app/vistas/img/aplicacion/icono.png" alt="Logo" width="34" height="38" class="d-inline-block align-text-middle">
            Minimarket San José
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <?php
                if ($tipoUsuario == 'cliente') {
                    require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/menu/MenuCliente.php';
                } else {
                    require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/menu/MenuAdmin.php';
                }
                ?>
            </div>
        </div>
    </div>
</nav>