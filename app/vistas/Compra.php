<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Cabeza.php';
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/menu/Menu.php';
require_once RUTA_RAIZ_PHP . '/app/controladores/CarritoControlador.php';
require_once RUTA_RAIZ_PHP . '/app/controladores/CompraControlador.php';

?>

<div class="mt-2 mb-2 container">
    <h1 class="text-primary text-decoration-underline text-center">Finalice su compra</h1>
    <div class="row">
        <div class="col-12 col-md-7">
            <h2 class="text-info-emphasis">Detalle de la compra:</h2>
            <div class="table-responsive">
                <table class="table align-middle text-center">
                    <?php
                    $columnas = array('PRODUCTO', 'CANTIDAD', 'SUBTOTAL');
                    $clase = 'table-warning';
                    require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/tabla/Cabecera.php';
                    ?>
                    <tbody class="table-group-divider" id="contenedor-productos-carrito">
                        <?php
                        $carritoControlador = new CarritoControlador();
                        $compraControlador = new CompraControlador();
                        $productos = $carritoControlador->consultarProductos();
                        $compraControlador->mostrarProductos($productos);
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="mb-2 d-flex justify-content-end">
                <label class="me-3 text-danger-emphasis fs-2">TOTAL: </label>
                <label class="me-1 text-info-emphasis fs-2"><?php echo 'S/. ' . $carritoControlador->calcularPrecioTotal(); ?></label>
            </div>
        </div>
        <div class="col-12 col-md-5">
            <h3 class="text-info-emphasis">Seleccione el tipo de entrega:</h3>
            <div class="d-flex justify-content-around">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipo-entrega" id="recojo-tienda">
                    <label class="form-check-label" for="recojo-tienda">
                        Recojo en tienda
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipo-entrega" id="delivery">
                    <label class="form-check-label" for="delivery">
                        Delivery
                    </label>
                </div>
            </div>
            <div class="mt-1 mb-1 d-flex align-items-center">
                <label for="direccion">
                    <i class="me-2 fa-solid fa-location-dot fa-xl"></i>
                </label>
                <input type="text" class="form-control" id="direccion" placeholder="Ingrese su dirección" disabled>
            </div>
            <h3 class="text-info-emphasis">Seleccione su método de pago:</h3>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" id="campo-tarjeta" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="me-2 fa-solid fa-credit-card fa-xl"></i>
                            Tarjeta de débito/crédito
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?php
                            if (isset($_SESSION['cuenta'])) {
                                $nombres = $_SESSION['cuenta']['nombres'];
                                $apellidos = $_SESSION['cuenta']['apellidos'];
                                $correo = $_SESSION['cuenta']['correo'];
                            }
                            ?>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="num-tarjeta">
                                    <i class="me-1 fa-regular fa-credit-card fa-xl"></i>
                                </label>
                                <input type="text" class="form-control" id="num-tarjeta" placeholder="Número de tarjeta">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="cvv">
                                    <i class="me-2 fa-solid fa-shield-halved fa-xl"></i>
                                </label>
                                <input type="text" class="form-control" id="cvv" maxlength="3" placeholder="CVV">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="nombres">
                                    <i class="me-1 fa-solid fa-user fa-2xl"></i>
                                </label>
                                <input type="text" class="form-control" id="nombres" value="<?php echo $nombres; ?>" placeholder="Nombres">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="apellidos">
                                    <i class="me-1 fa-solid fa-user fa-2xl"></i>
                                </label>
                                <input type="text" class="form-control" id="apellidos" value="<?php echo $apellidos; ?>" placeholder="Apellidos">
                            </div>
                            <div class="d-flex align-items-center">
                                <label for="correo">
                                    <i class="me-2 fa-solid fa-envelope fa-xl"></i>
                                </label>
                                <input type="email" class="form-control" id="correo" value="<?php echo $correo; ?>" placeholder="Correo electrónico">
                            </div>
                            <div class="mt-2 d-flex justify-content-center">
                                <button type="button" class="btn btn-success" id="comprar-tarjeta" onclick="finalizarCompra(1)">
                                    <i class="fa-solid fa-money-bill-wave fa-xl" style="color: #ffffff;"></i>
                                    Comprar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" id="campo-yape" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <img src="<?php echo RUTA_RAIZ_WEB . '/app/vistas/img/aplicacion/yapeIcono.png'; ?>" alt="yape" class="me-2 img-fluid rounded-3" style="width: 2rem; height: auto;">
                            Yape
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="mb-3 d-flex align-items-center">
                                <label for="telefono">
                                    <i class="me-1 fa-solid fa-mobile fa-2xl"></i>
                                </label>
                                <input type="email" class="form-control" id="telefono" placeholder="Ingresa tu celular Yape">
                            </div>
                            <div class="d-flex align-items-center">
                                <label for="codigo">
                                    <i class="me-1 fa-solid fa-key fa-xl"></i>
                                </label>
                                <input type="email" class="form-control" id="codigo" placeholder="Ingresa tu código de aprobación">
                            </div>
                            <div class="mt-2 d-flex justify-content-center">
                                <button type="button" class="btn btn-success" id="comprar-yape" onclick="finalizarCompra(2)">
                                    <i class="fa-solid fa-money-bill-wave fa-xl" style="color: #ffffff;"></i>
                                    Comprar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-1 mb-0 border border-primary">
    <div class="mt-1 d-flex justify-content-center">
        <button type="button" class="btn btn-warning btn-lg" id="regresar">
            <i class="fa-solid fa-backward fa-xl"></i>
            Regresar
        </button>
    </div>
    <input type="hidden" id="ruta" value="<?php echo RUTA_RAIZ_WEB; ?>">
</div>

<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Pie.php';

?>
