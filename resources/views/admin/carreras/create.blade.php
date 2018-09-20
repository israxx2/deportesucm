@extends('admin.template.main')

@section('title', 'Nueva Carrera') 



@section('content')

<div class="container ">
{!! Form::open(['route' => 'admin.carrera.store' , 'method' => 'POST']) !!}
    


    <div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::input('text', 'nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la carrera', 'required']) !!}
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