@extends('layouts.app')
@section('title', 'Equipo')



@section('content')

<br>
<hr>

<div class="container">

	<ul class="list-group list-group-flush">
	  <li class="list-group-item list-group-item-dark">
		<div class="d-flex justify-content-between">
		
			<a href="{{ '/admin/equipo/'.$equipo->id.'/edit' }}" class="btn btn-warning">
				<i class="fa fa-edit"> Editar</i> 
			</a> <h5></h5>
		</div>
	  </li>

	</li>
	  <li class="list-group-item"><b>NOMBRE: </b>{{ $equipo->nombre }}</li>
	  <li class="list-group-item"><b>DESCRIPCION: </b>{{ $equipo->descripcion }}</li>
	  <li class="list-group-item"><b>MODADLIDAD: </b>{{ $equipo->modalidad_id }}</li>
	  <li class="list-group-item"><b>VICTORIAS:  </b>{{ $equipo->victorias_totales }}</li>
		<li class="list-group-item"><b>DERROTAS:  </b>{{ $equipo->derrotas_totales }}</li>
		<li class="list-group-item"><b>PUNTOS A FAVOR:  </b>{{ $equipo->puntos_favor_totales }}</li>
		<li class="list-group-item"><b>PUNTOS EN CONTRA:  </b>{{ $equipo->puntos_contra_totales }}</li>
		<li class="list-group-item"><b>CONFORMADO:  </b>{{ $equipo->conformado }}</li>
      
	</ul>
</div>

@endsection
