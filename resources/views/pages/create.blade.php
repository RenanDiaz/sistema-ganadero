@extends('master')
@section('content')
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <h1><strong>Insertar datos del ganado</strong></h1>
    <hr class="colorgraph-01"><br>
    <?php
    $tiposDeGanado = DB::table('tipos_ganados')->get();
    $razas = DB::table('tipos_razas')->get();
    $estados = DB::table('status')->get();
    ?>
    <form action="insert" method="post">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
      <div class="form-group">
        <b>Tipo de ganado</b>
        <select class="form-control" name="tipo_ganado">
          @foreach($tiposDeGanado as $tipoDeGanado)
          <option value="{{$tipoDeGanado->idtipos_ganados}}">{{$tipoDeGanado->tipo}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <b>Raza</b>
        <select class="form-control" name="tipo_raza">
          @foreach($razas as $raza)
          <option value="{{$raza->idtipos_razas}}">{{$raza->raza}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <b>Código</b>
        <input type="text" class="form-control" placeholder="Código" name="cod_ganado">
      </div>
      <div class="form-group">
        <b>Color</b>
        <input type="text" class="form-control" placeholder="Color" name="color">
      </div>
      <div class="form-group">
        <b>Sexo</b>
        <select class="form-control" name="sexo">
          <option value="M">Macho</option>
          <option value="H">Hembra</option>
        </select>
      </div>
      <div class="form-group">
        <b>Código del padre</b>
        <input type="text" class="form-control" placeholder="Código del padre" name="cod_padre">
      </div>
      <div class="form-group">
        <b>Código de la madre</b>
        <input type="text" class="form-control" placeholder="Código de la madre" name="cod_madre">
      </div>
      <div class="form-group">
        <b>Fecha de nacimiento</b>
        <input type="date" class="form-control" placeholder="Fecha de nacimiento" name="fecha">
      </div>
      <div class="form-group">
        <b>Descripción</b>
        <input type="text" class="form-control" placeholder="Descripción" name="descripcion">
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
