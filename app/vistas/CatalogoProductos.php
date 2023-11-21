<?php
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Cabeza.php';
$tipoUsuario = 'cliente';
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/menu/Menu.php';
?>
<div class="mt-2 container">
    <h1 class="text-center text-primary">Productos</h1>
    <?php
    require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/Filtros.php';
    ?>
    <div class="border rounded-3 border-info shadow-lg">
        <div class="d-flex flex-row flex-wrap justify-content-around">
            <?php
            require_once RUTA_RAIZ_PHP . '/app/controladores/ProductoControlador.php';
            $catalogoControlador = new ProductoControlador();
            $catalogoControlador->cargarProductosCatalogo();
            ?>
        </div>
    </div>
</div>
<?php
$archivosJs = array('filtros');
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Pie.php';
?>