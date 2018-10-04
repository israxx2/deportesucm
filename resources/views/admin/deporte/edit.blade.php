@extends('layouts.app')

@section('title', 'Nuevo Equipo')

@section('content')

{!! Form::open(['route' => ['admin.deporte.update', $deporte->id] , 'method' => 'PUT']) !!}



    <div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::input('text', 'nombre', $deporte->nombre, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('descripcion', 'Descripcion') !!}
    {!! Form::input('text', 'descripcion', $deporte->descripcion, ['class' => 'form-control', 'placeholder' => 'Descripcion del deporte', 'required']) !!}
    </div>

    <center>
      <div class="form-group">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
      </div>
    </center>
    <br>



{!! Form::close() !!}

@endsection
