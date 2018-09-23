@extends('layouts.app')

@section('title', 'Editar Modalidad')

@section('content')

{!! Form::open(['route' => ['admin.modalidad.update', $modalidad->id] , 'method' => 'PUT']) !!}



    <div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::input('text', 'nombre', $modalidad->nombre, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('descripcion', 'Descripcion') !!}
    {!! Form::input('text', 'descripcion', $modalidad->descripcion, ['class' => 'form-control', 'placeholder' => 'Descripcion del modalidad', 'required']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('minimo', 'Minimo') !!}
    {!! Form::input('text', 'minimo', null, ['class' => 'form-control', 'placeholder' => 'minimo de la modalidad', 'required']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('maximo', 'Maximo') !!}
    {!! Form::input('text', 'maximo', null, ['class' => 'form-control', 'placeholder' => 'Maximo de la modalidad', 'required']) !!}
    </div>

    <center>
      <div class="form-group">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
      </div>
    </center>
    <br>



{!! Form::close() !!}

@endsection
