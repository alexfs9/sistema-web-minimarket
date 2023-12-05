<?php
require_once RUTA_RAIZ_PHP . '/app/controladores/FiltrosControlador.php';
?>
<div class="mb-2 p-1 d-flex flex-column">
    <div class="mb-1 d-flex justify-content-between">
        <label class="form-check-label mb-2 fs-5 text-success text-decoration-underline" for="activar-filtros">
            Filtros:
        </label>
        <button class="btn btn-secondary" id="limpiar">
            <i class="fa-solid fa-broom fa-xl" style="color: #ffffff;"></i>
            Limpiar
        </button>
    </div>
    <div class="mb-3 row d-flex">
        <?php
        $filtrosControlador = new FiltrosControlador();
        $clases = '';
        if (esAdmin()) {
            ?>
            <div class="mb-2 col-12 col-md-6 d-flex">
                <input type="text" class="me-1 form-control" id="codigo" placeholder="Ingrese ID del producto para buscar.">
                <button type="button" class="btn btn-success" id="buscar" disabled>
                    <i class="fa-solid fa-magnifying-glass fa-xl" style="color: #ffffff;"></i>
                </button>
            </div>
            <?php
            $clases = 'col-12 col-md-6';
        }
        ?>
        <div class="<?php echo $clases; ?>">
            <input type="text" class="form-control" id="nombre" placeholder="Ingrese nombre del producto para buscar.">
        </div>
    </div>
    <div class="row d-flex justify-content-around">
        <?php
        $filtrosControlador->cargarFiltro('categorias', 'categoria');
        //if (esAdmin()) {
            //$filtrosControlador->cargarFiltro('proveedores', 'proveedor');
            ?>
            <div class="mb-2 col-12 col-md-3">
                <label class="mb-1 form-check-label" for="stock">Stock:</label>
                <select class="form-select" id="stock">
                    <option selected>-- SELECCIONE --</option>
                    <option value="1">Menor cantidad</option>
                    <option value="2">Mayor cantidad</option>
                </select>
            </div>
        <div class="mb-2 col-12 col-md-3">
            <label class="mb-1 form-check-label" for="precio">Precio:</label>
            <select class="form-select" id="precio">
                <option selected>-- SELECCIONE --</option>
                <option value="1">Más barato</option>
                <option value="2">Más caro</option>
            </select>
        </div>
    </div>
</div>