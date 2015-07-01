@extends('master')
@section('content')
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h1><strong>Insertar datos del Insumos</strong></h1>
        <hr class="colorgraph-01"><br>
        <?php
        $tiposDeInsumo = DB::table('tipo_insumos')->get();
        $estados = DB::table('status')->get();
        ?>
        <form action="insertar" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
            <div class="form-group">
                <b>Código</b>
                <input type="text" class="form-control" placeholder="Código" name="cod_producto">
            </div>
            <div class="form-group">
                <b>Nombre</b>
                <input type="text" class="form-control" placeholder="Color" name="nombre">
            </div>
            <div class="form-group">
                <b>Tipo de insumos</b>
                <select class="form-control" name="tipo_insumos">
                    @foreach($tiposDeInsumo as $tipoDeInsumo)
                    <option value="{{$tipoDeInsumo->idtipo_insumos}}">{{$tipoDeInsumo->tipo_insumo}}</option>
                    @endforeach
                </select>
                  </div>
                <div class="form-group">
                    <b>Cantidad</b>
                    <input type="text" class="form-control" placeholder="Cantidad" name="cantida">
                </div>
                <div class="form-group">
                    <b>Unidades</b>
                    <input type="text" class="form-control" placeholder="Unidades" name="unidades_idunidades">
                </div>
                <div class="form-group">
                    <b>Descripción</b>
                    <input type="text" class="form-control" placeholder="Descripción" name="descripcion">
                </div>
                <div class="form-group">
                    <b>Fecha de vencimiento</b>
                    <input type="date" class="form-control" placeholder="Fecha de vencimiento" name="fecha">
                </div>
                <div class="form-group">
                    <b>Estado</b>
                    <select class="form-control" name="status">
                        @foreach($estados as $estado)
                        <option value="{{$estado->idstatus}}">{{$estado->status}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-lg btn-success btn-block">
                    Guardar &nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                </button>
            </form>
        </div><div class="col-md-4"></div>
    </div>
    @endsection
