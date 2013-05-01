<?php

class sesiones {

    public function login($user, $pass) {
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

    public function set_userdata($arg) {
        $_SESSION['userdata'] = $arg;
    }

    public function userdata($arg = '') {
        if ($arg == '') {
            return $_SESSION['userdata'];
        } else {
            return $_SESSION['userdata']['arg'];
        }
    }

    public function logged_in() {
        if (sesiones::userdata('status') != 'activo') {
            redirect(site_url() . '/sesiones');
        }
    }

    public function logout() {
        session_destroy();
        redirect(site_url());
    }

}

?>
