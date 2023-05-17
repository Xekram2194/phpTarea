<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Responder Mensaje </h1>
</div>
<div class="row">

    <?php
    $fila = getContactosend();
    getMessage($fila['con_nombre'], $fila['con_correo']);
    ?>
    <div class="col-md-6">
        <div class="card shadow mb-3">
            <div class="card-body">
                <a href="index.php?contacto" class="btn btn-primary"><i class="fas fa-plus"></i> Regresar </a>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-header">
                <h6 class="text-primary mb-0">Responder a: <span class="text-uppercase"><?php echo $fila['con_nombre']; ?> </span></h6>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="con_asunto">Asunto</label>
                        <input type="text" class="form-control" id="con_asunto" name="con_asunto">
                    </div>
                    <div class="form-group">
                        <label for="con_mensaje">Mensaje</label>
                        <textarea name="con_mensaje" id="con_mensaje" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="d-grid gap-2 col-2 mx-auto">
                        <input type="submit" value="Enviar" class="btn btn-outline-success btn-lg" name="enviar">
                    </div>
                </form>
                <?php ?>
            </div>
        </div>
    </div>
</div>