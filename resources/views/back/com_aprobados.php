<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Comentarios Aprobados</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-3">
            <div class="card-body">
                <a href="index.php?comentarios" class="btn btn-primary"><i class="fas fa-plus"></i> Regresar </a>
            </div>
        </div>
        <?php mostrar_msj(); ?>
        <div class="card shadow">
            <div class="card-header">
                <h6 class="text-primary mb-0">Comentarios recibidos</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover table-responsive">
                    <thead>
                        <th>Nombre y Apellidos</th>
                        <th>Item</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                    </thead>
                    <tbody>
                        <?php
                        get_comentariosPorEstado(1);
                        ?>
                        <!-- <td>Juan Perez</td>
                        <td><a href="../portafolio.php?id=1" target="_blank">Illustration</a></td>
                        <td>Que bonito post</td>
                        <td>2023-04-28</td>
                        <td>13:25</td> -->
                    </tbody>
                </table>
                <?php
                pos_aprobar();
                ?>
            </div>
        </div>
    </div>
</div>