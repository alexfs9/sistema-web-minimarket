const alerta = "alert alert-";
const txtCorreo = document.getElementById("correo");
const txtContrasena = document.getElementById("contrasena");
const divMensaje = document.getElementById("mensaje");
const btnCancelar = document.getElementById("cancelar");

const tiposMensaje = {
    exito: "success", 
    advertencia: "warning", 
    peligro: "danger"
};

function limpiarMensaje() {
    if (divMensaje.classList.length > 1) {
        let clases = Array.from(divMensaje.classList);
        divMensaje.classList.remove(clases[1]);
        divMensaje.classList.remove(clases[2]);
        divMensaje.textContent = "";
    }
}

function mostrar(tipoMensaje, mensaje) {
    limpiarMensaje();
    $("#mensaje").addClass(alerta + tipoMensaje);
    $("#mensaje").append(mensaje);
}

function limpiarCampos() {
    txtCorreo.value = "";
    txtContrasena.value = "";
}

function ingresar() {
    if (txtCorreo.value == "" || txtContrasena.value == "") {
        mostrar(tiposMensaje.advertencia, "Llene los campos.");
    } else {
        let cuenta = {
            correo: $("#correo").val(),
            contrasena: $("#contrasena").val()
        };

        $.ajax({
            url: "app/controladores/IniciarSesionControlador.php",
            type: "post",
            data: cuenta,
            success: (respuesta) => {
                respuesta = JSON.parse(respuesta);
                    switch (respuesta) {
                        case "1":
                            window.location.href = 'app/controladores/SesionControlador.php';
                            break;
                        case "2":
                            mostrar(tiposMensaje.advertencia, "Contraseña incorrecta.");
                            break;
                        case "3":
                            mostrar(tiposMensaje.peligro, "La cuenta ingresada no está registrada.");
                            break;
                    }
                    limpiarCampos();
            },
            error: () => {
                mostrar(tiposMensaje.peligro, "Error al enviar datos.");
            }
        });
    }
}

btnCancelar.addEventListener("click", () => {
    window.location.href = $("#ruta").val() + "/";
});

$("#ingresar").click(ingresar);