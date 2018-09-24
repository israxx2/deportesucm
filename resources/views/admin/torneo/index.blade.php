@extends('layouts.app')


@section('title', 'Torneos')

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
					<th>Fecha</th>
                    <th>Tipo</th>
					<th>Ver mas</th>
					<th>Borrar </th>
				</tr>
			</thead>
			<tbody>
				@foreach($torneo as $torneos)
					<tr>
						<td>{{ $torneos->id }}</td>
						<td>{{ $torneos->nombre }}</td>
						<td>{{ $torneos->fecha }}</td>
						<td>{{ $torneos->tipo }}</td>
						<td><a href="{{ '/admin/torneo/'.$torneos->id }}" class="btn btn-info">
						<i class="fa fa-book"></i>
					</a></td>

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
