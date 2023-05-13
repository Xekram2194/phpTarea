<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Header</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <?php mostrar_msj(); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="text-info mb-0 font-weight-bold">
                    Editar elementos de portada
                </h6>
            </div>
            <div class="card-body">
                <?php $fila = getDataHeader(); ?>
                <form method="post">
                    <div class="form-group">
                        <label for="hea_logo">Texto Logo</label>
                        <input type="text" id="hea_logo" name="hea_logo" class="form-control" value="<?php echo $fila['hea_logo']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="hea_subtitulo">Subtítulo</label>
                        <input type="text" id="hea_subtitulo" name="hea_subtitulo" class="form-control" value="<?php echo $fila['hea_subtitulo']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="hea_titulo">Título</label>
                        <input type="text" id="hea_titulo" name="hea_titulo" class="form-control" value="<?php echo $fila['hea_titulo']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Editar" name="editar" class="btn btn-info">
                    </div>
                </form>
                <?php post_header_edit(); ?>
            </div>
        </div>
    </div>
</div>