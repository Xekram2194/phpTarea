<nav class="nav">
    <div class="nav__contenedor contenedor">
        <?php $fila = getDataHeader(); ?>
        <a href="./" class="nav__contenedor--logo">
            <?php echo $fila['hea_logo']; ?>
        </a>
        <ul class="nav__contenedor__menu">
            <li class="nav__contenedor__menu__item">
                <a href="#1" class="nav__contenedor__menu__item--link">servicios</a>
            </li>
            <li class="nav__contenedor__menu__item">
                <a href="#2" class="nav__contenedor__menu__item--link">portafolio</a>
            </li>
            <li class="nav__contenedor__menu__item">
                <a href="#3" class="nav__contenedor__menu__item--link">about</a>
            </li>
            <li class="nav__contenedor__menu__item">
                <a href="#4" class="nav__contenedor__menu__item--link">equipo</a>
            </li>
            <li class="nav__contenedor__menu__item">
                <a href="#5" class="nav__contenedor__menu__item--link">
                    contacto
                </a>
            </li>
            <?php
            if (isset($_SESSION['user_rol']) && isset($_SESSION['user_id']) && $_SESSION['user_rol'] == 'admin' && isset($_COOKIE['email'])) {
            ?>
                <li class="nav__contenedor__menu__item">
                    <a href="admin" class="nav__contenedor__menu__item--link">
                        ADMIN
                    </a>
                </li>
            <?php }
            ?>
            <?php
            if (isset($_SESSION['user_rol']) && isset($_SESSION['user_id']) && isset($_COOKIE['email'])) {
            ?>
                <li class="nav__contenedor__menu__item">
                    <a href="logout.php" class="nav__contenedor__menu__item--link">
                        cerrar sesión
                    </a>
                </li>

            <?php } else {
            ?>
                <li class="nav__contenedor__menu__item">
                    <a href="login.php" class="nav__contenedor__menu__item--link">
                        LOGIN
                    </a>
                </li>
                <li class="nav__contenedor__menu__item">
                    <a href="register.php" class="nav__contenedor__menu__item--link">
                        REGISTRO
                    </a>
                </li>
            <?php }
            ?>

        </ul>
        <div class="nav__contenedor--btn">
            menu <i class="fa-solid fa-bars"></i>
        </div>
    </div>
</nav>
<?php //getDataHeader(); 
?>