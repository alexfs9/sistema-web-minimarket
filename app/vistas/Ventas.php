<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Cabeza.php';
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/menu/Menu.php';
require_once RUTA_RAIZ_PHP . '/app/controladores/VentaControlador.php';

$ventaControlador = new VentaControlador();

?>

<div class="mt-2 mb-2 container">
    <h1 class="text-primary text-decoration-underline text-center">Ventas</h1>
    <div class="mb-2 d-flex align-items-center justify-content-between">
        <h3 class="me-2 text-info-emphasis">Ventas realizadas</h3>
        <?php
        $desactivado = 'disabled';
        if ($ventaControlador->consultarCantidadVentas() > 0) {
            $desactivado = '';
        }
        ?>
        <form action="<?php echo RUTA_RAIZ_WEB . '/app/controladores/ExportarReceptor.php?tipo=ventas';?>" method="post" id="formulario-ventas">
            <button type="submit" class="btn btn-success fw-semibold" id="exportar-ventas" <?php echo $desactivado; ?>>
                <i class="fa-solid fa-file-excel fa-xl" style="color: #ffffff;"></i>
                Exportar a Excel
            </button>
        </form>
        <?php
        if ($desactivado != '') {
            echo '<div class="ms-2 form-text" id="mensaje-ventas">No hay datos para exportar.</div>';
        }
        ?>
    </div>
    <div class="table-responsive">
        <table class="table align-middle text-center">
            <thead>
                <?php
                $columnas = array('CÓDIGO VENTA', 'CÓDIGO CLIENTE', 'FECHA', 'TIPO PAGO', 'TIPO ENTREGA', 'DIRECCIÓN', 'PRECIO TOTAL');
                $clase = 'table-light';
                include RUTA_RAIZ_PHP . '/app/vistas/plantillas/tabla/Cabecera.php';
                ?>
            </thead>
            <tbody>
                <?php
                $ventaControlador->consultarVentas();
                ?>
            </tbody>
        </table>
    </div>
    <div class="mt-2 mb-2 d-flex align-items-center justify-content-between">
        <h3 class="me-2 mb-2 text-warning-emphasis">Productos vendidos</h3>
        <?php
        $desactivado = 'disabled';
        if ($ventaControlador->consultarCantidadVentas() > 0) {
            $desactivado = '';
        }
        ?>
        <form action="<?php echo RUTA_RAIZ_WEB . '/app/controladores/ExportarReceptor.php?tipo=productos';?>" method="post" id="formulario-productos">
            <button type="submit" class="btn btn-success fw-semibold" id="exportar-productos" <?php echo $desactivado; ?>>
                <i class="fa-solid fa-file-excel fa-xl" style="color: #ffffff;"></i>
                Exportar a Excel
            </button>
        </form>
        <?php
        if ($desactivado != '') {
            echo '<div class="ms-2 form-text" id="mensaje-productos">No hay datos para exportar.</div>';
        }
        ?>
    </div>
    <div class="table-responsive">
        <table class="table align-middle text-center">
            <thead>
                <?php
                $columnas = array('CÓDIGO PRODUCTO', 'PRODUCTO', 'CANTIDAD VENDIDA', 'INGRESO');
                $clase = 'table-info';
                include RUTA_RAIZ_PHP . '/app/vistas/plantillas/tabla/Cabecera.php';
                ?>
            </thead>
            <tbody>
                <?php
                $ventaControlador->consultarProductos();
                ?>
            </tbody>
        </table>
    </div>
    <input type="hidden" id="ruta" value="<?php echo RUTA_RAIZ_WEB; ?>">
</div>

<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Pie.php';

?>