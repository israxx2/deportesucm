@extends('admin.template.main')

@section('title', 'Nuevo Jugador') 



@section('content')

{!! Form::open(['route' => ['admin.user.pw_save', $user->id] , 'method' => 'PUT']) !!}
    
    <div class="form-group">
        {!! Form::label('password', 'Contraseña') !!}
        {!! Form::input('text', 'password', null, ['class' => 'form-control', 'placeholder' => '*************', 'required']) !!}
    </div>

    <center>
      <div class="form-group">
        {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
      </div>
    </center>
    <br>



{!! Form::close() !!}

@endsection