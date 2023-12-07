<input type="button" 
    class="btn btn-outline-secondary btn-<?php echo $tamano; ?>" 
    id="<?php echo 'disminuir-' . $idProducto; ?>" 
    value="-" 
    onclick="accionar('<?php echo 'disminuir-' . $idProducto; ?>')<?php if (isset($cantidad)) { echo ' ; actualizarPrecios(' . $idProducto . ');';} ?>" 
    <?php
    $desactivado = 'disabled';
    if (isset($cantidad)) {
        if ($cantidad > 1) {
            $desactivado = '';
        }
    }
    echo $desactivado;
    ?>
    >
<input type="number" 
    class="form-control btn btn-<?php echo $tamano; ?>" 
    id="<?php echo 'cantidad-' . $idProducto; ?>" 
    value="<?php
            if (isset($cantidad)) {
                echo $cantidad;
            } else {
                if ($stock == 0) {
                    echo 0;
                } else {
                    echo 1;
                }
            }
            ?>" 
    min="1" 
    max="<?php echo $stock; ?>" 
    placeholder="Cantidad" 
    disabled>
<input type="button" 
    class="btn btn-outline-secondary btn-<?php echo $tamano; ?>" 
    id="<?php echo 'aumentar-' . $idProducto; ?>" 
    value="+" 
    onclick="accionar('<?php echo 'aumentar-' . $idProducto; ?>')<?php if (isset($cantidad)) { echo ' ; actualizarPrecios(' . $idProducto . ');';} ?>" 
    <?php
    $desactivado = 'disabled';
    if (isset($cantidad)) {
        if ($cantidad == $stock) {
            echo $desactivado;
        }
    } else {
        if ($stock == 1 || $stock == 0) {
            echo $desactivado;
        }
    }
    ?>>