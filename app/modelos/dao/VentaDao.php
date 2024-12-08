<?php

require_once RUTA_RAIZ_PHP . '/app/servicios/Conexion.php';

class VentaDao extends Conexion {

    public function obtenerCantidadVentas() {
        if ($this->conectar()) {
            $sql = 'select count(*) as cantidadVentas from venta;';
            $resultado = $this->getConexion()->query($sql);
            $cantidadVentas = $resultado->fetch_assoc();
            $resultado->free();
            $this->desconectar();
        }
        return $cantidadVentas;
    }

    public function obtenerVentas() {
        $ventas = null;
        if ($this->conectar()) {
            $sql = 'select v.idVenta, v.idCuenta, v.fecha, tp.tipoPago, te.tipoEntrega, v.direccion,
            v.precioTotal from venta v inner join tipoPago tp on v.idTipoPago = tp.idTipoPago' . ' ' .
            'inner join tipoEntrega te on v.idTipoEntrega = te.idTipoEntrega order by v.fecha desc;';
            $resultado = $this->getConexion()->query($sql);
            if ($resultado->num_rows > 0) {
                $ventas = array();
                while ($venta = $resultado->fetch_assoc()) {
                    $ventas[] = $venta;
                }
                $resultado->free();
            }
            $this->desconectar();
        }
        return $ventas;
    }

    public function obtenerProductos() {
        $productos = null;
        if ($this->conectar()) {
            $sql = 'select dv.idProducto, p.nombre, p.imagen, sum(dv.cantidad) as cantidadVendida,
            round(sum(subtotal), 2) as ingreso from detalleVenta dv inner join producto p' . ' ' .
            'on dv.idProducto = p.idProducto group by idProducto order by ingreso desc;';
            $resultado = $this->getConexion()->query($sql);
            if ($resultado->num_rows > 0) {
                $productos = array();
                while ($producto = $resultado->fetch_assoc()) {
                    $productos[] = $producto;
                }
                $resultado->free();
            }
            $this->desconectar();
        }
        return $productos;
    }

    public function obtenerVenta($idVenta) {
        $sql = 'select v.idVenta, v.idCuenta, concat(p.apellidos, " ", p.nombres) as nombre,
        v.fecha, v.precioTotal from venta v inner join persona p on v.idCuenta = p.idCuenta where v.idVenta = ?;';
        if ($this->conectar()) {
            $sqlPreparado = $this->getConexion()->prepare($sql);
            if ($sqlPreparado) {
                $sqlPreparado->bind_param('i', $idVenta);
                $sqlPreparado->execute();
                $resultado = $sqlPreparado->get_result();
                if ($resultado) {
                    $venta = $resultado->fetch_assoc();
                    $resultado->free();
                }
                $sqlPreparado->close();
            }
            $this->desconectar();
        }
        return $venta;
    }

    public function obtenerDetalleVenta($idVenta) {
        if ($this->conectar()) {
            $sql = 'select dv.idProducto, p.nombre, dv.cantidad, dv.subtotal from detalleVenta dv' . ' ' .
            'inner join producto p on dv.idProducto = p.idProducto where idventa = ? order by subtotal asc;';
            $sqlPreparado = $this->getConexion()->prepare($sql);
            if ($sqlPreparado) {
                $sqlPreparado->bind_param('i', $idVenta);
                $sqlPreparado->execute();
                $resultado = $sqlPreparado->get_result();
                if ($resultado->num_rows > 0) {
                    $detalleVenta = array();
                    while ($detalle = $resultado->fetch_assoc()) {
                        $detalleVenta[] = $detalle;
                    }
                    $resultado->free();
                }
                $sqlPreparado->close();
            }
            $this->desconectar();
        }
        return $detalleVenta;
    }
}
