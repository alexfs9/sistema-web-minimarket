<thead>
    <tr class="<?php echo $clase; ?>">
        <?php
        foreach($columnas as $columna) {
            echo '<th scope="col">' . $columna . '</th>';
        }
        ?>
    </tr>
</thead>