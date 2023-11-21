<?php
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Cabeza.php';
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/menu/Menu.php';
?>
<section id="nosotros">
    <h1 class="text-center">Nosotros</h1>
    <div class="container">
        <div>
            <h4>Misión:</h4>
            <ul class="mb-2">
                <li>
                    <p class="parrafos">Nuestra misión es proporcionar a nuestra comunidad una solución conveniente
                        y confiable para satisfacer sus necesidades básicas diarias. A través de la oferta
                        de productos deprimera necesidad de alta calidad, un servicio amable y accesible,
                        y una experiencia decompra cómoda, nos comprometemos a ser el destino preferido para
                        abastecerse de alimentos,productos de higiene y otros artículos esenciales. Valoramos
                        la satisfacción de nuestros clientes y nos esforzamos por ser un apoyo constante en
                        sus vidas, facilitando el acceso a los productos esenciales que requieren en su día
                        a día.</p>
                </li>
            </ul>
        </div>
        <div>
            <h4>Visión:</h4>
            <ul class="mb-2">
                <li>
                    <p class="parrafos">Nuestros principios fundamentales son la integridad, la calidad y la responsabilidad
                        social. Nos enorgullece servir a la comunidad con productos frescos, precios competitivos
                        y un ambiente seguro y agradable. Además, estamos comprometidos con prácticas comerciales
                        éticas y sostenibles, minimizando nuestro impacto en el medio ambiente y apoyando a causas
                        locales. En San José,nuestra misión es contribuir a la calidad de vida de nuestros clientes,
                        brindándoles comodidad, confiabilidad y productos esenciales de alta calidad en un solo lugar.
                        Estamos aquí para satisfacer las necesidades de la comunidad y ser un socio comprometido en
                        tiempos buenos y difíciles.</p>
                </li>
            </ul>
        </div>
        <div class="ratio ratio-16x9 mb-2">
            <iframe src="https://www.youtube.com/embed/2B1XUixgmWI?si=lVN87JFR9Oke-6r1" title="Video M. San José" allowfullscreen></iframe>
        </div>
    </div>
</section>
<section id="contactanos" class="cambio-color">
    <h1 class="text-center">Contáctanos</h1>
    <div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="d-flex flex-column">
                <img src=<?php echo '"' . RUTA_RAIZ_WEB . '/app/vistas/img/aplicacion/direccion_icono.png"';?> alt="direccion ícono" class="img-fluid" style="width: 3rem; place-self: center;">
                <h5 class="text-decoration-underline fw-bold text-center">Dirección</h5>
                <p class="text-center">Av Metropolitana #300, Lima, Perú</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="d-flex flex-column">
                <img src=<?php echo '"' . RUTA_RAIZ_WEB . '/app/vistas/img/aplicacion/telefono-icono.png"';?> alt="teléfono ícono" class="img-fluid" style="width: 3rem; place-self: center;">
                <h5 class="text-decoration-underline fw-bold text-center">Teléfono</h5>
                <p class="text-center">999888777</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="d-flex flex-column">
                <img src=<?php echo '"' . RUTA_RAIZ_WEB . '/app/vistas/img/aplicacion/email_icono.png"';?> alt="correo ícono" class="img-fluid" style="width: 3rem; place-self: center;">
                <h5 class="text-decoration-underline fw-bold text-center">Correo</h5>
                <p class="text-center">ejemplo@gmail.com</p>
            </div>
        </div>
    </div>
    </div>
</section>
<section id="ubicanos">
    <h1 class="text-center">Ubícanos</h1>
    <div class="mb-2 d-flex justify-content-center align-items-center">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d975.7563017499873!2d-77.06043363767009!3d-11.972756594386741!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105ce35ac372ea7%3A0xe8c3c0b3a139e708!2zTWluaU1hcmtldCBDYWbDqSAiRG9uIEpvc8OpIg!5e0!3m2!1ses-419!2spe!4v1700512869430!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>
<section id="sugerencias" class="cambio-color">
    <h1 class="text-center">Sugerencias</h1>
</section>
<section id="reclamaciones">
    <h1 class="text-center">Reclamaciones</h1>
</section>
<?php
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Pie.php';
?>