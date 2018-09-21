@extends('layouts.app')

@section('title', 'Nuevo Equipo')

@section('content')

{!! Form::open(['route' => ['admin.equipo.update', $equipo->id] , 'method' => 'PUT']) !!}



    <div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::input('text', 'nombre', $equipo->nombre, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('descripcion', 'Descripcion') !!}
    {!! Form::input('text', 'descripcion', $equipo->descripcion, ['class' => 'form-control', 'placeholder' => 'Descripcion del equipo', 'required']) !!}
    </div>

    <center>
      <div class="form-group">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
      </div>
    </center>
    <br>



{!! Form::close() !!}

@endsection
