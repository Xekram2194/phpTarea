<?php require_once("../../resources/config.php"); ?>

<?php include(VIEW_BACK . DS . "head.php"); ?>

<!-- Sidebar -->
<?php include(VIEW_BACK . DS . "sidebar.php"); ?>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php include(VIEW_BACK . DS . "topNav.php"); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- ⚡⚡ AQUI VAMOS A CARGAR LAS VISTAS SEGUN EL MENU ⚡⚡ -->
            <?php
            if ($_SERVER['REQUEST_URI'] == 'phpTarea/public/admin/' || $_SERVER['REQUEST_URI'] == 'phpTarea/public/admin/index.php' || $_SERVER['REQUEST_URI'] == '/admin/' || $_SERVER['REQUEST_URI'] == '/admin/index.php') {
                include(VIEW_BACK . DS . "dashboard.php");
            }

            if (isset($_GET['header'])) {
                include(VIEW_BACK . DS . "header.php");
            }
            if (isset($_GET['portafolio'])) {
                include(VIEW_BACK . DS . "portafolio.php");
            }
            if (isset($_GET['portafolio_add'])) {
                include(VIEW_BACK . DS . "portafolio_add.php");
            }
            if (isset($_GET['portafolio_edit'])) {
                include(VIEW_BACK . DS . "portafolio_edit.php");
            }
            if (isset($_GET['portafolio_pendiente'])) {
                include(VIEW_BACK . DS . "portafolio_pendiente.php");
            }
            if (isset($_GET['comentarios'])) {
                include(VIEW_BACK . DS . "comentarios.php");
            }
            if (isset($_GET['com_aprobados'])) {
                include(VIEW_BACK . DS . "com_aprobados.php");
            }
            if (isset($_GET['com_desaprobados'])) {
                include(VIEW_BACK . DS . "com_desaprobados.php");
            }
            if (isset($_GET['contacto'])) {
                include(VIEW_BACK . DS . "contacto.php");
            }
            if (isset($_GET['contacto_send'])) {
                include(VIEW_BACK . DS . "contacto_send.php");
            }
            if (isset($_GET['men_respondidos'])) {
                include(VIEW_BACK . DS . "men_respondidos.php");
            }
            if (isset($_GET['men_ignorados'])) {
                include(VIEW_BACK . DS . "men_ignorados.php");
            }

            ?>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php include(VIEW_BACK . DS . "footer.php"); ?>