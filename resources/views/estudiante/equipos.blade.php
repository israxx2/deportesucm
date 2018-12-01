@extends('estudiante.layouts.app')

@section('title', 'Equipos')
@section('equipos', 'active')
@section('content')


<br>
<hr>

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
        @if($user->equipos->isEmpty())
        <div class="card card-nav-tabs">

            <div class="card-body">
                <p class="card-text">No pertenece a ningún equipo.</p>
            </div>
        </div>
        @else
            @foreach($user->equipos as $equipo)
            <div class="card card-nav-tabs">
                <div class="card-header card-header-warning">
                {{ $equipo->modalidad->deporte->nombre.'/'.$equipo->modalidad->nombre }}
                </div>
                <div class="card-body">
                <h4 class="card-title">{{ $equipo->nombre }}</h4>
                <p class="card-text">{{ $equipo->descripcion }}</p>
                <a href="#" class="btn btn-primary">Ver+</a>
                </div>
            </div>
            @endforeach
        @endif

    </div>

    <div class="col-sm-4">
        <div class="card card-nav-tabs">
            <div class="card-header card-header-warning">
              <Label>seleccione un equipo</Label>
            </div>
            <div class="card-body">
            {!! Form::open(['route' => 'estudiante.equipos2' , 'method' => 'POST']) !!}
            <div class="form-group">
                <select name="id" class="form-control">
                    <option value="">Seleccione un equipo</option>
                    @foreach($equi as $equip)
                    <option value="{{$equip->id}}">{{$equip->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
            {!! Form::close() !!}

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
                    <option value="">Seleccione un deporte</option>
                    @foreach($deportes as $deporte)
                        <option value="{{$deporte->id}}">{{$deporte->nombre}}</option>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

@endsection

