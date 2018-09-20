@extends('admin.template.main')

@section('title', 'Carreras')



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
					<th>Estado</th>
					<th>Editar</th>
					
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($carreras as $carrera)
					<tr>
						<td>{{ $carrera->id }}</td>
						<td>{{ $carrera->nombre }}</td>
						<td>
							@if($carrera->deleted_at == null)
								<p href="#" class="btn btn-success">
						Activo
					</p>
							@else
					<p href="#" class="btn btn-danger" data-toggle="modal" data-target="#activar{{ $carrera->id }}">
						inactivo
					</p>
							@endif
						</td>
				<td>
					<a href="{{ '/admin/carrera/edit/'.$carrera->id  }}" class="btn btn-info">
						<i class="fas fa-book"></i>
					</a>
				</td>
				<td>
				@if($carrera->deleted_at == null)
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $carrera->id }}">
								<i class="fas fa-trash-alt"></i>
					</button>
						@else
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $carrera->id }}" disabled>
								<i class="fas fa-trash-alt"></i>
					</button>
						@endif

				</td>
					</tr>

					<!-- Modal Delete-->
					<div class="modal" tabindex="-1" role="dialog" id = "destroy{{ $carrera->id }}" style="top:20%;">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Borrar Jugador {{ $carrera->id }}</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>¿Estás seguro de borrar al jugador?</p>
								</div>
								<div class="modal-footer">
									{!! Form::open(['route' => ['admin.carrera.destroy', $carrera->id] , 'method' => 'DELETE']) !!}
										<button type="submit" class="btn btn-danger">
															<i class="fas fa-check" aria-hidden="true"></i>
														</button>
									{!! Form::close() !!}
									<button type="button" class="btn btn-secondary" data-dismiss="modal">
										<i class="fas fa-times" aria-hidden="true"></i>
									</button>
								</div>
							</div>
						</div>
					</div>

					<!-- Modal Activar-->
					<div class="modal" tabindex="-1" role="dialog" id = "activar{{ $carrera->id }}" style="top:20%;">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Activar Carrera {{ $carrera->id }}</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>¿Estás seguro de volver a activar la carrera?</p>
								</div>
								<div class="modal-footer">
									{!! Form::open(['route' => ['admin.carrera.activar', $carrera->id] , 'method' => 'POST']) !!}
										<button type="submit" class="btn btn-success">
															<i class="fas fa-check" aria-hidden="true"></i>
														</button>
									{!! Form::close() !!}
									<button type="button" class="btn btn-secondary" data-dismiss="modal">
										<i class="fas fa-times" aria-hidden="true"></i>
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
