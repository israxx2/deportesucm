@extends('admin.template.main')

@section('title', 'Usuarios')



@section('content')

<br>
<hr>

<div class="container">

	<ul class="list-group list-group-flush">
	  <li class="list-group-item list-group-item-dark">
		<div class="d-flex justify-content-between">
			<h4>DATOS PERSONALES:</h4>
			<a href="{{ '/admin/user/'.$user->id.'/edit' }}" class="btn btn-warning">
				<i class="far fa-edit"></i>
			</a>
		</div>
	  </li>
	  <li class="list-group-item"><b>ID: </b>#{{ $user->id }}</li>
	  <li class="list-group-item"><b>E-MAIL: </b>{{ $user->email }}

		{!! Form::open(['route' => 'admin.user.pw' , 'method' => 'POST']) !!}
			{!! Form::hidden('user_id', $user->id) !!}
			<button type="submit" class="btn btn-link d-flex justify-content-start">Cambiar contraseña</button>
		{!! Form::close() !!}


	</li>
	  <li class="list-group-item"><b>NOMBRES: </b>{{ $user->nombres }}</li>
	  <li class="list-group-item"><b>APELLIDOS: </b>{{ $user->apellidos }}</li>
	  <li class="list-group-item"><b>CARRERA: </b>{{ $user->carrera->nombre }}</li>
	  <li class="list-group-item"><b>NICK: </b>{{ $user->nick }}</li>

      <li class="list-group-item list-group-item-dark"><h4>DATOS DE JUEGO:</h1></li>
        <p>ignorar esto</p>
	  <li class="list-group-item"><b>VICTORIA(S) DUELO(S): </b>{{ $user->v_duelos_1v1 }}</li>
	  <li class="list-group-item"><b>VICTORIA(S) TORNEO(S): </b>{{ $user->v_torneos_1v1 }}</li>
		<li class="list-group-item"><b>JUEGOS TOTALES: </b>{{ $user->juegos_totales_1v1 }}</li>
		<li class="list-group-item"><b>TORNEOS GANADOS: </b>{{ $user->torneos_ganados }}</li>
	</ul>
</div>

@endsection
