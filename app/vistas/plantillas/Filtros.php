<?php
require_once RUTA_RAIZ_PHP . '/app/controladores/FiltrosControlador.php';
?>
<div class="mb-1 d-flex flex-column">
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Ingrese nombre del producto para buscar.">
    </div>
    <div class="d-flex flex-row align-items-center justify-content-between">
        <div class="form-check" style="margin-right: 10px;">
            <input class="form-check-input" type="checkbox" value="0" id="activar-filtros">
            <label class="form-check-label" for="activar-filtros">
                Activar filtros
            </label>
        </div>
        <button class="btn btn-success" id="filtrar" disabled>
            <i class="fa-solid fa-filter fa-xl" style="color: #ffffff;"></i>
            Filtrar
        </button>
    </div>
    <div class="p-2 row d-flex justify-content-between">
        <?php
        $filtrosControlador = new FiltrosControlador();
        $filtrosControlador->cargarFiltro('categorias', 'categoria');
        if ($tipoUsuario != 'cliente') {
            $filtrosControlador->cargarFiltro('proveedores', 'proveedor');
        }
        ?>
        <div class="mb-2 col-12 col-md-3">
            <label class="mb-1 form-check-label" for="precio">Precio:</label>
            <select class="form-select" id="precio" disabled>
                <option selected>-- SELECCIONE --</option>
                <option value="1">Más barato</option>
                <option value="2">Más caro</option>
            </select>
        </div>
        <div class="mb-2 col-12 col-md-3">
            <label class="mb-1 form-check-label" for="stock">Stock:</label>
            <select class="form-select" id="stock" disabled>
                <option selected>-- SELECCIONE --</option>
                <option value="1">Menor cantidad</option>
                <option value="2">Mayor cantidad</option>
            </select>
        </div>
    </div>
</div>