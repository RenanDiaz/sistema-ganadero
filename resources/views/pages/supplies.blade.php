@extends('master')
@section('content')
<style media="screen">
.info th
{
    text-align: center;
    vertical-align: middle !important;
}
</style>
<div class="row">

    <div class="col-md-12">
        <h1><strong>Inventario de insumos</strong></h1>
        <hr class="colorgraph-01"><br>
        <div class="container">
            <div class="col-md-4">
                <form class="form-group has-feedback">
                    <input type="text" id="buscar" class="form-control" placeholder="Buscar insumos por...">
                    <i class="glyphicon glyphicon-search form-control-feedback"></i>
                </form>
            </div>
            <div class="col-md-4">
                <a href="/nuevo"><button type="submit" class="btn btn-success"><strong>Agregar</strong> &nbsp;&nbsp;<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button></a>
            </div>
        </div>
        <table class="table table-bordered table-responsive" id="tabla">
            <tr class="info">
                <th>ID</th>
                <th>Código del producto</th>
                <th>Nombre</th>
                <th>Tipo de insumos</th>
                <th>Cantidad</th>
                <th>Unidades</th>
                <th>Descripción</th>
                <th>Fecha de vencimiento</th>
                <th>Estado</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
            <?php
            $insumos = DB::table('inventario_insumos')->paginate(6);
            $unidades = DB::table('unidades')->get();
            $tiposDeInsumos = DB::table('tipo_insumos')->get();
            $estados = DB::table('status')->get();
            ?>
            @foreach($insumos as $insumo)
            <tr>
                <td>{{$insumo->idinventario_insumos}}</td>
                <td>{{$insumo->cod_producto}}</td>
                <td>{{$insumo->nombre}}</td>
                <td>
                @foreach($tiposDeInsumos as $tipoDeInsumo)
                <?php if($insumo->tipo_insumos_idtipo_insumos == $tipoDeInsumo->idtipo_insumos) echo $tipoDeInsumo->tipo_insumo; ?>
                @endforeach
                </td>
                <td>{{$insumo->cantidad}}</td>
                <td>
                @foreach($unidades as $unidad)
                <?php if($insumo->unidades_idunidades == $unidad->idunidades) echo $unidad->unidad; ?>
                @endforeach
                </td>
                <td>{{$insumo->descripcion}}</td>
                <td>{{$insumo->fecha_vencimiento}}</td>
                <td>
                @foreach($estados as $estado)
                <?php if($insumo->status_idstatus == $estado->idstatus) echo $estado->status; ?>
                @endforeach
                </td>

                <td><a class="btn btn-success" href="/modify?id={{$insumo->idinventario_insumos}}">Modificar</a></td>
                <td><a class="btn btn-danger" href="/delete?id={{$insumo->idinventario_insumos}}">Eliminar</a></td>

            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection
@section('footer')
<script type="text/javascript">
$(document).ready(function()
{
    $('#buscar').keyup(function()
    {
        searchTable($(this).val());
    });
});

function searchTable(inputVal)
{
    var table = $('#tabla');
    table.find('tr').each(function(index, row)
    {
        var allCells = $(row).find('td');
        if(allCells.length > 0)
        {
            var found = false;
            allCells.each(function(index, td)
            {
                var regExp = new RegExp(inputVal, 'i');
                if(regExp.test($(td).text()))
                {
                    found = true;
                    return false;
                }
            });
            if(found == true)$(row).show();else $(row).hide();
        }
    });
}
</script>
@endsection
