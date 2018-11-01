@extends('estudiante.layouts.app')

@section('title', 'torneos')
@section('torneos', 'active')

@section('content')

<div class="container">

    <div class="row">

        <div class="card card-chart">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <br>
                        <h1 class="title">{{ $torneo->nombre }}</h5>
                    </div>
                    <div class="col-sm-5">
                        <button type="button" class="btn btn-icon btn-round float-right" style="height: 8.375rem; width: 8.375rem; font-size: 2.9rem; border-radius: 40px; background-color: #2CA8FF;">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <h3>Descripción</h3>
                    <p class="blockquote">{{ $torneo->descripcion }}
                    <br><br>
                    <b>Fecha de inicio:</b> {{ date("d/m/Y", strtotime($torneo->fecha)) }}
                    </p>
                    <br>
                </div>
                <br>
                <div class="container">
                        <div class="card card-nav-tabs card-plain">
                            <div class="card-header">
                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#participantes" data-toggle="tab">Participantes</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#historial" data-toggle="tab">Historial</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <div class="card-body ">
                        <div class="tab-content text-center">

                            {{-- PARTICIPANTES --}}
                            <div class="tab-pane active" id="participantes">
                                <h3>Inscritos</h3>
                                @for($i=0;$i<$torneo->max;$i++)

                                    @if(isset($torneo->equipos[$i]))
                                        <div class="card" style="width: 50rem;">
                                            <div class="card-body">
                                            <h5 class="card-title">{{ $torneo->equipos[$i]->nombre }}</h5>
                                            </div>
                                        </div>
                                    @else
                                        <div class="card" style="width: 50rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">Espacio Disponible</h5>
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                            {{-- HISTORIAL --}}
                            <div class="tab-pane active" id="historial">
                                <div class="container">
                                    @if($torneo->tipo == 'llave')
                                        @for($i=1; $i<=$fases; $i++)
                                        <div class="table-responsive">
                                            <h2>{{ 'FASE '.+$i }}</h2>
                                            <table class="table table-striped display compact table-condensed" id="{{ 'table_fases_'.$i }}">
                                                <thead>
                                                    <tr>
                                                        <th>Equipo</th>
                                                        <th>vs</th>
                                                        <th>Equipo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($torneo->enfrentamientos->where('fase', $i) as $enfrentamiento)
                                                        <tr>
                                                            @if($enfrentamiento->ganador_id == $enfrentamiento->equipoLocal->id)
                                                                <td>
                                                                    <span class="badge badge-pill badge-success">{{ $enfrentamiento->equipoLocal->nombre }}</span>
                                                                </td>
                                                                <td>vs</td>
                                                                <td>
                                                                    @if($enfrentamiento->visita_id != null)
                                                                        <div class="alert alert-danger">{{ $enfrentamiento->equipoVisita->nombre }}</div>
                                                                    @else
                                                                        <div class="alert alert-danger" role="alert">SIN RIVAL</div>
                                                                    @endif
                                                                </td>
                                                            @elseif($enfrentamiento->ganador_id == $enfrentamiento->equipoVisita->id)
                                                                <td>
                                                                    <div class="alert alert-danger" role="alert">
                                                                        {{ $enfrentamiento->equipoLocal->nombre }}
                                                                    </div>
                                                                </td>
                                                                <td>vs</td>
                                                                <td>
                                                                    <div class="alert alert-success" role="alert">
                                                                        {{ $enfrentamiento->equipoVisita->nombre }}
                                                                    </div>
                                                                </td>
                                                            @else
                                                                <td>{{ $enfrentamiento->equipoLocal->nombre }}</td>
                                                                <td>vs</td>
                                                                <td>{{ $enfrentamiento->equipoVisita->nombre }}</td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                    @endif
                                </div>
                                            <br><br>
                                        @endfor

                            </div>
                            </div>
                        </div>
                    </div>
                        </div>
                </div>



            </div>
        </div>
    </div>

</div>

@endsection
