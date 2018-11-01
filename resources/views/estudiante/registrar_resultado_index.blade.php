@extends('estudiante.layouts.app')

@section('title', 'Equipos')
@section('equipos', 'active')
@section('content')


<br>
<hr>
<div class="container">

<div class="row">

	<div class="table-responsive " id="div_user">
    
		<table class="table table-striped display compact table-condensed" id="table_user">
			<thead>
				<tr>
                
					<th>#</th>
                    <th>DEPORTE</th>
					<th>LUGAR</th>
					<th>EQUIPO LOCAL</th>
					<th>INGRESAR RESULTADOS</th>

					
				</tr>
			</thead>
			<tbody>
            @foreach($resultado as $resultado)
					<tr>
						<td>{{ $resultado->invitacion_id }}</td>
                        <td>{{ $resultado->nombre }}</td>
						<td>{{ $resultado->lugar }}</td>
                        <td>{{ $resultado->emisor_id }}</td>




						<td><button type="button" 
									class="btn btn-primary btn-lg" 
									data-toggle="modal" 
									
									data-id="{{$resultado->emisor_id }}"
									data-id2="{{$resultado->receptor_id }}"
									data-id3="{{$resultado->invitacion_id }}"
									data-target="#favoritesModal">
									Registrar
						</button></td>
						
						<td>  </td>
            
						
					</tr>
                @endforeach
            </tbody>
        </table>
	</div>		
</div>

<div class="modal fade" id="favoritesModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <h4 class="modal-title" 
        id="favoritesModalLabel">Registrar Resultados</h4>
      </div>
      <div class="modal-body">
	  {!! Form::open(['route' => 'estudiante.registrar_resultado_store', 'class' => 'form'	]) !!}
		
			
	  {!! Form::hidden('id_local', '', ['id' => 'id1']) !!}
	  {!! Form::hidden('id_visita', '', ['id' => 'id2']) !!}
	  {!! Form::hidden('invitacion_id', '', ['id' => 'id3']) !!}

			<div class="row">
			<div class="col md6">
			{!! Form::label('local', 'Puntos Local'); !!}
			{!! Form::number('puntos_local', 'value'); !!}
			</div>
			<div class="col md6">
			{!! Form::label('visita', 'Tus  Puntos  '); !!}
			{!! Form::number('puntos_visita', 'value'); !!}
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>    
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>




<script>
	$(function() {
    $('#favoritesModal').on("show.bs.modal", function (e) {
         $("#favoritesModalLabel").html($(e.relatedTarget).data('title'));
		 console.log($(e.relatedTarget).data('id'));
         $("#id1").val($(e.relatedTarget).data('id'));
		 $("#id2").val($(e.relatedTarget).data('id2'));
		 $("#id3").val($(e.relatedTarget).data('id3'));
    });
});


</script>



@endsection
