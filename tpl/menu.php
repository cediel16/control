<div class="navbar navbar-inverse navbar-static-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li><a href="<?php echo site_url() ?>">Inicio</a></li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Reportes <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">...</a></li>
                            <li><a href="#">...</a></li>
                            <li class="divider"></li>
                            <li><a href="#">...</a></li>
                        </ul>
                    </li>
                    <?php if (sesiones::is_has_permission('unidades.acceso') || sesiones::is_has_permission('cargos.acceso') || sesiones::is_has_permission('rutas.acceso') || sesiones::is_has_permission('estaciones.acceso')) { ?>

                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Definiciones <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php if (sesiones::is_has_permission('unidades.acceso')) { ?>
                                    <li><a href="<?php echo site_url() ?>/unidades">Unidades</a></li>
                                <?php } ?>
                                <?php if (sesiones::is_has_permission('cargos.acceso')) { ?>
                                    <li><a href="<?php echo site_url() ?>/cargos">Cargos</a></li>
                                <?php } ?>
                                <?php if (sesiones::is_has_permission('rutas.acceso')) { ?>
                                    <li><a href="<?php echo site_url() ?>/rutas">Rutas de documentos</a></li>
                                <?php } ?>
                                <?php if (sesiones::is_has_permission('estaciones.acceso')) { ?>
                                    <li><a href="<?php echo site_url() ?>/estaciones">Estaciones</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>


