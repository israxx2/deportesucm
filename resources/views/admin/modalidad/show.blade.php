@extends('layouts.app')
@section('title', 'Modalidad')



@section('content')

<br>
<hr>

<div class="container">

	<ul class="list-group list-group-flush">
	  <li class="list-group-item list-group-item-dark">
		<div class="d-flex justify-content-between">
		
			<a href="{{ '/admin/modalidad/'.$modalidad->id.'/edit' }}" class="btn btn-warning">
				<i class="fa fa-edit"> Editar</i> 
			</a> <h5></h5>
		</div>
	  </li>

	</li>
	  <li class="list-group-item"><b>NOMBRE: </b>{{ $modalidad->nombre }}</li>
	  <li class="list-group-item"><b>DESCRIPCION: </b>{{ $modalidad->descripcion }}</li>
	  <li class="list-group-item"><b>DEPORTE: </b>{{ $modalidad->deporte_id }}</li>
	  <li class="list-group-item"><b>MINIMO:  </b>{{ $modalidad->min }}</li>
		<li class="list-group-item"><b>MAXIMO:  </b>{{ $modalidad->max }}</li>
      
	</ul>
</div>

@endsection
