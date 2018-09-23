@extends('layouts.app')

@section('title', 'Nuevo Deporte') 



@section('content')
<hr>
<div class="container">

{!! Form::open(['route' => 'admin.deporte.store' , 'method' => 'POST']) !!}
    


    <div class="form-group">
    {!! Form::label('Nombre', 'Nombre') !!}
    {!! Form::input('text', 'nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del deporte', 'required']) !!}
    </div>
  
  

  <div class="form-group">
    {!! Form::label('descripcion', 'Descripcion') !!}
    {!! Form::input('text', 'descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripcion del deporte', 'required']) !!}
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