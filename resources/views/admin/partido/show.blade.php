@extends('layouts.app')
@section('title', 'Partido')



@section('content')

<br>
<hr>

<div class="container">

	<ul class="list-group list-group-flush">
	  <li class="list-group-item list-group-item-dark">
		<div class="d-flex justify-content-between">
		
			<a href="{{ '/admin/partido/'.$partido->id.'/edit' }}" class="btn btn-warning">
				<i class="fa fa-edit"> Editar</i> 
			</a> <h5></h5>
		</div>
	  </li>

	</li>
	  <li class="list-group-item"><b>LOCAL: </b>{{ $partido->local_id }}</li>
	  <li class="list-group-item"><b>VISITA: </b>{{ $partido->visita_id }}</li>
	  <li class="list-group-item"><b>PUNTOS LOCAL: </b>{{ $partido->puntos_local }}</li>
	  <li class="list-group-item"><b>PUNTOS VISITA:  </b>{{ $partido->puntos_visita }}</li>
		<li class="list-group-item"><b>GANADOR:  </b>{{ $partido->ganador_id }}</li>
      
	</ul>
</div>

@endsection
