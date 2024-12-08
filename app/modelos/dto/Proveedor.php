<?php

class Proveedor {

    private $idProveedor;
    private $nombre;
    private $telefono;
    private $correo;
    private $direccion;

    public function __construct($nombre, $telefono, $correo, $direccion) {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->direccion = $direccion;
    }

    public function getIdProveedor() {
        return $this->idProveedor;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setIdProveedor($idProveedor): void {
        $this->idProveedor = $idProveedor;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setTelefono($telefono): void {
        $this->telefono = $telefono;
    }

    public function setCorreo($correo): void {
        $this->correo = $correo;
    }

    public function setDireccion($direccion): void {
        $this->direccion = $direccion;
    }
}
