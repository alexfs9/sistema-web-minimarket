<?php

require_once RUTA_RAIZ_PHP . '/app/servicios/Conexion.php';

class CuentaDao extends Conexion {

    public function obtenerCuenta($cor, $con) {
        if ($this->conectar()) {
            $sql = 'select c.idCuenta, p.dni, p.nombres, p.apellidos, 
            p.fechaNacimiento, p.telefono, c.correo, c.contrasena, c.foto, r.rol from 
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
}