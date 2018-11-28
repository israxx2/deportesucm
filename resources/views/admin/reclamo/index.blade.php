@extends('layouts.app')


@section('title', 'Reclamo')

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
				</td>
					</tr>

					


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
