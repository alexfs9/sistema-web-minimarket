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
            v.precioTotal from venta v inner join tipoPago tp on v.idTipoPago = tp.idTipoPago 
            inner join tipoEntrega te on v.idTipoEntrega = te.idTipoEntrega;';
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
            round(sum(subtotal), 2) as ingreso from detalleVenta dv inner join producto p 
            on dv.idProducto = p.idProducto group by idProducto order by ingreso desc;';
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
}