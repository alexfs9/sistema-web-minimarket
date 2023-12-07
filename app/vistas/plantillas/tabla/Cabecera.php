<thead>
    <tr class="<?php echo $clase; ?>">
        <?php
        foreach($columnas as $columna) {
            echo '<th>' . $columna . '</th>';
        }
        ?>
    </tr>
</thead>