<tr>
    <th scope="col" class="text-danger fw-bold">
        <?php echo $cliente['idCuenta']; ?>
    </th>
    <td class="text-start">
    <img src="<?php echo RUTA_RAIZ_WEB . '/app/vistas/img/perfil/' . $cliente['foto'] ; ?>" alt="<?php echo $cliente['foto']; ?>" class="img-fluid border rounded-circle" style="width: 4rem;"/>
        <?php echo $cliente['nombre']; ?>
    </td>
    <td class="text-primary fw-bold">
        <?php echo $cliente['cantidadCompras']; ?>
    </td>
    <td>
        <?php echo $cliente['ultimaCompra']; ?>
    </td>
    <td class="text-success fw-bold">
        <?php echo 'S/. ' . $cliente['dineroInvertido']; ?>
    </td>
</tr>