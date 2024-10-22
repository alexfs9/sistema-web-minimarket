<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../app/servicios/Conexion.php";
require_once __DIR__ . '/../app/modelos/dao/VentaDao.php';
require_once __DIR__ . "/../app/controladores/VentaControlador.php";

class ProductosVendidosTest extends TestCase
{
    public function testProductosVendidosVacio()
    {
        $ventaControlador = new VentaControlador();
        $resultado = $ventaControlador->consultarProductos();
        $this->assertEquals('Aún no ha realizado ventas.', $resultado);
    }
}