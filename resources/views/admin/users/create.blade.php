@extends('admin.template.main')

@section('title', 'Nuevo Jugador') 



@section('content')


{!! Form::open(['route' => 'admin.user.store' , 'method' => 'POST']) !!}
    
    <div class="form-group">
        {!! Form::label('carrera_id', 'Carrera') !!}
        <select class="form-control" id="carrera_id" name="carrera_id" required style="width: 100%">
        <option></option>
        @foreach($carreras as $carrera)
            <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
        @endforeach         
      </select> 
    </div>

    <div class="form-group">
    {!! Form::label('nombres', 'Nombres') !!}
    {!! Form::input('text', 'nombres', null, ['class' => 'form-control', 'placeholder' => '1°Nombre 2°Nombre', 'required']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('apellidos', 'Apellidos') !!}
    {!! Form::input('text', 'apellidos', null, ['class' => 'form-control', 'placeholder' => '1°Apellido 2°Apellido', 'required']) !!}
    </div>
      
    <div class="form-group">
      {!! Form::label('email', 'E-mail') !!}
      {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com', 'required']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('password', 'Contraseña') !!}
      {!! Form::input('text', 'password', null, ['class' => 'form-control', 'placeholder' => '*************', 'required']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('tipo', 'Tipo') !!}
      <select class="form-control" name="tipo">
        <option value="estudiante">estudiante</option>

      </select>
    </div>

    <center>
      <div class="form-group">
        {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
      </div>
    </center>
    <br>

    


{!! Form::close() !!}
<script>

    $('#carrera_id').select2({
      placeholder: 'Seleccione una opcion'
    });

  </script>
@endsection