<?php

class Conexion {

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
        //$this->conexion = mysqli_connect($this->servidor, $this->usuario, $this->contrasena, $this->nombreBd, $this->puerto);
        //return ($this->conexion) ? true : false;
    }

    public function desconectar() {
        //mysqli_close($this->conexion);
        $this->getConexion()->close();
    }

    public function getConexion() {
        return $this->conexion;
    }

    public function setConexion($conexion): void {
        $this->conexion = $conexion;
    }
}