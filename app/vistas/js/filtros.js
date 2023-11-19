const activarFiltros = document.getElementById('activar-filtros');
const categorias = $('#categorias');
const proveedores = $('#proveedores');
const precio = $('#precio');
const stock = $('#stock');
const btnFiltrar = $('#filtrar');

const filtros = [categorias, proveedores, precio, stock];

function limpiarFiltros() {
    filtros.forEach(function(filtro) {
        if (filtro != null) {
            filtro.prop('selectedIndex', 0);
        }
    });
}

function cambiarEstadoFiltros(estado) {
    if (estado === true) {
        limpiarFiltros();
    }
    filtros.forEach(function(filtro){
        if (filtro != null) {
            filtro.prop('disabled', estado);
        }
    });
    btnFiltrar.prop('disabled', estado);
}

activarFiltros.addEventListener('change', function() {
    if (this.checked) {
        cambiarEstadoFiltros(false);
    } else {
        cambiarEstadoFiltros(true);
    }
});