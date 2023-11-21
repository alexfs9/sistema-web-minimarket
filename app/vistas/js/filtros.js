const activarFiltros = document.getElementById('activar-filtros');
const categorias = $('#categorias');
const proveedores = $('#proveedores');
const precio = $('#precio');
const stock = $('#stock');
const btnFiltrar = $('#filtrar');

const filtros = [categorias, proveedores, precio, stock];
const propiedades = ['selectedIndex', 'disabled'];

function recorrerFiltros(propiedad, estado) {
    filtros.forEach(function(filtro) {
        if (filtro != null) {
            if (propiedad === 'selectedIndex') {
                // Primer índice
                filtro.prop(propiedad, 0);
            } else {
                // Deshabilitando botones, selectores
                filtro.prop(propiedad, estado)
            }
        }
    });
}

function cambiarEstadoFiltros(estado) {
    if (estado === true) {
        // Seleccionando el primer índice de los selectores
        recorrerFiltros(propiedades[0], estado);
    }
    // Desabilitando los selectores y botones
    recorrerFiltros(propiedades[1], estado);
    btnFiltrar.prop(propiedades[1], estado);
}

activarFiltros.addEventListener('change', function() {
    if (this.checked) {
        cambiarEstadoFiltros(false);
    } else {
        cambiarEstadoFiltros(true);
    }
});