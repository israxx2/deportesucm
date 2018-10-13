@extends('estudiante.layouts.app')

@section('title', 'Equipos')
@section('equipos', 'active')
@section('content')


<br>
<hr>
<div class="container">

<div class="row">

	<div class="table-responsive " id="div_user">
    
		<table class="table table-striped display compact table-condensed" id="table_user">
			<thead>
				<tr>
                
					<th>#</th>
                    <th>Nombre</th>
                    <th>descripcion</th>
                    <th>Modalidad</th>

					
				</tr>
			</thead>
			<tbody>
            @foreach($equipos as $equipos)
					<tr>
						<td>{{ $equipos->id }}</td>
                        <td>{{ $equipos->nombre }}</td>
                        <td>{{ $equipos->descripcion }}</td>
                        <td>{{ $equipos->modalidad_id }}</td>
            
						
					</tr>
                @endforeach
            </tbody>
        </table>
	</div>		
</div>



@endsection

