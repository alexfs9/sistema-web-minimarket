<?php
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Cabeza.php'
?>
<div class="d-flex justify-content-center align-items-center vh-100">
    <form class="border border-danger border-2 rounded-2 p-4">
        <div class="d-flex justify-content-center">
            <img src=<?php echo '"' . RUTA_RAIZ_WEB . '/app/vistas/img/aplicacion/icono.png"';?> class="img-fluid rounded-3" alt="icono">
        </div>
        <h1 class="text-decoration-underline text-center">Iniciar Sesión</h1>
        <div class="mb-3" role="alert" id="mensaje"></div>
        <div class="mb-3">
            <label for="correo" class="form-label fw-semibold fs-5">
                <i class="fa-solid fa-envelope fa-lg"></i>
                Correo:
            </label>
            <input type="email" class="form-control" id="correo" name="correo">
        </div>
        <div class="mb-3">
            <label for="contrasena" class="form-label fw-semibold fs-5">
                <i class="fa-solid fa-key fa-lg"></i>
                Contraseña:
            </label>
            <input type="password" class="form-control" id="contrasena" name="contrasena">
        </div>
        <div class="d-flex justify-content-center mb-3">
            <button type="button" class="btn btn-lg btn-primary" id="ingresar" name="ingresar">
                <i class="fa-solid fa-right-to-bracket fa-lg" style="color: #ebebeb;"></i>
                Ingresar
            </button>
        </div>
        <p>¿No se ha registrado? <a href="" class="link-offset-3">Regístrese aquí.</a></p>
    </form>
</div>
<?php
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Pie.php'
?>