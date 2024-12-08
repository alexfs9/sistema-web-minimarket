<?php

require_once RUTA_RAIZ_PHP . '/app/servicios/Conexion.php';

class ClienteDao extends Conexion {

    public function obtenerCantidadClientes() {
        if ($this->conectar()) {
            $sql = 'select count(*) as cantidadClintes from cuenta where idRol = 2;';
            $resultado = $this->getConexion()->query($sql);
            $cantidadClientes = $resultado->fetch_assoc();
            $resultado->free();
            $this->desconectar();
        }
        return $cantidadClientes;
    }

    public function obtenerClientes() {
        $clientes = null;
        if ($this->conectar()) {
            $sql = 'select v.idCuenta, c.foto, concat(p.apellidos, " ", p.nombres) as nombre, 
            count(v.idCuenta) as cantidadCompras, max(v.fecha) as ultimaCompra, round(sum(v.precioTotal), 2) 
            as dineroInvertido from venta v inner join cuenta c on v.idCuenta = c.idCuenta 
            inner join persona p on c.idCuenta = p.idCuenta group by v.idCuenta, p.nombres, p.apellidos 
            order by dineroInvertido desc;';
            $resultado = $this->getConexion()->query($sql);
            if ($resultado->num_rows > 0) {
                $clientes = array();
                while ($cliente = $resultado->fetch_assoc()) {
                    $clientes[] = $cliente;
                }
                $resultado->free();
            }
            $this->desconectar();
        }
        return $clientes;
    }
}
