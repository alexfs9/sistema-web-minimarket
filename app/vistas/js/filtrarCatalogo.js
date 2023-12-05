const txtNombre = document.getElementById("nombre");
const cbCategoria = document.getElementById("categorias");
const cbPrecio = document.getElementById("precio");
const btnLimpiar = document.getElementById("limpiar");
const divContenedor = document.getElementById("contenedor-productos");

var filtros = {};

function actualizarCatalogo() {
    $.ajax({
        url: "app/controladores/FiltrosReceptor.php?tipo=1",
        type: "post",
        data: filtros,
        success: (respuesta) => {
            $("#contenedor-productos").empty();
            $("#contenedor-productos").html(respuesta);
        }
    });
}

function limpiarEntradas() {
    txtNombre.value = "";
    cbCategoria.selectedIndex = 0;
    cbPrecio.selectedIndex = 0;
    filtros = {};
    actualizarCatalogo();
}

txtNombre.addEventListener("input", () => {
    filtros.nombre = txtNombre.value;
    if (txtNombre.value == "") {
        delete filtros.nombre;
    }
    actualizarCatalogo();
});

cbCategoria.addEventListener("change", () => {
    if (cbCategoria.selectedIndex > 0) {
        filtros.categoria = cbCategoria.options[cbCategoria.selectedIndex].text;
    } else {
        delete filtros.categoria;
    }
    actualizarCatalogo();
});

cbPrecio.addEventListener("change", () => {
    if (cbPrecio.selectedIndex > 0) {
        filtros.precio = cbPrecio.selectedIndex;
    } else {
        delete filtros.precio;
    }
    actualizarCatalogo();
});

btnLimpiar.addEventListener("click", limpiarEntradas);