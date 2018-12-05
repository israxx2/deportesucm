@extends('estudiante.layouts.app')

@section('title', 'Equipos')
@section('equipos', 'active')
@section('content')


<br>
<hr>

<div class="row">
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
    </div>    
   <div class="col-sm-4">
            <div class="card" style="width: 27rem;"  >
                {!! Form::open(['route' => 'estudiante.filtro' , 'method' => 'POST']) !!}
                    <div class="form-group">
                        <label>Filtro</label>
                        <input type="text" name="filtro" class="form-control" placeholder="ingresa un equipo o Lider..."> 
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Aplicar Filtro</button>
                    </div>
                    <div class="card-body">

            </div>
            <div class="card-footer">

            </div>
                {!! Form::close() !!}   
            </div> 
    </div>
    </div>
        @if(!$equipos)
        <div class="card card-nav-tabs">

            <div class="card-body">
                <p class="card-text">No pertenece a ningún equipo.</p>
            </div>
        </div>
        @else
            @foreach($equipos as $equipo)
            <div class="card card-nav-tabs">
                <div class="card-header card-header-warning">
                <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <p><b>Equipo:</b> {{$equipo->nombre}}</p>
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
        @endif

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

