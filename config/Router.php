<?php
/*

-- RUTAS DEL SISTEMA --

(ruta) -> (cosas que se mostrarán al ingresar la ruta en el navegador)

/ -> visualizar ¿Quiénes somos?
/productos -> visualizar catalogo de productos
/productos/ver/nombreProducto -> visualizar info detallada del producto
/iniciar-sesion -> visualizar formulario para iniciar sesión
/registrarse -> visualizar formulario para registrarse
/carrito -> visualizar carrito de compras
/mi-perfil -> visualizar datos de la cuenta (permitir modificar datos), historial de compras realizadas, sugerencias y reclamaciones
/productos/registrar -> visualizar formulario para registrar un producto
/productos/codigoProducto/modificar -> visualizar formulario de modificar producto a través de su ID
/productos/codigoProducto/eliminar -> eliminar producto a través de su ID
/categorias -> visualizar listado de categorías que permita registrar, modificar, eliminar una categoría
/proveedores -> visualizar listado de proveedores que permita registrar, modificar, eliminar un proveedor
/proveedores/registrar -> visualizar formulario para registrar un proveedor
/proveedores/codigoProveedor/modificar -> visualizar formulario para modificar un proveedor a través de su ID
/proveedotes/codigoProveedor/eliminar -> eliminar un proveedor a través de su ID
/ventas -> visualizar listado de todas las ventas realizadas (filtros)
/clientes -> visualizar listado de todos los clientes registrados (mostrar datos relevantes sobre sus compras)

-- En la ruta /carrito se tendrá que comprobar que se inició sesión como cliente
-- En las rutas de /productos/listar, /categorias, /proveedores, /ventas, /clientes se tendrá que comprobar que se inició sesión como un admin

*/

require_once RUTA_RAIZ_PHP . '/app/controladores/ProductoControlador.php';
require_once RUTA_RAIZ_PHP . '/app/controladores/ProveedorControlador.php';

$vistas = array('productos', 'iniciar-sesion', 'registrarse', 'carrito', 'mi-perfil', 
                'categorias', 'proveedores', 'ventas', 'clientes');
$acciones = array('registrar', 'modificar', 'eliminar', 'ver');

function verificarLogeoAdmin() {
    //verifica si se logeo como admin
    //quiza usar sesiones (tema s.11)
}

function noEncontrado() {
    require_once RUTA_RAIZ_PHP . '/app/vistas/404.php';
}

$tipoUsuario = 'cliente'; // valores posibles: cliente ó admin

$cantidadVariablesRecibidas = count($_GET);

if ($cantidadVariablesRecibidas != 0) {

    $contenidoGet = array_keys($_GET);

    if (in_array($_GET['vista'], $vistas)) {
        if (in_array($_GET['vista'], array('productos', 'proveedores'))) {

            if ($_GET['vista'] == 'productos') {
                $entidad = new ProductoControlador();
            } else {
                $entidad = new ProveedorControlador();
            }
            
            if (!isset($_GET['accion'])) {
                if ($_GET['vista'] == 'productos') {
                    if ($tipoUsuario == 'admin') {
                        $entidad->cargarVistaLista();
                    } elseif ($tipoUsuario == 'cliente') {
                        $entidad->cargarVistaCatalogo();
                    }
                } else {
                    $entidad->cargarVistaLista();
                }
            } else {
                switch ($cantidadVariablesRecibidas) {
                    case 2:
                        if ($_GET['accion'] == 'registrar') {
                            $entidad->cargarVistaRegistrar();
                        } else {
                            noEncontrado();
                        }
                        break;
                    case 3:
                        switch ($_GET['accion']) {
                            case 'ver':
                                if ($_GET['vista'] == 'productos') {
                                    $entidad->cargarVistaVer();
                                } else {
                                    noEncontrado();
                                }
                                break;
                            case 'modificar':
                                $entidad->cargarVistaModificar();
                                break;
                            case 'eliminar':
                                $entidad->cargarVistaEliminar();
                                break;
                            default:
                                noEncontrado();
                                break;
                        }
                        break;
                }
            }
        } else {
            //redireccionar a pagina correspondiente
            //verificar logeo como admin en las paginas especificadas en las rutas
            echo 'se muestra vista de ' . $_GET['vista'];
        }
    } else {
        noEncontrado();
    }
} else {
    $archivosCss = array('principal');
    require_once RUTA_RAIZ_PHP . '/app/vistas/Principal.php';
}
