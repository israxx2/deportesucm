@extends('layouts.app')

@section('title', 'Nuevo Jugador')



@section('content')

{!! Form::open(['route' => ['admin.carrera.update', $carrera->id] , 'method' => 'PUT']) !!}

	<div class="form-group">
      {!! Form::label('carrera_id', 'Carrera') !!}
      {!! Form::select('carrera_id', $carreras, $user->carrera_id, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::input('text', 'nombre', $carrera->nombres, ['class' => 'form-control', 'required']) !!}
    </div>

    <center>
      <div class="form-group">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
      </div>
    </center>
    <br>



{!! Form::close() !!}

@endsection
