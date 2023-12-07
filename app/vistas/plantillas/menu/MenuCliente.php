<?php
if (!empty($_GET['vista'])) {
    $linkPrincipal = array_fill(0, 3, RUTA_RAIZ_WEB . '/');
} else {
    $linkPrincipal = array('#nosotros', '#contactanos', '#ubicanos');
}
?>
<a class="nav-link" href="<?php echo $linkPrincipal[0]; ?>">
    <img src=<?php echo '"' . RUTA_RAIZ_WEB . '/app/vistas/img/aplicacion/quienesSomos.png"'; ?> class="img-fluid" alt="quienes somos"/>
    ¿Quiénes somos?
</a>
<a class="nav-link" href="<?php echo $linkPrincipal[1]; ?>">
    <img src=<?php echo '"' . RUTA_RAIZ_WEB . '/app/vistas/img/aplicacion/contactanos.png"'; ?> class="img-fluid" alt="contactanos"/>
    Contáctanos
</a>
<a class="nav-link" href="<?php echo $linkPrincipal[2]; ?>">
    <img src=<?php echo '"' . RUTA_RAIZ_WEB . '/app/vistas/img/aplicacion/ubicanos.png"'; ?> class="img-fluid" alt="ubicanos"/>
    Ubícanos
</a>
<a class="nav-link" href="<?php echo RUTA_RAIZ_WEB . '/productos'; ?>">
    <img src=<?php echo '"' . RUTA_RAIZ_WEB . '/app/vistas/img/aplicacion/productos.png"'; ?> class="img-fluid" alt="productos"/>
    Productos
</a>
<a class="nav-link" href="<?php echo RUTA_RAIZ_WEB . '/sugerencias'; ?>">
    <img src=<?php echo '"' . RUTA_RAIZ_WEB . '/app/vistas/img/aplicacion/sugerencias.png"'; ?> class="img-fluid" alt="sugerencias"/>
    Sugerencias
</a>
<a class="nav-link" href="<?php echo RUTA_RAIZ_WEB . '/reclamaciones'; ?>">
    <img src=<?php echo '"' . RUTA_RAIZ_WEB . '/app/vistas/img/aplicacion/reclamaciones.png"'; ?> class="img-fluid" alt="reclamaciones"/>
    Reclamaciones
</a>