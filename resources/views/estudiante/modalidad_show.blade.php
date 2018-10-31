@extends('estudiante.layouts.app')

@section('title', 'modalidad')
@section('modalidad', 'active')
@section('modalidad_'.$modalidad->id , 'active')
@section('content')






<div class="row">
    <div class="col-sm-12">
        <div class="card card-chart">
            <div class="card-header">
            <li class="list-group-item"><b>NOMBRE: </b>{{ $modalidad->nombre }}</li>
            <li class="list-group-item"><b>DESCRIPCION: </b>{{ $modalidad->descripcion }}</li>
        </div>

    <div>

<div>


</div>


<div class="col-sm-12">

    <h5 class="card-category">EQUIPOS</h5>
    <div class="table-responsive">
                    <table class="table table-striped display compact table-condensed" id="table_user">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>DESCRIPCION</th>
                                <th>VICTORIAS</th>
                                <th>DERROTAS</th>
                                <th>PUNTOS A FAVOR</th>
                                <th>PUNTOS EN CONTRA</th>
                                <th>ver mas+</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($modalidad->equipos as $equipo)
                                <tr>
                                    <td>{{ $equipo->nombre }}</td>

                                    <td>{{ $equipo->descripcion }}</td>
                                    <td>{{ $equipo->victorias_totales }}</td>
                                    <td>{{ $equipo->derrotas_totales }}</td>
                                    <td>{{ $equipo->puntos_favor_totales }}</td>
                                    <td>{{ $equipo->puntos_contra_totales }}</td>
                                    <td>
                                    <a href="{{ route('estudiante.equipos.show', ['id' => $equipo->id]) }}" class="btn btn-info">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>


</div>

</div>



<div class="col-sm-12">

<h5 class="card-category">Ranking</h5>
<div class="table-responsive">
                <table class="table table-striped display compact table-condensed" id="table_user">
                    <thead>
                        <tr>
                            <th>PUESTO</th>
                            <th>NOMBRE</th>
                            <th>VICTORIAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ranking as $equipo)
                            <tr>
                                <td>{{ $equipo->puesto }}</td>
                                <td>{{ $equipo->nombre }}</td>
                                <td>{{ $equipo->victorias_totales }}</td>

                                
                            </tr>

                        @endforeach
                    </tbody>
                </table>
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

