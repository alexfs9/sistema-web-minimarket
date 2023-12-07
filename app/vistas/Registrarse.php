<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Cabeza.php';

?>

<div class="d-flex justify-content-center align-items-center vh-100">
    <form class="border border-danger border-2 rounded-2 p-4 col-md-3">
        <h1 class="text-center text-decoration-underline">Regístrese</h1>
        <div class="mb-3">
            <label for="nombres" class="form-label fw-semibold fs-5">
                <i class="fa-solid fa-user fa-lg"></i>
                Nombres:
            </label>
            <input type="text" class="form-control" id="nombres" name="nombres" maxlength="50" required>
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label fw-semibold fs-5">
                <i class="fa-solid fa-user fa-lg"></i>
                Apellidos:
            </label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" maxlength="50" required>
        </div>

        <div class="mb-3">
            <label for="dni" class="form-label fw-semibold fs-5">
                <i class="fa-regular fa-id-card fa-lg"></i>
                DNI:
            </label>
            <input type="text" class="form-control" id="dni" name="dni" maxlength="8" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label fw-semibold fs-5">
                <i class="fa-solid fa-mobile fa-lg"></i>
                Teléfono:
            </label>
            <input type="text" class="form-control" id="telefono" name="telefono" maxlength="9" required>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label fw-semibold fs-5">
                <i class="fa-solid fa-envelope fa-lg"></i>
                Correo electrónico:
            </label>
            <input type="email" class="form-control" id="correo" name="correo" maxlength="70" required>
        </div>
        <div class="mb-3">
            <label for="contrasena" class="form-label fw-semibold fs-5">
                <i class="fa-solid fa-key fa-lg"></i>
                Contraseña:
            </label>
            <input type="password" class="form-control" id="contrasena" name="contrasena" maxlength="16" required>
        </div>
        <div class="d-flex flex-column justify-content-center">
            <button type="submit" class="mb-3 btn btn-primary btn-lg" id="registrarse">
                <i class="fa-solid fa-user-plus fa-xl" style="color: #ffffff;"></i>
                Registrarse
            </button>
            <a href="<?php echo RUTA_RAIZ_WEB . '/iniciar-sesion'; ?>" class="btn btn-secondary btn-lg">
                <i class="fa-solid fa-backward fa-xl" style="color: #ffffff;"></i>
                Regresar
            </a>
        </div>
        <input type="hidden" id="ruta" value="<?php echo RUTA_RAIZ_WEB; ?>">
    </form>
</div>

<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Pie.php';

?>