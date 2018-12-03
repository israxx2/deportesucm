@if($users->isEmpty())
    <p>No se han encontrado estudiantes.</p>
@else
    @foreach ($users as $user)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <img class="avatar border-gray" src="{{ asset('estudiante/img_perfil/'.$user->avatar) }}" alt="Avatar" style="width:100px; height:100px;">
                    </div>
                    <div class="col-6">
                        <h6>{{ $user->nombres.' '.$user->apellidos }}</h6>
                        <p>{{ $user->nick }}</p>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-info">Ver</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
