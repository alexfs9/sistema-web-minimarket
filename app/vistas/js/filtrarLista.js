const txtIdProducto = document.getElementById("codigo");
const txtNombre = document.getElementById("nombre");
const cbCategoria = document.getElementById("categorias");
const cbStock = document.getElementById("stock");
const cbPrecio = document.getElementById("precio");
const btnBuscar = document.getElementById("buscar");
const btnLimpiar = document.getElementById("limpiar");

var filtros = {};

function actualizarCatalogo() {
    //console.log(filtros);
    
    $.ajax({
        url: "app/controladores/FiltrosReceptor.php?tipo=2",
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
    cbStock.selectedIndex = 0;
    cbPrecio.selectedIndex = 0;
    filtros = {};
    //actualizarCatalogo();
}

txtIdProducto.addEventListener("input", () => {
    limpiarEntradas();
    txtIdProducto.value = txtIdProducto.value.replace(/[^0-9.]/g, '');
    filtros.idProducto = txtIdProducto.value;
    btnBuscar.disabled = false;
    if (txtIdProducto.value == "") {
        delete filtros.idProducto;
        btnBuscar.disabled = true;
        actualizarCatalogo();
    }
});

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

cbStock.addEventListener("change", () => {
    if (cbStock.selectedIndex > 0) {
        filtros.stock = cbStock.selectedIndex;
        cbPrecio.selectedIndex = 0;
        delete filtros.precio;
    } else {
        delete filtros.stock;
    }
    actualizarCatalogo();
});

cbPrecio.addEventListener("change", () => {
    if (cbPrecio.selectedIndex > 0) {
        filtros.precio = cbPrecio.selectedIndex;
        cbStock.selectedIndex = 0;
        delete filtros.stock;
    } else {
        delete filtros.precio;
    }
    actualizarCatalogo();
});

btnBuscar.addEventListener("click", actualizarCatalogo);

btnLimpiar.addEventListener("click", () => {
    txtIdProducto.value = "";
    delete filtros.idProducto;
    btnBuscar.disabled = true;
    limpiarEntradas();
    actualizarCatalogo();
});