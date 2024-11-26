<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../app/modelos/dto/Producto.php";
require_once __DIR__ . "/../app/servicios/Conexion.php";
require_once __DIR__ . "/../app/modelos/dao/ProductoDao.php";

class RegistrarProductoTest extends TestCase
{
    public function testRegistrarProducto()
    {
        $producto = new Producto(
            60,
            "prueba nombre cuatro", 
            "Mascotas", 
            "proveedor5", 
            15.3, 
            21, 
            0, 
            "ruta/producto.jpg");

        $productoDao = new ProductoDao();
        $resultado = $productoDao->registrar($producto);
        $this->assertEquals("Producto registrado", $resultado);
    }
}