<?php

require_once RUTA_RAIZ_PHP . '/app/servicios/Conexion.php';

class ReclamoDao extends Conexion {

    public function registrar($idCuenta, $sugerencia, $fecha) {
        if ($this->conectar()) {
            $sql = 'call registrarReclamo(?, ?, ?)';
            $sqlPreparado = $this->getConexion()->prepare($sql);
            if ($sqlPreparado) {
                $sqlPreparado->bind_param('iss', $idCuenta, $sugerencia, $fecha);
                $sqlPreparado->execute();
                $sqlPreparado->close();
            }
            $this->desconectar();
        }
    }

    public function obtenerReclamos() {
        $reclamos = null;
        if ($this->conectar()) {
            $sql = 'select idReclamo, idCuenta, reclamo, fecha from reclamo order by fecha desc;';
            $resultado = $this->getConexion()->query($sql);
            if ($resultado->num_rows > 0) {
                $reclamos = array();
                while ($reclamo = $resultado->fetch_assoc()) {
                    $reclamos[] = $reclamo;
                }
                $resultado->free();
            }
            $this->desconectar();
        }
        return $reclamos;
    }
}