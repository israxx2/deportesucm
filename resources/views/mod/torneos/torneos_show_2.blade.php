@extends('mod.layouts.app')

@section('title', 'torneos')
@section('torneos', 'active')

@section('content')

<div class="container">

        <div class="row">
            <div class="card card-chart">

                <div class="card-header">
                    <div class="container">
                        @include('flash::message')
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <br>
                            <h1 class="title">{{ $torneo->nombre }}</h5>
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
                    <div class="container">
                        <div class="card card-nav-tabs card-plain">
                            <div class="card-header">
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
                                        <br>
                                    </div>

                                    {{-- HISTORIAL --}}
                                    <div class="tab-pane active" id="historial">
                                        <div class="container">
                                            @if($torneo->tipo == 'llave')
                                                @for($i=1; $i<=$fases; $i++)
                                                <div class="col-sm-5">
                                {!! Form::open(['route' => 'mod.enfrent' , 'method' => 'POST']) !!}
                                                                            <input type="hidden" id="torneo" name="torneo" value="{{$torneo->id}}">
                                                                            <input type="hidden" id="fase" name="fase" value="{{$i}}">
                                                                             <button type="submit" class="btn btn-warning">Editar</button>
                                             {!! Form::close() !!}
                        </div>
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
                                                                                            <span class="badge badge-pill badge-danger">{{ $enfrentamiento->equipoVisita->nombre }}</span>
                                                                                        @else
                                                                                            <span class="badge badge-pill badge-danger">SIN RIVAL</span>
                                                                                        @endif
                                                                                    </td>
                                                                                @elseif($enfrentamiento->ganador_id == $enfrentamiento->equipoVisita->id)
                                                                                    <td>
                                                                                        <span class="badge badge-pill badge-danger">{{ $enfrentamiento->equipoLocal->nombre }}</span>
                                                                                    </td>
                                                                                    <td>vs</td>
                                                                                    <td>
                                                                                        <span class="badge badge-pill badge-success">{{ $enfrentamiento->equipoVisita->nombre }} </span>
                                                                                    </td>
                                                                                @else
                                                                                    <td>{{ $enfrentamiento->equipoLocal->nombre }}</td>
                                                                                    <td>vs</td>
                                                                                    <td>{{ $enfrentamiento->equipoVisita->nombre }}</td>
                                                                                @endif
                                                                            <td>
                                                                            </td>
                                                                             </tr>
                                                                        
                                                                    @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endfor

                                                <h2>GANADOR</h2>

                                            @else

                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>


<script>
    $('#flash-overlay-modal').modal();
</script>

@endsection

