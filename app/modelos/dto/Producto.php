<?php

class Producto {

    private $idProducto;
    private $nombre;
    private $categoria;
    private $proveedor;
    private $precio;
    private $stock;
    private $oferta;
    private $imagen;

    public function __construct($idProducto, $nombre, $categoria, $proveedor, $precio, $stock, $oferta, $imagen) {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->categoria = $categoria;
        $this->proveedor = $proveedor;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->oferta = $oferta;
        $this->imagen = $imagen;
    }

    public function calcularPrecioOferta() {
        $oferta = $this->getPrecio() * $this->getOferta();
        return round($this->getPrecio() - ($oferta / 100), 2);
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function getNombre() {
        return $this->nombre;
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

    public function getOferta() {
        return $this->oferta;
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

    public function setOferta($oferta): void {
        $this->oferta = $oferta;
    }

    public function setImagen($imagen): void {
        $this->imagen = $imagen;
    }
}