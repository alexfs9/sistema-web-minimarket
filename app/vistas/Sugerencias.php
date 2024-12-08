<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Cabeza.php';
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/menu/Menu.php';

?>

<div class="mt-2 mb-2 container">
    <h1 class="text-center text-decoration-underline text-success">Sugerencias / Observaciones</h1>
    <form action="<?php echo RUTA_RAIZ_WEB . '/app/controladores/SugerenciaControlador.php'; ?>" method="post" class="p-2 border border-1 rounded shadow">
        <label for="asunto" class="form-label fw-semibold">Asunto:</label>
        <input type="text" class="mb-3 form-control" id="asunto" name="asunto" maxlength="70" required>
        <label for="sugerencia" class="form-label fw-semibold">Sugerencia u Observación:</label>
        <textarea name="sugerencia" class="mb-3 form-control" id="sugerencia" cols="30" rows="10" style="resize: none;" required></textarea>
        <?php
        $desactivado = '';
        $mensaje = '';
        if (!isset($_SESSION['cuenta'])) {
            $desactivado = 'disabled';
            $mensaje = '<div class="ms-2 form-text">Solo los clientes registrados pueden enviar sugerencias.</div>';
        }
        ?>
        <div class="d-flex align-items-center">
            <input type="submit" class="btn btn-primary btn-lg" name="registrar" value="Enviar sugerencia" <?php echo $desactivado; ?>>
            <?php echo $mensaje; ?>
        </div>
    </form>
</div>

<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Pie.php';

?>
