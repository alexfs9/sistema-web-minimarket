        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <?php
        if (isset($archivosJs) && empty($arhivosJs)) {
            foreach ($archivosJs as $archivo) {
                echo '<script src="' . RUTA_RAIZ_WEB . '/app/vistas/js/' . $archivo . '.js"></script>';
            }            
        }
        ?>
    </body>
</html>