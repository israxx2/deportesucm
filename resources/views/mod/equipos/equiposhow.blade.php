@extends('mod.layouts.app')

@section('title', 'Equipos')
@section('equipos', 'active')
@section('content')
<div class="row">
    <div class="row">
        <div class="col-lg-12">
            @foreach($equipos as $equipo)
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <p><b>Equipo:</b> <a href="equipos/{{$equipo->id}}">{{$equipo->nombre}}</a></p>
                            </div>
                            <div class="col-lg-6">
                                <p><b>Lider Equipo:</b> {{$equipo->nombre_u}}, {{$equipo->apellido_u}}</p>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-8">
                            <b>Descripcion:</b> {{$equipo->descripcion}}
                        </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <b>Victorias:</b> <p style="color:#008000">{{$equipo->victorias_totales}}</p>
                            </div>
                            <div class="col-md-4">
                               <b>Derrotas:</b> <p style="color:#FF0000">{{$equipo->derrotas_totales}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
            @endforeach
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            @foreach($jugadores as $jugador)
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <p><b>Nombre Jugador:</b> {{$jugador->nombres}}, {{$jugador->apellidos}}</p>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-8">
                            <b>Ciudad:</b> {{$jugador->ciudad}}
                        </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <b>nick:</b> <p>{{$jugador->nick}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
            @endforeach
        </div>
    </div>
</div>
@endsection
