@extends('mod.layouts.app')

@section('title', 'Solicitud')
@section('Solicitud', 'active')
@section('content')

<br>
<hr>
<div class="container">

	<div class="table-responsive">
		<table class="table table-striped display compact table-condensed" id="table_user">
			<thead>
				<tr>
					<th>#</th>
					<th>EQUIPO</th>
					<th>TORNEO</th>

				</tr>
			</thead>
			<tbody>
				@foreach($inscripcion as $inscripcion)
					<tr>
						<td>{{ $inscripcion->id }}</td>
						<td>{{ $inscripcion->nombre_equipo }}</td>
						<td>{{ $inscripcion->nombre_torneo }}</td>
				<td>
				</td>
					</tr>

					


					@endforeach

</div>

@endsection
