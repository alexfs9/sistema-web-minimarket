<tr>
    <th scope="col">
        <?php echo $compra['idVenta']; ?>
    </th>
    <td>
        <?php echo $compra['fecha']; ?>
    </td>
    <td>
        <?php echo $compra['tipoPago']; ?>
    </td>
    <td>
        <?php echo $compra['tipoEntrega']; ?>
    </td>
    <td>
        <?php echo $compra['direccion']; ?>
    </td>
    <td class="text-warning-emphasis fw-bold">
        <?php echo 'S/. ' . $compra['precioTotal']; ?>
    </td>
</tr>