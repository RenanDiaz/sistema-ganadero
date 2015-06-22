@extends('master')
@section('content')
    <div class="row">

        <div class="col-md-12">
            <h1><strong>Inventario de Ganado</strong></h1>
            <hr class="colorgraph-01"><br>
            <div class="container">
                <div class="col-md-4">
                    <form class="form-group has-feedback">
                        <input type="text" id="buscar" class="form-control" placeholder="Buscar inventario por...">
                        <i class="glyphicon glyphicon-search form-control-feedback"></i>
                    </form>
                </div>
                <div class="col-md-4">
                        <a href="create"><button type="submit" class="btn btn-success" ><strong>Agregar </strong>
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button></a>
                </div>
            </div>
            <table class="table table-bordered " id="tabla">
                <tr class="info">
                    <th>ID</th>
                    <th>Tipo Ganado</th>
                    <th>Tipo Razas</th>
                    <th>Cod</th>
                    <th>Color</th>
                    <th>Sexo</th>
                    <th>CodPadre</th>
                    <th>CodMadre</th>
                    <th>Nacimiento</th>
                    <th>Descripcion</th>
                    <th>Status</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
                <?php $stock = DB::table('inventario_ganado')->get(); ?>
                @foreach($stock as $stocks)
                    <tr>
                    <td>{{$stocks->idinventario_ganado}}</td>
                    <td>{{$stocks->tipos_ganados_idtipos_ganados}}</td>
                    <td>{{$stocks->tipos_razas_idtipos_razas}}</td>
                    <td>{{$stocks->cod_ganado}}</td>
                    <td>{{$stocks->color}}</td>
                    <td>{{$stocks->sexo}}</td>
                    <td>{{$stocks->cod_padre}}</td>
                    <td>{{$stocks->cod_madre}}</td>
                    <td>{{$stocks->fecha_nacimiento}}</td>
                    <td>{{$stocks->descripcion}}</td>
                    <td>{{$stocks->status_idstatus}}</td>
                    <td><a class="btn btn-success" href="modify?id={{$stocks->idinventario_ganado}}">Modificar</a></td>
                    <td><a class="btn btn-danger" href="delete?id={{$stocks->idinventario_ganado}}">Eliminar</a></td>
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