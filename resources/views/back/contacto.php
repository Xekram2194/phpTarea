<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Contacto</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-3">
            <div class="card-body">
                <a href="index.php?com_aprobados" class="btn btn-success"> Mensajes Respondidos </a>
                <!-- <a href="index.php?com_desaprobados" class="btn btn-primary ml-2">Mensajes sin Respuesta</a> -->
                <a href="index.php?com_desaprobados" class="btn btn-warning ml-2">Mensajes Ignorados</a>
            </div>
        </div>
        <div class="car shadow">
            <div class="card-header">
                <h6 class="text-primary mb-0">Mensajes recibidos</h6>
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
                        <th>Responder</th>
                        <th>Ignorar</th>
                    </thead>
                    <tbody>
                       <?php getcontacto(0,0) ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>