<?php

require_once RUTA_RAIZ_PHP . '/app/servicios/Conexion.php';

class IngresoDao extends Conexion {

    public function registrar($nombres, $apellidos, $dni, $telefono, $correo, $contrasena, $rol) {
        if ($this->conectar()) {
            $sql = 'call registrarCuenta(?, ?, ?, ?, ?, ?, ?)';
            $sqlPreparado = $this->getConexion()->prepare($sql);
            if ($sqlPreparado) {
                $sqlPreparado->bind_param('ssissss', $correo, $contrasena, $rol, $dni, 
                $nombres, $apellidos, $telefono);
                $sqlPreparado->execute();
                $sqlPreparado->close();
            }
            $this->desconectar();
            return true;
        }
        return false;
    }

    public function iniciarSesion($correo, $contrasena) {
        if ($this->conectar()) {
            $sql = 'call iniciarSesion(?, ?, @accion);';
            $sqlPreparado = $this->getConexion()->prepare($sql);
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
