<?php
$idinventario_insumos = Input::get('id');
DB::table('inventario_insumos')->where('idinventario_insumos', '=', $idinventario_insumos)->delete();
?>


@extends('master')
@section('content')
<script type="text/javascript">
function redirect()
{
	location.href = "/supplies";
}

setTimeout("redirect()", 1000);
</script>
<div class="row">
    <div class="col-md-12">
        <h1><strong>Eliminado correctamente</strong></h1>
        <hr class="colorgraph-01"><br>
    </div>
</div>
@endsection
