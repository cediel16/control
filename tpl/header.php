<div class="banner">
    <ul>
        <li>Control de documentos</li>
        <li>
            <div class="btn-group">
                <a class="btn btn-mini"><?php echo sesiones::userdata('nombre') ?></a>
                <a href="<?php echo site_url() ?>/sesiones/logout.php" class="btn btn-mini"><i class="icon-off"></i></a>
            </div>
        </li>
    </ul>
</div>
<?php
include_once 'menu.php';
?>