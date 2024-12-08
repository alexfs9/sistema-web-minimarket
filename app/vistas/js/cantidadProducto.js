let btnDisminuir;
let campoCantidad;
let btnAumentar;
const cantidadMinima = 1;
let cantidadActual;
let cantidadMaxima;

function definirElementos(id) {
    btnDisminuir = document.getElementById("disminuir-" + id);
    campoCantidad = document.getElementById("cantidad-" + id);
    btnAumentar = document.getElementById("aumentar-" + id);
    cantidadMaxima = parseInt(campoCantidad.max);
    cantidadActual = parseInt(campoCantidad.value);
}

function estadoBoton() {
    btnDisminuir.disabled = false;
    btnAumentar.disabled = false;
    if (cantidadActual == cantidadMinima) {
        btnDisminuir.disabled = true;
    }
    if (cantidadActual == cantidadMaxima) {
        btnAumentar.disabled = true;
    }
}

function accionar(accionId) {
    let accion = accionId.split("-")[0];
    let id = accionId.split("-")[1];
    definirElementos(id);
    if (accion === "disminuir") {
        if (cantidadActual > cantidadMinima) {
            cantidadActual -= 1;
            campoCantidad.value = cantidadActual;
            estadoBoton();
        }
    } else {
        if (cantidadActual < cantidadMaxima) {
            cantidadActual += 1;
            campoCantidad.value = cantidadActual;
            estadoBoton();
        }
    }
}