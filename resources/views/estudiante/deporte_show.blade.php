@extends('estudiante.layouts.app')

@section('title',  $deporte->nombre)
@section('deporte', 'active')
@section('deporte_'.$deporte->id , 'active')
@section('content')

<br><br><br>
<div class="row">

    <div class="card" style="width: 70rem;">
        <div class="card-header">
            <img class="card-img-top" width="300" height="250" src="{{ $deporte->imagen }}" alt="Card image cap">
            <br>
            <hr>
            {{ $deporte->descripcion }}
        </div>
        

    </div>


    <div class="card  " style="width: 30rem;">
        <div class="card-body">
            <h4 class="card-title text-center"><b>MODALIDADES</b></h4>
            <p class="card-text">
                @foreach($deporte->modalidades as $modalidad)
                    <h5 class="card-title text-center">
                        <b> <a class="btn btn-danger btn-round" href="{{ route('estudiante.modalidades.show', ['id' => $modalidad->id]) }}">
                                {{ ''.strtoupper($modalidad->nombre) }}
                            </a> </b>
                    </h5>
                @endforeach
            </p>
        </div>
    </div>
</div>


 

@endsection
