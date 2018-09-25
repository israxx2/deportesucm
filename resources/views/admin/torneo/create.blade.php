@extends('layouts.app')

@section('title', 'Nuevo Torneo') 



@section('content')
<hr>
<div class="container">

{!! Form::open(['route' => 'admin.torneo.store' , 'method' => 'POST']) !!}
    



  <div class="form-group">
    {!! Form::label('nombre', 'nombre') !!}
    {!! Form::input('text', 'nombre', null, ['class' => 'form-control', 'placeholder' => 'nombre del torneo', 'required']) !!}
    </div>
  <div class="form-group">
    {!! Form::label('fecha', 'fecha') !!}
    {!! Form::input('text', 'fecha', null, ['class' => 'form-control', 'placeholder' => 'fecha del torneo', 'required']) !!}
  </div>
    <div class="form-group">
        <select name="tipo" class="form-control">
            <option value=" ">tipo de torneo</option>
            <option value="llave">LLave</option> 
            <option value="grupo">Grupo</option>
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