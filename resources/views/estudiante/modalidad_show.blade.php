@extends('estudiante.layouts.app')

@section('title', 'modalidad: '.$modalidad->nombre)
@section('modalidad', 'active')
@section('modalidad_'.$modalidad->id , 'active')
@section('content')






<div class="row">
    <div class="col-sm-12">
        <div class="card card-chart">
            <div class="card-header">   
                <h5 class="text-center">{{ $modalidad->descripcion }}</h5>
            </div>
        </div>
    <div>
<div>


<div class="row">


    <div class="card   " style="width: 70rem;">
        <div class="card-body">
            <h4 class="card-title text-center"><b>EQUIPOS</b></h4>
            <p class="card-text">
            <table class="table ">
                <thead>
                    <tr>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($modalidad->equipos as $equipo)
                        <tr>
                            <td>{{ strtoupper($equipo->nombre) }}</td>

                            <td>{{ $equipo->descripcion }}</td>
                            <td>
                            <a href="{{ route('estudiante.equipos.show', ['id' => $equipo->id]) }}" class="btn btn-round btn-info">
                                    <i class="fa fa-info"></i>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
            
            </p>
        </div>
    </div>

    <div class="card bg-danger  " style="width: 30rem;">
        <div class="card-body">
            <h4 class="card-title text-center"><b>RANKING</b></h4>
            <p class="card-text">
                <table class="table">
                        <thead>
                            <tr>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ranking as $equipo)
                                <tr>
                                    <td>{{ $equipo->puesto }}</td>
                                    <td>{{ strtoupper($equipo->nombre) }}</td>
                                    <td>{{ $equipo->victorias_totales }}</td>

                                    
                                </tr>

                            @endforeach
                        </tbody>
                </table>
            </p>
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

