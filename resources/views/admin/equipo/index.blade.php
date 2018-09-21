@extends('layouts.app')


@section('title', 'Equipos')

@section('content')

<br>
<hr>
<div class="container">

	<div class="table-responsive">
		<table class="table table-striped display compact table-condensed" id="table_user">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Modalidad</th>
					<th>Descripcion</th>
					<th>Estado</th>
					<th>Ver mas</th>
					<th>Borrar </th>
				</tr>
			</thead>
			<tbody>
				@foreach($equipo as $equipo)
					<tr>
						<td>{{ $equipo->id }}</td>
						<td>{{ $equipo->nombre }}</td>
						<td>{{ $equipo->modalidad_id }}</td>
						<td>{{ $equipo->descripcion }}</td>
						<td>
							@if($equipo->deleted_at == null)
								<p href="#" class="btn btn-success">
						Activo
					</p>
							@else
					<p href="#" class="btn btn-danger" data-toggle="modal" data-target="#activar{{ $equipo->id }}">
						inactivo
					</p>
							@endif
						</td>
				<td>
					<a href="{{ '/admin/equipo/'.$equipo->id }}" class="btn btn-info">
						<i class="fa fa-book"></i>
					</a>
				</td>
				<td>
				@if($equipo->deleted_at == null)
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $equipo->id }}">
								<i class="fa fa-trash"></i>
					</button>
						@else
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $equipo->id }}" disabled>
								<i class="fa fa-trash"></i>
					</button>
						@endif

				</td>
					</tr>

					<!-- Modal Delete-->
					<div class="modal" tabindex="-1" role="dialog" id = "destroy{{ $equipo->id }}" style="top:20%;">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Borrar Equipo {{ $equipo->id }}</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>¿Estás seguro de borrar al Equipo?</p>
								</div>
								<div class="modal-footer">
									{!! Form::open(['route' => ['admin.equipo.destroy', $equipo->id] , 'method' => 'DELETE']) !!}
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
					<div class="modal" tabindex="-1" role="dialog" id = "activar{{ $equipo->id }}" style="top:20%;">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Activar equipo {{ $equipo->id }}</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>¿Estás seguro de volver  el equipo?</p>
								</div>
								<div class="modal-footer">
									{!! Form::open(['route' => ['admin.equipo.activar', $equipo->id] , 'method' => 'POST']) !!}
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
