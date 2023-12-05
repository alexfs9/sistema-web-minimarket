<div class="mt-1 mb-1 card" id="<?php echo 'producto-' . $producto['idProducto']; ?>" style="width: 17rem;">
    <div class="position-relative">
        <?php
        if ($producto['oferta'] != 0) {
            echo '<span class="badge rounded-pill text-bg-info position-absolute top-0 start-0 ms-2 mt-2 fs-3">-' . $producto['oferta'] . '%</span>';
        }
        if ($producto['stock'] == 0) {
            echo '<span class="badge rounded-pill text-bg-danger position-absolute top-50 start-50 translate-middle fs-3">Agotado</span>';
        }
        ?>
        <img class="card-img-top" src="<?php echo RUTA_RAIZ_WEB . '/app/vistas/img/subidas/' . $producto['imagen']; ?>" alt="<?php echo $producto['imagen']; ?>">
    </div>
    <div class="card-body d-flex flex-column justify-content-between">
        <div class="d-flex flex-column"></div>
        <h5 class="card-title text-center">
            <?php echo $producto['nombre']; ?>
        </h5>
        <div class="d-flex flex-row justify-content-evenly fs-5">
            <?php
            if ($producto['oferta'] != 0) {
                $oferta = $producto['precio'] * $producto['oferta'];
                $precioNuevo = $producto['precio'] - ($oferta / 100);
                $precioNuevo = round($precioNuevo, 2);
                echo '<p class="card-text text-secondary text-decoration-line-through fw-semibold">S/. ' . $producto['precio'] . '</p>';
                echo '<p class="card-text text-success fw-semibold">S/. ' . $precioNuevo . '</p>';
            } else {
                echo '<p class="card-text text-success fw-semibold">S/. ' . $producto['precio'] . '</p>';
            }
            ?>
        </div>
        <div class="mt-1 d-flex flex-row justify-content-evenly">
            <?php
            if ($producto['stock'] == 0) {
                $desactivado = 'disabled';
            } else {
                $desactivado = '';
            }
            ?>
            <div class="me-2 input-group">
                <?php
                $productoControlador = new ProductoControlador();
                $productoControlador->cargarCantidad($producto['idProducto'], $producto['stock'], 'sm');
                ?>
            </div>
            <input type="button" value="Añadir al carrito" class="btn btn-primary btn-sm" <?php echo $desactivado; ?>/>
        </div>
    </div>
    <?php
    $tildes = array('á', 'é', 'í', 'ó', 'ú', 'ü', 'ñ', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ü', 'Ñ');
    $sinTildes = array('a', 'e', 'i', 'o', 'u', 'u', 'n', 'A', 'E', 'I', 'O', 'U', 'U', 'N');
    $nombreIdeal = str_replace(' ', '-', strtolower($producto['nombre']));
    $nombreIdeal = str_replace(['[', ']'], '', $nombreIdeal);
    $nombreIdeal = str_replace('.', '-', $nombreIdeal);
    $nombreIdeal = str_replace(',', '', $nombreIdeal);
    $nombreIdeal = strtr($nombreIdeal, array_combine($tildes, $sinTildes));
    ?>
    <a href="<?php echo RUTA_RAIZ_WEB . '/productos/ver/' . $producto['idProducto'] . '-' . $nombreIdeal; ?>" class="m-2 mt-0 btn btn-warning btn-sm">
        Ver
    </a>
</div>