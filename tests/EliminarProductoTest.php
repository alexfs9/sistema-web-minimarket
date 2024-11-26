<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../app/modelos/dto/Producto.php";
require_once __DIR__ . "/../app/servicios/Conexion.php";
require_once __DIR__ . "/../app/modelos/dao/ProductoDao.php";

class EliminarProductoTest extends TestCase
{
    public function testEliminarProducto()
    {
        $productoDao = new ProductoDao();
        $resultado = $productoDao->eliminar(39);
        $this->assertEquals("Producto eliminado", $resultado);
    }
}