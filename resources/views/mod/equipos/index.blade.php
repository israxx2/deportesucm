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
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 27rem;"  >
                {!! Form::open(['route' => 'mod.filtro' , 'method' => 'POST']) !!}
                    <div class="form-group">
                        <label>Filtro</label>
                        <input type="text" name="filtro" class="form-control" placeholder="Busca un lider o equipo..."> 
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Aplicar Filtro</button>
                    </div>
                {!! Form::close() !!}   
            </div> 
        </div>
    </div>
</div>
@endsection
