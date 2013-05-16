<?php
require_once '../config.php';
sesiones::logged_in();
sesiones::has_permission('documentos.acceso');
$doc = documentos::obtener_vista(var_get('var'));
$movimientos = documentos::obtener_vista_movimientos($doc['id']);
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
                        Control de documentos
                    </li>
                    <li class="search">
                    </li>
                </ul>
            </div>
            <div class="contenido-principal">
                <div id="flashdata"></div>
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="span12">
                            <h4><strong><?php echo documentos::cod_doc($doc['id']) . ' ' . $doc['titulo'] ?></strong></h4>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <p><?php echo $doc['descripcion'] ?></p>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <span class="btn btn-mini"><i class="icon-time"></i> <?php echo $doc['horas'] ?> horas (<?php echo $doc['dias'] ?> días)</span>
                            <span class="btn btn-mini"><i class="icon-calendar"></i> Inicio: <?php echo fecha('d M Y - h:i:s a', $doc['fecha_inicio']) ?></span>
                            <span class="btn btn-mini"><i class="icon-calendar"></i> Fin: <?php echo fecha('d M Y - h:i:s a', $doc['fecha_fin']) ?></span>
                            <span class="btn btn-mini"><i class="icon-comment"></i> <?php echo $doc['estaciones_cumplidas'] ?> de <?php echo $doc['total_estaciones'] ?></span>
                            <span class="btn btn-info btn-mini"><i class="icon-resize-full icon-white"></i> <strong>En curso</strong></span>
                            <hr>
                        </div>
                    </div>
                </div>
                <ul class="media-list">
                    <?php $testigo = 0; ?>
                    <?php for ($i = 0; $i < count($movimientos); $i++) { ?>
                        <li class="media ">
                            <div class="orden pull-left"><i></i><?php echo $movimientos[$i]['orden'] ?></div>
                            <div class="media-body">
                                <div class="row-fluid">
                                    <div class="media-heading pull-left"><strong><?php echo $movimientos[$i]['unidad'] ?> - <?php echo $movimientos[$i]['cargo'] ?> - <?php echo $movimientos[$i]['responsable'] ?></strong> / <i><?php echo $movimientos[$i]['descripcion'] ?></i></div>
                                    <div class="pull-right"><?php echo $movimientos[$i]['horas'] ?> horas</div>
                                </div>
                                <?php if ($testigo == 0) { ?>
                                    <?php if ($movimientos[$i]['timestamp'] <= 0 || $movimientos[$i]['observacion'] == '') { ?>
                                        <?php $testigo = 1; ?>
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <form action="ajax.php" method="post" id="form_respuesta">
                                                    <input  type="hidden" id="movimiento_id" name="movimiento_id" value="<?php echo $movimientos[$i]['id'] ?>" />
                                                    <input class="span12 pull-left" type="text" placeholder="Respuesta" id="respuesta" name="respuesta" />
                                                    <div class="pull-left" id="msj_respuesta"></div>
                                                    <input class="btn btn-info btn-small pull-right" type="submit" value="Responder" />
                                                </form>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </li>
                        <hr>
                    <?php } ?>
                    <!--
                <li class="media">
                    <div class="orden pull-left">1</div>
                    <div class="media-body">
                    </div>
                </li>
                    -->
                </ul>
            </div>
        </section>
        <?php include_once '../tpl/script.php'; ?>
        <script src="<?php echo site_url() ?>/js/documentos.js"></script>
    </body>
</html>