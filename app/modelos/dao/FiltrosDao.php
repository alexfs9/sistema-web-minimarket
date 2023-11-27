<?php

require_once RUTA_RAIZ_PHP . '/app/servicios/Conexion.php';

class FiltrosDao extends Conexion {

    public function obtenerFiltro($filtro) {
        if (parent::conectar()) {
            $nombreFiltro = ucfirst($filtro);
            $nombreFiltro = 'id' . $nombreFiltro;
            $sql = "select $nombreFiltro as id, $filtro from $filtro;";
            $resultado = parent::getConexion()->query($sql);
            if ($resultado) {
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $campo[] = $fila;
                }
            }
            mysqli_free_result($resultado);
            parent::desconectar();
        }
        return $campo;
    }
}