<?php
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Cabeza.php';
$tipoUsuario = 'admin';
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/menu/Menu.php';
?>
<div class="mt-3 container bg-white border border-3 border-warning">
    <h1 class="text-center text-primary text-decoration-underline">PRODUCTOS</h1>
    <?php
    require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/Filtros.php';
    ?>
    <div class="mb-1 table-responsive">
        <table class="table table-secondary table-light table-hover align-middle text-center">
            <?php
            $columnas = array('Código', 'Nombre', 'Categoría', 'Proveedor', 'Precio', 'Stock', 'Oferta', 'Imagen', 'Acción');
            require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/tabla/Cabecera.php';
            ?>
            
            <tbody class="table-group-divider">
                <?php
                require_once RUTA_RAIZ_PHP . '/app/controladores/ProductoControlador.php';
                $catalogoControlador = new ProductoControlador();
                $catalogoControlador->cargarProductosLista();
                ?>
            </tbody>
        </table>
    </div>
    <nav aria-label="...">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link">Anterior</a>
            </li>
            <li class="page-item active" aria-current="page">
                <a class="page-link" href="">
                    1
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="">
                    2
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="">
                    3
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="">Siguiente</a>
            </li>
        </ul>
    </nav>
</div>
<?php
$archivosJs = array('filtros');
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Pie.php';
?>