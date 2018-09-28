@extends('layouts.app')
@section('title', 'Torneo')



@section('content')

<br>
<hr>

<div class="container">

	<ul class="list-group list-group-flush">
	  <li class="list-group-item list-group-item-dark">
		<div class="d-flex justify-content-between">
		
			<a href="{{ '/admin/torneo/'.$torneo->id.'/edit' }}" class="btn btn-warning">
				<i class="fa fa-edit"> Editar</i> 
			</a> <h5></h5>
		
		</div>
	  </li>

	</li>
	  <li class="list-group-item"><b>Nombre: </b>{{ $torneo->nombre }} 
	  <li class="list-group-item"><b>Fecha: </b>{{ $torneo->fecha }}</li>
	  <li class="list-group-item"><b>Tipo de Torneo: </b>{{ $torneo->tipo }}</li>
		<li class="list-group-item"><b>Equipos del torneo</b>   
			<div class="container">
				<div class="table-responsive">
					<table class="table table-striped display compact table-condensed" >
						<thead>
							<tr>
								<th>nombre de los participantes </th> 
							</tr>
						</thead>	
						<tbody>
							@foreach($torneo->equipos as $equipo)
							<tr>
							<td>{{ $equipo->nombre}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<a href="{{ route('admin.torneo.inscripcion', ['torneo' => $torneo->id]) }}" class="btn btn-success">
						añadir participante
					</a></li> 	
		</li>
	</ul>
</div>


@endsection
