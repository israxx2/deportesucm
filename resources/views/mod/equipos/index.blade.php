@extends('mod.layouts.app')

@section('title', 'Equipos')
@section('equipos', 'active')
@section('content')
<div class="row">
    <div class="row">
        <div class="col-md-8">
            @foreach($equipos as $equipo)
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5">
                                <p>Equipo: {{$equipo->nombre}}</p>
                            </div>
                            <div class="col-lg-5">
                                <p>Lider Equipo: {{$equipo->nombre_u}}, {{$equipo->apellido_u}}</p>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-8">
                            Descripcion: {{$equipo->descripcion}}
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Victorias: {{$equipo->victorias_totales}}
                            </div>
                            <div class="col-md-4">
                                Derrotas: {{$equipo->derrotas_totales}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
            @endforeach
        </div>
        <div class="col-md-4">
            <div class="card">
                {!! Form::open(['route' => 'mod.filtro' , 'method' => 'POST']) !!}
                    <div class="form-group">
                        <label>Filtro</label>
                        <input type="text" name="filtro" class="form-control" placeholder="Busca un lider o equipo..."> 
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                {!! Form::close() !!}   
            </div> 
        </div>
    </div>
</div>
@endsection
