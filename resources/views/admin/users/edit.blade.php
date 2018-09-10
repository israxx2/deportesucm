@extends('admin.template.main')

@section('title', 'Nuevo Jugador') 



@section('content')

{!! Form::open(['route' => ['admin.user.update', $user->id] , 'method' => 'PUT']) !!}
    
	<div class="form-group">
      {!! Form::label('carrera_id', 'Carrera') !!}
      {!! Form::select('carrera_id', $carreras, $user->carrera_id, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('nombres', 'Nombres') !!}
    {!! Form::input('text', 'nombres', $user->nombres, ['class' => 'form-control', 'placeholder' => '1°Nombre 2°Nombre', 'required']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('apellidos', 'Apellidos') !!}
    {!! Form::input('text', 'apellidos', $user->apellidos, ['class' => 'form-control', 'placeholder' => '1°Apellido 2°Apellido', 'required']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('nick', 'Nick') !!}
    {!! Form::input('text', 'nick', $user->nick, ['class' => 'form-control', 'placeholder' => 'Escribe un nick...']) !!}
    </div>
      
    <div class="form-group">
      {!! Form::label('email', 'E-mail') !!}
      {!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com', 'required']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('carrera_id', 'Tipo') !!}
      {!! Form::select('tipo', $tipo, $user->tipo, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('equipo_id', 'Equipo') !!}

      <select class="form-control" id="equipo_id" name="equipo_id">
        
        <option value="NULL" selected>SIN EQUIPO...</option>
       
        @foreach($equipos as $equipo)
          
          @if(!$user->equipo_id)

            <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>

          @else

            @if($equipo->id == $user->equipo_id)
              <option value="{{ $equipo->id }}" selected>{{ $equipo->nombre }}</option>
            @else
              <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
            @endif

          @endif

        @endforeach     

      </select> 







    </div>

    <div class="form-group">
      {!! Form::label('torneos_ganados', 'Torneos ganados') !!}
      {!! Form::input('number', 'torneos_ganados', $user->torneos_ganados, ['class' => 'form-control', 'min' => 00, 'max' => 59, 'required']) !!}
    </div>
    <center>
      <div class="form-group">
        {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
      </div>
    </center>
    <br>



{!! Form::close() !!}

@endsection