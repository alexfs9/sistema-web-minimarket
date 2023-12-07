<tr>
    <td>
        <button type="button" class="btn-close" id="eliminar-<?php echo $producto['idProducto']; ?>" aria-label="Eliminar" onclick="eliminarEnCarrito(<?php echo $producto['idProducto']; ?>)"></button>
    </td>
    <td class="text-start">
        <img class="me-2 img-fluid border rounded" src="<?php echo RUTA_RAIZ_WEB . '/app/vistas/img/subidas/' . $producto['imagen']; ?>" alt="<?php echo $producto['imagen']; ?>" style="width: 4rem; height: auto;">
        <?php echo $producto['nombre']; ?>
    </td>
    <td id="precio-<?php echo $producto['idProducto']; ?>">
        <?php echo $producto['precio']; ?>
    </td>
    <td>
        <div class="me-2 input-group">
        <?php
        $productoControlador = new ProductoControlador();
        $productoControlador->cargarCantidad($producto['idProducto'], $producto['cantidad'], $producto['stock'], 'sm');
        ?>
        </div>
    </td>
    <td class="text-success fw-bold" id="subtotal-<?php echo $producto['idProducto']; ?>">
        <?php echo $producto['cantidad'] * $producto['precio']; ?>
    </td>
</tr>