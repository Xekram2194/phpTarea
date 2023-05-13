<?php
    ob_start();
    session_start();
    // session_destroy();
    // echo DIRECTORY_SEPARATOR; //  "\" o "/"
    defined("DS") ? NULL : define("DS", DIRECTORY_SEPARATOR);
    // echo DS; 

    // ⚡⚡ DEFINIR RUTAS RELATIVAS PARA LAS VISTAS PUB (PUBLIC, ADMIN)
    defined("VIEW_FRONT") ? NULL : define("VIEW_FRONT", __DIR__ . DS . "views" . DS . "front");
    defined("VIEW_BACK") ? NULL : define("VIEW_BACK", __DIR__ . DS . "views" . DS . "back");
    // echo VIEW_BACK;

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

    require_once("caller.php");
?>