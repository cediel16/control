<?php
require_once '../config.php';
sesiones::logged_in();
sesiones::has_permission('usuarios.acceso');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Control de documentos</title>

        <?php include_once base_url() . '/tpl/link.php'; ?>
    </head>
    <body>
        <header>
            <?php include_once base_url() . '/tpl/header.php'; ?>
        </header>
        <section class="container-fluid contenedor-principal">
            <div class="titlebar">
                <ul>
                    <li class="title">
                        Administrador de usuarios
                    </li>
                    <li class="search">
                        <?php if (sesiones::is_has_permission('usuarios.insertar')) { ?>
                            <a class="btn" href="<?php echo site_url() ?>/usuarios/add.php">Añadir usuario</a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
            <div class="contenido-principal">
                <?php echo flashdata() ?>
                <div id="lista" class="tabbable basic-grid">
                    <?php echo usuarios::lista() ?>
                </div>
            </div>
        </section>
        <?php include_once base_url() . '/tpl/script.php'; ?>
        <script src="<?php echo site_url() ?>/js/usuarios.js"></script>
    </body>
</html>
