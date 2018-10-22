
@extends('estudiante.layouts.app')

@section('content')

<br>
<hr>

<div class="container">

    <div class="row">
        <div class= "col-md-3">
            <br>
            {!! Form::open(['route' => 'estudiante.filtro_deporte' , 'method' => 'POST']) !!}
              
                            <select class="form-control" id="id_deporte" name="id_deporte" required style="width: 100%">
                            <option value="null">Seleccione un Deporte</option>

                            @foreach($deporte as $deporte)
                                <option value="{{ $deporte->id }}">{{ $deporte->id.'- '.$deporte->nombre }}</option>
                            @endforeach
                            </select>
                       
               
            {!! Form::close() !!}
        </div>

        <div class= "col-md-9 " align="right">
            <a href="/e/registrar_resultado_index" class="btn btn-warning navbar-btn"> 
            <i class="fa fa-lightbulb"></i>
            <span > Registrar Partidos ({{ count($contador) }}) </span>
            </a>
        </div>

    </div>
    


<br><br>
<div id="div_user">
@foreach($resultado as $resultado)
    <div  class="card" style="width: 20rem;">
        <img class="card-img-top" width="320" height="180"  
            src="{{ $resultado->imagen }}"        
            alt="Card image cap">

        <div class="card-body" >
            <h4 class="card-title">
                Partido #{{ $resultado->id }}
                &nbsp;&nbsp;&nbsp;
            
                
                <b>{{ $resultado->puntos_local }} : {{ $resultado->puntos_visita }}</b>
                
               
            
        
            </h4> 
            
            <p class="card-text">
                <p> <b>Equipo Rival: {{ $resultado->visita_id }}</b ></p>
                
                <p> </p>
                
            </p>
            <button style="float: right;" type="button" 
                class="btn btn-danger btn-xs" 
                data-toggle="modal" 
                data-id="{{$resultado->id_user }}"
                data-target="#favoritesModal">Reclamar
		</button>
            </div>
    </div>
   

@endforeach

</div>



<div class="modal fade" id="favoritesModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <h4 class="modal-title" 
        id="favoritesModalLabel">Reclamar Partido</h4>
      </div>
      <div class="modal-body">
	  {!! Form::open(['route' => 'estudiante.reclamo', 'class' => 'form'	]) !!}
		
			
	    {!! Form::hidden('user_id', '', ['id' => 'id1']) !!}


			<div class="row">
			<div class="col md12">
			{!! Form::label('Descripcion', 'Reclamo'); !!}
			{!! Form::text('Descripcion'); !!}
			</div>

			</div>

      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <span class="pull-right">
          <button type="submit"class="btn btn-success">
            Aceptar
          </button>
		  {!! Form::close() !!}
        </span>
      </div>
    </div>
  </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
      $(document).ready(function(){
            $('#id_deporte').on('change',function(){
                console.log("asdasd");
                $.post("{{ route('estudiante.filtro_deporte') }}",{
                    id:$('#id_deporte').val(),
                    _token:'{{ csrf_token() }}'
                }).done(function(data){
                   $('#div_user').html(data);
                  
                });
            });
        });
</script>

<script>
$(function() {
	$(function() {
    $('#favoritesModal').on("show.bs.modal", function (e) {
         $("#favoritesModalLabel").html($(e.relatedTarget).data('title'));
		 console.log($(e.relatedTarget).data('id'));
         $("#id1").val($(e.relatedTarget).data('id'));
    });
});
});


</script>





@endsection