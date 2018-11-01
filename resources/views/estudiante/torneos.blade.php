@extends('estudiante.layouts.app')

@section('title', 'torneos')
@section('torneos', 'active')

@section('content')

<div class="container">

    <div class="row">

        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Torneos</h5>
            </div>
            <div class="card-body">
                <div class="container">
                    <p>FILTROS (PRÓXIMAMENTE)</p>
                </div>


                <div class="table-responsive">
                    <table class="table table-striped display compact table-condensed" id="table_user">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Deporte</th>
                                <th>Modalidad</th>
                                <th>Capacidad</th>
                                <th>Fecha</th>
                                <th>Ver+</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($torneos as $torneo)
                                <tr>
                                    <td>{{ $torneo->nombre }}</td>

                                    <td>{{ $torneo->modalidad->deporte->nombre }}</td>
                                    <td>{{ $torneo->modalidad->nombre }}</td>
                                    <td>{{ $torneo['participantes_actuales'].'/'.$torneo->max }}</td>
                                    <td>{{ date("d/m/Y", strtotime($torneo->fecha)) }}</td>
                                    <td>
                                    <a href="{{ route('estudiante.torneos.show', ['id' => $torneo->id]) }}" class="btn btn-info">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
