<?php

require_once RUTA_RAIZ_PHP . '/app/servicios/Conexion.php';

class SugerenciaDao extends Conexion {

    public function registrar($idCuenta, $asunto, $sugerencia, $fecha) {
        if ($this->conectar()) {
            $sql = 'call registrarSugerencia(?, ?, ?, ?)';
            $sqlPreparado = $this->getConexion()->prepare($sql);
            if ($sqlPreparado) {
                $sqlPreparado->bind_param('isss', $idCuenta, $asunto, $sugerencia, $fecha);
                $sqlPreparado->execute();
                $sqlPreparado->close();
            }
            $this->desconectar();
        }
    }
}