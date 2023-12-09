<?php

require_once RUTA_RAIZ_PHP . '/app/servicios/Conexion.php';

class CuentaDao extends Conexion {

    public function obtenerCuenta($cor, $con) {
        if ($this->conectar()) {
            $sql = 'select c.idCuenta, p.dni, p.nombres, p.apellidos, 
            p.telefono, c.correo, c.contrasena, c.foto, r.rol from 
            cuenta c inner join persona p on c.idCuenta = p.idCuenta inner join rol r on 
            c.idRol = r.idRol where c.correo = ? and c.contrasena = ?;';
            $sqlPreparado = $this->getConexion()->prepare($sql);
            if ($sqlPreparado) {
                $sqlPreparado->bind_param('ss', $cor, $con);
                $sqlPreparado->execute();
                $resultado = $sqlPreparado->get_result();
                if ($resultado) {
                    $datosCuenta = $resultado->fetch_assoc();
                    $resultado->free();
                }
                $sqlPreparado->close();
            }
            $this->desconectar();
        }
        return $datosCuenta;
    }

    public function obtenerCompras($idCuenta) {
        $compras = null;
        if ($this->conectar()) {
            $sql = 'select v.idVenta, v.fecha, tp.tipoPago, te.tipoEntrega, v.direccion, 
            v.precioTotal from venta v inner join tipoPago tp on v.idTipoPago = tp.idTipoPago 
            inner join tipoEntrega te on v.idTipoEntrega = te.idTipoEntrega where idCuenta = ?;';
            $sqlPreparado = $this->getConexion()->prepare($sql);
            if ($sqlPreparado) {
                $sqlPreparado->bind_param('i', $idCuenta);
                $sqlPreparado->execute();
                $resultado = $sqlPreparado->get_result();
                if ($resultado->num_rows > 0) {
                    $compras = array();
                    while ($compra = $resultado->fetch_assoc()) {
                        $compras[] = $compra;
                    }
                    $resultado->free();
                }
                $sqlPreparado->close();
            }
            $this->desconectar();
        }
        return $compras;
    }

    public function obtenerSugerencias($idCuenta) {
        $sugerencias = null;
        if ($this->conectar()) {
            $sql = 'select idSugerencia, asunto, sugerencia, fecha from sugerencia where idCuenta = ?;';
            $sqlPreparado = $this->getConexion()->prepare($sql);
            if ($sqlPreparado) {
                $sqlPreparado->bind_param('i', $idCuenta);
                $sqlPreparado->execute();
                $resultado = $sqlPreparado->get_result();
                if ($resultado->num_rows > 0) {
                    $sugerencias = array();
                    while ($sugerencia = $resultado->fetch_assoc()) {
                        $sugerencias[] = $sugerencia;
                    }
                    $resultado->free();
                }
                $sqlPreparado->close();
            }
            $this->desconectar();
        }
        return $sugerencias;
    }

    public function obtenerReclamos($idCuenta) {
        $reclamos = null;
        if ($this->conectar()) {
            $sql = 'select idReclamo, reclamo, fecha from reclamo where idCuenta = ?;';
            $sqlPreparado = $this->getConexion()->prepare($sql);
            if ($sqlPreparado) {
                $sqlPreparado->bind_param('i', $idCuenta);
                $sqlPreparado->execute();
                $resultado = $sqlPreparado->get_result();
                if ($resultado->num_rows > 0) {
                    $reclamos = array();
                    while ($reclamo = $resultado->fetch_assoc()) {
                        $reclamos[] = $reclamo;
                    }
                    $resultado->free();
                }
                $sqlPreparado->close();
            }
            $this->desconectar();
        }
        return $reclamos;
    }
}