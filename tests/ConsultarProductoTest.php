<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../app/modelos/dto/Producto.php";
require_once __DIR__ . "/../app/servicios/Conexion.php";
require_once __DIR__ . "/../app/modelos/dao/ProductoDao.php";

class ConsultarProductoTest extends TestCase
{
    public function testConsultarProducto()
    {
        $productoDao = new ProductoDao();
        $resultado = $productoDao->consultar(3);
        $this->assertInstanceOf(Producto::class, $resultado);
    }

    public function testConsultarProductoInexistente()
    {
        $productoDao = new ProductoDao();
        $resultado = $productoDao->consultar(129);
        $this->assertEquals(null, $resultado);
    }
}