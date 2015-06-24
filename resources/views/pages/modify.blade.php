@extends('master')
@section('content')
<div class="col-md-4"></div>
<div class="col-md-4">
    <h1><strong>Modificar datos del ganado</strong></h1>
    <hr class="colorgraph-01"><br>
    <?php
    $id = Input::get('id');
    $stock = DB::table('inventario_ganado')->where('idinventario_ganado','=',$id)->get();
    $tiposDeGanado = DB::table('tipos_ganados')->get();
    $razas = DB::table('tipos_razas')->get();
    $estados = DB::table('status')->get();
    ?>
    <form action="update" method="post">
        @foreach($stock as $stocks)
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
        <input type="hidden" name="id" value="{{$id}}" />
        <div class="form-group">
            <b>Tipo de ganado</b>
            <?php $tipoSeleccionado = $stocks->tipos_ganados_idtipos_ganados; ?>
            <select class="form-control" name="tipo_ganado">
                @foreach($tiposDeGanado as $tipoDeGanado)
                <option value="{{$tipoDeGanado->idtipos_ganados}}"<?php if($tipoSeleccionado == $tipoDeGanado->idtipos_ganados) echo " selected"?>>{{$tipoDeGanado->tipo}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <b>Raza</b>
            <?php $razaSeleccionada = $stocks->tipos_razas_idtipos_razas; ?>
            <select class="form-control" name="tipo_raza">
                @foreach($razas as $raza)
                <option value="{{$raza->idtipos_razas}}"<?php if($razaSeleccionada == $raza->idtipos_razas) echo " selected"; ?>>{{$raza->raza}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <b>Código ganado</b>
            <input type="text" class="form-control" value="{{$stocks->cod_ganado}}" name="cod_ganado">
        </div>
        <div class="form-group">
            <b>Color</b>
            <input type="text" class="form-control" value="{{$stocks->color}}" name="color">
        </div>
        <div class="form-group">
            <?php $sexoSeleccionado = $stocks->sexo; ?>
            <b>Sexo</b>
            <select class="form-control" name="sexo">
                <option value="M"<?php if($sexoSeleccionado == 'M') echo " selected"; ?>>Macho</option>
                <option value="H"<?php if($sexoSeleccionado == 'H') echo " selected"; ?>>Hembra</option>
            </select>
        </div>
        <div class="form-group">
            <b>Código del padre</b>
            <input type="text" class="form-control" value="{{$stocks->cod_padre}}" name="cod_padre">
        </div>
        <div class="form-group">
            <b>Código de la madre</b>
            <input type="text" class="form-control" value="{{$stocks->cod_madre}}" name="cod_madre">
        </div>
        <div class="form-group">
            <b>Fecha de nacimiento</b>
            <input type="date" class="form-control" value="{{$stocks->fecha_nacimiento}}" name="fecha">
        </div>
        <div class="form-group">
            <b>Descripción</b>
            <input type="text" class="form-control" value="{{$stocks->descripcion}}" name="descripcion">
        </div>
        <div class="form-group">
            <?php $estadoSeleccionado = $stocks->status_idstatus; ?>
            <b>Estado</b>
            <select class="form-control" name="status">
                @foreach($estados as $estado)
                <option value="{{$estado->idstatus}}"<?php if($estadoSeleccionado == $estado->idstatus) echo " selected"; ?>>{{$estado->status}}</option>
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
