<?php
require_once '../config.php';
sesiones::logged_in();
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
                        Unidades
                    </li>
                    <li class="search">
                        <!--
                        <div class="input-append">
                            <input class="span2" id="appendedInputButton" type="text">
                            <button class="btn" type="button">Buscar</button>
                        </div>
                        -->
                    </li>
                </ul>
            </div>
            <div class="contenido-principal">
                <div id="flashdata"></div>
                <form id="form_add" action="ajax.php" class="form-inline" method="post">
                    <input type="text" class="span4" placeholder="Añadir unidad" name="unidad" id="unidad">
                </form>
                <div id="lista" class="tabbable basic-grid">
                    <?php echo unidades::lista() ?>
                </div>
            </div>
        </section>
        <?php include_once '../tpl/script.php'; ?>
        <script src="<?php echo site_url() ?>/js/unidades.js"></script>
    </body>
</html>
