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

                <hr>
                </div>
                <br>
                <div class="container">
                    <h3>Participantes</h3>
                </div>

                @for($i=0;$i<$torneo->max;$i++)

                    @if(isset($torneo->equipos[$i]))
                        <div class="card" style="width: 50rem;">
                            <div class="card-body">
                            <h4 class="card-title">{{ $torneo->equipos[$i]->nombre }}</h4>
                            </div>
                        </div>
                    @else
                        <div class="card" style="width: 50rem;">
                            <div class="card-body">
                                <h4 class="card-title">Espacio Disponible</h4>
                            </div>
                        </div>
                    @endif
                @endfor


            </div>
        </div>
    </div>

</div>

@endsection
