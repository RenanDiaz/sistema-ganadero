@extends('master')
@section('content')
<div class="col-md-4"></div>
<div class="col-md-4">
    <h1><strong>Modificar datos de insumo</strong></h1>
    <hr class="colorgraph-01"><br>
    <?php
    $id = Input::get('id');
    $insumos = DB::table('inventario_insumos')->where('idinventario_insumos','=',$id)->get();
    $unidades = DB::table('unidades')->get();
    $tiposDeInsumos = DB::table('tipo_insumos')->get();
    $estados = DB::table('status')->get();
    ?>
    <form action="actualizar" method="post">
        @foreach($insumos as $insumo)
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
        <input type="hidden" name="id" value="{{$id}}" />
        <div class="form-group">
            <b>Código</b>
            <input type="text" class="form-control" placeholder="Código" name="cod_producto" value="{{$insumo->cod_producto}}">
        </div>
        <div class="form-group">
            <b>Nombre</b>
            <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="{{$insumo->nombre}}">
        </div>
        <div class="form-group">
            <b>Tipo de insumos</b>
            <?php $tipoSeleccionado = $insumo->tipo_insumos_idtipo_insumos; ?>
            <select class="form-control" name="tipo_insumos">
                @foreach($tiposDeInsumos as $tiposDeInsumo)
                <option value="{{$tiposDeInsumo->idtipo_insumos}}"<?php if($tipoSeleccionado == $tiposDeInsumo->idtipo_insumos) echo " selected"?>>{{$tiposDeInsumo->tipo_insumo}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <b>Unidades</b>
            <?php $unidadesSeleccionado = $insumo->unidades_idunidades; ?>
            <select class="form-control" name="unidades_idunidades">
                @foreach($unidades as $unidad)
                <option value="{{$unidad->idunidades}}"<?php if($unidadesSeleccionado == $unidad->idunidades) echo " selected"; ?>>{{$unidad->unidad}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <b>Cantidad</b>
            <input type="text" class="form-control" placeholder="Cantidad" name="cantidad" value="{{$insumo->cantidad}}">
        </div>
        <div class="form-group">
            <b>Descripción</b>
            <input type="text" class="form-control" placeholder="Descripción" name="descripcion" value="{{$insumo->descripcion}}">
        </div>
        <div class="form-group">
            <b>Fecha de vencimiento</b>
            <input type="date" class="form-control" placeholder="Fecha de vencimiento" name="fecha" value="{{$insumo->fecha_vencimiento}}">
        </div>
        <div class="form-group">
            <b>Estado</b>
            <?php $estadoSeleccionado = $insumo->status_idstatus; ?>
            <select class="form-control" name="status">
                @foreach($estados as $estado)
                <option value="{{$estado->idstatus}}"<?php if($estadoSeleccionado == $estado ->idstatus) echo " selected"; ?>>{{$estado->status}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-lg btn-success btn-block">Guardar &nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
        </button>

        @endforeach
    </form>
</div>
<div class="col-md-4"></div>

@endsection
