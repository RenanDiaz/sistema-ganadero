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
        <h1><strong>Inventario de ganado</strong></h1>
        <hr class="colorgraph-01"><br>
        <div class="container">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <a href="create" style="text-decoration: none;"><button type="submit" class="btn btn-lg btn-success btn-block" >
                        <strong>Agregar</strong> &nbsp;&nbsp;<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button></a><br>
            </div>
            <div class="col-md-4"></div>
        </div>
        <table id="myTable" class="table table-striped table-bordered display" width="100%">
            <thead>
            <tr class="info">
                <th>ID</th>
                <th>Tipo de ganado</th>
                <th>Raza</th>
                <th>Código</th>
                <th>Color</th>
                <th>Sexo</th>
                <th>Código del padre</th>
                <th>Código de la madre</th>
                <th>Fecha de nacimiento</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $stock = DB::table('inventario_ganado')->get();
            $tiposDeGanado = DB::table('tipos_ganados')->get();
            $razas = DB::table('tipos_razas')->get();
            $estados = DB::table('status')->get();
            ?>
            @foreach($stock as $stocks)
            <tr>
                <td>{{$stocks->idinventario_ganado}}</td>
                <td>
                @foreach($tiposDeGanado as $tipo)
                <?php if($stocks->tipos_ganados_idtipos_ganados == $tipo->idtipos_ganados) echo $tipo->tipo; ?>
                @endforeach
                </td>
                <td>
                @foreach($razas as $raza)
                <?php if($stocks->tipos_razas_idtipos_razas == $raza->idtipos_razas) echo $raza->raza; ?>
                @endforeach
                </td>
                <td>{{$stocks->cod_ganado}}</td>
                <td>{{$stocks->color}}</td>
                <td><?php echo ($stocks->sexo == "M" ? "Macho" : "Hembra"); ?></td>
                <td>{{$stocks->cod_padre}}</td>
                <td>{{$stocks->cod_madre}}</td>
                <td>{{$stocks->fecha_nacimiento}}</td>
                <td>{{$stocks->descripcion}}</td>
                <td>
                @foreach($estados as $estado)
                <?php if($stocks->status_idstatus == $estado->idstatus) echo $estado->status; ?>
                @endforeach
                </td>
                <td><a class="btn btn-success" href="/modify?id={{$stocks->idinventario_ganado}}">Modificar</a></td>
                <td><a class="btn btn-danger" href="/delete?id={{$stocks->idinventario_ganado}}">Eliminar</a></td>
            </tr>
                @endforeach
            </tbody>
            </table>
        </div>
</div>

    @endsection
    @section('footer')
        <script type="text/javascript">
            $(document).ready(function(){
                $('#myTable').DataTable();
            });
        </script>
    @endsection
