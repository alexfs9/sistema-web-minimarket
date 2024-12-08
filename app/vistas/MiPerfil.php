<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Cabeza.php';
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/menu/Menu.php';
require_once RUTA_RAIZ_PHP . '/app/controladores/CuentaControlador.php';

$cuentaControlador = new CuentaControlador();

const CODIGO = 'CÓDIGO';
const RUTA_CABECERA = RUTA_RAIZ_PHP . '/app/vistas/plantillas/tabla/Cabecera.php';

?>

<div class="mt-2 mb-2 container">
    <h1 class="text-primary text-decoration-underline text-center">Cuenta</h1>
    <div class="accordion" id="cuenta">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="me-2 fa-solid fa-user fa-2xl"></i>
                    MIS DATOS
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row">
                        <div class="col-12 col-md-2 d-flex justify-content-center align-items-center">
                            <img class="img-fluid border border-2 border-info rounded-circle" src="<?php echo RUTA_RAIZ_WEB . '/app/vistas/img/perfil/' . $_SESSION['cuenta']['foto']; ?>" alt="<?php echo $_SESSION['cuenta']['foto']; ?>" style="width: 10rem; height: auto;">
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="mb-3">
                                <label for="id-cuenta" class="form-label fw-semibold">
                                    <i class="fa-solid fa-barcode fa-xl"></i>
                                    Código de cuenta:
                                </label>
                                <input type="text" class="form-control" id="id-cuenta" value="<?php echo $_SESSION['cuenta']['idCuenta']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="nombres" class="form-label fw-semibold">
                                    <i class="me-2 fa-solid fa-user fa-xl"></i>
                                    Nombres:
                                </label>
                                <input type="text" class="form-control" id="nombres" value="<?php echo $_SESSION['cuenta']['nombres']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label fw-semibold">
                                    <i class="me-2 fa-solid fa-user fa-xl"></i>
                                    Apellidos:
                                </label>
                                <input type="text" class="form-control" id="apellidos" value="<?php echo $_SESSION['cuenta']['apellidos']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="mb-3">
                                <label for="telefono" class="form-label fw-semibold">
                                    <i class="fa-solid fa-mobile fa-xl"></i>
                                    Número de teléfono:
                                </label>
                                <input type="text" class="form-control" id="telefono" value="<?php echo $_SESSION['cuenta']['telefono']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label fw-semibold">
                                    <i class="fa-solid fa-envelope fa-xl"></i>
                                    Correo:
                                </label>
                                <input type="text" class="form-control" id="correo" value="<?php echo $_SESSION['cuenta']['correo']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="rol" class="form-label fw-semibold">
                                    <i class="fa-solid fa-user-gear fa-xl"></i>
                                    Tipo de cuenta:
                                </label>
                                <input type="text" class="form-control" id="rol" value="<?php echo $_SESSION['cuenta']['rol']; ?>" disabled>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="me-2 fa-solid fa-cart-shopping fa-xl"></i>
                    MIS COMPRAS
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="table-responsive">
                        <table class="table text-center align-middle text-center">
                            <thead>
                                <?php
                                $columnas = array(CODIGO, 'FECHA', 'TIPO PAGO', 'TIPO ENTREGA', 'DIRECCIÓN', 'P. TOTAL', 'BOLETA');
                                $clase = 'table-success';
                                include RUTA_CABECERA;
                                ?>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                $cuentaControlador->consultarCompras();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <i class="me-2 fa-solid fa-check-to-slot fa-xl"></i>
                    MIS SUGERENCIAS
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="table-responsive">
                        <table class="table text-center align-middle text-center">
                            <thead>
                                <?php
                                $columnas = array(CODIGO, 'ASUNTO', 'SUGERENCIA', 'FECHA');
                                $clase = 'table-info';
                                include RUTA_CABECERA;
                                ?>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                $cuentaControlador->consultarSugerencias();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <i class="me-1 fa-solid fa-circle-exclamation fa-2xl"></i>
                    MIS RECLAMOS
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="table-responsive">
                        <table class="table text-center align-middle text-center">
                            <thead>
                                <?php
                                $columnas = array(CODIGO, 'RECLAMO', 'FECHA');
                                $clase = 'table-danger';
                                include RUTA_CABECERA;
                                ?>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                $cuentaControlador->consultarReclamos();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Pie.php';

?>
