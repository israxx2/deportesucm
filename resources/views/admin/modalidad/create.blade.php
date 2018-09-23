@extends('layouts.app')

@section('title', 'Nueva Modalidad') 



@section('content')
<hr>
<div class="container">

{!! Form::open(['route' => 'admin.modalidad.store' , 'method' => 'POST']) !!}
    


    <div class="form-group">
    {!! Form::label('Nombre', 'Nombre') !!}
    {!! Form::input('text', 'nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la modalidad', 'required']) !!}
    </div>

    <div class="form-group">
      <select name="deporte"  class="form-control">
        <option value="">Seleccione Deporte</option>
        @foreach($deportes as $deporte)
            <option value="{{$deporte->id}}">{{$deporte->nombre}}</option>
        @endforeach
      </select>
    </div>

  <div class="form-group">
    {!! Form::label('descripcion', 'Descripcion') !!}
    {!! Form::input('text', 'descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripcion del modalidad', 'required']) !!}
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

    
</div>

{!! Form::close() !!}

@endsection