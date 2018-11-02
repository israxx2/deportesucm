@extends('estudiante.layouts.app')

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
                        <div class="col-sm-5">
                            <button type="button" class="btn btn-icon btn-round float-right" style="height: 8.375rem; width: 8.375rem; font-size: 2.9rem; border-radius: 40px; background-color: #2CA8FF;"
                            data-toggle="modal" data-target="#ingresar">
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
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#baja">Dar de baja</button>
                                        <br>
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

{{-- MODAL UNIRSE A TORNEO --}}
<div class="modal fade" id="ingresar"
     tabindex="-1" role="dialog"
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <h4 class="modal-title"
        id="favoritesModalLabel">Ingresar torneo</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['route' => 'estudiante.torneos.ingresar', 'class' => 'form', 'method' => 'POST']) !!}

        <p>Para ingresar a un equipo debes ser el lider.</p>
        {!! Form::hidden('torneo_id', $torneo->id) !!}
	    <div class="form-group">
            {!! Form::select('equipoLiderado_id', $equiposLiderados->pluck('nombre','id'), null, ['multiple' ,'class' => 'form-control', 'placeholder' => 'Seleccione un equipo']) !!}
        </div>
      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <span class="pull-right">
          <button type="submit"class="btn btn-success">
            Aceptar
          </button>
		  {!! Form::close() !!}
        </span>
      </div>
    </div>
  </div>
</div>

{{-- DARSE DE BAJA DEL TORNEO --}}
<div class="modal fade" id="baja"
     tabindex="-1" role="dialog"
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <h4 class="modal-title"
        id="favoritesModalLabel">Dar de baja un equipo</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['route' => 'estudiante.torneos.baja', 'class' => 'form', 'method' => 'POST']) !!}
        {!! Form::hidden('torneo_id', $torneo->id) !!}
	    <div class="form-group">
            {!! Form::label('equipoBaja_id', 'Equipos') !!}
            {!! Form::select('equipoBaja_id', $equiposBaja->pluck('nombre','id'), null, ['multiple' ,'class' => 'form-control', 'placeholder' => 'Seleccione un equipo']) !!}
        </div>
      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <span class="pull-right">
          <button type="submit"class="btn btn-success">
            Aceptar
          </button>
		  {!! Form::close() !!}
        </span>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

<script>
    $('#flash-overlay-modal').modal();
</script>

@endsection
