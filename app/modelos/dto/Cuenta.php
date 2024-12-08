<?php

class Cuenta {

    private $idCuenta;
    private $dni;
    private $nombres;
    private $apellidos;
    private $fechaNacimiento;
    private $telefono;
    private $correo;
    private $contrasena;
    private $foto;
    private $rol;

    public function __construct($idCuenta, $dni, $nombres, $apellidos, $fechaNacimiento, $telefono, $correo, $contrasena, $foto, $rol) {
        $this->idCuenta = $idCuenta;
        $this->dni = $dni;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
        $this->foto = $foto;
        $this->rol = $rol;
    }

    public function getIdCuenta() {
        return $this->idCuenta;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getRol() {
        return $this->rol;
    }

    public function setIdCuenta($idCuenta): void {
        $this->idCuenta = $idCuenta;
    }

    public function setDni($dni): void {
        $this->dni = $dni;
    }

    public function setNombres($nombres): void {
        $this->nombres = $nombres;
    }

    public function setApellidos($apellidos): void {
        $this->apellidos = $apellidos;
    }

    public function setFechaNacimiento($fechaNacimiento): void {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function setTelefono($telefono): void {
        $this->telefono = $telefono;
    }

    public function setCorreo($correo): void {
        $this->correo = $correo;
    }

    public function setContrasena($contrasena): void {
        $this->contrasena = $contrasena;
    }

    public function setFoto($foto): void {
        $this->foto = $foto;
    }

    public function setRol($rol): void {
        $this->rol = $rol;
    }
}
