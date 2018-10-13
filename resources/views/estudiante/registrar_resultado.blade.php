@extends('estudiante.layouts.app')

@section('title', 'Registrar Partido') 



@section('content')
<br><br>
<hr>
<div class="container">

{!! Form::open(['route' => 'estudiante.registrar_resultado_store' , 'method' => 'POST']) !!}
    
  <!--estos datos deben ser por default -->
  <div class="form-group">
  {!! Form::label('EQUIPO LOCAL', 'EQUIPO LOCAL (este dato no va)') !!}
      <select name="local" class="form-control">
        <option value="">Seleccione equipo local</option>
        @foreach($equipos as $equipo)
            <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
        @endforeach
      </select>
    </div>
 
<!--estos datos deben ser por default -->
    <div class="form-group">
    {!! Form::label('EQUIPO VISITANTE', 'EQUIPO VISITANTE (este dato no va)') !!}
      <select name="visita"  class="form-control">
        <option value="">Seleccione equipo visita</option>
        @foreach($equipos as $equipo)
            <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
        @endforeach
      </select>
    </div>
<!------------------------->

  <div class="form-group">
    {!! Form::label('puntos_local', 'puntos_local') !!}
    {!! Form::input('text', 'puntos_local', null, ['class' => 'form-control', 'placeholder' => 'puntos equipo local', 'required']) !!}
    </div>
  <div class="form-group">
    {!! Form::label('puntos_visita', 'puntos_visita') !!}
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