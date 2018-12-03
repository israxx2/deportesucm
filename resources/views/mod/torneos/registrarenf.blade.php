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
            <select name="e_local">
            <option value="">equipo Ganador</option>
                    @foreach($torn as $modalidad)
                        <option value="{{$modalidad->id_equipo}}">{{ $modalidad->equipo_nombre }}</option>
                    @endforeach
            </select>
                    <select name="e_visitante">
                    <option value="">equipo restante</option>
                    @foreach($torn as $modalidad)
                        <option value="{{$modalidad->id_equipo}}">{{ $modalidad->equipo_nombre }}</option>
                    @endforeach
                    </select>                                                                                                                       
            <button type="submit" class="btn btn-warning">Editar</button>
        {!! Form::close() !!}
    </div>
    </div>
</div>
@endsection
