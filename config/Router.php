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

$vistas = array('productos', 'iniciar-sesion', 'registrarse', 'carrito', 'compra', 'mi-perfil', 
            'categorias', 'proveedores', 'ventas', 'clientes', 'sugerencias', 
            'reclamaciones', 'cerrar-sesion');
$acciones = array('registrar', 'modificar', 'eliminar', 'ver');

function esAdmin() {
    if (isset($_SESSION['cuenta'])) {
        if ($_SESSION['cuenta']['rol'] == 'Administrador') {
            return true;
        }
    }
    return false;
}

function mostrarVista($archivo, $archivosCss, $archivosJs) {
    require_once RUTA_RAIZ_PHP . '/app/vistas/' . $archivo . '.php';
}

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
                    if (esAdmin()) {
                        $entidad->cargarVistaLista();
                    } else {
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
                            mostrarVista('404', null, null);
                        }
                        break;
                    case 3:
                        switch ($_GET['accion']) {
                            case 'ver':
                                if ($_GET['vista'] == 'productos') {
                                    $entidad->cargarVistaVer();
                                } else {
                                    mostrarVista('404', null, null);
                                }
                                break;
                            case 'modificar':
                                $entidad->cargarVistaModificar();
                                break;
                            case 'eliminar':
                                $entidad->cargarVistaEliminar();
                                break;
                            default:
                                mostrarVista('404', null, null);
                                break;
                        }
                        break;
                    default:
                        break;
                }
            }
        } else {
            switch ($_GET['vista']) {
                case 'registrarse':
                    mostrarVista('Registrarse', array('ingreso'), array('registrarse'));
                    break;
                case 'iniciar-sesion':
                    mostrarVista('IniciarSesion', array('ingreso'), array('iniciarSesion'));
                    break;
                case 'mi-perfil':
                    mostrarVista('MiPerfil', null, null);
                    break;
                case 'carrito':
                    mostrarVista('Carrito', null, array('cantidadProducto', 'carrito'));
                    break;
                case 'compra':
                    mostrarVista('Compra', null, array('compra'));
                    break;
                case 'sugerencias':
                    mostrarVista('Sugerencias', null, null);
                    break;
                case 'reclamaciones':
                    mostrarVista('Reclamaciones', null, null);
                    break;
                case 'ventas':
                    mostrarVista('Ventas', null, null);
                    break;
                case 'clientes':
                    mostrarVista('Clientes', null, null);
                    break;
                case 'categorias':
                    mostrarVista('Categorias', null, null);
                    break;
                case 'cerrar-sesion':
                    mostrarVista('CerrarSesion', null, null);
                    break;
                default:
                    break;
            }
        }
    } else {
        mostrarVista('404', null, null);
    }
} else {
    mostrarVista('Principal', array('principal'), null);
}
