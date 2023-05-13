<?php
    function validar_user_login(){
        if(isset($_POST['login'])){
            $user_email = limpiar_string(trim($_POST['user_email']));
            $user_pass = limpiar_string(trim($_POST['user_pass']));
            $user_recuerdame = limpiar_string(trim($_POST['user_recuerdame']));

            // echo $user_recuerdame;
            if(login_user($user_email, $user_pass, $user_recuerdame)){
                redirect('./');
            } else {
                set_mensaje(display_msj("Tu correo o contraseña son incorrectos, intentalo otra vez 😢", "danger"));
                redirect("login.php");
            }
        }
    }

    function login_user($email, $pass, $recuerdame){
        $query = query("SELECT * FROM usuarios WHERE user_email = '{$email}' AND user_status = 1");
        if(contar_filas($query) == 1){
            $fila = fetch_assoc($query);
            $user_id = $fila['user_id'];
            $user_nombres = $fila['user_nombres'];
            $user_apellidos = $fila['user_apellidos'];
            $user_pass = $fila['user_pass'];
            $user_rol = $fila['user_rol'];

            if(password_verify($pass, $user_pass)){
                if($recuerdame == 'on'){
                    setcookie('email', $email, time() + 86400);
                } else {
                    setcookie('email', $email, time() + 60);
                }
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_nombres'] = $user_nombres;
                $_SESSION['user_apellidos'] = $user_apellidos;
                $_SESSION['user_rol'] = $user_rol;

                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

?>