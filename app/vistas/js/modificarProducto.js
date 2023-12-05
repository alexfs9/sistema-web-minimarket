const txtIdProducto = document.getElementById("id-producto");
const imagenNueva = document.getElementById("imagenNueva");
const btnModificar = document.getElementById("modificar");

function asignarCb() {
    let categorias = cbCategoria.options;
    let indiceCategoria = Array.prototype.findIndex.call(categorias, function(categoria) {
        return categoria.text === $("#nombreCategoria").val();
    })
    cbCategoria.selectedIndex = indiceCategoria;

    let proveedores = cbProveedor.options;
    let indiceProveedor = Array.prototype.findIndex.call(proveedores, function(proveedor) {
        return proveedor.text === $("#nombreProveedor").val();
    })
    cbProveedor.selectedIndex = indiceProveedor;
}

btnModificar.addEventListener("click", function(e) {
    e.preventDefault();
    if (txtNombre.value == "" || txtPrecio.value == "" || txtStock.value == "") {
        let div = $("#mensaje");
        div.attr("class", "");
        let clase = "alert alert-warning";
        div.addClass(clase);
        div.append("Hay campos requeridos vacios.");
    } else {
        let datosProducto = new FormData();
        datosProducto.append("idProducto", txtIdProducto.value);
        datosProducto.append("nombre", txtNombre.value);
        datosProducto.append("categoria", cbCategoria.options[cbCategoria.selectedIndex].text);
        datosProducto.append("proveedor", cbProveedor.options[cbProveedor.selectedIndex].text);
        datosProducto.append("precio", txtPrecio.value);
        datosProducto.append("stock", txtStock.value);
        datosProducto.append("oferta", (txtOferta.value == "") ? 0 : txtOferta.value);
        datosProducto.append("imagenActual", $("#imagenActual").val());
        if (imagenNueva.files.length == 0) {
            datosProducto.append("imagenNueva", $("#imagenActual").val());
        } else {
            datosProducto.append("imagenNueva", $("#imagenNueva")[0].files[0]);
        }
        $.ajax({
            url: $("#ruta").val() + "/app/controladores/ProductoReceptor.php?tipo=modificar",
            type: "post",
            data: datosProducto,
            contentType: false,
            processData: false,
            success: (respuesta) => {
                respuesta = JSON.parse(respuesta);
                if (respuesta == "modificado") {
                    Swal.fire({
                        title: "!Producto modificado!",
                        icon: "success",
                        preConfirm: regresar
                    });
                } else {
                    Swal.fire({
                        title: "!Error!",
                        text: "Hubo un problema al modificar el producto.",
                        icon: "error"
                    });
                }
            }
        });
    }
});

window.onload = asignarCb;