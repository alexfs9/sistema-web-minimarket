<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../app/modelos/dto/Producto.php";
require_once __DIR__ . "/../app/servicios/Conexion.php";
require_once __DIR__ . "/../app/modelos/dao/ProductoDao.php";

class ModificarProductoTest extends TestCase
{
    public function testModificarProducto()
    {
        $producto = new Producto(
            37,
            "nuevo nombre", 
            "Limpieza", 
            "proveedor7", 
            7, 
            2, 
            5, 
            "ruta/producto.jpg");

        $productoDao = new ProductoDao();
        $resultado = $productoDao->modificar($producto);
        $this->assertEquals("Producto modificado", $resultado);
    }
}