<?php
require_once '../config.php';

$data = unidades::obtener_fila(var_get('var'));
print_r($data);
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
                        Editar unidad
                    </li>
                </ul>
            </div>
            <div class="contenido-principal">
                <?php echo flashdata() ?>
                <form action="add.php" class="form-inline" method="post">
                    <input type="hidden" name="unidad_id" id="unidad_id" value="<?php echo $data['id'] ?>">
                    <input type="text" class="span4" name="unidad" id="unidad" value="<?php echo $data['unidad'] ?>">
                    <button type="submit" class="btn">Editar</button>
                </form>
            </div>
        </section>
        <?php include_once '../tpl/script.php'; ?>
        <script src="<?php echo site_url() ?>/js/unidades.js"></script>
    </body>
</html>
