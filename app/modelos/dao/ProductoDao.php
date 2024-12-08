<?php

require_once RUTA_RAIZ_PHP . '/app/servicios/Conexion.php';

class ProductoDao extends Conexion {

    public function consultar($idProducto) {
        $sql = 'select p.idProducto, p.nombre, c.categoria, pr.proveedor, p.precio,
        p.stock, p.oferta, p.imagen from producto p inner join categoria c on p.idCategoria = c.idCategoria' . ' ' .
        'inner join proveedor pr on p.idProveedor = pr.idProveedor where p.idProducto = ?;';
        if ($this->conectar()) {
            $sqlPreparado = $this->getConexion()->prepare($sql);
            if ($sqlPreparado) {
                $sqlPreparado->bind_param('i', $idProducto);
                $sqlPreparado->execute();
                $resultado = $sqlPreparado->get_result();
                if ($resultado) {
                    $datosProducto = $resultado->fetch_assoc();
                    $resultado->free();
                }
                $sqlPreparado->close();
            }
            $this->desconectar();
        }
        $producto = new Producto($datosProducto['idProducto'],
        $datosProducto['nombre'], $datosProducto['categoria'], $datosProducto['proveedor'],
        $datosProducto['precio'], $datosProducto['stock'], $datosProducto['oferta'],
        $datosProducto['imagen']);
        return $producto;
    }

    public function registrar($producto) {
        if ($this->conectar()) {
            $sql = 'call registrarProducto(?, ?, ?, ?, ?, ?, ?);';
            $sqlPreparado = $this->getConexion()->prepare($sql);
            if ($sqlPreparado) {
                $nombre = $producto->getNombre();
                $categoria = $producto->getCategoria();
                $proveedor = $producto->getProveedor();
                $precio = $producto->getPrecio();
                $stock = $producto->getStock();
                $oferta = $producto->getOferta();
                $imagen = $producto->getImagen();
                $sqlPreparado->bind_param('sssdids', $nombre, $categoria,
                $proveedor, $precio, $stock, $oferta, $imagen);
                $sqlPreparado->execute();
                $sqlPreparado->close();
            }
            $this->desconectar();
            return true;
        }
        return false;
    }

    public function modificar($producto) {
        if ($this->conectar()) {
            $sql = 'call modificarProducto(?, ?, ?, ?, ?, ?, ?, ?)';
            $sqlPreparado = $this->getConexion()->prepare($sql);
            if ($sqlPreparado) {
                $idProducto = $producto->getIdProducto();
                $nombre = $producto->getNombre();
                $categoria = $producto->getCategoria();
                $proveedor = $producto->getProveedor();
                $precio = $producto->getPrecio();
                $stock = $producto->getStock();
                $oferta = $producto->getOferta();
                $imagen = $producto->getImagen();
                $sqlPreparado->bind_param('isssdids', $idProducto, $nombre,
                $categoria, $proveedor, $precio, $stock, $oferta, $imagen);
                $sqlPreparado->execute();
                $sqlPreparado->close();
            }
            $this->desconectar();
            return true;
        }
        return false;
    }

    public function eliminar($idProducto) {
        if ($this->conectar()) {
            $sql = 'update producto set habilitado = false where idProducto = ?;';
            $sqlPreparado = $this->getConexion()->prepare($sql);
            if ($sqlPreparado) {
                $sqlPreparado->bind_param('i', $idProducto);
                $sqlPreparado->execute();
                $sqlPreparado->close();
            }
            $this->desconectar();
            return true;
        }
        return false;
    }

    public function obtenerProductos($sql) {
        if ($this->conectar()) {
            $resultado = $this->getConexion()->query($sql);
            if ($resultado) {
                $productos = null;
                while ($fila = $resultado->fetch_assoc()) {
                    $productos[] = $fila;
                }
                $resultado->free();
            }
            $this->desconectar();
        }
        return $productos;
    }

    public function catalogar() {
        $sql = 'select idProducto, nombre, precio, oferta, stock, imagen from productosHabilitados;';
        return $this->obtenerProductos($sql);
    }

    public function listar() {
        $sql = 'select idProducto, p.nombre, c.categoria, pr.proveedor, p.precio, p.stock,
        p.oferta, p.imagen from productosHabilitados p inner join categoria c on p.idCategoria = c.idCategoria' . ' ' .
        'inner join proveedor pr on p.idProveedor = pr.IdProveedor;';
        return $this->obtenerProductos($sql);
    }
}
