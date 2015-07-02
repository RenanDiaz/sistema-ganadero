<?php
$idinventario_ganado = Input::get('id');
DB::table('inventario_ganado')->where('idinventario_ganado', '=', $idinventario_ganado)->delete();
?>


@extends('master')
@section('content')
<script type="text/javascript">
function redirect()
{
	location.href = "/stock";
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
