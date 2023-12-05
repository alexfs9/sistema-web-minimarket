<?php

require_once RUTA_RAIZ_PHP . '/app/servicios/Conexion.php';

class IngresoDao extends Conexion {

    public function iniciarSesion($correo, $contrasena) {
        if (parent::conectar()) {
            $sql = 'call iniciarSesion(?, ?, @accion);';
            $sqlPreparado = parent::getConexion()->prepare($sql);
            if ($sqlPreparado) {
                $sqlPreparado->bind_param('ss', $correo, $contrasena);
                $sqlPreparado->execute();
                $resultado = $this->getConexion()->query('select @accion;')->fetch_assoc();
                $sqlPreparado->close();
            }
            $this->desconectar();
        }
        return $resultado["@accion"];
    }
}