<?php

require_once RUTA_RAIZ_PHP . '/app/servicios/Conexion.php';

class CompraDao extends Conexion {

    public function registrarDetalleVenta($idVenta, $idProducto, $cantidad, $subtotal) {
        $sql = 'call registrarDetalleVenta(?, ?, ?, ?)';
        if ($this->conectar()) {
            $sqlPreparado = $this->getConexion()->prepare($sql);
            if ($sqlPreparado) {
                $sqlPreparado->bind_param('iiid', $idVenta, $idProducto,
                $cantidad, $subtotal);
                $sqlPreparado->execute();
                $sqlPreparado->close();
            }
            $this->desconectar();
        }
    }

    public function registrarVenta($idCuenta, $fecha, $tipoPago, $tipoEntrega, $direccion, $precioTotal) {
        if ($this->conectar()) {
            $sql = 'call registrarVenta(?, ?, ?, ?, ?, ?)';
            $sqlPreparado = $this->getConexion()->prepare($sql);
            if ($sqlPreparado) {
                $sqlPreparado->bind_param('isiisd', $idCuenta, $fecha, $tipoPago,
                $tipoEntrega, $direccion, $precioTotal);
                $sqlPreparado->execute();
                $resultado = $this->getConexion()->query('select @idUltimaVenta;')->fetch_assoc();
                $sqlPreparado->close();
            }
            $this->desconectar();
        }
        return $resultado;
    }
}
