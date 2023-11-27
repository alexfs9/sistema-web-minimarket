<?php
echo '<div class="mt-1 mb-1 card" id="producto-' . $producto['idProducto'] . '" style="width: 17rem;">';
echo '<div class="position-relative">';
if ($producto['oferta'] != 0) {
    echo '<span class="badge rounded-pill text-bg-info position-absolute top-0 start-0 ms-2 mt-2 fs-3">-' . $producto['oferta'] . '%</span>';
}
if ($producto['stock'] == 0) {
    echo '<span class="badge rounded-pill text-bg-danger position-absolute top-50 start-50 translate-middle fs-3">Agotado</span>';
}
echo '<img src="app/vistas/img/subidas/' . $producto['imagen'] . '" class="card-img-top" alt="' . $producto['imagen'] . '">';
echo '</div>';
echo '<div class="card-body d-flex flex-column justify-content-between">';
echo '<h5 class="card-title text-center">' . $producto['nombre'] . '</h5>';
echo '<div class="d-flex flex-row justify-content-evenly fs-5">';
if ($producto['oferta'] != 0) {
    $oferta = $producto['precio'] * $producto['oferta'];
    $precioNuevo = $producto['precio'] - ($oferta / 100);
    echo '<p class="card-text text-secondary text-decoration-line-through fw-semibold">S/. ' . $producto['precio'] . '</p>';
    echo '<p class="card-text text-success fw-semibold">S/. ' . $precioNuevo . '</p>';
} else {
    echo '<p class="card-text text-success fw-semibold">S/. ' . $producto['precio'] . '</p>';
}
echo '</div>';
echo '<div class="d-flex flex-row justify-content-evenly">';
echo '<div class="mt-1 input-group" style="margin-right: 10px;">';
echo '<button type="button" class="btn btn-outline-secondary btn-sm">-</button>';
echo '<input type="text" class="form-control text-center btn btn-sm" value="1" disabled>';
echo '<button type="button" class="btn btn-outline-secondary btn-sm">+</button>';
echo '</div>';
if ($producto['stock'] == 0) {
    $desactivado = 'disabled';
} else {
    $desactivado = '';
}
echo '<input type="button" value="Añadir al carrito" class="mt-1 btn btn-primary btn-sm" ' . $desactivado . '/>';
echo '</div>';
echo '</div>';
$tildes = array('á', 'é', 'í', 'ó', 'ú', 'ü', 'ñ', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ü', 'Ñ');
$sinTildes = array('a', 'e', 'i', 'o', 'u', 'u', 'n', 'A', 'E', 'I', 'O', 'U', 'U', 'N');
$nombreIdeal = str_replace(' ', '-', strtolower($producto['nombre']));
$nombreIdeal = str_replace(['[', ']'], '', $nombreIdeal);
$nombreIdeal = str_replace('.', '-', $nombreIdeal);
$nombreIdeal = strtr($nombreIdeal, array_combine($tildes, $sinTildes));
echo '<a href="' . RUTA_RAIZ_WEB . '/productos/ver/' . $producto['idProducto'] . '-' . $nombreIdeal . '" class="m-2 mt-0 btn btn-danger btn-sm">';
echo 'Ver más';
echo '</a>';
echo '</div>';
