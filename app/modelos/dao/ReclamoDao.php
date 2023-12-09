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
}