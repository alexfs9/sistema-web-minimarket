const txtNombres = document.getElementById("nombres");
const txtApellidos = document.getElementById("apellidos");
const txtDni = document.getElementById("dni");
const txtTelefono = document.getElementById("telefono");
const txtCorreo = document.getElementById("correo");
const txtContrasena = document.getElementById("contrasena");
const btnRegistrarse = document.getElementById("registrarse");

function limitarAnumeros(txt) {
    txt.value = txt.value.replace(/[^0-9]/g, '');
}

function regresar() {
    window.location.href = $("#ruta").val() + "/iniciar-sesion"
}

txtDni.addEventListener("input", () => {
    limitarAnumeros(txtDni)
});
txtTelefono.addEventListener("input", () => {
    limitarAnumeros(txtTelefono);
});

btnRegistrarse.addEventListener("click", (e) => {
    e.preventDefault();
    if (txtNombres.value == "" || txtApellidos.value == "" || txtDni.value == "" 
    || txtTelefono.value == "" || txtCorreo.value == "" || txtContrasena.value == "") {
        Swal.fire({
            title: "Llene los campos.",
            icon: "warning"
        });
    } else {
        let cuenta = {
            nombres: txtNombres.value,
            apellidos: txtApellidos.value,
            dni: txtDni.value,
            telefono: txtTelefono.value,
            correo: txtCorreo.value,
            contrasena: txtContrasena.value
        };

        $.ajax({
            url: $("#ruta").val() + "/app/controladores/RegistrarseControlador.php",
            type: "post",
            data: cuenta,
            success: (respuesta) => {
                respuesta = JSON.parse(respuesta);
                if (respuesta == "registrado") {
                    Swal.fire({
                        title: "¡Cuenta creada con éxito!",
                        text: "Inice sesión con su correo y contraseña.",
                        icon: "success",
                        preConfirm: regresar
                    });
                } else {
                    Swal.fire({
                        title: "Problemas.",
                        text: "Hubo un inconveniente al crear su cuenta.",
                        icon: "error"
                    });
                }
            }
        });
    }
});