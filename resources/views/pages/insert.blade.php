<?php

        $tipo_ganado = Input::get('tipo_ganado');
        $tipo_raza = Input::get('tipo_raza');
        $cod_ganado = Input::get('cod_ganado');
        $color = Input::get('color');
        $sexo = Input::get('sexo');
        $cod_padre = Input::get('cod_padre');
        $cod_madre = Input::get('cod_madre');
        $fecha = Input::get('fecha');
        $descripcion = Input::get('descripcion');
        $status = Input::get('status');

DB::table('inventario_ganado')->insert(

        [
                'tipos_ganados_idtipos_ganados ' => $tipo_ganado,
                'tipos_razas_idtipos_razas = ' => $tipo_raza,
                'cod_ganado ' => $cod_ganado,
                'color' => $color,
                'sexo' => $sexo,
                'cod_padre' => $cod_padre,
                'cod_madre' => $cod_madre,
                'fecha_nacimiento' => $fecha,
                'descripcion' => $descripcion,
                'status_idstatus' => $status

        ]
);
    return Redirect::to('create');;

