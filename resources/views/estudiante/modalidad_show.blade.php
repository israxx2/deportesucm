@extends('estudiante.layouts.app')

@section('title', 'modalidad')
@section('modalidad', 'active')
@section('modalidad_'.$modalidad->id , 'active')
@section('content')






<div class="row">
    <div class="col-sm-8">
        <div class="card card-chart">
            <div class="card-header">
            <li class="list-group-item"><b>NOMBRE: </b>{{ $modalidad->nombre }}</li>
            <li class="list-group-item"><b>DESCRIPCION: </b>{{ $modalidad->descripcion }}</li>

</div>
    <div class="row">
    <div class="col-sm-8">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Equipos</h5>
            </div>
            <div class="list-group-item">
                    @foreach($modalidad->equipos as $equipo)
                    <div class="list-group-item">
                         <li class="list-group-item"><b>NOMBRE: </b>{{ $equipo->nombre }}</li>
                         <li class="list-group-item"><b>DESCRIPCION: </b>{{ $equipo->descripcion }}</li>
                         <li class="list-group-item"><b>VICTORIAS: </b>{{ $equipo->victorias_totales }}</li>
                         <li class="list-group-item"><b>DERROTAS: </b>{{ $equipo->derrotas_totales }}</li>
                         <li class="list-group-item"><b>PUNTOS A FAVOR: </b>{{ $equipo->puntos_favor_totales }}</li>
                         <li class="list-group-item"><b>PUNTOS EN CONTRA: </b>{{ $equipo->puntos_contra_totales }}</li>
                    </div>
                    @endforeach
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
    </div>


</div>

<div class="col-ml-9 col-sm-8">
    @foreach($ranking as $equipo)
        <div class="list-group-item">
            <li class="list-group-item"><b>PUESTO: </b>{{ $equipo->puesto }}</li>
            <li class="list-group-item"><b>NOMBRE: </b>{{ $equipo->nombre }}</li>
            <li class="list-group-item"><b>VICTORIAS: </b>{{ $equipo->victorias_totales }}</li>
        </div>
    @endforeach


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
                    @foreach($modalidad->deporte->modalidades as $modalidad)
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

