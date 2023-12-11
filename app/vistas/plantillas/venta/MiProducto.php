<tr>
    <th scope="col" class="text-info-emphasis fw-bold">
        <?php echo $producto['idProducto']; ?>
    </th>
    <td class="text-start">
        <img src="<?php echo RUTA_RAIZ_WEB . '/app/vistas/img/subidas/' . $producto['imagen'] ; ?>" alt="<?php echo $producto['imagen']; ?>" class="img-fluid border rounded" style="width: 4rem;"/>
        <?php echo $producto['nombre']; ?>
    </td>
    <td class="text-danger fw-bold">
        <?php echo $producto['cantidadVendida']; ?>
    </td>
    <td class="text-success fw-bold">
        <?php echo 'S/.' . $producto['ingreso']; ?>
    </td>
</tr>