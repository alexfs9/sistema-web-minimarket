<?php

//require_once RUTA_RAIZ_PHP . '/app/servicios/Conexion.php';

class ProductoDao extends Conexion {

    public function consultar($idProducto) {
        $sql = 'SELECT p.idProducto, p.nombre, c.categoria, pr.proveedor, p.precio, 
            p.stock, p.oferta, p.imagen 
            FROM producto p 
            INNER JOIN categoria c ON p.idCategoria = c.idCategoria 
            INNER JOIN proveedor pr ON p.idProveedor = pr.idProveedor 
            WHERE p.idProducto = ?';
    
    $datosProducto = null;

    if ($this->conectar()) {
        $sqlPreparado = $this->getConexion()->prepare($sql);
        if ($sqlPreparado) {
            $sqlPreparado->bind_param('i', $idProducto);
            $sqlPreparado->execute();
            $resultado = $sqlPreparado->get_result();
            $datosProducto = $resultado ? $resultado->fetch_assoc() : null;
            $resultado?->free();
            $sqlPreparado->close();
        }
        $this->desconectar();
    }

    return $datosProducto 
        ? new Producto(
            $datosProducto['idProducto'],
            $datosProducto['nombre'],
            $datosProducto['categoria'],
            $datosProducto['proveedor'],
            $datosProducto['precio'],
            $datosProducto['stock'],
            $datosProducto['oferta'],
            $datosProducto['imagen']
        )
        : null;
    }

    public function registrar($producto) {
        if (!$this->conectar()) {
            return "Producto no registrado";
        }
    
        $sql = 'call registrarProducto(?, ?, ?, ?, ?, ?, ?);';
        $sqlPreparado = $this->getConexion()->prepare($sql);
    
        if ($sqlPreparado) {
            $sqlPreparado->bind_param(
                'sssdids',
                $producto->getNombre(),
                $producto->getCategoria(),
                $producto->getProveedor(),
                $producto->getPrecio(),
                $producto->getStock(),
                $producto->getOferta(),
                $producto->getImagen()
            );
            $sqlPreparado->execute();
            $sqlPreparado->close();
        }
    
        $this->desconectar();
        return "Producto registrado";
    }

    public function modificar($producto) {
        if (!$this->conectar()) {
            return "Producto no modificado";
        }
    
        $sql = 'CALL modificarProducto(?, ?, ?, ?, ?, ?, ?, ?)';
        $sqlPreparado = $this->getConexion()->prepare($sql);
    
        if ($sqlPreparado) {
            $sqlPreparado->bind_param(
                'isssdids',
                $producto->getIdProducto(),
                $producto->getNombre(),
                $producto->getCategoria(),
                $producto->getProveedor(),
                $producto->getPrecio(),
                $producto->getStock(),
                $producto->getOferta(),
                $producto->getImagen()
            );
            $sqlPreparado->execute();
            $sqlPreparado->close();
        }
    
        $this->desconectar();
        return $sqlPreparado ? "Producto modificado" : "Producto no modificado";
    }

    public function eliminar($idProducto) {
        if (!$this->conectar()) {
            return "Producto no eliminado";
        }
    
        $sql = 'UPDATE producto SET habilitado = false WHERE idProducto = ?';
        $sqlPreparado = $this->getConexion()->prepare($sql);
    
        if ($sqlPreparado) {
            $sqlPreparado->bind_param('i', $idProducto);
            $sqlPreparado->execute();
            $sqlPreparado->close();
        }
    
        $this->desconectar();
        return $sqlPreparado ? "Producto eliminado" : "Producto no eliminado";
    }

    public function obtenerProductos($sql) {
        $productos = [];
        if ($this->conectar()) {
            $resultado = $this->getConexion()->query($sql);
            if ($resultado) {
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
        p.oferta, p.imagen from productosHabilitados p inner join categoria c on p.idCategoria = c.idCategoria 
        inner join proveedor pr on p.idProveedor = pr.IdProveedor;';
        return $this->obtenerProductos($sql);
    }
}