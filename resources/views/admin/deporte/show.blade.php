@extends('layouts.app')
@section('title', 'Equipo')



@section('content')

<br>
<hr>

<div class="container">

	<ul class="list-group list-group-flush">
	  <li class="list-group-item list-group-item-dark">
		<div class="d-flex justify-content-between">
		
			<a href="{{ '/admin/deporte/'.$deporte->id.'/edit' }}" class="btn btn-warning">
				<i class="fa fa-edit"> Editar</i> 
			</a> <h5></h5>
		</div>
	  </li>

	</li>
	  <li class="list-group-item"><b>NOMBRE: </b>{{ $deporte->nombre }}</li>
	  <li class="list-group-item"><b>DESCRIPCION: </b>{{ $deporte->descripcion }}</li>
      
	</ul>
</div>

@endsection
