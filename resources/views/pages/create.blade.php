@extends('master')
@section('content')
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <h1><strong>Insertar datos del ganado</strong></h1>
    <hr class="colorgraph-01"><br>

    <form action="insert" method="post">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
      <div class="form-group">
        <b>Tipo de ganado</b>
        <input type="text" class="form-control" placeholder="Tipo de ganado" name="tipo_ganado">
      </div>
      <div class="form-group">
        <b>Raza</b>
        <input type="text" class="form-control" placeholder="Raza" name="tipo_raza">
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
        <input type="text" class="form-control" placeholder="Sexo" name="sexo">
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
        <input type="text" class="form-control" placeholder="Fecha de nacimiento" name="fecha">
      </div>
      <div class="form-group">
        <b>Descripción</b>
        <input type="text" class="form-control" placeholder="Descripción" name="descripcion">
      </div>
      <div class="form-group">
        <b>Estado</b>
        <input type="text" class="form-control" placeholder="Estado" name="status">
      </div>
      <button type="submit" class="btn btn-lg btn-success btn-block" >
        Guardar &nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
      </button>
    </form>
  </div><div class="col-md-4"></div>
</div>
@endsection
