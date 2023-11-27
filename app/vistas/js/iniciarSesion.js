// Constantes
const alerta = "alert alert-";
// Obteniendo elementos del HTML
const txtCorreo = document.getElementById("correo");
const txtContrasena = document.getElementById("contrasena");
const divMensaje = document.getElementById("mensaje");
// Objeto json con los tipos de alerta utilizados en bootstrap
const tiposMensaje = {
    exito: "success", 
    advertencia: "warning", 
    peligro: "danger"
};

// Función que limpia los mensajes
function limpiarMensaje() {
    if (divMensaje.classList.length > 1) { // Si el elemento posee más de dos clases es porque tiene un mensaje
        let clases = Array.from(divMensaje.classList); // Obtiene un array con el nombre de las clases del div 
        // Eliminamos las clases de mensaje del elemento
        divMensaje.classList.remove(clases[1]);
        divMensaje.classList.remove(clases[2]);
        divMensaje.textContent = ""; // Se elimina el texto dentro del div
    }
}

// Función que muestra un mensaje
function mostrar(tipoMensaje, mensaje) {
    limpiarMensaje();
    $("#mensaje").addClass(alerta + tipoMensaje);
    $("#mensaje").append(mensaje);
}

// Limpia las entradas
function limpiarCampos() {
    txtCorreo.value = "";
    txtContrasena.value = "";
}

// Función que se ejecuta al hacer clic en el botón
function ingresar() {

    if (txtCorreo.value == "" || txtContrasena.value == "") {
        mostrar(tiposMensaje.advertencia, "Llene los campos.");
    } else {
        // Objeto json con los datos ingresados por el usuario
        let cuenta = {
            correo: $("#correo").val(),
            contrasena: $("#contrasena").val()
        };

        // Solicitud ajax al servidor php para enviar y recibir datos (post) sin recargar la página
        $.ajax({
            url: "app/controladores/IniciarSesionControlador.php",
            type: "post",
            data: cuenta, // Se envía el objeto json creado previamente con la información del correo y contraseña
            // Si el envío y recepción es exitoso se ejecuta:
            success: (respuesta) => {
                respuesta = JSON.parse(respuesta); // Damos formato a la respuesta en formato json
                    switch (respuesta) {
                        case "1":
                            //mostrar(tiposMensaje.exito, "Ha iniciado sesión.");
                            window.location.href = 'app/controladores/SesionControlador.php';
                            break;
                        case "2":
                            mostrar(tiposMensaje.advertencia, "Contraseña incorrecta.");
                            break;
                        case "3":
                            mostrar(tiposMensaje.peligro, "La cuenta ingresada no está registrada.");
                            break;
                        case "error":
                            mostrar(tiposMensaje.peligro, "Ocurrió un error al conectar con la base de datos.");
                            break;
                    }
                    limpiarCampos();
            },
            // Si ocurre algún error al enviar o recepcionar se ejecuta:
            error: () => {
                // Mostramos un mensaje para indicar el error
                mostrar(tiposMensaje.peligro, "Error al enviar datos.");
            }
        });
    }
}

// Asignándole una función al botón al hacer clic
$("#ingresar").click(ingresar);