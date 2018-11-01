@extends('estudiante.layouts.app')

@section('title', 'Equipos')
@section('equipos', 'active')
@section('content')



<div class="col-sm-12">

<h5 class="card-category">EQUIPOS</h5>
<div class="table-responsive">
                <table class="table table-striped display compact table-condensed" id="table_user">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>DESCRIPCION</th>
                            <th>VICTORIAS</th>
                            <th>DERROTAS</th>
                            <th>PUNTOS A FAVOR</th>
                            <th>PUNTOS EN CONTRA</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{ $equipo->nombre }}</td>
                                <td>{{ $equipo->descripcion }}</td>
                                <td>{{ $equipo->victorias_totales }}</td>
                                <td>{{ $equipo->derrotas_totales }}</td>
                                <td>{{ $equipo->puntos_favor_totales }}</td>
                                <td>{{ $equipo->puntos_contra_totales }}</td>
                            </tr>
                    </tbody>
                </table>
            </div>


</div>




@endsection


