<tr>
    <th scope="col">
        <?php echo $sugerencia['idSugerencia']; ?>
    </th>
    <td>
        <?php echo $sugerencia['asunto']; ?>
    </td>
    <td>
        <textarea id="sugerencia-<?php echo $sugerencia['idSugerencia'] ; ?>" class="form-control" cols="30" rows="3" style="resize: none;" disabled><?php echo $sugerencia['sugerencia']; ?></textarea>
    </td>
    <td>
        <?php echo $sugerencia['fecha']; ?>
    </td>
</tr>