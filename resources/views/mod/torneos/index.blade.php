@extends('mod.layouts.app')

@section('title', 'Equipos')
@section('equipos', 'active')
@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Crear un Nuevo Torneo</h5>
                <h3 class="card-title">Realizar una Invitacion <button type="button" class="btn btn-info" data-toggle="modal" data-target="#crearTorneo"><i class="fas fa-plus"></i></button></h3>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
</div>
<div class="row">

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>    
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

<div class="modal fade" id="crearTorneo" tabindex="-1" role="dialog" aria-labelledby="crearTorneoTitulo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="crearTorneoTitulo">Crear Torneo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
            </button>
        </div>
        <div class="modal-body">

        {!! Form::open(['route' => 'mod.torneos.store' , 'method' => 'POST']) !!}
        <div class="form-group">
            <label>Nombre Del Torneo</label>
                <input type="text" name="n_torneo" class="form-control"> 
        </div>
        <div class="form-group">
            <label>Descripcion</label>
                <textarea name="descripcion" class="form-control" rows="3"> </textarea>
        </div>
        <div class="form-group">
            <label>Fecha</label>
                <input type="text" name="fecha" class="form-control"> 
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Min Jugadores</label>
                        <input type="number" name="min" class="form-control"> 
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Max Jugadores</label>
                        <input type="number" name="max" class="form-control"> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Tipo Torneo</label>
                    <select name="tipo_t">
                        <option value="llave">Llave</option>
                        <option value="grupo">Grupo</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">  
                    <label>Modalidad</label>
                    <select name="modalidad">
                    @foreach($torneos as $modalidad)
                        <option value="{{$modalidad->id}}">{{ $modalidad->deporte->nombre }},{{ $modalidad->nombre }}</option>
                    @endforeach
                    </select>
            </div>
            <div class="modal-footer">
                <div class="col-md-4">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        </div>

@endsection
