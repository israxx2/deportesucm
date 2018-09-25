@extends('layouts.app')


@section('title', 'Partidos')

@section('content')

<br>
<hr>
<div class="container">

	<div class="table-responsive">
		<table class="table table-striped display compact table-condensed" id="table_user">
			<thead>
				<tr>
					<th>#</th>
					<th>LOCAL</th>
					<th>VISITA</th>
					<th>PUNTOS LOCAL</th>
					<th>PUNTOS VISITA</th>
					<th>GANADOR</th>
					<th>Estado</th>
					<th>Ver Mas </th>
					<th>Borrar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($partido as $partido)
					<tr>
						<td>{{ $partido->id }}</td>
						<td>{{ $partido->local_id }}</td>
						<td>{{ $partido->visita_id }}</td>
						<td>{{ $partido->puntos_local }}</td>
						<td>{{ $partido->puntos_visita }}</td>
						<td>{{ $partido->ganador_id }}</td>
						<td>
							@if($partido->deleted_at == null)
								<p href="#" class="btn btn-success">
						Activo
					</p>
							@else
					<p href="#" class="btn btn-danger" data-toggle="modal" data-target="#activar{{ $partido->id }}">
						inactivo
					</p>
							@endif
						</td>
				<td>
					<a href="{{ '/admin/partido/'.$partido->id }}" class="btn btn-info">
						<i class="fa fa-book"></i>
					</a>
				</td>
				<td>
				@if($partido->deleted_at == null)
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $partido->id }}">
								<i class="fa fa-trash"></i>
					</button>
						@else
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $partido->id }}" disabled>
								<i class="fa fa-trash"></i>
					</button>
						@endif

				</td>
					</tr>

					<!-- Modal Delete-->
					<div class="modal" tabindex="-1" role="dialog" id = "destroy{{ $partido->id }}" style="top:20%;">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Borrar Partido {{ $partido->id }}</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>¿Estás seguro de borrar el Partido?</p>
								</div>
								<div class="modal-footer">
									{!! Form::open(['route' => ['admin.partido.destroy', $partido->id] , 'method' => 'DELETE']) !!}
										<button type="submit" class="btn btn-danger">
															<i class="fa fa-check" aria-hidden="true"></i>
														</button>
									{!! Form::close() !!}
									<button type="button" class="btn btn-secondary" data-dismiss="modal">
										<i class="fa fa-times" aria-hidden="true"></i>
									</button>
								</div>
							</div>
						</div>
					</div>

					<!-- Modal Activar-->
					<div class="modal" tabindex="-1" role="dialog" id = "activar{{ $partido->id }}" style="top:20%;">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Activar partido {{ $partido->id }}</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>¿Estás seguro de volver el partido?</p>
								</div>
								<div class="modal-footer">
									{!! Form::open(['route' => ['admin.partido.activar', $partido->id] , 'method' => 'POST']) !!}
										<button type="submit" class="btn btn-success">
															<i class="fa fa-check" aria-hidden="true"></i>
														</button>
									{!! Form::close() !!}
									<button type="button" class="btn btn-secondary" data-dismiss="modal">
										<i class="fa fa-times" aria-hidden="true"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</tbody>
		</table>
	</div>


</div>
<script>
	$(document).ready( function () {
    	$('#table_user').DataTable({
    		"language":{
    			"url":"{{ asset('Spanish.json') }}"
    		}
    	});
	} );
</script>

@endsection
