<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Cabeza.php';
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/menu/Menu.php';

?>

<div class="mt-2 mb-2 container">
    <h1 class="text-center text-decoration-underline text-primary">Reclamos</h1>
    <form action="<?php echo RUTA_RAIZ_WEB . '/app/controladores/ReclamoControlador.php'; ?>" method="post" class="p-2 border border-1 rounded shadow">
        <label for="reclamo" class="form-label fw-semibold">Reclamo:</label>
        <textarea name="reclamo" class="mb-3 form-control" id="reclamo" cols="30" rows="10" style="resize: none;" required></textarea>
        <?php
        $desactivado = '';
        $mensaje = '';
        if (!isset($_SESSION['cuenta'])) {
            $desactivado = 'disabled';
            $mensaje = '<div class="ms-2 form-text">Solo los clientes registrados pueden enviar reclamos.</div>';
        }
        ?>
        <div class="d-flex align-items-center">
            <input type="submit" class="btn btn-primary btn-lg" name="registrar" value="Enviar reclamo" <?php echo $desactivado; ?>>
            <?php echo $mensaje; ?>
        </div>
    </form>
</div>

<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Pie.php';

?>