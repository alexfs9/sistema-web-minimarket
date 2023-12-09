<tr>
    <th scope="col" class="text-primary fw-bold">
        <?php echo $venta['idVenta']; ?>
    </th>
    <td class="text-danger fw-bold">
        <?php echo $venta['idCuenta']; ?>
    </td>
    <td>
        <?php echo $venta['fecha']; ?>
    </td>
    <td>
        <?php echo $venta['tipoPago']; ?>
    </td>
    <td>
        <?php echo $venta['tipoEntrega']; ?>
    </td>
    <td>
        <?php echo $venta['direccion']; ?>
    </td>
    <td class="text-success fw-bold">
        <?php echo 'S/. ' . $venta['precioTotal']; ?>
    </td>
</tr>