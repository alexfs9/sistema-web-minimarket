    <footer class="footer">
            <div class="footer__data">
                <div class="footer__left">
                    <h2 class="left__title">Comunícate con nosotros</h2>
                    <div class="footer__contact__desktop">
                        <ul class="footer__contact">
                            <li class="footer__contact--li">
                                <i class="fa-solid fa-shop" style="color: #000000;"></i>
                                <div>
                                    <b class="contac__title">Dirección</b>
                                    <br>
                                    <span class="contac__descripcion">Asentamiento Humano villa Isolina, MZ X lote 17</span>
                                </div>
                            </li>
                            <li class="footer__contact--li">
                                <i class="fa-solid fa-envelope" style="color: #000000;"></i>
                                <div>
                                    <b class="contac__title">Escríbenos</b>
                                    <br>
                                    <span class="contac__descripcion">Estamos para ayudarte <br>
                                        <a href="mailto:Mendoza'store@gmail.com" target="_blank">Mendoza'store@gmail.com</a>
                                    </span>
                                </div>
                            </li>
                            <li class="footer__contact--li">
                                <i class="fa-solid fa-phone" style="color: #000000;"></i>
                                <div>
                                    <b class="contac__title">Llámanos</b>
                                    <br>
                                    <span class="contac__descripcion">Centro de servicio al cliente: <br>
                                        <a href="tel:+51944255155" target="_self" title="Llámanos al">944 255 155</a>
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__social">
                        <h4 class="footer__social--title"> Síguenos en: </h4>
                        <div class="footer__social--icon">
                            <a class="Follow" target="_blank" title="Facebook" href="#">
                                <i class="fa-brands fa-facebook" style="color: #000000;"></i>
                            </a>
                            <a class="Follow" target="_blank" title="Twitter" href="#">
                                <i class="fa-brands fa-twitter" style="color: #000000;"></i>
                            </a>
                            <a class="Follow" target="_blank" title="Instagram" href="#">
                                <i class="fa-brands fa-instagram" style="color: #000000;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="footer__company__container">
                <div class="footer__company__title">Minimarket Mendoza - 2023</div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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
