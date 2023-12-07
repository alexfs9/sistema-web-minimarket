<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Cabeza.php';
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/menu/Menu.php';

$productoDao = new ProductoDao();
$idProducto = explode('-', $_GET['nombre'])[0];
$producto = $productoDao->consultar($idProducto);

?>

<div class="container p-2">
    <h1 class="text-center text-primary text-decoration-underline">Productos</h1>
    <div class="d-flex flex-column flex-sm-row justify-content-center">
        <div class="position-relative me-3 order-1 order-sm-1">
            <?php
            if ($producto->getOferta() != 0) {
                echo '<span class="badge rounded-pill text-bg-info position-absolute top-0 end-0 me-3 mt-3 fs-2">-' . $producto->getOferta() . '%</span>';
            }
            ?>
            <img class="img-fluid border border-1 rounded rounded-3 shadow" src="<?php echo RUTA_RAIZ_WEB . '/app/vistas/img/subidas/' . $producto->getImagen(); ?>" alt="<?php echo $producto->getImagen(); ?>" style="width: 35rem; height: auto;">
        </div>
        <div class="p-1 order-2 order-sm-1">
            <h2 class="mt-3">
                <?php echo $producto->getNombre(); ?>
            </h2>
            <div class="mt-2 d-flex">
                <?php
                if ($producto->getOferta() != 0) {
                    $precioNuevo = $producto->calcularPrecioOferta();
                    echo '<p class="card-text text-secondary text-decoration-line-through fw-semibold fs-3">S/. ' . $producto->getPrecio() . '</p>';
                    echo '<p class="ms-3 card-text text-success fw-semibold fs-3" id="precio-' . $producto->getIdProducto() . '">S/. ' . $precioNuevo . '</p>';
                } else {
                    echo '<p class="card-text text-success fw-semibold fs-3" id="precio-' . $producto->getIdProducto() . '">S/. ' . $producto->getPrecio() . '</p>';
                }
                ?>
            </div>
            <?php
            if ($producto->getStock() == 0) {
                echo '<p class="text-danger-emphasis fs-3">Agotado</p>';
            } else {
                echo '<p class="text-info-emphasis fs-3">Disponible</p>';
                echo '<div class="d-flex">';
                echo '<div class="me-2 input-group">';
                $productoControlador = new ProductoControlador();
                $productoControlador->cargarCantidad($producto->getIdProducto(), null, $producto->getStock(), 'lg');
                echo '</div>';
                echo '<input type="button" value="Añadir al carrito" id="agregar-' . $producto->getIdProducto() . '" onclick="agregarEnCarrito(' . $producto->getIdProducto() .')" class="btn btn-primary btn-lg"/>';
                echo '</div>';
            }
            ?>
            <hr class="border border-1 border-secondary">
            <div class="d-flex">
                <p class="me-2 fs-3 text-info-emphasis">
                    Categoría:
                </p>
                <p class="fs-3">
                    <?php
                    echo $producto->getCategoria();
                    ?>
                </p>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-danger btn-lg" id="regresar">Regresar</button>
            </div>
        </div>
    </div>
    <input type="hidden" id="ruta" value="<?php echo RUTA_RAIZ_WEB; ?>">
</div>

<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Pie.php';

?>