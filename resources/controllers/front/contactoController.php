<?php
function sendMessage()
{
    if (isset($_POST['enviar'])) {
        $con_name = limpiar_string(trim($_POST['nombre']));
        $con_correo = limpiar_string(trim($_POST['correo']));
        $con_phone = limpiar_string(trim($_POST['phone']));
        $con_mensaje = limpiar_string(trim($_POST['mensaje']));

        query("INSERT INTO contacto (con_nombre,con_correo,con_telefono,con_mensaje,con_fecha) VALUES ('{$con_name}','{$con_correo}','{$con_phone}','{$con_mensaje}', NOW())");
        set_mensaje(setalert("Mensaje Enviado Correctamente"));

        redirect("http://localhost/phpTarea/public/#5");
    }
}
