<?php
$idinventario_insumos = Input::get('id');
$codigo_producto = Input::get('cod_producto');
$nombre = Input::get('nombre');
$tipo_insumos_idtipo_insumos = Input::get('tipo_insumos');
$cantidad = Input::get('cantidad');
$unidades_idunidades= Input::get('unidades_idunidades');
$descripcion = Input::get('descripcion');
$fecha= Input::get('fecha');
$status = Input::get('status');

DB::table('inventario_insumos')
->where('idinventario_insumos', $idinventario_insumos)
->update(
[
    'cod_producto' => $codigo_producto,
    'nombre' => $nombre,
    'tipo_insumos_idtipo_insumos' => $tipo_insumos_idtipo_insumos,
    'cantidad' => $cantidad,
    'unidades_idunidades' => $unidades_idunidades,
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
        <h1><strong>Modificado correctamente</strong></h1>
        <hr class="colorgraph-01"><br>
        <a href="supplies" style="text-decoration: none;"><button type="submit" class="btn btn-lg btn-info btn-block">
            <strong>Ver inventario</strong> &nbsp;&nbsp;<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
        </button></a>
    </div>
    <div class="col-md-4"></div>
</div>
@endsection
