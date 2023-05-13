<?php
function get_cantidadPortafoilio($tabla)
{
    $query = query("select * from $tabla");
    return contar_filas($query);
}
