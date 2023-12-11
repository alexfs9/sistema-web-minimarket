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

    public function obtenerSugerencias() {
        $sugerencias = null;
        if ($this->conectar()) {
            $sql = 'select idSugerencia, idCuenta, asunto, sugerencia, fecha from sugerencia order by fecha desc;';
            $resultado = $this->getConexion()->query($sql);
            if ($resultado->num_rows > 0) {
                $sugerencias = array();
                while ($sugerencia = $resultado->fetch_assoc()) {
                    $sugerencias[] = $sugerencia;
                }
                $resultado->free();
            }
            $this->desconectar();
        }
        return $sugerencias;
    }
}