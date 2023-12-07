<?php

require_once RUTA_RAIZ_PHP . '/app/servicios/Conexion.php';

class CarritoDao extends Conexion {

    public function buscarProducto($idProducto) {
        if ($this->conectar()) {
            $sql = 'select nombre, imagen from producto where idProducto = ?;';
            $sqlPreparado = $this->getConexion()->prepare($sql);
            if ($sqlPreparado) {
                $sqlPreparado->bind_param('i', $idProducto);
                $sqlPreparado->execute();
                $resultado = $sqlPreparado->get_result();
                if ($resultado) {
                    $producto = $resultado->fetch_assoc();
                    $resultado->free();
                }
                $sqlPreparado->close();
            }
            $this->desconectar();
        }
        return $producto;
    }
}