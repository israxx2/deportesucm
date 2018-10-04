@extends('layouts.app')

@section('title', 'Nuevo Torneo') 



@section('content')
<hr>
<div class="container">

{!! Form::open(['route' => ['admin.torneo.inscribir', $torneo->id] , 'method' => 'POST']) !!}
    



    

    <div class="form-group">
      <select name="id" class="form-control">
        <option value="">Seleccione un equipo</option>
        @foreach($equipo as $equipos)
            <option value="{{$equipos->id}}">{{$equipos->nombre}}</option>
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