<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Cabeza.php';
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/menu/Menu.php';

?>

<div class="mt-2 mb-2 container">
    <h1 class="text-center text-decoration-underline text-primary">Carrito de compras</h1>
    <?php
    require_once RUTA_RAIZ_PHP . '/app/controladores/CarritoControlador.php';
    if (isset($_SESSION['carrito']) && (count($_SESSION['carrito']) > 0)) {
        $carritoControlador = new CarritoControlador();
        $carritoDao = new CarritoDao();
        $productos = $carritoControlador->consultarProductos();
        ?>
        <div class="p-2 row">
            <div class="col-12 col-md-9">
                <div class="mb-1 table-responsive">
                    <table class="table align-middle text-center">
                        <?php
                        $columnas = array('', 'NOMBRE', 'PRECIO (Uni.)', 'CANTIDAD', 'SUBTOTAL');
                        $clase = 'table-warning';
                        require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/tabla/Cabecera.php';
                        ?>
                        <tbody class="table-group-divider" id="contenedor-productos-carrito">
                            <?php
                            require_once RUTA_RAIZ_PHP . '/app/controladores/ProductoControlador.php';
                            $carritoControlador->mostrarProductos($productos);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <h2 class="text-info-emphasis">Total del carrito</h2>
                <div class="d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="fs-4 text-danger-emphasis">Total:</p>
                        <p class="fs-3 fw-bold text-success" id="precio-total">S/.</p>
                    </div>
                    <button type="button" class="btn btn-success btn-lg" <?php if (isset($_SESSION['cuenta'])) { echo ''; } else { echo 'disabled'; } ;?>>
                        <i class="fa-solid fa-money-check-dollar fa-xl" style="color: #ffffff;"></i>
                        Realizar compra
                    </button>
                    <?php
                    if (!isset($_SESSION['cuenta'])) {
                        echo '<div class="form-text">Inicie sesión para realizar la compra.</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <input type="hidden" id="ruta" value="<?php echo RUTA_RAIZ_WEB; ?>">
        <?php
    } else {
        echo '<h2 class="text-danger">El carrito está vacío.</h2>';
    }
    ?>
</div>

<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Pie.php';

?>