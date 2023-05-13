    <section id="5" class="page-section contacto pt-10 pb-10">

        <?php mostrar_msj(); ?>
        <div class="contacto__contenedor contenedor">
            <h2 class="titulo-n2 text-center text-white">contacto</h2>
            <p class="resumen-n2 text-center mt-2 mb-7">Contacte con nosotros</p>

            <form class="contacto__contenedor__form" method="post">

                <div class="contacto__contenedor__form__col">
                    <div class="contacto__contenedor__form__col--formGroup">
                        <input type="text" placeholder="Tu Nombre" name="nombre" required>
                    </div>
                    <div class="contacto__contenedor__form__col--formGroup">
                        <input type="email" placeholder="Tu Correo" name="correo">
                    </div>
                    <div class="contacto__contenedor__form__col--formGroup">
                        <input type="tel" placeholder="Tu Telefono" name="phone">
                    </div>
                </div>
                <div class="contacto__contenedor__form__col">
                    <div class="contacto__contenedor__form__col--formGroup h-100">
                        <textarea name="mensaje" placeholder="Tu mensaje" class="h-100" rows="7"></textarea>
                    </div>
                </div>
                <div class="contacto__contenedor__form--btnBox mt-4">
                    <!-- <input type="submit"> -->
                    <input type="submit" value="Enviar" class="alert-btn btn btn-success" name="enviar">
                </div>
            </form>


            <?php
            sendMessage()
            ?>
        </div>
    </section>