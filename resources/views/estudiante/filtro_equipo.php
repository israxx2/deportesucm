@foreach($equipo as $equipo)        
            <div class="card-header">
                 <li class="list-group-item"><b>NOMBRE: </b>{{ $equipo->nombre }}</li>
	             <li class="list-group-item"><b>DESCRIPCION: </b>{{ $equipo->descripcion }}</li>
            </div>
         </a>
@endforeach   