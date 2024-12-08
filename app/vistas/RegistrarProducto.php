<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Cabeza.php';
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/menu/Menu.php';

?>

<div class="mt-2 mb-2 container">
    <h1 class="text-center text-primary">Registrar producto</h1>
    <form enctype="multipart/form-data" class="p-3 mt-2 border border-1 rounded-3 shadow">
        <div id="mensaje" role="alert"></div>
        <div class="mb-3">
            <label for="nombre" class="form-label fw-semibold">Nombre del producto:</label>
            <input type="text" class="form-control" id="nombre" maxlength="150">
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label fw-semibold">Categoría:</label>
            <select class="form-select" id="categoria">
                <?php
                require_once RUTA_RAIZ_PHP . '/app/controladores/FiltrosControlador.php';
                $filtrosDao = new FiltrosDao();
                $filtrosControlador = new FiltrosControlador();
                $categorias = $filtrosDao->obtenerFiltro('categoria');
                $filtrosControlador->mostrarFiltro("categoria", $categorias);
                ?>
            </select>
         </div>
         <div class="mb-3">
            <label for="proveedor" class="form-label fw-semibold">Proveedor:</label>
            <select class="form-select" id="proveedor">
                <?php
                $proveedores = $filtrosDao->obtenerFiltro('proveedor');
                $filtrosControlador->mostrarFiltro('proveedor', $proveedores);
                ?>
            </select>
         </div>
         <div class="mb-3">
            <label for="precio" class="form-label fw-semibold">Precio:</label>
            <input type="text" class="form-control" id="precio" maxlength="5">
         </div>
         <div class="mb-3">
            <label for="stock" class="form-label fw-semibold">Stock:</label>
            <input type="text" class="form-control" id="stock" maxlength="2">
         </div>
         <div class="mb-3">
            <label for="oferta" class="form-label fw-semibold">Oferta:</label>
            <input type="text" class="form-control" id="oferta" maxlength="4" aria-describedby="dato-oferta">
            <div class="form-text" id="dato-oferta">En %</div>
         </div>
         <div class="mb-3">
            <label for="imagen" class="form-label fw-semibold">Imagen:</label>
            <input type="file" class="form-control" id="imagen" accept=".jpg,.png">
        </div>
        <div class="d-flex justify-content-around">
            <button type="submit" class="btn btn-primary" id="registrar">
                <i class="fa-solid fa-plus fa-xl" style="color: #ffffff;"></i>
                Registrar
            </button>
            <button type="button" class="btn btn-danger" id="cancelar">
                <i class="fa-solid fa-ban fa-xl" style="color: #ffffff;"></i>
                Cancelar
            </button>
        </div>
        <input type="hidden" id="ruta" value="<?php echo RUTA_RAIZ_WEB; ?>">
    </form>
</div>

<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Pie.php';

?>
