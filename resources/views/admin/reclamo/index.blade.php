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
					<th>PARTIDO</th>
					<th>DESCRIPCION</th>
					<th>ESTADO</th>
				</tr>
			</thead>
			<tbody>
				@foreach($reclamo as $reclamo)
					<tr>
						<td>{{ $reclamo->id }}</td>
						<td>{{ $reclamo->partido_id }}</td>
						<td>{{ $reclamo->descripcion }}</td>
                        <td>{{ $reclamo->estado }}</td>
						<td>
							@if($reclamo->deleted_at == null)
								<p href="#" class="btn btn-success">
						Activo
					</p>
							@else
					<p href="#" class="btn btn-danger" data-toggle="modal" data-target="#activar{{ $reclamo->id }}">
						inactivo
					</p>
							@endif
						</td>
				<td>
					<a href="{{ '/admin/reclamo/'.$reclamo->id }}" class="btn btn-info">
						<i class="fa fa-book"></i>
					</a>
				</td>
				<td>
				@if($reclamo->deleted_at == null)
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $reclamo->id }}">
								<i class="fa fa-trash"></i>
					</button>
						@else
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $reclamo->id }}" disabled>
								<i class="fa fa-trash"></i>
					</button>
						@endif

				</td>
					</tr>

					<!-- Modal Delete-->
					<div class="modal" tabindex="-1" role="dialog" id = "destroy{{ $reclamo->id }}" style="top:20%;">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Borrar Reclamo {{ $reclamo->id }}</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>¿Estás seguro de borrar el Reclamo?</p>
								</div>
								<div class="modal-footer">
									{!! Form::open(['route' => ['admin.reclamo.destroy', $reclamo->id] , 'method' => 'DELETE']) !!}
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
					@endforeach

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
