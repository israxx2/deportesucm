@extends('estudiante.layouts.app')

@section('title', 'Deporte')
@section('deporte', 'active')
@section('deporte_'.$deporte->id , 'active')
@section('content')

<div class="row">
    <div class="col-sm-8">
        <div class="card card-chart">
            <div class="card-header">
            <li class="list-group-item"><b>NOMBRE: </b>{{ $deporte->nombre }}</li>
            <li class="list-group-item"><b>DESCRIPCION: </b>{{ $deporte->descripcion }}</li>
            <img class="card-img-top" width="100" height="250" src="{{ $deporte->imagen }}" alt="Card image cap">
   



</div>
    <div class="row">
    <div class="col-sm-8">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Modalidades</h5>
            </div>
            <div class="list-group-item">
                    @foreach($deporte->modalidades as $modalidad)
                    <div class="list-group-item">
                        <a href="{{ route('estudiante.modalidades.show', ['id' => $modalidad->id]) }}"><h5>{{ ''.$modalidad->nombre }}</h5></a>
                        <h5>{{ ''.$modalidad->descripcion }}</h5>
                    </div>    
                    @endforeach
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
    </div>
 

@endsection
