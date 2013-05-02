<?php

class unidades {

    public static function add($data) {
        $db = new base();
        $r = $db->db_insert('unidades', $data);
        if ($r) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function lista() {
        $db = new base();
        $db->db_query("
            select *
            from unidades 
            order by unidad
        ");

        return $db->data;
    }

    public static function obtener_fila($id) {
        $db = new base();
        $db->db_query("
            select *
            from unidades 
            where id=$id
        ");
        return $db->data[0];
    }

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
            return $_SESSION['userdata']['arg'];
        }
    }

    public static function logged_in() {
        if (sesiones::userdata('status') != 'activo') {
            redirect('sesiones/');
        }
    }

    public static function logout() {
        session_destroy();
        redirect('.');
    }

}

?>
