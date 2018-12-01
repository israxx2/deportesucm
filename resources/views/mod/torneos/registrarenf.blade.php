@extends('mod.layouts.app')

@section('title', 'Equipos')
@section('equipos', 'active')
@section('content')
<div class = "container">
    <div class ="card">
    <div class="col-sm-5">
        {!! Form::open(['route' => 'mod.guardar' , 'method' => 'POST']) !!}
            <input type="hidden" id="torneo" name="torneo" value="{{$torneo}}">
            <input type="hidden" id="fase" name="fase" value="{{$fase}}">                                                                                                                           
            <button type="submit" class="btn btn-warning">Editar</button>
        {!! Form::close() !!}
    </div>
    </div>
</div>
@endsection
