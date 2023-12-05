<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Cabeza.php';
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/menu/Menu.php';
require_once RUTA_RAIZ_PHP . '/app/modelos/dao/ProductoDao.php';

$idProducto = $_GET['id'];
$productoDao = new ProductoDao();
$producto = $productoDao->consultar($idProducto);
?>
<div class="container">
    <h1 class="text-center text-primary">Modificar producto</h1>
    <form enctype="multipart/form-data" class="p-3 mt-2 border border-1 rounded-3 shadow">
        <div id="mensaje" role="alert"></div>
        <div class="mb-3">
            <label for="id-producto" class="form-label">ID producto:</label>
            <input type="text" class="form-control" id="id-producto" value="<?php echo $producto->getIdProducto(); ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label fw-semibold">Nombre del producto:</label>
            <input type="text" class="form-control" id="nombre" maxlength="150" value="<?php echo $producto->getNombre(); ?>">
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
            <input type="text" class="form-control" id="precio" maxlength="5" value="<?php echo $producto->getPrecio(); ?>">
         </div>
         <div class="mb-3">
            <label for="stock" class="form-label fw-semibold">Stock:</label>
            <input type="text" class="form-control" id="stock" maxlength="2" value="<?php echo $producto->getStock(); ?>">
         </div>
         <div class="mb-3">
            <label for="oferta" class="form-label fw-semibold">Oferta:</label>
            <input type="text" class="form-control" id="oferta" maxlength="4" aria-describedby="dato-oferta" value="<?php echo $producto->getOferta(); ?>">
            <div class="form-text" id="dato-oferta">En %</div>
         </div>
         <div class="mb-3">
            <label for="imagenNueva" class="form-label fw-semibold">Imagen nueva:</label>
            <input type="file" class="form-control" id="imagenNueva" accept=".jpg,.png">
        </div>
        <div class="mb-3 d-flex">
            <label class="form-label fw-semibold me-2">Imagen actual:</label>
            <img class="img-fluid border border-1 border-info rounded" src="<?php echo RUTA_RAIZ_WEB . '/app/vistas/img/subidas/' . $producto->getImagen(); ?>" alt="<?php echo $producto->getImagen(); ?>" style="width: 10rem; height: auto;">
        </div>
        <div class="d-flex justify-content-around">
            <button type="submit" class="btn btn-info text-white" id="modificar">
                <i class="fa-solid fa-pencil fa-xl" style="color: #ffffff;"></i>
                Modificar
            </button>
            <button type="button" class="btn btn-secondary" id="cancelar">
                <i class="fa-solid fa-ban fa-xl" style="color: #ffffff;"></i>
                Cancelar
            </button>
        </div>
        <input type="hidden" id="ruta" value="<?php echo RUTA_RAIZ_WEB ; ?>">
        <input type="hidden" id="nombreCategoria" value="<?php echo $producto->getCategoria(); ?>">
        <input type="hidden" id="nombreProveedor" value="<?php echo $producto->getProveedor(); ?>">
        <input type="hidden" id="imagenActual" value="<?php echo $producto->getImagen(); ?>">
    </form>
</div>
<?php
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Pie.php';
?>