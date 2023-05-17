<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Contacto</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-3">
            <div class="card-body">
                <a href="index.php?contacto" class="btn btn-primary"><i class="fas fa-plus"></i> Regresar </a>
            </div>
        </div>
        <?php
        mostrar_msj(); ?>
        <div class="car shadow">
            <div class="card-header">
                <h6 class="text-primary mb-0">Mensajes Respondidos</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover table-responsive">
                    <thead>
                        <th>Nro</th>
                        <th>Nombre y Apellidos</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Mensaje</th>
                        <th>Fecha de Envio</th>
                    </thead>
                    <tbody>
                        <?php getcontacto(1, 0) ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>