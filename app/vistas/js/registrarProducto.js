const txtNombre = document.getElementById("nombre");
const txtStock = document.getElementById("stock");
const cbCategoria = document.getElementById("categoria");
const cbProveedor = document.getElementById("proveedor");
const txtPrecio = document.getElementById("precio");
const txtOferta = document.getElementById("oferta");
const imagen = document.getElementById("imagen");
const btnRegistrar = document.getElementById("registrar");
const btnCancelar = document.getElementById("cancelar");

function regresar() {
    window.location.href = $("#ruta").val() + "/productos";
}

txtStock.addEventListener("input", () => {
    txtStock.value = txtStock.value.replace(/[^0-9]/g, '');
});

txtPrecio.addEventListener("input", () => {
    txtPrecio.value = txtPrecio.value.replace(/[^0-9.]/g, '');
});

txtOferta.addEventListener("input", () => {
    txtOferta.value = txtOferta.value.replace(/[^0-9.]/g, '');
});

if (btnRegistrar != null) {
    btnRegistrar.addEventListener("click", function(e) {
        e.preventDefault();
        if (txtNombre.value == "" || txtPrecio.value == "" || txtStock.value == "" || imagen.files.length == 0) {
            let div = $("#mensaje");
            div.attr("class", "");
            let clase = "alert alert-warning";
            div.addClass(clase);
            div.append("Llene los campos requeridos.");
        } else {
            let datosProducto = new FormData();
            datosProducto.append("nombre", txtNombre.value);
            datosProducto.append("categoria", cbCategoria.options[cbCategoria.selectedIndex].text);
            datosProducto.append("proveedor", cbProveedor.options[cbProveedor.selectedIndex].text);
            datosProducto.append("precio", txtPrecio.value);
            datosProducto.append("stock", txtStock.value);
            datosProducto.append("oferta", (txtOferta.value == "") ? 0 : txtOferta.value);
            datosProducto.append("imagen", $("#imagen")[0].files[0]);
            $.ajax({
                url: $("#ruta").val() + "/app/controladores/ProductoReceptor.php?tipo=registrar",
                type: "post",
                data: datosProducto,
                contentType: false,
                processData: false,
                success: (respuesta) => {
                    respuesta = JSON.parse(respuesta);
                    if (respuesta == "registrado") {
                        Swal.fire({
                            title: "!Producto registrado!",
                            icon: "success",
                            preConfirm: regresar
                        });
                    } else {
                        Swal.fire({
                            title: "!Error!",
                            text: "Hubo un problema al registrar el producto.",
                            icon: "error"
                        });
                    }
                }
            });
        }
    });
}

btnCancelar.addEventListener("click", function(e) {
    e.preventDefault();
    regresar();
});
