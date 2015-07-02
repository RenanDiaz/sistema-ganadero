<?php

$cod_producto = Input::get('cod_producto');
$nombre = Input::get('nombre');
$tipo_insumos = Input::get('tipo_insumos');
$unidades = Input::get('unidades');
$descripcion = Input::get('descripcion');
$fecha = Input::get('fecha');
$status = Input::get('status');

DB::table('inventario_insumos')->insert(
[
    'cod_producto' => $cod_producto,
    'nombre' => $nombre,
    'tipo_insumos_idtipo_insumos' => $tipo_insumos,
    'cantidad' => 0,
    'unidades_idunidades' => $unidades,
    'descripcion' => $descripcion,
    'fecha_vencimiento' => $fecha,
    'status_idstatus' => $status
    ]
);
?>
@extends('master')
@section('content')
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h1><strong>Guardado correctamente</strong></h1>
        <hr class="colorgraph-01"><br>
        <a href="nuevo" style="text-decoration: none;"><button type="submit" class="btn btn-lg btn-success btn-block" >
            <strong>Agregar</strong> &nbsp;&nbsp;<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button></a><br>
        <a href="supplies" style="text-decoration: none;"><button type="submit" class="btn btn-lg btn-info btn-block" >
            <strong>Ver inventario</strong> &nbsp;&nbsp;<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
        </button></a>
    </div>
    <div class="col-md-4"></div>
</div>
@endsection
