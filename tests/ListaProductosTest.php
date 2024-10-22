<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../app/servicios/Conexion.php";
require_once __DIR__ . "/../app/modelos/dao/ProductoDao.php";

class ListaProductosTest extends TestCase
{
    public function testListaProductosVacio()
    {
        $sql = 'select idProducto, p.nombre, c.categoria, pr.proveedor, p.precio, p.stock, 
        p.oferta, p.imagen from productosHabilitados p inner join categoria c on p.idCategoria = c.idCategoria 
        inner join proveedor pr on p.idProveedor = pr.IdProveedor where idProducto = 90;';
        $productoDao = new ProductoDao();
        $productos = $productoDao->obtenerProductos($sql);
        $this->assertEquals([], $productos);
    }

    public function testListaProductosLleno()
    {
        $sql = 'select idProducto, p.nombre, c.categoria, pr.proveedor, p.precio, p.stock, 
        p.oferta, p.imagen from productosHabilitados p inner join categoria c on p.idCategoria = c.idCategoria 
        inner join proveedor pr on p.idProveedor = pr.IdProveedor;';
        $productoDao = new ProductoDao();
        $productos = $productoDao->obtenerProductos($sql);
        $this->assertNotEmpty($productos);
    }
}
