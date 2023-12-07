function actualizarPrecioTotal() {
    let elementos = document.querySelectorAll("[id^='subtotal-']");
    let precioTotal = 0;
    for (let i = 0; i < elementos.length; i++) {
        let idElemento = elementos[i].getAttribute('id');
        let idProducto = idElemento.split("-")[1];
        const campoSubtotal = document.getElementById("subtotal-" + idProducto);
        const subtotal = parseFloat(campoSubtotal.innerHTML.trim());
        precioTotal += subtotal;
    }
    let campoPrecioFinal = document.getElementById("precio-total");
    campoPrecioFinal.textContent = "S/. " + precioTotal;
}

function actualizarPrecios(id) {
    let campoSubtotal = document.getElementById("subtotal-" + id);
    const campoCantidad = document.getElementById("cantidad-" + id);
    const campoPrecio = document.getElementById("precio-" + id);
    let precioNuevo = parseInt(campoCantidad.value) * parseFloat(campoPrecio.innerHTML.trim());
    campoSubtotal.innerHTML = precioNuevo.toFixed(2);
    actualizarPrecioTotal();
}

function agregarEnCarrito(id) {
    let campoCantidad = document.getElementById("cantidad-" + id);
    let campoPrecio = document.getElementById("precio-" + id);
    let campoStock = parseInt(campoCantidad.max);
    campoCantidad = parseInt(campoCantidad.value);
    campoPrecio = parseFloat(campoPrecio.textContent.split(" ")[1]);
    let dato = {
        idProducto: id,
        cantidad: campoCantidad,
        precio: campoPrecio,
        stock: campoStock
    };
    
    $.ajax({
        url: $("#ruta").val() + "/app/controladores/CarritoReceptor.php?accion=agregar",
        type: "post",
        data: dato,
        success: (respuesta) => {
            respuesta = JSON.parse(respuesta);
            switch (respuesta) {
                case 1:
                    Swal.fire({
                        title: "!Producto agregado al carrito!",
                        icon: "success"
                    });
                    break;
                case 2:
                    Swal.fire({
                        title: "El producto ya está agregado en el carrito.",
                        icon: "warning"
                    });
                    break;
            }
        }
    });
}

function eliminarEnCarrito(id) {
    let dato = {
        idProducto: id
    };
    console.log("eliminando: " + id);
    $.ajax({
        url: $("#ruta").val() + "/app/controladores/CarritoReceptor.php?accion=eliminar",
        type: "post",
        data: dato,
        success: (respuesta) => {
            if (respuesta != "") {
                $("#contenedor-productos-carrito").empty();
                $("#contenedor-productos-carrito").html(respuesta);
                actualizarPrecioTotal();
            } else {
                window.location.href = $("#ruta").val() + '/productos';
            }
        }
    });
}

window.onload = actualizarPrecioTotal;