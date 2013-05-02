<?php

require_once '../config.php';

//sesiones::logged_in();

if (unidades::add(array('unidad' => var_post('unidad')))) {
    $type = 'info';
    $msg = 'La unidad se ha añadido con éxito.';
} else {
    $type = 'alert';
    $msg = 'Error al intentar añadir un unidad.';
}

set_flashdata($type, $msg);
redirect(site_url() . '/unidades');
?>