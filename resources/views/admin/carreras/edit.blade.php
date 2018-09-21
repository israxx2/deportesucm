@extends('layouts.app')

@section('title', 'Nuevo Jugador')

@section('content')

{!! Form::open(['route' => ['admin.carrera.update', $carrera->id] , 'method' => 'PUT']) !!}



    <div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::input('text', 'nombre', $carrera->nombre, ['class' => 'form-control', 'required']) !!}
    </div>

    <center>
      <div class="form-group">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
      </div>
    </center>
    <br>



{!! Form::close() !!}

@endsection
