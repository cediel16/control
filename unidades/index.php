<?php
require_once '../config.php';

$lista = unidades::lista();
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
            <?php include_once '../tpl/menu.php'; ?>
        </header>
        <section class="container-fluid contenedor-principal">
            <div class="titlebar">
                <ul>
                    <li class="add">
                        <a id="add_user" href="http://localhost/opentax/index.php/contribuyentes/nuevo"><img alt="" src="http://localhost/opentax/img/add.png"></a>
                    </li>
                    <li class="title">
                        Unidades
                    </li>
                    <li class="search">
                        <div class="input-append">
                            <input class="span2" id="appendedInputButton" type="text">
                            <button class="btn" type="button">Buscar</button>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="contenido-principal">
                <?php echo flashdata() ?>
                <form action="add.php" class="form-inline" method="post">
                    <input type="text" class="span4" placeholder="Nueva unidad" name="unidad" id="unidad">
                    <button type="submit" class="btn">Añadir</button>
                </form>
                <div style="margin-bottom: 18px;" class="tabbable">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>
                                    Unidades
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($lista); $i++) { ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo site_url() ?>/unidades/edit.php?var=<?php echo $lista[$i]['id'] ?>"><?php echo $lista[$i]['unidad'] ?></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <?php include_once '../tpl/script.php'; ?>
        <script src="<?php echo site_url() ?>/js/unidades.js"></script>
    </body>
</html>
