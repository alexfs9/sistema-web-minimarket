<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Cabeza.php';
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/menu/Menu.php';
require_once RUTA_RAIZ_PHP . '/app/controladores/ClienteControlador.php';

$clienteControlador = new ClienteControlador();

const CODIGO_CLIENTE = 'CÓDIGO CLIENTE';
const RUTA_CABECERA = RUTA_RAIZ_PHP . '/app/vistas/plantillas/tabla/Cabecera.php';

?>

<div class="mt-2 mb-2 container">
    <h1 class="text-primary text-decoration-underline text-center">Clientes</h1>
    <div class="mt-2 mb-2 d-flex align-items-center justify-content-between">
        <h3 class="me-2 mb-2 text-warning-emphasis">Clientes registrados</h3>
        <?php
        $desactivado = 'disabled';
        if ($clienteControlador->consultarCantidadClientes() > 0) {
            $desactivado = '';
        }
        ?>
        <form action="<?php echo RUTA_RAIZ_WEB . '/app/controladores/ExportarReceptor.php?tipo=clientes';?>" method="post" id="formulario-clientes">
            <button type="submit" class="btn btn-success fw-semibold" id="exportar-clientes" <?php echo $desactivado; ?>>
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
                $columnas = array(CODIGO_CLIENTE, 'CLIENTE', 'CANTIDAD COMPRAS', 'FEC. ÚLTIMA COMPRA', 'INGRESOS');
                $clase = 'table-warning';
                include RUTA_CABECERA;
                ?>
            </thead>
            <tbody>
                <?php
                $clienteControlador->consultarClientes();
                ?>
            </tbody>
        </table>
    </div>
    <h3 class="me-2 mb-2 text-warning-emphasis">Sugerencias</h3>
    <div class="table-responsive">
        <table class="table align-middle text-center">
            <thead>
                <?php
                $columnas = array('CÓDIGO SUGERENCIA', CODIGO_CLIENTE, 'ASUNTO', 'SUGERENCIA', 'FECHA');
                $clase = 'table-success';
                include RUTA_CABECERA;
                ?>
            </thead>
            <tbody>
                <?php
                $clienteControlador->consultarSugerencias();
                ?>
            </tbody>
        </table>
    </div>
    <h3 class="me-2 mb-2 text-warning-emphasis">RECLAMOS</h3>
    <div class="table-responsive">
        <table class="table align-middle text-center">
            <thead>
                <?php
                $columnas = array('CÓDIGO RECLAMO', CODIGO_CLIENTE, 'RECLAMO', 'FECHA');
                $clase = 'table-danger';
                include RUTA_CABECERA;
                ?>
            </thead>
            <tbody>
                <?php
                $clienteControlador->consultarReclamos();
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Pie.php';

?>
