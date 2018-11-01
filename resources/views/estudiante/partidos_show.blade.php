@extends('estudiante.layouts.app')

@section('content')

<br>
<hr>



<br><br>
<div class="card mb-3">
  <img class="card-img-top" width="758" height="180" src="http://diario16.com/wp-content/uploads/2017/05/f%C3%BAtbol.jpg" alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title">PARTIDO # </h4>
    <p class="card-text">
        
        <b>EQUIPO VISITA:</b> {{ $resultado->visita_id }}<hr>
        <b>PUNTOS LOCAL:</b> {{ $resultado->puntos_local }}<hr>
        <b>PUNTOS VISITA:</b> {{ $resultado->puntos_visita }}<hr>
 
      
    
    </p>

    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
  </div>
</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>    
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>


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