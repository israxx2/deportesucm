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
         <div class="container">
            <div class="card card-chart">
                <div class="card-header">
        
                {!! Form::label('modalidad', 'Modalidad') !!}
                  <select name="modalidad" id="id_modalidad" class="form-control">
                  <option value="">Seleccione modalidad de equipos a ver</option>
                 @foreach($deporte->modalidades as $modalidad)
                            <a href="{{ route('estudiante.modalidades.show', ['id' => $modalidad->id]) }}">
                            <option value>{{ '- '.$modalidad->nombre }}</span>
                            </a>
                          
         
                 @endforeach

                 </select>
         </div>

            <div id="modalidad">

            

            </div>      

                          
         

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>


<script>
      $(document).ready(function(){
            $('#id_modalidad').on('change',function(){
                console.log("asdasd");
                $.post("{{ route('estudiante.filtro_equipo') }}",{
                    id:$('#id_modalidad').val(),
                    _token:'{{ csrf_token() }}'
                }).done(function(data){
                   $('#modalidad').html(data);
                  
                });
            });
        });
</script>


    

@endsection
