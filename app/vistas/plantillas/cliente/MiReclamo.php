<tr>
    <th scope="col" class="text-danger fw-bold">
        <?php echo $reclamo['idReclamo']; ?>
    </th>
    <td class="text-info fw-bold">
        <?php echo $reclamo['idCuenta']; ?>
    </td>
    <td>
    <textarea id="reclamo-<?php echo $reclamo['idReclamo'] ; ?>" class="form-control" cols="30" rows="3" style="resize: none;" disabled><?php echo $reclamo['reclamo']; ?></textarea>
    </td>
    <td>
        <?php echo $reclamo['fecha']; ?>
    </td>
</tr>
