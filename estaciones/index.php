<?php
require_once '../config.php';

$rutas = rutas::obtener_filas();
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
                        Estaciones
                    </li>
                    <li class="search">
                        <form class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><strong>Ruta del documento</strong></label>
                                <div class="controls">
                                    <select class="span5" id="ruta">
                                        <option value="">Seleccione...</option>
                                        <?php for ($i = 0; $i < count($rutas); $i++) { ?>
                                            <option value="<?php echo $rutas[$i]['id'] ?>"><?php echo $rutas[$i]['ruta'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="contenido-principal">
                <div id="flashdata"></div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span1">
                            <div class="control-group">
                                <label class="control-label"><strong>Orden</strong></label>
                                <div class="controls">
                                    <input class="span12" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="span1">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail"><strong>Hora</strong></label>
                                <div class="controls">
                                    <input class="span12" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="span2">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail"><strong>Unidad</strong></label>
                                <div class="controls">
                                    <select class="span12"></select>
                                </div>
                            </div>
                        </div>
                        <div class="span2">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail"><strong>Cargo</strong></label>
                                <div class="controls">
                                    <select class="span12"></select>
                                </div>
                            </div>
                        </div>
                        <div class="span2">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail"><strong>Responsable</strong></label>
                                <div class="controls">
                                    <select class="span12"></select>
                                </div>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="control-group">
                                <label class="control-label"><strong>Descripción del paso</strong></label>
                                <div class="controls">
                                    <input class="span12" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="span1">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">&nbsp;</label>
                                <div class="controls">
                                    <input class="span12 btn" type="button" value="Aceptar"/>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="lista" class="tabbable basic-grid">
                </div>
            </div>
        </section>
        <?php include_once '../tpl/script.php'; ?>
        <script src="<?php echo site_url() ?>/js/estaciones.js"></script>
    </body>
</html>
