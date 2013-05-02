<?php

function site_url() {
    return 'http://' . $_SERVER['SERVER_NAME'] . '/control';
}

function base_url() {
    return '/var/www/control';
}

function redirect($url) {
    header('location:' . site_url() . '/' . $url);
}

function var_post($arg = '') {
    $post = Array();
    foreach ($_POST as $k => $v) {
        $post[$k] = trim($v, ' ');
    }
    if ($arg == '') {
        return $post;
    } else {
        return $post[$arg];
    }
}

function var_get($arg = '') {
    $get = Array();
    foreach ($_GET as $k => $v) {
        $get[$k] = trim($v, ' ');
    }
    if ($arg == '') {
        return $get;
    } else {
        return $get[$arg];
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
