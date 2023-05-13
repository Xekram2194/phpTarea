<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Portafolios</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-3">
            <div class="card-body">
                <a href="index.php?portafolio_add" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar item</a>
                <a href="index.php?portafolio_pendiente" class="btn btn-success ml-2">Items pendientes</a>
            </div>
        </div>
        <?php mostrar_msj(); ?>
        <div class="card shadow">
            <div class="card-header">
                <h6 class="text-primary mb-0">Tabla de items</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover table-responsive">
                    <thead>
                        <th>Título</th>
                        <th>Img Small</th>
                        <th>Contenido</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Vistas</th>
                    </thead>
                    <tbody>
                        <?php get_portafolio("publicado"); ?>
                    </tbody>
                </table>
                <?php post_deleteItem(); ?>
            </div>
        </div>
    </div>
</div>