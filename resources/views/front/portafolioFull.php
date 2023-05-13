<?php $fila = get_portafolioItemFront(); ?>
<section class="portafolioFull">
    <div class="portafolioFull__contenedor contenedor">
        <div class="portafolioFull__contenedor__imgCol" style="background-image: url(img/portafolio/<?php echo $fila['por_imgLarge']; ?>)"></div>
        <div class="portafolioFull__contenedor__dataCol">
            <h2 class="titulo-n2 text-center mb-1"><?php echo $fila['por_titulo']; ?></h2>
            <h2 class="resumen-n2 text-center"><?php echo $fila['por_subtitulo']; ?></h2>
            <div class="portafolioFull__contenedor__dataCol__datos mt-3">
                <div class="portafolioFull__contenedor__dataCol__datos__col">
                    <div>
                        Publicado por <?php echo $fila['user_nombres'] . " " . $fila['user_apellidos']; ?></span>
                    </div>
                    <div><?php echo $fila['por_fecha']; ?></div>
                </div>
                <div class="portafolioFull__contenedor__dataCol__datos__col">
                    <i class="fa-regular fa-eye"></i> <?php echo $fila['por_vistas']; ?>
                </div>
            </div>
            <div class="portafolioFull__contenedor__dataCol__contenido mt-3">
                <p>
                    <?php echo $fila['por_contenido']; ?>
                </p>
            </div>
            <div class="portafolioFull__contenedor__dataCol__form mt-3">
                <h3 class="titulo-n3">Deja tu comentario</h3>
                <form class="portafolioFull__contenedor__dataCol__form pt-1 pb-1" method="post">
                    <div class="portafolioFull__contenedor__dataCol__form--formGroup">
                        <textarea name="com_mensaje" id="" cols="30" rows="3" required></textarea>
                    </div>
                    <button class="btn btn-amarillo" name="enviar">enviar comentario</button>
                </form>
                <div class="font-16">
                    <?php mostrar_msj(); ?>
                </div>
                <?php post_comentario($fila['por_id']); ?>
            </div>
            <div class="portafolioFull__contenedor__dataCol__comentarios mt-3">
                <?php get_comentarios($fila['por_id']) ?>
                <!-- <div class="portafolioFull__contenedor__dataCol__comentarios__box">
                    <div class="portafolioFull__contenedor__dataCol__comentarios__box__colImg">
                        <img src="https://via.placeholder.com/50" alt="">
                    </div>
                    <div class="portafolioFull__contenedor__dataCol__comentarios__box__colData">
                        <div class="portafolioFull__contenedor__dataCol__comentarios__box__colData__head">
                            <span>Eduardo Arroyo</span>
                            <span>19 dic 2022</span>
                        </div>
                        <div class="portafolioFull__contenedor__dataCol__comentarios__box__colData--comentario mt-1">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor fugit voluptatum laborum laudantium similique nesciunt, cumque deleniti earum natus ipsum distinctio, maxime odit sunt. Quia.
                        </div>
                    </div>
                </div>
                <div class="portafolioFull__contenedor__dataCol__comentarios__box">
                    <div class="portafolioFull__contenedor__dataCol__comentarios__box__colImg">
                        <img src="https://via.placeholder.com/50" alt="">
                    </div>
                    <div class="portafolioFull__contenedor__dataCol__comentarios__box__colData">
                        <div class="portafolioFull__contenedor__dataCol__comentarios__box__colData__head">
                            <span>Eduardo Arroyo</span>
                            <span>19 dic 2022</span>
                        </div>
                        <div class="portafolioFull__contenedor__dataCol__comentarios__box__colData--comentario mt-1">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor fugit voluptatum laborum laudantium similique nesciunt, cumque deleniti earum natus ipsum distinctio, maxime odit sunt. Quia.
                        </div>
                    </div>
                </div>
                <div class="portafolioFull__contenedor__dataCol__comentarios__box">
                    <div class="portafolioFull__contenedor__dataCol__comentarios__box__colImg">
                        <img src="https://via.placeholder.com/50" alt="">
                    </div>
                    <div class="portafolioFull__contenedor__dataCol__comentarios__box__colData">
                        <div class="portafolioFull__contenedor__dataCol__comentarios__box__colData__head">
                            <span>Eduardo Arroyo</span>
                            <span>19 dic 2022</span>
                        </div>
                        <div class="portafolioFull__contenedor__dataCol__comentarios__box__colData--comentario mt-1">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor fugit voluptatum laborum laudantium similique nesciunt, cumque deleniti earum natus ipsum distinctio, maxime odit sunt. Quia.
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>