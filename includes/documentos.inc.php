<?php

class documentos {

    public static function add($data) {
        $db = new base();


        if (!$db->db_query('BEGIN')) {
            return FALSE;
        };

        $data['ruta_fkey'] = $data['ruta'];
        $data['timestamp'] = time();
        unset($data['ruta']);
        if (!$db->db_insert('documentos', $data)) {
            return FALSE;
            $db->db_query('ROLLBACK');
        };

        $db->db_query("select last_value from documentos_id_seq");
        $doc_id = $db->data[0]['last_value'];

        if (!$rst = $db->db_query("select * from estaciones where ruta_fkey = '$data[ruta_fkey]' order by orden")) {
            return FALSE;
            $db->db_query('ROLLBACK');
        }

        $d = $db->data;
        for ($i = 0; $i < count($d); $i++) {
            $mov = array(
                'documento_fkey' => $doc_id,
                'unidad_fkey' => $d[$i]['unidad_fkey'],
                'cargo_fkey' => $d[$i]['cargo_fkey'],
                'usuario_fkey' => $d[$i]['usuario_fkey'],
                'descripcion' => $d[$i]['descripcion'],
                'orden' => $d[$i]['orden'],
                'horas' => $d[$i]['horas']
            );
            $db->db_insert('movimientos', $mov);
            if ($db->db_affected_rows() === 0) {
                return FALSE;
                $db->db_query('ROLLBACK');
                $i = count($d) + 1;
            };
        }

        $db->db_query('COMMIT');
        return TRUE;
    }

    public static function add_resp($data) {
        $db = new base();

        if (!$db->db_query('BEGIN')) {
            return FALSE;
        }

        if (!$db->db_insert('respuestas', array('movimiento_fkey' => $data['movimiento_fkey'], 'respuesta' => $data['respuesta'], 'timestamp' => time()))) {
            $db->db_query('ROLLBACK');
            return FALSE;
        }

        if ($db->db_update("movimientos", array('testigo' => 'no', 'ejecutado' => 'si'), "documento_fkey=(select documento_fkey from movimientos where id=" . $data['movimiento_fkey'] . ") and testigo='si'") < 0) {
            $db->db_query('ROLLBACK');
            return FALSE;
        }

        if ($db->db_update('movimientos', array('testigo' => 'si'), "documento_fkey=(select documento_fkey from movimientos where id=" . $data['movimiento_fkey'] . ") and orden=(select (orden+1) from movimientos where id=" . $data['movimiento_fkey'] . ")") < 0) {
            $db->db_query('ROLLBACK');
            return FALSE;
        }

        $db->db_query('COMMIT');
        return TRUE;
    }

    public static function edit($data) {
        $db = new base();
        return $db->db_update('cargos', array('cargo' => $data['cargo']), "id='" . $data['id'] . "'") === 1;
    }

    public static function lista_() {
        ?>
        <table class = "table table-condensed table-hover">
            <thead>
                <tr>
                    <th class = "span2"></th>
                    <th class = "span9"></th>
                    <th class = "span3">Fecha</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>John Doe</strong></td>
                    <td><span class = "label pull-right">Notifications</span></td>
                    <td><strong>Message body goes here</strong></td>
                    <td><strong>11:23 PM</strong></td>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td><span class = "label pull-right">Notifications</span></td>
                    <td>Message body goes here</td>
                    <td>Sept4</td>
                </tr>
            </tbody
            <?php

        }

        public static function lista($status) {
            $db = new base();
            $db->db_query("
            select
            a.id as documento_id,
            a.titulo,
            a.descripcion,
            a.status,
            a.timestamp,
            (select count(1) from movimientos where documento_fkey=a.id and ejecutado='si') as ejecutado,
            (select count(1) from movimientos where documento_fkey=a.id) as a_ejecutar
            from documentos a
            inner join rutas b on b.id=a.ruta_fkey
            and a.status='$status'
            order by timestamp desc
            ");
            $r.='<table class = "table table-condensed table-hover">';
            $r.='<thead>';
            $r.='<tr>';
            $r.='<th class="span1"></th>';
            $r.='<th class="span1"></th>';
            $r.='<th class="span8">Descripción</th>';
            $r.='<th class="span2">Fecha</th>';
            $r.='</tr>';
            $r.='</thead>';
            $r.='<tbody>';
            while (!$db->eof) {
                $r.='<tr>';
                switch ($db->fields['status']) {
                    case'en curso': {
                            $option='info';
                            break;
                        }
                    case'finalizado': {
                            $option='success';
                            break;
                        }
                }
                            $r.='<td><span class="pull-right">' . status($option, $db->fields['ejecutado'] . ' de ' . $db->fields['a_ejecutar']) . '</span></td>';
                            $r.='<td>' . status($option, $db->fields['status']) . '</span></td>';
                $r.='<td><a href="' . site_url() . '/documentos/view.php?var=' . $db->fields['documento_id'] . '">' . documentos::cod_doc($db->fields['documento_id']) . ' ' . $db->fields['titulo'] . ' - <span class="muted">' . $db->fields['descripcion'] . '</span></a></td>';
                $r.='<td>' . documentos::fecha($db->fields['timestamp']) . '</td>';
                $r.='</tr>';
                $db->db_move_next();
            }
            $r.='</tbody>';
            $r.='</table>';
            return $r;
        }

        public static function esta_cargo_disponible($arg) {
            $db = new base();
            $db->db_query("
            select 1
            from cargos
            where cargo='$arg'
            ");
            return count($db->data) == 0;
        }

        public static function esta_cargo_disponible_al_editar($id, $cargo) {
            $db = new base();
            $qry = "select 1
            from cargos 
            where cargo='$cargo'
            and id<>$id";
            $db->db_query($qry);
            return count($db->data) == 0;
        }

        public static function obtener_fila($id) {
            $db = new base();
            $db->db_query("
            select *
            from documentos 
            where id=$id
        ");
            return $db->data[0];
        }

        public static function obtener_vista($id) {
            $db = new base();
            $qry = "
            select a.id,
            a.titulo,
            a.descripcion,
            a.timestamp as fecha_inicio,
            a.timestamp+((select sum(horas) from movimientos where documento_fkey=a.id)*3600) as fecha_fin,
            a.ruta_fkey,
            b.ruta,
            (select count(1) from movimientos where documento_fkey=a.id and ejecutado='si') as estaciones_cumplidas,
            (select count(1) from movimientos where documento_fkey=a.id) as total_estaciones,
            (select sum(horas) from movimientos where documento_fkey=a.id) as horas,
            (select sum(horas) from movimientos where documento_fkey=a.id)/(select horas_laborables_por_dia from configuraciones where id=1 limit 1) as dias
            
            from documentos a
            inner join rutas b on b.id=a.ruta_fkey
            where a.id=$id
            ";
            $db->db_query($qry);
            return $db->data[0];
        }

        public static function obtener_vista_estaciones($ruta_id) {
            $db = new base();
            $db->db_query("
            select 
            a.orden,
            a.descripcion,
            a.horas,
            b.unidad,
            c.cargo,
            d.nombre as responsable
            from estaciones a
            inner join unidades b on b.id=a.unidad_fkey
            inner join cargos c on c.id=a.cargo_fkey
            inner join usuarios d on d.id=a.usuario_fkey
            where ruta_fkey=$ruta_id
            order by orden
            ");
            return $db->data;
        }

        public static function obtener_vista_movimientos($doc_id) {
            $db = new base();

            $qry = "
            select 
            a.id,
            a.orden,
            a.horas,
            a.ejecutado,
            a.testigo,
            a.descripcion,
            a.usuario_fkey,
            b.unidad,
            c.cargo,
            d.nombre as responsable
            from movimientos a
            inner join unidades b on b.id=a.unidad_fkey 
            inner join cargos c on c.id=a.cargo_fkey 
            inner join usuarios d on d.id=a.usuario_fkey 
            and documento_fkey=$doc_id
            order by orden
            ";
            $db->db_query($qry);

            return $db->data;
        }

        public static function obtener_respuesta_por_movimiento($movimiento_fkey) {
            $db = new base();
            $db->db_query("
                select * from respuestas
                where movimiento_fkey=$movimiento_fkey order by timestamp limit 1
            ");
            return $db->data[0];
        }

        public static function obtener_filas() {
            $db = new base();
            $db->db_query("
            select *
            from cargos 
            order by cargo
        ");
            return $db->data;
        }

        public static function cod_doc($id) {
            return str_pad($id, 5, '0', 0);
        }

        public static function fecha($f) {
            if (date('Ymd', $f) == date('Ymd')) {
                return date('H:i a', $f);
            } elseif (date('Ym', $f) == date('Ym')) {
                return date('d M', $f);
            } else {
                return date('d/m/Y', $f);
            }
        }

    }
    ?>