<?php
function get_comentariosPorEstado($status)
{
    $query = query("SELECT * FROM comentarios a INNER JOIN usuarios b ON a.com_user_id = b.user_id INNER JOIN portafolios c ON a.com_por_id = c.por_id WHERE a.com_status = {$status} AND c.por_user_id = {$_SESSION['user_id']}");
    while ($fila = fetch_assoc($query)) {
        $com_usuario = $fila['user_nombres'] . " " . $fila['user_apellidos'];
        $fecha = explode(' ', $fila['com_fecha'])[0];
        $hora = explode(' ', $fila['com_fecha'])[1];
        $cometario = <<<DELIMITADOR
                <tr>
                    <td>{$com_usuario}</td>
                    <td><a href="../portafolio.php?id={$fila['por_id']}" target="_blank">{$fila['por_titulo']}</a></td>
                    <th>{$fila['com_mensaje']}</th>
                    <td>{$fecha}</td>
                    <td>{$hora}</td>
        DELIMITADOR;
        $botones = <<<DELIMITADOR
                    <td>
                        <a href="javascript:void(0)" rel="{$fila['com_id']}" titulo="Aprobar Comentario" table="comentarios" param="aprobar" action="Aprobar" class="delete_link btn btn-small btn-success">Aprobar</a>
                    </td>
                    <td>
                        <a href="javascript:void(0)" rel="{$fila['com_id']}" titulo="Desaprobar Comentario" table="comentarios" param="desaprobar" action="Desaprobar" class="delete_link btn btn-small btn-danger">Desaprobar</a>
                    </td>
                </tr>
DELIMITADOR;
        echo $cometario;
        if ($status == 0) {
            echo $botones;
        }
    }
}

function pos_aprobar()
{
    if (isset($_GET['aprobar'])) {
        $id = limpiar_string(trim($_GET['aprobar']));
        $status = 1;
        post_validacionElemento($status, 'comentarios', 'com_status', 'com_id', $id);
    }
    if (isset($_GET['desaprobar'])) {
        $id = limpiar_string(trim($_GET['desaprobar']));
        $status = 2;
        post_validacionElemento($status, 'comentarios', 'com_status', 'com_id', $id);
    }
}
