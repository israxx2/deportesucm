@extends('layouts.app')

@section('title', 'Editar Partido')

@section('content')

{!! Form::open(['route' => 'admin.partido.store' , 'method' => 'POST']) !!}
    

    <div class="form-group">
    {!! Form::label('EQUIPO LOCAL', 'EQUIPO LOCAL') !!}
        <select name="local" class="form-control">
          <option value="">Seleccione equipo local</option>
          @foreach($equipos as $equipo)
              <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
          @endforeach
        </select>
      </div>
   
  
      <div class="form-group">
      {!! Form::label('EQUIPO VISITANTE', 'EQUIPO VISITANTE') !!}
        <select name="visita"  class="form-control">
          <option value="">Seleccione equipo visita</option>
          @foreach($equipos as $equipo)
              <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
          @endforeach
        </select>
      </div>
  
    <div class="form-group">
      {!! Form::label('Puntos local', 'Puntos local') !!}
      {!! Form::input('text', 'puntos_local', null, ['class' => 'form-control', 'placeholder' => 'puntos equipo local', 'required']) !!}
      </div>
    <div class="form-group">
      {!! Form::label('Puntos visita', 'Puntos visita') !!}
      {!! Form::input('text', 'puntos_visita', null, ['class' => 'form-control', 'placeholder' => 'puntos equipo visita', 'required']) !!}
    </div>
   
    <div class="form-group">
    {!! Form::label('EQUIPO GANADOR', 'EQUIPO GANADOR') !!}
        <select name="ganador" class="form-control">
          <option value="">Seleccione equipo ganador</option>
          @foreach($equipos as $equipo)
              <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
          @endforeach
        </select>
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
