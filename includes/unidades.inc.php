<?php

class unidades {

    public static function add($data) {
        $db = new base();
        return $db->db_insert('unidades', $data) === 1;
    }

    public static function edit($data) {
        $db = new base();
        return $db->db_update('unidades', array('unidad' => $data['unidad']), "id='" . $data['id'] . "'") === 1;
    }

    public static function lista() {
        $db = new base();
        $db->db_query("
            select *
            from unidades 
            order by unidad
        ");
        $r.='<table class="table table-bordered table-hover">';
        $r.='<thead>';
        $r.='<tr><th>Unidades</th></tr>';
        $r.='</thead>';
        $r.='<tbody>';
        while (!$db->eof) {
            $r.='<tr>';
            $r.='<td>';
            $r.='<a href="' . site_url() . '/unidades/edit.php?var=' . $db->fields['id'] . '">' . $db->fields['unidad'] . '</a>';
            $r.='</td>';
            $r.='</tr>';
            $db->db_move_next();
        }
        /*
          <tr>
          <td>
          </td>
          </tr>
         */
        $r.='</tbody>';
        $r.='</table>';
        return $r;
    }

    public static function esta_unidad_disponible($arg) {
        $db = new base();
        $db->db_query("
    select 1
    from unidades 
    where unidad='$arg'
    ");
        return count($db->data) == 0;
    }

    public static function esta_unidad_disponible_al_editar($id, $unidad) {
        $db = new base();
        $db->db_query("
    select 1
    from unidades 
    where unidad='$unidad'
    and id<>$id
    ");
        return count($db->data) == 0;
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
