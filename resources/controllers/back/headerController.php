<?php
    function post_header_edit(){
        if(isset($_POST['editar'])){
            $hea_logo = limpiar_string(trim($_POST['hea_logo']));
            $hea_subtitulo = limpiar_string(trim($_POST['hea_subtitulo']));
            $hea_titulo = limpiar_string(trim($_POST['hea_titulo']));

            query("UPDATE header SET hea_logo = '{$hea_logo}', hea_subtitulo = '{$hea_subtitulo}', hea_titulo = '{$hea_titulo}'");
            $msj = "La portada se editó correctamente";
            set_mensaje(display_msj($msj, 'danger'));
            redirect("index.php?header");
        }
    }

?>