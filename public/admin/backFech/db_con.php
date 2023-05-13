<?php

// ⚡⚡ DATABASE
defined("DB_HOST") ? NULL : define("DB_HOST", "localhost");
defined("DB_USER") ? NULL : define("DB_USER", "root");
defined("DB_PASS") ? NULL : define("DB_PASS", "");
defined("DB_NAME") ? NULL : define("DB_NAME", "agencia");

$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// if($conexion){
//     echo "conexion exitosa";
// }
mysqli_set_charset($conexion, "utf8");

function query($consulta)
{
    global $conexion;
    return mysqli_query($conexion, $consulta);
}
