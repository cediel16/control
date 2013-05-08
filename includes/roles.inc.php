<?php

class roles {

    public static function add($data) {
        $db = new base();
        return $db->db_insert('roles', $data) === 1;
    }

    public static function edit($data) {
        $db = new base();
        return $db->db_update('roles', array('rol' => $data['rol']), "id='" . $data['id'] . "'") === 1;
    }

    public static function lista() {
        $db = new base();
        $db->db_query("
            select *
            from roles
            order by status,rol
        ");
        $r.='<table class="table table-bordered table-hover">';
        $r.='<thead>';
        $r.='<tr>';
        $r.='<th>Rol</th>';
        $r.='<th class="span1">Status</th>';
        $r.='<th class="span1">Acciones</th>';
        $r.='</tr>';
        $r.='</thead>';
        $r.='<tbody>';
        while (!$db->eof) {
            $r.='<tr>';
            $r.='<td>';
            $r.=$db->fields['rol'];
            $r.='</td>';
            $r.='<td>';
            switch ($db->fields['status']) {
                case 'activo':
                    $r.=status('info', $db->fields['status']);
                    break;
                case 'eliminado':
                    $r.=status('important', $db->fields['status']);
                    break;
                case 'default':
                    $r.=status('default', $db->fields['status']);
                    break;
            }
            $r.='</td>';
            $r.='<td>';
            $r.='<div class="btn-group pull-right">
                <button data-toggle="dropdown" class="btn btn-mini dropdown-toggle">Acciones <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="' . site_url() . '/roles/edit.php?var=' . $db->fields['id'] . '">Editar</a></li>
                  <li><a href="javascript:void(0);" onclick="javascript:del(' . $db->fields['estacion_id'] . ');">Eliminar</a></li>
                </ul>
              </div>';
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

    public static function esta_cedula_disponible($arg) {
        if ($arg == '')
            return FALSE;
        $db = new base();
        $db->db_query("
    select 1
    from usuarios 
    where cedula='$arg'
    ");
        return count($db->data) == 0;
    }

    public static function esta_email_disponible($arg) {
        if ($arg == '')
            return FALSE;
        $db = new base();
        $db->db_query("
    select 1
    from usuarios 
    where email='$arg'
    ");
        return count($db->data) == 0;
    }

    public static function esta_rol_disponible($rol) {
        if ($rol == '')
            return FALSE;
        $db = new base();
        $db->db_query("
        select 1
        from roles 
        where lower(rol)='" . strtolower($rol) . "'
        ");
        return count($db->data) == 0;
    }

    public static function esta_rol_disponible_al_editar($id, $rol) {
        if ($rol == '')
            return FALSE;
        $db = new base();
        $db->db_query("
        select 1
        from roles 
        where lower(rol)='" . strtolower($rol) . "'
        and id<>$id
        ");
        return count($db->data) == 0;
    }

    public static function obtener_fila($id) {
        $db = new base();
        $db->db_query("
        select *
        from roles 
        where id=$id
        ");
        return $db->data[0];
    }

    public static function obtener_filas() {
        $db = new base();
        $db->db_query("
            select *
            from roles 
            order by rol
        ");
        return $db->data;
    }

}

?>
