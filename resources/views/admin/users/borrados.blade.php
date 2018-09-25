@extends('layouts.app')
@section('title', 'Usuarios')



@section('content')

<br>
<hr>
<div class="container">

    <ul class="nav nav-pills" role="tablist">
    <li role="presentation"><a href="{{ route('admin.user.index') }}">Usuarios <span class="badge">{{ count($users) }}</span></a></li>
        <li role="presentation" class="active"><a href="{{ route('admin.user.borrados') }}">Borrados <span class="badge">{{ count($usersOnlyTrashed) }}</span></a></li>
      </ul>

	<div class="table-responsive">
		<table class="table table-striped display compact table-condensed" id="table_user">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombres</th>
					<th>Apellidos</th>

					<th>Estado</th>
			<th>Detalles</th>
			<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($usersOnlyTrashed as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->nombres }}</td>
						<td>{{ $user->apellidos }}</td>


						<td>
							@if($user->deleted_at == null)
								<p href="#" class="btn btn-success">
						Activo
					</p>
							@else
					<p href="#" class="btn btn-danger" data-toggle="modal" data-target="#activar{{ $user->id }}">
						inactivo
					</p>
							@endif
						</td>
				<td>
					<a href="{{ '/admin/user/'.$user->id  }}" class="btn btn-info">
						<i class="fa fa-info"></i>
					</a>
				</td>
				<td>
				@if($user->deleted_at == null)
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $user->id }}">
								<i class="fa fa-trash"></i>
					</button>
						@else
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $user->id }}" disabled>
								<i class="fa fa-trash"></i>
					</button>
						@endif

				</td>
					</tr>

					<!-- Modal Delete-->
					<div class="modal" tabindex="-1" role="dialog" id = "destroy{{ $user->id }}" style="top:20%;">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Borrar Jugador {{ $user->id }}</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>¿Estás seguro de borrar al jugador?</p>
								</div>
								<div class="modal-footer">
									{!! Form::open(['route' => ['admin.user.destroy', $user->id] , 'method' => 'DELETE']) !!}
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
					<div class="modal" tabindex="-1" role="dialog" id = "activar{{ $user->id }}" style="top:20%;">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Activar Jugador {{ $user->id }}</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>¿Estás seguro de volver a activar al jugador?</p>
								</div>
								<div class="modal-footer">
									{!! Form::open(['route' => ['admin.user.activar', $user->id] , 'method' => 'POST']) !!}
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
