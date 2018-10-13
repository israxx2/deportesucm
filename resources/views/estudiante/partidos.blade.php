@extends('estudiante.layouts.app')

@section('content')

<br>
<hr>
<div class="container">

{!! Form::open(['route' => 'estudiante.filtro_modalidad' , 'method' => 'POST']) !!}
    <div class="col-sm-3">
                    <hr>
                        <label>Filtro </label>
                    <select class="form-control" id="id_modalidad" name="id_modalidad" required style="width: 100%">
                    <option value="null">Seleccione una modalidad</option>

                    @foreach($modalidad as $modalidad)
                        <option value="{{ $modalidad->id }}">{{ $modalidad->id.'- '.$modalidad->nombre }}</option>
                    @endforeach
                    </select>
                </div>
{!! Form::close() !!}
                <div class="col-sm-6">
                    </div>
    </div>

<div class="row">
      


	<div class="table-responsive " id="div_user">
    
		<table class="table table-striped display compact table-condensed" id="table_user">
			<thead>
				<tr>
                
					<th>#</th>
                    <th>MODALIDAD</th>
                    <th>EQUIPO</th>
					<th>LOCAL</th>
					<th>VISITA</th>
					<th>PUNTOS LOCAL</th>
					<th>PUNTOS VISITA</th>
					<th>GANADOR</th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($resultado as $resultado)
					<tr>
						<td>{{ $resultado->id }}</td>
                        <td>{{ $resultado->nombre }}</td>
                        <td>{{ $resultado->equipo_nombre }}</td>
						<td>{{ $resultado->local_id }}</td>
						<td>{{ $resultado->visita_id }}</td>
						<td>{{ $resultado->puntos_local }}</td>
						<td>{{ $resultado->puntos_visita }}</td>
						<td>{{ $resultado->ganador_id }}</td>
						
					</tr>
                @endforeach
            </tbody>
        </table>
	</div>		
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
      $(document).ready(function(){
            $('#id_modalidad').on('change',function(){
                console.log("asdasd");
                $.post("{{ route('estudiante.filtro_modalidad') }}",{
                    id:$('#id_modalidad').val(),
                    _token:'{{ csrf_token() }}'
                }).done(function(data){
                   $('#div_user').html(data);
                });
            });
        });
</script>


@endsection