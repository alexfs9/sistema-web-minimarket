<?php

class Conexion {

    // Cambiar valores según tu configuración de MySQL
    private $servidor = 'localhost';
    private $usuario = 'root';
    private $contrasena = '';
    private $nombreBd = 'bdminimarket';
    private $puerto = '3306';
    private $conexion;

    public function conectar() {
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->contrasena, $this->nombreBd, $this->puerto);
        if ($this->conexion->connect_error) {
            die('Conexión fallida: ' . $this->conexion->connect_error);
        }
        return true;
    }

    public function desconectar() {
        $this->getConexion()->close();
    }

    public function getConexion() {
        return $this->conexion;
    }

    public function setConexion($conexion): void {
        $this->conexion = $conexion;
    }
}
