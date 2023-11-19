<?php

class Producto {

    private $idProducto;
    private $nombre;
    private $descripcion;
    private $categoria;
    private $proveedor;
    private $precio;
    private $stock;
    private $imagen;

    public function __construct($nombre, $descripcion, $categoria, $proveedor, $precio, $stock, $imagen) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
        $this->proveedor = $proveedor;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->imagen = $imagen;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getProveedor() {
        return $this->proveedor;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setIdProducto($idProducto): void {
        $this->idProducto = $idProducto;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function setCategoria($categoria): void {
        $this->categoria = $categoria;
    }

    public function setProveedor($proveedor): void {
        $this->proveedor = $proveedor;
    }

    public function setPrecio($precio): void {
        $this->precio = $precio;
    }

    public function setStock($stock): void {
        $this->stock = $stock;
    }

    public function setImagen($imagen): void {
        $this->imagen = $imagen;
    }
}
