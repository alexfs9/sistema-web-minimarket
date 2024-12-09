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
        $productoDao = new ProductoDao();
    
        if ($this->ningunFiltroAplicadoCatalogo($nombre, $categoria, $precio)) {
            return $productoDao->catalogar();
        }
    
        $sql = $this->generarSqlBaseCatalogo($nombre, $categoria);
    
        if (isset($precio)) {
            $sql .= $this->ordenarPorPrecio($precio);
        }
    
        return $productoDao->obtenerProductos($sql);
    }

    private function ningunFiltroAplicadoCatalogo($nombre, $categoria, $precio) {
        return !isset($nombre) && !isset($categoria) && !isset($precio);
    }
    
    private function generarSqlBaseCatalogo($nombre, $categoria) {
        $sqlBase = 'select p.idProducto, p.nombre, p.precio, p.oferta, p.stock, p.imagen' . ' ' .
            'from productosHabilitados p' . ' ' .
            'inner join categoria c on p.idCategoria = c.idCategoria';
        
        $sql = $sqlBase;
    
        if (isset($nombre) || isset($categoria)) {
            $sql .= ' where';
        }
    
        if (isset($nombre)) {
            $sql .= ' p.nombre like "%' . $nombre . '%"';
        }
    
        if (isset($categoria)) {
            $sql .= isset($nombre) ? ' and' : '';
            $sql .= ' c.categoria = "' . $categoria . '"';
        }
    
        return $sql;
    }

    public function filtrarLista($idProducto, $nombre, $categoria, $stock, $precio) {
        $productoDao = new ProductoDao();
    
        if ($this->ningunFiltroAplicadoLista($idProducto, $nombre, $categoria, $stock, $precio)) {
            return $productoDao->listar();
        }
    
        $sql = $this->generarSqlBaseLista($idProducto, $nombre, $categoria);
    
        if (isset($stock)) {
            $sql .= $this->ordenarPorStock($stock);
        }
    
        if (isset($precio)) {
            $sql .= $this->ordenarPorPrecio($precio);
        }
    
        return $productoDao->obtenerProductos($sql);
    }
    
    private function ningunFiltroAplicadoLista($idProducto, $nombre, $categoria, $stock, $precio) {
        return !isset($idProducto) && !isset($nombre) && !isset($categoria) && !isset($stock) && !isset($precio);
    }
    
    private function generarSqlBaseLista($idProducto, $nombre, $categoria) {
        $sqlBase = 'select idProducto, p.nombre, c.categoria, pr.proveedor, p.precio, p.stock,
            p.oferta, p.imagen from productosHabilitados p inner join categoria c on p.idCategoria = c.idCategoria' . ' ' .
            'inner join proveedor pr on p.idProveedor = pr.IdProveedor';
        
        if (isset($idProducto)) {
            return $sqlBase . ' where p.idProducto = ' . $idProducto;
        }
    
        $sql = $sqlBase;
    
        if (isset($nombre) || isset($categoria)) {
            $sql .= ' where';
        }
    
        if (isset($nombre)) {
            $sql .= ' p.nombre like "%' . $nombre . '%"';
        }
    
        if (isset($categoria)) {
            $sql .= isset($nombre) ? ' and' : '';
            $sql .= ' c.categoria = "' . $categoria . '"';
        }
    
        return $sql;
    }
    
    private function ordenarPorStock($stock) {
        return ' order by stock ' . ($stock == 1 ? 'asc' : 'desc');
    }
    
    private function ordenarPorPrecio($precio) {
        return ' order by precio ' . ($precio == 1 ? 'asc' : 'desc');
    }
}
