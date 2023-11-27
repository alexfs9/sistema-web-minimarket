<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href=<?php echo '"' . RUTA_RAIZ_WEB . '/"';?>>
            <img src=<?php echo '"' . RUTA_RAIZ_WEB . '/app/vistas/img/aplicacion/icono.png"';?> alt="Logo" width="34" height="38" class="d-inline-block align-text-middle">
            Minimarket Don José
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">

                <?php

                if (esAdmin()) {
                    require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/menu/MenuAdmin.php';
                } else {
                    require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/menu/MenuCliente.php';
                }

                ?>

            </div>
        </div>
        <a href=<?php echo '"' . RUTA_RAIZ_WEB . '/carrito"'; ?> class="ms-auto d-none d-lg-block btn btn-warning rounded-pill text-white" style="margin-right: 5px;">
            <i class="fa-solid fa-cart-shopping fa-xl" style="color: #ffffff;"></i>
            Carrito
        </a>
        <?php
        
        if (isset($_SESSION['cuenta'])) {
            echo '<a href="' . RUTA_RAIZ_WEB . '/mi-perfil" class="ms-auto d-none d-lg-block btn btn-info rounded-pill text-white" style="margin-right: 5px;">';
            echo '<img class="img-fluid rounded-circle border border-2 border-dark" src="' . RUTA_RAIZ_WEB . '/app/vistas/img/perfil/' . $_SESSION['cuenta']['foto'] . '" alt="foto perfil" style="width: 1.5rem; height: 1.5rem; margin-right: 3px;">';
            echo 'Mi perfil';
            echo '</a>';
            echo '<a href="' . RUTA_RAIZ_WEB . '/cerrar-sesion" class="ms-auto d-none d-lg-block btn btn-danger rounded-pill">';
            echo '<i class="fa-solid fa-arrow-right-from-bracket fa-xl" style="color: #ffffff; margin-right: 3px;"></i>';
            echo 'Cerrar Sesión';
            echo '</a>';
        } else {
            echo '<a href="' . RUTA_RAIZ_WEB . '/iniciar-sesion" class="ms-auto d-none d-lg-block btn btn-success rounded-pill">';
            echo '<i class="fa-solid fa-right-to-bracket fa-xl" style="color: #ffffff; margin-right: 3px;"></i>';
            echo 'Iniciar Sesión';
            echo '</a>';
        }
        
        ?>
    </div>
</nav>
<div class="d-lg-none position-fixed bottom-0 end-0 m-3 d-flex flex-column">
    <a href=<?php echo '"' . RUTA_RAIZ_WEB . '/carrito"'; ?> class="mb-2 btn btn-warning btn-lg rounded-circle">
        <i class="fa-solid fa-cart-shopping fa-xl" style="color: #ffffff;"></i>
    </a>
    <?php
    
    if (isset($_SESSION['cuenta'])) {
        echo '<a href="' . RUTA_RAIZ_WEB . '/mi-perfil" class="mb-2 btn btn-info btn-lg rounded-circle d-flex justify-content-center">';
        echo '<img class="img-fluid rounded-circle border border-2 border-dark" src="' . RUTA_RAIZ_WEB . '/app/vistas/img/perfil/' . $_SESSION['cuenta']['foto'] . '" alt="foto perfil" style="width: 2rem; height: 2rem; margin-right: 3px;">';
        echo '</a>';
        echo '<a href="' . RUTA_RAIZ_WEB . '/cerrar-sesion" class="btn btn-danger btn-lg rounded-circle">';
        echo '<i class="fa-solid fa-arrow-right-from-bracket fa-xl" style="color: #ffffff; margin-right: 3px;"></i>';
        echo '</a>';
    } else {
        echo '<a href="' . RUTA_RAIZ_WEB . '/iniciar-sesion" class="btn btn-success btn-lg rounded-circle">';
        echo '<i class="fa-solid fa-right-to-bracket fa-xl" style="color: #ffffff;"></i>';
        echo '</a>';
    }
    
    ?>
</div>