<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Cabeza.php';
require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/menu/Menu.php';

?>

<section id="nosotros">
    <h1 class="mt-2 text-center">Nosotros</h1>
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
                        locales. En Mendoza, nuestra misión es contribuir a la calidad de vida de nuestros clientes,
                        brindándoles comodidad, confiabilidad y productos esenciales de alta calidad en un solo lugar.
                        Estamos aquí para satisfacer las necesidades de la comunidad y ser un socio comprometido en
                        tiempos buenos y difíciles.</p>
                </li>
            </ul>
        </div>
        <div class="m-3 d-flex">
            <div class="m-2">
                <img class="img-fluid border border-success border-2 rounded shadow" src="<?php echo RUTA_RAIZ_WEB . '/app/vistas/img/aplicacion/fotoBodega.jpg'; ?>" alt="foto bodega mendoza">
            </div>
            <div class="m-2">
                <img class="img-fluid border border-success border-2 rounded shadow" src="<?php echo RUTA_RAIZ_WEB . '/app/vistas/img/aplicacion/fotoBodega1.jpg'; ?>" alt="foto bodega mendoza">
            </div>
        </div>
    </div>
</section>
<section id="contactanos" class="cambio-color">
    <h1 class="text-center">Contáctanos</h1>
    <div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="d-flex flex-column">
                <img src="<?php echo RUTA_RAIZ_WEB . '/app/vistas/img/aplicacion/direccion_icono.png'; ?>" alt="direccion ícono" class="img-fluid" style="width: 3rem; place-self: center;">
                <h5 class="text-decoration-underline fw-bold text-center">Dirección</h5>
                <p class="text-center">Asentamiento Humano villa Isolina, MZ X lote 17</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="d-flex flex-column">
                <img src="<?php echo RUTA_RAIZ_WEB . '/app/vistas/img/aplicacion/telefono-icono.png'; ?>" alt="teléfono ícono" class="img-fluid" style="width: 3rem; place-self: center;">
                <h5 class="text-decoration-underline fw-bold text-center">Teléfono</h5>
                <p class="text-center">944 255 155</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="d-flex flex-column">
                <img src="<?php echo RUTA_RAIZ_WEB . '/app/vistas/img/aplicacion/email_icono.png'; ?>" alt="correo ícono" class="img-fluid" style="width: 3rem; place-self: center;">
                <h5 class="text-decoration-underline fw-bold text-center">Correo</h5>
                <p class="text-center">Mendoza'store@gmail.com</p>
            </div>
        </div>
    </div>
    </div>
</section>
<section id="ubicanos">
    <h1 class="text-center">Ubícanos</h1>
    <div class="mb-2 d-flex justify-content-center align-items-center">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d243.96717833187822!2d-77.12546631664385!3d-11.941589832856074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2spe!4v1701748955090!5m2!1ses-419!2spe" title="Ubicación en mapa" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<?php

require_once RUTA_RAIZ_PHP . '/app/vistas/plantillas/pagina/Pie.php';

?>
