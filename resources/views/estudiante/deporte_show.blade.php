@extends('estudiante.layouts.app')

@section('title', 'deporte')
@section('deporte', 'active')
@section('deporte_'.$deporte->id , 'active')
@section('content')

<div class="row">
    <div class="col-sm-8">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Equipos</h5>
                <h3 class="card-title">Crear un Equipo <button type="button" class="btn btn-info" data-toggle="modal" data-target="#crearEquipo"><i class="fas fa-plus"></i></button></h3>
            </div>
            <div class="card-body">

            </div>
            <div class="card-footer">

            </div>
        </div>
        @foreach( $invitaciones as $invitacion)
            <div class="card card-chart">
                <div class="card-header">
                    <h6 class="card-title">{{$invitacion->emisor_id}}</button></h6>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{$invitacion->descripcion}}</p>
                    <hr>
                    <p>Horario:{{$invitacion->horario}}, 16:30 hrs.</p>
                    <hr>
                    <p>Lugar: {{$invitacion->lugar}}</p>
                    <hr>
                    <p>Número contacto: {{$invitacion->lugar}}</p>
                    <button type="button" class="btn btn-success btn-lg btn-block">ACEPTAR</button>
                </div>
                <div class="card-footer">

                </div>
            </div>
            @endforeach
    </div>
    <div class="col-sm-4">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Modalidades</h5>
            </div>
            <div class="card-body">
                    @foreach($deporte->modalidades as $modalidad)
                        <a href="{{ route('estudiante.modalidades.show', ['id' => $modalidad->id]) }}"><h5>{{ '- '.$modalidad->nombre }}</h5></a>
                    @endforeach
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</div>

<!-- CREAR EQUIPO -->
<div class="modal fade" id="crearEquipo" tabindex="-1" role="dialog" aria-labelledby="crearEquipoTitulo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="crearEquipoTitulo">Crear Equipo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
            </button>
        </div>
        <div class="modal-body">

            {!! Form::open(['route' => 'estudiante.equipo.store' , 'method' => 'POST']) !!}
            <div class="form-group">
                <label>Nombre del Equipo</label>
                <input name="nombre" id="nombre" type="text" class="form-control" placeholder="Ingrese un nombre para el equipo..." required>
            </div>
            <div class="form-group">
                <label>Modalidad</label>
                <select name="modalidad"  class="form-control" required>
                    <option value="">Seleccione Modalidad</option>
                    @foreach($deporte->modalidades as $modalidad)
                        <option value="{{$modalidad->id}}">{{$modalidad->nombre}}</option>
                    @endforeach
                </select>


            </div>


        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
