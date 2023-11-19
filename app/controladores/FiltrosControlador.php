<?php

require_once 'app/modelos/dao/FiltrosDao.php';

class FiltrosControlador {

    public function cargarFiltro($idElemento, $filtro) {
        $label = ucfirst($filtro);
        echo '<div class="mb-2 col-12 col-md-3">';
        echo '<label class="mb-1 form-check-label" for="' . $idElemento . '">' . $label . ':</label>';
        echo '<select class="form-select" id="' . $idElemento . '" disabled>';
        echo '<option selected>-- SELECCIONE --</option>';
        $filtrosDao = new FiltrosDao();
        $campo = $filtrosDao->obtenerFiltro($filtro);
        $this->mostrarFiltro($filtro, $campo);
        echo '</select>';
        echo '</div>';
    }

    private function mostrarFiltro($filtro, $campo) {
        foreach ($campo as $valor) {
            echo '<option value="' . $valor['id'] . '">' . $valor[$filtro] . '</option>';
        }
    }
}