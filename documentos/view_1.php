<?php
require_once '../config.php';
sesiones::logged_in();
sesiones::has_permission('documentos.acceso');
$doc = documentos::obtener_vista(var_get('var'));
$estaciones = documentos::obtener_vista_estaciones($doc['ruta_fkey']);
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
                            <p>
                                <i class="icon-calendar"></i> <?php echo fecha('d M Y - h:i:s a', $doc['timestamp']) ?>
                                | <i class="icon-comment"></i> 0 Respuestas
                                | <i class="icon-tag"></i> <span class="label label-info">En curso</span>
                            </p>
                            <hr>
                        </div>
                    </div>
                </div>
                <ul class="media-list ">
                    <?php for ($i = 0; $i < count($estaciones); $i++) { ?>
                        <li class="media ">
                            <div class="orden pull-left"><?php echo $estaciones[$i]['orden'] ?></div>
                            <div class="media-body">
                                <div class="row-fluid">
                                    <h5 class="media-heading pull-left"><?php echo $estaciones[$i]['unidad'] ?> - <?php echo $estaciones[$i]['cargo'] ?> - <?php echo $estaciones[$i]['responsable'] ?> </h5>
                                    <div class="pull-right"><?php echo $estaciones[$i]['horas'] ?> horas</div>
                                </div>
                                <div><?php echo $estaciones[$i]['descripcion'] ?></div>
                                <div class="well-small well">
                                    <div class="media">
                                        <div class="media-body">
                                            <div class="media-heading row-fluid">
                                                <textarea class="span12" id="new_message" name="new_message" placeholder="Escribe tu respuesta" rows="5"></textarea>
                                            </div>
                                            <div class="pull-right">
                                                <button class="btn">Responder</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        <script src="<?php echo site_url() ?>/js/unidades.js"></script>
    </body>
</html>

create table estaciones(
id serial not null primary key,
ruta_fkey integer not null,
unidad_fkey integer not null,
cargo_fkey integer not null,
usuario_fkey integer not null,
orden integer not null,
horas integer not null,
descripcion text not null
)

create table movimientos(
id serial not null primary key,
unidad_fkey integer not null,
cargo_fkey integer not null,
usuario_fkey integer not null,
descripcion text not null,
orden integer not null,
horas integer not null,
observacion integer not null,
timestamp integer,
foreign key(unidad_fkey) references unidades(id),
foreign key(cargo_fkey) references cargos(id),
foreign key(usuario_fkey) references usuarios(id)
)
