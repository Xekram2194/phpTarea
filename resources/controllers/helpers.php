<?php
function query($consulta)
{
    global $conexion;
    return mysqli_query($conexion, $consulta);
}

function fetch_assoc($query)
{
    return mysqli_fetch_assoc($query);
}

function confirmar($query)
{
    global $conexion;
    if (!$query) {
        die("fallo en la conexión " . mysqli_error($conexion));
    }
}

function limpiar_string($str)
{
    global $conexion;
    return mysqli_real_escape_string($conexion, $str);
}

function redirect($location)
{
    header("Location: $location");
}

function set_mensaje($msj)
{
    if (!empty($msj)) {
        $_SESSION['mensaje'] = $msj;
    } else {
        $msj = '';
    }
}


function mostrar_msj()
{
    if (isset($_SESSION['mensaje'])) {
        echo $_SESSION['mensaje'];
        unset($_SESSION['mensaje']);
    }
}

function display_msj($msj, $tipo)
{
    $msj = <<<DELIMITADOR
            <div class="alert alert-$tipo alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> $msj.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>            
DELIMITADOR;
    return $msj;
}
function setalert($msj)
{
    $msj = <<<DELIMITADOR
        <div class="alert-contacto">
            <div class="alert">
                <span class="close-btn">&times;</span>
                <p class="letra-alert">$msj</p>
            </div>
        </div>
        DELIMITADOR;
    return $msj;
}

function email_existe($email)
{
    $query = query("SELECT user_email FROM usuarios WHERE user_email = '{$email}'");
    if (mysqli_num_rows($query) >= 1) {
        return true;
    }
    return false;
}

function contar_filas($query)
{
    return mysqli_num_rows($query);
}

function validar_siAutenticado()
{
    if (!isset($_SESSION['user_rol'])) {
        return false;
    }
    return true;
}

function post_validacionElemento($status, $table, $campo, $campo_id, $id)
{
    query("UPDATE {$table} SET {$campo} = {$status} WHERE {$campo_id} = {$id}");
    set_mensaje(display_msj("El cambio se ejecuto correctamente", "success"));
    redirect("index.php?{$table}");
}
