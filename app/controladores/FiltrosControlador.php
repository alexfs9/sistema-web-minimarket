<?php

require_once RUTA_RAIZ_PHP . '/app/modelos/dao/FiltrosDao.php';

class FiltrosControlador {

    public function mostrarFiltro($filtro, $campo) {
        foreach ($campo as $valor) {
            echo '<option value="' . $valor['id'] . '">' . $valor[$filtro] . '</option>';
        }
    }

    public function cargarFiltro($idElemento, $filtro) {
        $label = ucfirst($filtro);
        echo '<div class="mb-2 col-12 col-md-3">';
            echo '<label class="mb-1" for="' . $idElemento . '">' . $label . ':</label>';
            echo '<select class="form-select" id="' . $idElemento . '">';
                echo '<option selected>-- SELECCIONE --</option>';
                $filtrosDao = new FiltrosDao();
                $campo = $filtrosDao->obtenerFiltro($filtro);
                $this->mostrarFiltro($filtro, $campo);
            echo '</select>';
        echo '</div>';
    }

    public function filtrarCatalogo($nombre, $categoria, $precio) {
        $sqlBase = 'select p.idProducto, p.nombre, p.precio, p.oferta, p.stock, 
        p.imagen from productosHabilitados p inner join categoria c on p.idCategoria = c.idCategoria';
        $columnaNombre = 'p.nombre like ';
        $columnaCategoria = 'c.categoria = ';
        $donde = ' where ';
        $y = ' and ';
        $ordenPrecio = ' order by precio ';
        $productoDao = new ProductoDao();
        if (!isset($nombre) && !isset($categoria) && !isset($precio)) {
            $productos = $productoDao->catalogar();
        } else {
            $ambos = false;
            $sql = $sqlBase;
            if (isset($nombre) && isset($categoria)) {
                $ambos = true;
            }
            if (isset($nombre) || isset($categoria)) {
                $sql .= $donde;
            }
            if (isset($nombre)) {
                $sql .= $columnaNombre . '"%' . $nombre . '%"';
            }
            if (isset($categoria)) {
                if ($ambos) {
                    $sql .= $y;
                }
                $sql .= $columnaCategoria . '"' . $categoria . '"';
            }
            if (isset($precio)) {
                $sql .= $ordenPrecio;
                if ($precio == 1) {
                    $sql .= 'asc';
                } else {
                    $sql .= 'desc';
                }
            }
            $productos = $productoDao->obtenerProductos($sql);
        }
        return $productos;
    }

    public function filtrarLista($idProducto, $nombre, $categoria, $stock, $precio) {
        $sqlBase = 'select idProducto, p.nombre, c.categoria, pr.proveedor, p.precio, p.stock, 
        p.oferta, p.imagen from productosHabilitados p inner join categoria c on p.idCategoria = c.idCategoria 
        inner join proveedor pr on p.idProveedor = pr.IdProveedor';
        $columnaNombre = 'p.nombre like ';
        $columnaCategoria = 'c.categoria = ';
        $donde = ' where ';
        $y = ' and ';
        $ordenStock = ' order by stock ';
        $ordenPrecio = ' order by precio ';
        $productoDao = new ProductoDao();
        if (!isset($idProducto) && !isset($nombre) && !isset($categoria) && !isset($stock) && !isset($precio)) {
            $productos = $productoDao->listar();
        }
        if (isset($idProducto)) {
            $sql = $sqlBase . $donde . 'p.idProducto = ' . $idProducto;
            $productos = $productoDao->obtenerProductos($sql);
        } else {
            $ambos = false;
            $sql = $sqlBase;
            if (isset($nombre) && isset($categoria)) {
                $ambos = true;
            }
            if (isset($nombre) || isset($categoria)) {
                $sql .= $donde;
            }
            if (isset($nombre)) {
                $sql .= $columnaNombre . '"%' . $nombre . '%"';
            }
            if (isset($categoria)) {
                if ($ambos) {
                    $sql .= $y;
                }
                $sql .= $columnaCategoria . '"' . $categoria . '"';
            }
            if (isset($stock)) {
                $sql .= $ordenStock;
                if ($stock == 1) {
                    $sql .= 'asc';
                } else {
                    $sql .= 'desc';
                }
            }
            if (isset($precio)) {
                $sql .= $ordenPrecio;
                if ($precio == 1) {
                    $sql .= 'asc';
                } else {
                    $sql .= 'desc';
                }
            }
            $productos = $productoDao->obtenerProductos($sql);
        }
        return $productos;
    }
}