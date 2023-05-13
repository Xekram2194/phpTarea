<?php
    function get_portafolioFront(){
        $query = query("SELECT * FROM portafolios WHERE por_status = 'publicado' AND por_delete = 1");
        while($fila = fetch_assoc($query)){
            $item = <<<DELIMITADOR
                <a href="portafolio.php?id={$fila['por_id']}" class="portafolio__contenedor__box__item">
                    <div class="portafolio__contenedor__box__item__imgBox">
                        <img src="img/portafolio/{$fila['por_imgSmall']}" alt="{$fila['por_titulo']}">
                        <div>
                            <i class="fa-solid fa-plus"></i>
                        </div>
                    </div>
                    <div class="portafolio__contenedor__box__item__data pt-3 pb-3">
                        <h3 class="titulo-n3 text-center">{$fila['por_titulo']}</h3>
                        <p class="resumen-n3 text-center text-italic">{$fila['por_subtitulo']}</p>
                    </div>
                </a>
DELIMITADOR;
            echo $item;
        }
    }

    function get_portafolioItemFront(){
        if(isset($_GET['id'])){
            $id = limpiar_string(trim($_GET['id']));
            $query = query("SELECT * FROM portafolios WHERE por_id = {$id} AND por_status = 'publicado' AND por_delete = 1");
            $fila = fetch_assoc($query);
            if(!$fila){
                redirect("./");
            }
            query("UPDATE portafolios SET por_vistas = por_vistas + 1 WHERE por_id = {$id}");
            $query = query("SELECT * FROM portafolios a INNER JOIN usuarios b ON a.por_user_id = b.user_id WHERE por_id = {$id}");
            $fila = fetch_assoc($query);
            return $fila;
        }
    }
?>