<?php

require_once RUTA_RAIZ_PHP . '/app/servicios/Conexion.php';

class IngresoDao extends Conexion {

    public function iniciarSesion($correo, $contrasena)
    {
        if (parent::conectar()) {
            $sql = "call iniciarSesion('$correo', '$contrasena', @accion);";
            $resultado = mysqli_query(parent::getConexion(), $sql);
            $resultado = mysqli_query(parent::getConexion(), "select @accion;");
            $resultado = mysqli_fetch_assoc($resultado);
            parent::desconectar();
            return $resultado["@accion"];
        }
    }
}
