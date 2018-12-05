@extends('mod.layouts.app')

@section('title', 'Equipos')
@section('equipos', 'active')
@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Crear un Nuevo Torneo</h5>
                <h3 class="card-title">Crea tu torneo <button type="button" class="btn btn-info" data-toggle="modal" data-target="#crearTorneo"><i class="fas fa-plus"></i></button></h3>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Torneos</h5>
            </div>
            <div class="card-body">
                <div class="container">
                    <p>FILTROS (PRÓXIMAMENTE)</p>
                </div>


                <div class="table-responsive">
                    <table class="table table-striped display compact table-condensed" id="table_user">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Deporte</th>
                                <th>Modalidad</th>
                                <th>Capacidad</th>
                                <th>Fecha</th>
                                <th>Ver+</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($torneos as $torneo)
                                <tr>
                                    <td>{{ $torneo->nombre }}</td>

                                    <td>{{ $torneo->modalidad->deporte->nombre }}</td>
                                    <td>{{ $torneo->modalidad->nombre }}</td>
                                    <td>{{ $torneo['participantes_actuales'].'/'.$torneo->max }}</td>
                                    <td>{{ date("d/m/Y", strtotime($torneo->fecha)) }}</td>
                                    <td>
                                    <a href="{{ route('mod.torneos.show', ['id' => $torneo->id]) }}" class="btn btn-info">
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
                <input type="text" name="n_torneo" class="form-control" placeholder="ingrese un nombre..."required> 
        </div>
        <div class="form-group">
            <label>Descripcion</label>
                <textarea name="descripcion" class="form-control" rows="3"  required >ingrese una descripcion...</textarea>
        </div>
        <div class="form-group">
            <label>Fecha</label>
                <input type="date" name="fecha" class="form-control" placeholder="xxxx-xx-xx xx:xx"required> 
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Min Jugadores</label>
                        <input type="number" name="min" class="form-control" placeholder="ingrese un min" required> 
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Max Jugadores</label>
                        <input type="number" name="max" class="form-control" placeholder="ingrese un max" required> 
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
                    @foreach($modalidades as $modalidad)
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
