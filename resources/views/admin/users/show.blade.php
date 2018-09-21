@extends('layouts.app')
@section('title', 'Usuarios')



@section('content')

<br>
<hr>

<div class="container">

	<ul class="list-group list-group-flush">
	  <li class="list-group-item list-group-item-dark">
		<div class="d-flex justify-content-between">
		
			<a href="{{ '/admin/user/'.$user->id.'/edit' }}" class="btn btn-warning">
				<i class="fa fa-edit"> Editar</i> 
			</a> <h5></h5>
		</div>
	  </li>

	  <li class="list-group-item"><b>Correo: </b>{{ $user->email }}

		{!! Form::open(['route' => 'admin.user.pw' , 'method' => 'POST']) !!}
			{!! Form::hidden('user_id', $user->id) !!}
			<button type="submit" class="btn btn-link d-flex justify-content-start">Cambiar contraseña</button>
		{!! Form::close() !!}


	</li>
	  <li class="list-group-item"><b>NOMBRES: </b>{{ $user->nombres }}</li>
	  <li class="list-group-item"><b>APELLIDOS: </b>{{ $user->apellidos }}</li>
	  <li class="list-group-item"><b>CARRERA: </b>{{ $user->carrera->nombre }}</li>
	  <li class="list-group-item"><b>NICK: @ </b>{{ $user->nick }}</li>

      
	</ul>
</div>

@endsection
