<?php

require_once RUTA_RAIZ_PHP . '/app/servicios/Conexion.php';

class ProductoDao extends Conexion {

    public function registrar() {

    }

    public function modificar() {
        
    }

    public function eliminar() {
        
    }

    public function catalogar() {
        if (parent::conectar()) {
            $sql = 'select idProducto, nombre, precio, oferta, stock, imagen from producto;';
            $resultado = mysqli_query(parent::getConexion(), $sql);
            $resultado = parent::getConexion()->query($sql);
            if ($resultado) {
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $productos[] = $fila;
                }
            }
            mysqli_free_result($resultado);
            parent::desconectar();
        }
        return $productos;
    }

    public function listar() {
        if (parent::conectar()) {
            $sql = 'select idProducto, p.nombre, c.categoria, pr.proveedor, p.precio, p.stock, p.oferta, p.imagen from producto p inner join categoria c on p.idCategoria = c.idCategoria inner join proveedor pr on p.idProveedor = pr.IdProveedor limit 6;'; //añadir limit 6 para mostrar los 6 primeros
            $resultado = mysqli_query(parent::getConexion(), $sql);
            $resultado = parent::getConexion()->query($sql);
            if ($resultado) {
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $productos[] = $fila;
                }
            }
            mysqli_free_result($resultado);
            parent::desconectar();
        }
        return $productos;
    }
}
