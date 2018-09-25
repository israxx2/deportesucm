@extends('layouts.app')

@section('title', 'Editar TORNEO')

@section('content')

{!! Form::open(['route' => ['admin.torneo.update', $torneo->id] , 'method' => 'PUT']) !!}
    
  
<div class="form-group">
    {!! Form::label('nombre', 'nombre') !!}
    {!! Form::input('text', 'nombre', $torneo->nombre, ['class' => 'form-control', 'placeholder' => 'nombre del torneo', 'required']) !!}
    </div>
  <div class="form-group">
    {!! Form::label('fecha', 'fecha') !!}
    {!! Form::input('text', 'fecha', $torneo->fecha, ['class' => 'form-control', 'placeholder' => 'fecha del torneo', 'required']) !!}
  </div>
    <div class="form-group">
        <select name="tipo" class="form-control">
            <option value="{{$torneo->tipo}}">{{$torneo->tipo}}</option> 
            <option value="grupo">Grupo</option>
            <option value="llave">Llave</option>
        </select>  
    </div>
   
 
    <br>
      <center>
        <div class="form-group">
          {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        </div>
      </center>
      <br>
  
      
  </div>
  
  {!! Form::close() !!}

@endsection
