<?php
function getcontacto($status, $delete)
{
    $i = 0;
    $query = query("select * from contacto where por_status=$status and por_delete=$delete");
    while ($fila = fetch_assoc($query)) {
        // $i=0;
        $i = $i + 1;
        $nombre = $fila['con_nombre'];
        $correo = $fila['con_correo'];
        $telefono = $fila['con_telefono'];
        $mensaje = $fila['con_mensaje'];
        $fecha = $fila['con_fecha'];
        $contacto = <<<DELIMITADOR
        <tr>
            <td>$i</td>
            <td>{$nombre}</td>
            <td>{$correo}</td>
            <td>$telefono</td>
            <td>$mensaje</td>
            <td>$fecha</td>
            <td>
                <a href="index.php?contacto_send={$fila['con_id']}" rel="{$fila['con_id']}" titulo="Responder Mensaje" table="contacto" param="responder" action="responder" class="delete_link btn btn-small btn-success">Responder</a>
            </td>
            <td>
                <a href="javascript:void(0)" rel="{$fila['con_id']}" titulo="Ignorar Mensaje" table="contacto" param="ignorar" action="ignorar" class="delete_link btn btn-small btn-warning">Ignorar</a>
            </td>
        </tr>
        DELIMITADOR;

        echo $contacto;
    }
}

function getContactosend()
{
    if (isset($_GET['contacto_send'])) {
        $id = limpiar_string(trim($_GET['contacto_send']));
        $query = query("select * from contacto where con_id = $id");
        $fila = fetch_assoc($query);
        return $fila;
    }
}
function getMessage($name, $email)
{
    if (isset($_POST['enviar'])) {
        $asunto = limpiar_string(trim($_POST['con_asunto']));
        //Nota. Cuerpo o contenido del mensaje. 
        $cuerpo = "Enviado desde www.mipagina.com.pe para cotizar" . "<br> ";
        $cuerpo .= "Nombre: " . $name . "<br> ";

        $cuerpo .= "Correo: " . $email . "<br> ";

        $cuerpo .= "Mensaje: " . limpiar_string(trim($_POST['con_mensaje'])) . "<br> ";

        if (sendMessagess($email, $asunto, $cuerpo)) {
            set_mensaje(display_msj("Mensaje enviado Correctamente", "success"));
            redirect('index.php?contacto');
        } else {
            set_mensaje(display_msj("Lo sentimos, no pudimos enviar su correo. Intentalo más tarde", "danger"));
            redirect("index.php?contacto");
        }
        // 
    }
}

function sendMessagess($email, $asunto, $message)
{
    send_email($email, $asunto, $message);
    return true;
}
