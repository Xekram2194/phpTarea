<?php
    function post_comentario($idItem){
        if(isset($_POST['enviar'])){
            if(validar_siAutenticado()){
                $com_mensaje = limpiar_string(trim($_POST['com_mensaje']));
                query("INSERT INTO comentarios (com_user_id, com_por_id, com_mensaje, com_fecha) VALUES ({$_SESSION['user_id']}, {$idItem}, '{$com_mensaje}', NOW())");
                set_mensaje("Su mensaje ha sido enviado, espere la aprobación del admin");
            } else{
                set_mensaje("Debes estar registrado o iniciar sesión");
            }
            redirect("portafolio.php?id={$idItem}");
        }
    }
    function get_comentarios($itemId){
        $query = query("SELECT * FROM comentarios a INNER JOIN usuarios b ON a.com_user_id = b.user_id WHERE a.com_status = 1 AND a.com_por_id = {$itemId}");
        while($fila = fetch_assoc($query)){
            if($fila['user_img'] == ''){
                $user_img = "https://via.placeholder.com/50";
            } else {
                $user_img = "img/perfil/{$fila['user_img']}";
            }
            $user = $fila['user_nombres'] . " " . $fila['user_apellidos'];
            $comentario = <<<DELIMITADOR
                <div class="portafolioFull__contenedor__dataCol__comentarios__box">
                    <div class="portafolioFull__contenedor__dataCol__comentarios__box__colImg">
                        <img src="{$user_img}" alt="">
                    </div>
                    <div class="portafolioFull__contenedor__dataCol__comentarios__box__colData">
                        <div class="portafolioFull__contenedor__dataCol__comentarios__box__colData__head">
                            <span>{$user}</span>
                            <span>{$fila['com_fecha']}</span>
                        </div>
                        <div class="portafolioFull__contenedor__dataCol__comentarios__box__colData--comentario mt-1">
                            {$fila['com_mensaje']}
                        </div>
                    </div>
                </div>
DELIMITADOR;
            echo $comentario;
        }
    }
