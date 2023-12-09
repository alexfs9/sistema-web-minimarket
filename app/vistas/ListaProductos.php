<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Cabeza.php';
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/menu/Menu.php';

?>

<div class="mt-2 mb-2 container">
    <h1 class="text-center text-primary text-decoration-underline">PRODUCTOS</h1>
    <div class="mb-1 d-flex flex-column">
        <a href="<?php echo RUTA_RAIZ_WEB . '/productos/registrar'; ?>" class="mb-2 btn btn-secondary">
            <i class="fa-solid fa-plus fa-xl" style="color: #ffffff;"></i>
            Registrar producto
        </a>
    </div>
    <?php
    require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/Filtros.php';
    ?>
    <div class="mb-1 table-responsive">
        <table class="table table-hover align-middle text-center">
            <?php
            $columnas = array('Código', 'Nombre', 'Categoría', 'Proveedor', 'Precio', 'Stock', 'Oferta', 'Imagen', 'Acción');
            $clase = 'table-info';
            require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/tabla/Cabecera.php';
            ?>
            <tbody class="table-group-divider" id="contenedor-productos">
                <?php
                require_once RUTA_RAIZ_PHP . '/app/controladores/ProductoControlador.php';
                $catalogoControlador = new ProductoControlador();
                $catalogoControlador->cargarProductosLista();
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Pie.php';

?>