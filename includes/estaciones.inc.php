<?php

class estaciones {

    public static function add($data) {
        $db = new base();
        return $db->db_insert('rutas', $data) === 1;
    }

    public static function edit($data) {
        $db = new base();
        return $db->db_update('rutas', array('ruta' => $data['ruta']), "id='" . $data['id'] . "'") === 1;
    }

    public static function lista_por_ruta($ruta) {
        if(!is_numeric($ruta)) return '';
        $db = new base();
        $db->db_query("
            select *
            from estaciones 
            where ruta_fkey=$ruta
            order by orden
        ");
        $r.='<table class="table table-bordered table-hover">';
        $r.='<thead>';
        $r.='<tr>
                <th class="span1">Orden</th>
                <th class="span1">Hora</th>
                <th class="span2">Unidad</th>
                <th class="span2">Cargo</th>
                <th class="span2" >Responsable</th>
                <th class="span3">Descripción del paso</th>
                <th class="span1">Acción</th>
                </tr>';
        $r.='</thead>';
        $r.='<tbody>';
        while (!$db->eof) {
            $r.='<tr>';
            $r.='<td>';
            $r.=$db->fields['ruta'];
            $r.='</td>';
            $r.='<td>';
            $r.=$db->fields['estaciones'];
            $r.='</td>';
            $r.='<td>';
            $r.=$db->fields['horas'];
            $r.='</td>';
            $r.='<td>';
            $r.='<div class="btn-group pull-right">
                <button data-toggle="dropdown" class="btn btn-mini dropdown-toggle">Acciones <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="' . site_url() . '/rutas/edit.php?var=' . $db->fields['id'] . '">Editar nombre de la ruta</a></li>
                  <li><a href="' . site_url() . '/estaciones/?var=' . $db->fields['id'] . '">Editar estaciones</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Eliminar</a></li>
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

    public static function esta_ruta_disponible($arg) {
        $db = new base();
        $db->db_query("
    select 1
    from rutas 
    where ruta='$arg'
    ");
        return count($db->data) == 0;
    }

    public static function esta_ruta_disponible_al_editar($id, $ruta) {
        $db = new base();
        $db->db_query("
    select 1
    from rutas 
    where ruta='$ruta'
    and id<>$id
    ");
        return count($db->data) == 0;
    }

    public static function obtener_fila($id) {
        $db = new base();
        $db->db_query("
            select *
            from rutas 
            where id=$id
        ");
        return $db->data[0];
    }

    public static function obtener_filas() {
        $db = new base();
        $db->db_query("
            select *
            from rutas 
            order by ruta
        ");
        return $db->data;
    }

}

?>
