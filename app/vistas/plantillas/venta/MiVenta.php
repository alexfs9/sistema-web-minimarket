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
    <td>
        <form action="<?php echo RUTA_RAIZ_WEB . '/app/controladores/BoletaGenerador.php'; ?>" method="post" target="_blank">
            <input type="hidden" id="codigo" name="codigo" value="<?php echo $venta['idVenta']; ?>">
            <button type="submit" class="mb-1 btn btn-danger">
                <i class="fa-solid fa-file-pdf fa-xl" style="color: #ffffff;"></i>
            </button>
        </form>
    </td>
</tr>
