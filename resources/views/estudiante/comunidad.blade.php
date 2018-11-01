@extends('estudiante.layouts.app')

@section('title', 'Equipos')
@section('equipos', 'active')
@section('content')

@if(Session::has('message'))
<p class="alert alert-success">{{ Session::get('message') }}</p>
@endif

<br>
<hr>

<div class="row">
 

            
            @foreach($equipos as $equipo)

            {!! Form::open(['route' => 'estudiante.solicitud_equipo' , 'method' => 'POST']) !!}
      
                {!! Form::hidden('equipo_id', $equipo->id) !!}
                <button type="submit"class="btn btn-info">
                    <span class="glyphicon glyphicon-envelope"></span>
                </button>
             {!! Form::close() !!}

            {!! Form::open(['route' => 'estudiante.abandonar_equipo' , 'method' => 'POST']) !!}
                    
                    {!! Form::hidden('equipo_id', $equipo->id) !!}
                    <button type="submit"class="btn btn-danger">
                        <span class=" glyphicon glyphicon-remove"></span>
                    </button>
            {!! Form::close() !!}


            @endforeach
     

            


    </div>

    
</div>

</div>
@endsection

