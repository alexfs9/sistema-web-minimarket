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
    <td>
        <form action="<?php echo RUTA_RAIZ_WEB . '/app/controladores/BoletaGenerador.php'; ?>" method="post" target="_blank">
            <input type="hidden" id="codigo" name="codigo" value="<?php echo $compra['idVenta']; ?>">
            <button type="submit" class="mb-1 btn btn-danger">
                <i class="fa-solid fa-file-pdf fa-xl" style="color: #ffffff;"></i>
            </button>
        </form>
    </td>
</tr>
