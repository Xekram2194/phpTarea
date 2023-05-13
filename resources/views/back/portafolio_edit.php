<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Editar Item del Portafolio</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body">
                <?php $fila = get_portafolio_item(); ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="por_titulo">Título</label>
                        <input type="text" class="form-control" id="por_titulo" name="por_titulo" value="<?php echo $fila['por_titulo']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="por_subtitulo">Sub Título</label>
                        <input type="text" class="form-control" id="por_subtitulo" name="por_subtitulo" value="<?php echo $fila['por_subtitulo']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="por_imgSmall">Imagen Small</label>
                        <br>
                        <img src="../img/portafolio/<?php echo $fila['por_imgSmall']; ?>" alt="" width="200">
                        <input type="file" class="form-control mt-3" id="por_imgSmall" name="por_imgSmall" accept=".png, .jpg, .jpeg, .svg">
                    </div>
                    <div class="form-group">
                        <label for="por_imgLarge">Imagen Large</label>
                        <br>
                        <img src="../img/portafolio/<?php echo $fila['por_imgLarge']; ?>" alt="" width="200">
                        <input type="file" class="form-control mt-3" id="por_imgLarge" name="por_imgLarge">
                    </div>
                    <div class="form-group">
                        <label for="por_contenido">Contenido</label>
                        <textarea name="por_contenido" id="por_contenido" rows="3" class="form-control"><?php echo $fila['por_contenido']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="por_status">Estado</label>
                        <select name="por_status" id="por_status" class="form-control" required>
                            <option value="<?php echo $fila['por_status']; ?>">
                                <?php echo $fila['por_status']; ?>
                            </option>
                            <?php get_statusItem($fila['por_status']); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Editar" class="btn btn-success" name="editar">
                    </div>
                </form>
                <?php post_portafolioEdit($fila['por_id'], $fila['por_imgSmall'], $fila['por_imgLarge']); ?>
            </div>
        </div>
    </div>
</div>