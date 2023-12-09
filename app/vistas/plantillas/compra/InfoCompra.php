<tr>
    <td class="text-start">
        <img class="me-1 img-fluid border rounded" src="<?php echo RUTA_RAIZ_WEB . '/app/vistas/img/subidas/' . $producto['imagen']; ?>" alt="<?php echo $producto['imagen']; ?>" style="width: 4rem; height: auto;">
        <?php echo $producto['nombre']; ?>
    </td>
    <td>
        <?php echo $producto['cantidad']; ?>
    </td>
    <td class="text-success fw-bold">
        <?php echo $producto['subtotal']; ?>
    </td>
</tr>