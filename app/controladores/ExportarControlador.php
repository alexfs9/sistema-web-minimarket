<?php

class ExportarControlador {

    public function exportarExcel($registros, $nombreArchivo) {
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=" . $nombreArchivo);
        $mostrar_columnas = false;

        foreach ($registros as $registro) {
            if (!$mostrar_columnas) {
                echo implode("\t", array_keys($registro)) . "\n";
                $mostrar_columnas = true;
            }
            echo implode("\t", array_values($registro)) . "\n";
        }
    }
}