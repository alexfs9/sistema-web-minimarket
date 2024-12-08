const txtDireccion = document.getElementById("direccion");
const rbtnRecojo = document.getElementById("recojo-tienda");
const rbtnDelivery = document.getElementById("delivery");
const btnRegresar = document.getElementById("regresar");

function deshabilitarUbicacion() {
    txtDireccion.disabled = true;
    txtDireccion.value = "";
    if (rbtnDelivery.checked) {
        txtDireccion.disabled = false;
    }
}

function regresar() {
    window.location.href = $("#ruta").val() + "/mi-perfil";
}

function finalizarCompra(tPago) {
    if (!rbtnRecojo.checked && !rbtnDelivery.checked) {
        Swal.fire({
            title: "Llene los campos.",
            icon: "warning"
        });
    } else {
        if (rbtnDelivery.checked && txtDireccion.value == "") {
            Swal.fire({
                title: "Ingrese su dirección.",
                icon: "warning"
            });
        } else {
            const tEntrega = (rbtnRecojo.checked) ? 1 : 2;
            let venta = {
                tipoPago: tPago,
                tipoEntrega: tEntrega
            };
            if (tEntrega == 2) {
                venta.direccion = txtDireccion.value;
            }
            
            $.ajax({
                url: $("#ruta").val() + "/app/controladores/CompraReceptor.php?accion=registrar",
                type: "post",
                data: venta,
                success: (respuesta) => {
                    respuesta = JSON.parse(respuesta);
                    if (respuesta == "ok") {
                        Swal.fire({
                            title: "¡Compra realizada con éxito!",
                            icon: "success",
                            preConfirm: regresar
                        });
                    } else {
                        Swal.fire({
                            title: "¡Ocurrió un problema al realizar la compra!",
                            icon: "error",
                            preConfirm: regresar
                        });
                    }
                }
            });
        }
    }
}

rbtnRecojo.addEventListener("change", () => {
    deshabilitarUbicacion();
});

rbtnDelivery.addEventListener("change", () => {
    deshabilitarUbicacion();
});

btnRegresar.addEventListener("click", () => {
    window.location.href = $("#ruta").val() + '/carrito';
});