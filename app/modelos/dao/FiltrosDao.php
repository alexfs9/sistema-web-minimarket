<?php

require_once RUTA_RAIZ_PHP . '/app/servicios/Conexion.php';

class FiltrosDao extends Conexion {

    public function obtenerFiltro($filtro) {
        if ($this->conectar()) {
            $nombreFiltro = ucfirst($filtro);
            $nombreFiltro = 'id' . $nombreFiltro;            
            $sql = "select $nombreFiltro as id, $filtro from $filtro;";
            $sqlPreparado = $this->getConexion()->prepare($sql);
            if ($sqlPreparado) {
                $sqlPreparado->execute();
                $resultado = $sqlPreparado->get_result();
                if ($resultado) {
                    while($fila = $resultado->fetch_assoc()) {
                        $campo[] = $fila;
                    }
                    $resultado->free();
                }
                $sqlPreparado->close();
            }
            $this->desconectar();
        }
        return $campo;
    }
}
