@extends('master')
@section('content')
<div class="col-md-4"></div>
<div class="col-md-4">
  <h1><strong>Modificar datos del ganado</strong></h1>
  <hr class="colorgraph-01"><br>
  <?php
  $id = Input::get('id');
  $stock = DB::table('inventario_ganado')
  ->where('idinventario_ganado','=',$id)->get();
  ?>
  <form action="update" method="post">
    @foreach($stock as $stocks)
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
          <input type="hidden" name="id" value="{{$id}}" />
    <div class="form-group">
      <b>Tipo de ganado</b>
      <input type="text" class="form-control"
      value="{{ $stocks->tipos_ganados_idtipos_ganados}}" name="tipo_ganado">
    </div>
    <div class="form-group">
      <b>Raza</b>
      <input type="text" class="form-control"
      value="{{ $stocks->tipos_razas_idtipos_razas}}" name="tipo_raza">
    </div>
    <div class="form-group">
      <b>Código ganado</b>
      <input type="text" class="form-control"
      value="{{ $stocks->cod_ganado}}" name="cod_ganado">
    </div>
    <div class="form-group">
      <b>Color</b>
      <input type="text" class="form-control"
      value="{{ $stocks->color}}" name="color">
    </div>
    <div class="form-group">
      <b>Sexo</b>
      <input type="text" class="form-control"
      value="{{ $stocks->sexo}}" name="sexo">
    </div>
    <div class="form-group">
      <b>Código del padre</b>
      <input type="text" class="form-control"
      value="{{ $stocks->cod_padre}}" name="cod_padre">

    </div>
    <div class="form-group">
      <b>Código de la madre</b>
      <input type="text" class="form-control"
      value="{{ $stocks->cod_madre}}" name="cod_madre">
    </div>
    <div class="form-group">
      <b>Fecha de nacimiento</b>
      <input type="text" class="form-control"
      value="{{ $stocks->fecha_nacimiento}}" name="fecha">
    </div>
    <div class="form-group">
      <b>Descripción</b>
      <input type="text" class="form-control"
      value="{{ $stocks->descripcion}}" name="descripcion">
    </div>
    <div class="form-group">
      <b>Estado</b>
      <input type="text" class="form-control"
      value="{{ $stocks->status_idstatus}}" name="status">
    </div>
    <button type="submit" class="btn btn-lg btn-success btn-block" >
      Guardar &nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
    </button>

    @endforeach
  </form>
</div>
<div class="col-md-4"></div>

@endsection
