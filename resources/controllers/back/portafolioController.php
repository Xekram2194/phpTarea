<?php
    function get_portafolio($status){
        $query = query("SELECT * FROM portafolios WHERE por_status = '{$status}' AND por_delete = 1 AND por_user_id = {$_SESSION['user_id']}");
        while($fila = fetch_assoc($query)){
            $item = <<<DELIMITADOR
                <tr>
                    <td>{$fila['por_titulo']}</td>
                    <td>
                        <img src="../img/portafolio/{$fila['por_imgSmall']}" alt="{$fila['por_titulo']}" width="200">
                    </td>
                    <td style="width: 40%;">
                        {$fila['por_contenido']}
                    </td>
                    <td>{$fila['por_fecha']}</td>
                    <td>{$fila['por_status']}</td>
                    <td>{$fila['por_vistas']}</td>
                    <td>
                        <a href="index.php?portafolio_edit={$fila['por_id']}" class="btn btn-small btn-info">editar</a>
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-small btn-danger delete_link" rel="{$fila['por_id']}" titulo="Eliminar Item" table="portafolio" param="delete" action="Eliminar">borrar</a>
                    </td>
                </tr>
DELIMITADOR;
            echo $item;
        }
    }

    function post_deleteItem(){
        if(isset($_GET['delete'])){
            $id = limpiar_string(trim($_GET['delete']));
            query("UPDATE portafolios SET por_delete = 0 WHERE por_id = {$id}");
            set_mensaje(display_msj("Elemento desactivado correctamente", "success"));
            redirect("index.php?portafolio");
        }
    }

    function post_portafolio_add(){
        if(isset($_POST['guardar'])){
            // echo 'funciona';
            $por_titulo = limpiar_string(trim($_POST['por_titulo']));
            $por_subtitulo = limpiar_string(trim($_POST['por_subtitulo']));
            $por_contenido = limpiar_string(trim($_POST['por_contenido']));
            $por_status = limpiar_string(trim($_POST['por_status']));

            $por_imgSmallName = $_FILES['por_imgSmall']['name'];
            $por_imgSmallTmp = $_FILES['por_imgSmall']['tmp_name'];
            $por_imgLargeName = $_FILES['por_imgLarge']['name'];
            $por_imgLargeTmp = $_FILES['por_imgLarge']['tmp_name'];

            // gatito.png => ['gatito', 'png']
            $por_imgSmallName = md5(uniqid()) . "." . explode(".", $por_imgSmallName)[1];
            $por_imgLargeName = md5(uniqid()) . "." . explode(".", $por_imgLargeName)[1];
            // echo $por_imgSmallName;

            move_uploaded_file($por_imgSmallTmp, "../img/portafolio/{$por_imgSmallName}");
            move_uploaded_file($por_imgLargeTmp, "../img/portafolio/{$por_imgLargeName}");

            query("INSERT INTO portafolios (por_user_id, por_titulo, por_subtitulo, por_imgSmall, por_imgLarge, por_contenido, por_fecha, por_status) VALUES ({$_SESSION['user_id']}, '{$por_titulo}', '{$por_subtitulo}', '{$por_imgSmallName}', '{$por_imgLargeName}', '{$por_contenido}', NOW(), '{$por_status}')");
            set_mensaje(display_msj('Item agregado correctamente', 'success'));
            redirect('index.php?portafolio');
        }
    }

    function get_portafolio_item(){
        if(isset($_GET['portafolio_edit'])){
            $id = limpiar_string(trim($_GET['portafolio_edit']));
            // echo $id;
            $query = query("SELECT * FROM portafolios WHERE por_id = {$id} AND por_user_id = {$_SESSION['user_id']}");
            $fila = fetch_assoc($query);
            $por_user_id = $fila['por_user_id'];
            if($por_user_id != $_SESSION['user_id']){
                redirect("index.php?portafolio");
            }
            return $fila;
        }
    }

    function get_statusItem($status){
        if($status == 'publicado'){
            ?>
                <option value="pendiente">pendiente</option>
        <?php } else {
            ?>
                <option value="publicado">publicado</option>
        <?php }
    }

    function post_portafolioEdit($id, $imgSmall, $imgLarge){
        if(isset($_POST['editar'])){
            // echo 'funciona';
            $por_titulo = limpiar_string(trim($_POST['por_titulo']));
            $por_subtitulo = limpiar_string(trim($_POST['por_subtitulo']));
            $por_contenido = limpiar_string(trim($_POST['por_contenido']));
            $por_status = limpiar_string(trim($_POST['por_status']));

            $por_imgSmallName = $_FILES['por_imgSmall']['name'];
            $por_imgSmallTmp = $_FILES['por_imgSmall']['tmp_name'];
            $por_imgLargeName = $_FILES['por_imgLarge']['name'];
            $por_imgLargeTmp = $_FILES['por_imgLarge']['tmp_name'];

            if($por_imgSmallName != ''){
                $por_imgSmallName = md5(uniqid()) . "." . explode(".", $por_imgSmallName)[1];
                move_uploaded_file($por_imgSmallTmp, "../img/portafolio/{$por_imgSmallName}");
                $imgSmallLocation = "../img/portafolio/{$imgSmall}";
                unlink($imgSmallLocation);
                // echo $por_imgSmallName;
            } else {
                // echo $imgSmall;
                $por_imgSmallName = $imgSmall;
            }

            if($por_imgLargeName != ''){
                $por_imgLargeName = md5(uniqid()) . "." . explode(".", $por_imgLargeName)[1];
                move_uploaded_file($por_imgLargeTmp, "../img/portafolio/{$por_imgLargeName}");
                $imgLargelLocation = "../img/portafolio/{$imgLarge}";
                unlink($imgLargelLocation);
            } else {
                $por_imgLargeName = $imgLarge;
            }

            query("UPDATE portafolios SET por_titulo = '{$por_titulo}', por_subtitulo = '{$por_subtitulo}', por_contenido = '{$por_contenido}', por_status = '{$por_status}', por_imgSmall = '{$por_imgSmallName}', por_imgLarge = '{$por_imgLargeName}' WHERE por_id = {$id}");
            set_mensaje(display_msj("Item editado correctamente", "success"));
            redirect("index.php?portafolio");
        }
    }
?>