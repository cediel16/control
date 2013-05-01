<?php

function redirect($url) {
    header('location:' . $url);
}

function site_url() {
    return 'http://' . $_SERVER['SERVER_NAME'] . '/control';
}

function base_url() {
    return '/var/www/control';
}

function var_post($arg = '') {
    if ($arg == '') {
        return $_POST;
    } else {
        return $_POST[$arg];
    }
}

function var_get($arg = '') {
    if ($arg == '') {
        return $_GET;
    } else {
        return $_GET[$arg];
    }
}


function set_flashdata($item, $msg) {
    $_SESSION['flashdata'] = array('item' => $item, 'msg' => $msg);
}

function flashdata() {
    if (trim($_SESSION['flashdata']['msg']) != '') {
        $r = '<div class="alert alert-' . $_SESSION['flashdata']['item'] . '">';
        $r.='<button type = "button" class = "close" data-dismiss = "alert">&times;';
        $r.='</button>';
        $r.='<strong>' . $_SESSION['flashdata']['msg'] . '</strong>';
        $r.='</div>';
        unset($_SESSION['flashdata']);
    }
    return $r;
}

?>
