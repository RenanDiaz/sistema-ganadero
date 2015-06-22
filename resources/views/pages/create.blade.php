@extends('master')
@section('content')
    <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h1><strong>Insertar Ganado</strong></h1>
        <hr class="colorgraph-01"><br>

        <form action="insert" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
            <div class="form-group">
                <b>Tipo de Ganado</b>
                <input type="text" class="form-control" placeholder="Tipo de Ganado" name="tipo_ganado">
            </div>
            <div class="form-group">
                <b>Tipo de Razas</b>
                <input type="text" class="form-control" placeholder="Tipo de Razas" name="tipo_raza">
            </div>
            <div class="form-group">
                <b>Codigo Ganado</b>
                <input type="text" class="form-control" placeholder="Codigo Ganado" name="cod_ganado">
            </div>
            <div class="form-group">
                <b>Color</b>
                <input type="text" class="form-control" placeholder="Color" name="color">
            </div>
            <div class="form-group">
                <b>Sexo</b>
                <input type="text" class="form-control" placeholder="Sexo" name="sexo">
            </div>
            <div class="form-group">
                <b>Codigo Padre</b>
                <input type="text" class="form-control" placeholder="Codigo Padre" name="cod_padre">
            </div>
            <div class="form-group">
                <b>Codigo Madre</b>
                <input type="text" class="form-control" placeholder="Codigo Madre" name="cod_madre">
            </div>
            <div class="form-group">
                <b>Fecha de Nacimiento</b>
                <input type="text" class="form-control" placeholder="Fecha de Nacimiento" name="fecha">
            </div>
            <div class="form-group">
                <b>Descripcion</b>
                <input type="text" class="form-control" placeholder="Descripcion" name="descripcion">
            </div>
            <div class="form-group">
                <b>Estado</b>
                <input type="text" class="form-control" placeholder="Estado" name="status">
            </div>
            <button type="submit" class="btn btn-lg btn-success btn-block" >
                Guardar   <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
            </button>
        </form>
    </div><div class="col-md-4"></div>
    </div>
@endsection