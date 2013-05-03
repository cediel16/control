<?php

include_once '../config.php';

$data = var_post();

switch ($data['band']) {
    case 'lista': {
            $json = array(
                'lista' => estaciones::lista_por_ruta($data['ruta'])
            );
            break;
        }

    case 'obtener_fila': {
            $json = array(
                'fila' => estaciones::obtener_fila($data['estacion_id'])
            );
            break;
        }
    case 'add': {
            $d = array(
                'ruta_fkey' => $data['ruta'],
                'unidad_fkey' => $data['unidad'],
                'cargo_fkey' => $data['cargo'],
                'usuario_fkey' => $data['usuario'],
                'orden' => $data['orden'],
                'horas' => $data['horas'],
                'descripcion' => $data['descripcion']
            );
            if (estaciones::add($d)) {
                $json = array(
                    'resp' => 1,
                    'msj' => 'La estación se ha añadido con éxito.',
                    'lista' => estaciones::lista_por_ruta($data['ruta'])
                );
            } else {
                $json = array(
                    'resp' => 0,
                    'msj' => 'Error al intentar añadir la estación.'
                );
            }
            break;
        }
    case 'edit': {
            if ($data['ruta'] == '') {
                $json = array(
                    'resp' => 2,
                    'msj' => 'Escribe el nombre de la ruta que deseas añadir.'
                );
            } elseif (!rutas::esta_ruta_disponible_al_editar($data['id'], $data['ruta'])) {
                $json = array(
                    'resp' => 2,
                    'msj' => 'El nombre de la ruta <i>"' . $data['ruta'] . '"</i> ya se encuntra registrado.'
                );
            } elseif (rutas::edit($data)) {
                $json = array(
                    'resp' => 1,
                    'msj' => 'El nombre de la ruta se ha editado con éxito.'
                );
            } else {
                $json = array(
                    'resp' => 0,
                    'msj' => 'Error al intentar editar el nombre de la ruta.'
                );
            }
            break;
        }
}

echo json_encode($json);
?>