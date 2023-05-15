<?php 
function getcontacto($status, $delete){
    $i = 0;
    $query = query("select * from contacto where por_status=$status and por_delete=$delete");
    while($fila = fetch_assoc($query)){
        // $i=0;
        $i = $i+1; 
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

function getContactosend(){
    if(isset($_GET['contacto_send'])){
        $id = limpiar_string(trim($_GET['contacto_send']));
        $query = query("select * from contacto where con_id = $id");
        $fila = fetch_assoc($query);
        return $fila;
    }
}