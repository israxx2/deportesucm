@extends('estudiante.layouts.app')

@section('title', 'Equipos')
@section('equipos', 'active')
@section('content')

@if(Session::has('message'))
    <p class="alert alert-success">{{ Session::get('message') }}</p>
@endif

@if(Session::has('alert'))
    <p class="alert alert-danger">{{ Session::get('alert') }}</p>
@endif



<div class="row">


<div class="card bg-info" style="width: 70rem;">
    <div class="card-body">
        <h4 class="card-title text-center"><b>{{ strtoupper($equipo->nombre) }}</b></h4>

        <p class="card-text">
        <hr>
        <center>{{ $equipo->descripcion }}</center>
        <hr>
        <center>
           | <b>Victorias:</b> {{ $equipo->victorias_totales }} |
           <b>Derrotas:</b> {{ $equipo->derrotas_totales }}   |
             
           <b>Puntos a favor :</b> {{ $equipo->puntos_favor_totales }}    |
           <b>Puntos en contra: </b>{{ $equipo->puntos_contra_totales }}  |
            </center>
        
        </p>
    </div>
</div>

<div class="card bg-warning  " style="width: 30rem;">
    <div class="card-body">
        <h4 class="card-title text-center"><b>MIEMBROS</b></h4>
        <p class="card-text">

      
        <ul class="list-group list-group-flush " >
        @foreach($miembros as $miembro)
            <li class="list-group-item bg-warning ">{{$miembro->nombres}}
            @if ($equipo->user_id == Auth::user()->id)
                {!! Form::open(['route' => 'estudiante.eliminar' , 'method' => 'POST']) !!}
                     <input name="id_ju" type="hidden" value="{{$miembro->id}}">
                     <input name="id_eq" type="hidden" value="{{$equipo->id}}">
                    <button type="submit"class="btn btn-danger ">
                            ELIMINAR <span class="glyphicon glyphicon-remove"></span>
                    </button>
                {!! Form::close() !!}
            @endif
            </li>
         @endforeach
        </ul>



                @if (empty($is_miembro))  
                     @if (empty($is_enviada))
                     {!! Form::open(['route' => 'estudiante.solicitud_equipo' , 'method' => 'POST']) !!}
            
                        {!! Form::hidden('equipo_id', $equipo->id) !!}
                        <button type="submit"class="btn btn-success ">
                            UNIRSE <span class="glyphicon glyphicon-envelope"></span>
                        </button>
                    {!! Form::close() !!}
                     @else
                     {!! Form::open(['route' => 'estudiante.solicitud_equipo' , 'method' => 'POST']) !!}
            
                    {!! Form::hidden('equipo_id', $equipo->id) !!}
                    <button type="submit"class="btn btn-success disabled ">
                        UNIRSE <span class="glyphicon glyphicon-envelope"></span>
                    </button>
                {!! Form::close() !!}
                     @endif 
                
                @else
                    {!! Form::open(['route' => 'estudiante.abandonar_equipo' , 'method' => 'POST']) !!}
                                
                                {!! Form::hidden('equipo_id', $equipo->id) !!}
                                <button type="submit"class="btn btn-danger">
                                ABANDONAR <span class=" glyphicon glyphicon-remove"></span>
                                </button>
                        {!! Form::close() !!}
                @endif
  

        
                   
             

        </p>
    </div>
</div>

</div>






@endsection


