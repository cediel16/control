<?php

class sesiones {

    public static function login($user, $pass) {
        $db = new base();
        $qry = "select id,
        usuario,
        nombre,
        status
        from usuarios
        where usuario='$user'
        and clave=md5('$pass')
        and status='activo'";
        $db->fields_option = 'assoc';
        if (!$db->db_query($qry)) {
            die($db->db_error());
        }

        if ($db->db_num_rows() == 1) {
            sesiones::set_userdata($db->fields);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function set_userdata($arg) {
        $_SESSION['userdata'] = $arg;
    }

    public static function userdata($arg = '') {
        if ($arg == '') {
            return $_SESSION['userdata'];
        } else {
            return $_SESSION['userdata'][$arg];
        }
    }

    public static function logged_in() {
        if (sesiones::userdata('status') != 'activo') {
            redirect('sesiones');
        }
    }

    public static function logout() {
        session_destroy();
        redirect();
    }

}

?>
