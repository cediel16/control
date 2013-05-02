<?php
require_once '../config.php';
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
                        Añadir ruta de documentos
                    </li>
                    <li class="search">
                    </li>
                </ul>
            </div>
            <div class="contenido-principal">
                <div id="flashdata"></div>
                <fieldset>
                    <legend><h4>Datos basícos</h4></legend>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="row-fluid">   
                                <div class="span12">
                                    <label><strong>Nombre de la ruta</strong></label>
                                    <input type="text" class="span12">
                                </div><!--/span-->
                            </div><!--/row-->
                        </div><!--/span-->
                    </div><!--/row-->
                </fieldset>
                <hr>
                <fieldset>
                    <legend><h4>Datos de las estaciones</h4></legend>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="row-fluid">   
                                <div class="span1">
                                    <label><strong>Orden</strong></label>
                                    <input type="text" class="span12">
                                </div><!--/span-->
                                <div class="span3">
                                    <label><strong>Unidad</strong></label>
                                    <input type="text" class="span12">
                                </div><!--/span-->
                                <div class="span3">
                                    <label><strong>Cargo</strong></label>
                                    <input type="text" class="span12">
                                </div><!--/span-->
                                <div class="span3">
                                    <label><strong>Responsable</strong></label>
                                    <input type="text" class="span12">
                                </div><!--/span-->
                                <div class="span1">
                                    <label><strong>Horas</strong></label>
                                    <input type="text" class="span12">
                                </div><!--/span-->
                                <div class="span1">
                                    <label><strong>&nbsp;</strong></label>
                                    <input type="button" class="span12 btn" value="Añadir">
                                </div><!--/span-->
                            </div><!--/row-->
                        </div>
                    </div>
                </fieldset>
                <div class="tabbable basic-grid" id="lista">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="span1">Orden</th>
                                <th class="span3">Unidad</th>
                                <th class="span3">Cargo</th>
                                <th class="span3">Responsable</th>
                                <th class="span1">Horas</th>
                                <th class="span1">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="form-actions">
                    <div class=" pull-right">
                        <button type="button" class="btn" id="btn_volver">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="btn_editar">Aceptar</button>
                    </div>
                </div>
        </section>
        <?php include_once '../tpl/script.php'; ?>
        <script src="<?php echo site_url() ?>/js/cargos.js"></script>
    </body>
</html>
