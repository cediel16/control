<?php
require_once 'config.php';

sesiones::logged_in();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Control de documentos</title>
        <?php include_once 'tpl/link.php'; ?>
    </head>
    <body>
        <header>
            <?php include_once 'tpl/header.php'; ?>
        </header>
        <section class="container-fluid contenedor-principal">
        </section>
    </body>
    <?php include_once 'tpl/script.php'; ?>
</html>
