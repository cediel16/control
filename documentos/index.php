<?php
require_once '../config.php';
sesiones::logged_in();
sesiones::has_permission('documentos.acceso');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Control de documentos</title>
        <?php include_once '../tpl/link.php'; ?>
    </head>
    <body>
        <header>
            <?php include_once '../tpl/header.php'; ?>
        </header>
        <section class="container-fluid contenedor-principal">
            <div class="titlebar">
                <ul>
                    <li class="title">
                        Documentos
                    </li>
                    <li class="search">
                    </li>
                </ul>
            </div>
            <div class="contenido-principal">
                <div id="flashdata"></div>
                <div class="row-fluid">
                    <div class="input-append pull-left">
                        <a class="btn" href="<?php echo site_url() ?>/documentos/add.php">Añadir documento</a>
                    </div>
                    <div class="input-append pull-right">
                        <input class="" id="appendedInputButton" type="text">
                        <button class="btn" type="button">Buscar</button>
                    </div>
                </div>
                <div id="lista" class="tabbable basic-grid">
                    <?php echo documentos::lista() ?>
                </div>
            </div>
        </section>
        <?php include_once '../tpl/script.php'; ?>
        <script src="<?php echo site_url() ?>/js/unidades.js"></script>
    </body>
</html>
