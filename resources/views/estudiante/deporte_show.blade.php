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
            @foreach($modalidad as $modalidad)
                        <li class value="{{ $modalidad->id }}">{{ $modalidad->id.'- '.$modalidad->nombre }}</option>
                    @endforeach
            <img class="card-img-top" width="100" height="250" src="{{ $deporte->imagen }}" alt="Card image cap">
   


         </div>
         <div class="container">
            <div class="card card-chart">
                <div class="card-header">
        
              
                    <select class="form-control" id="id_modalidad" name="id_modalidad" required style="width: 100%">
                    <option value="null">Seleccione modalidad de equipos a ver</option>


                     </select>
         
         </div>

         
   

                          
         




    

@endsection
