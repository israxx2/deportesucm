@foreach($users as $user)
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <img class="avatar border-gray" src="{{ asset('estudiante/img_perfil/default.png') }}" alt="avatar" style="width:124px; height:124px;">
                </div>
                <div class="col-6">
                    <h5>{{ $user->nombres.' '.$user->apellidos }}</h5>
                    <p>{{ $user->nick }}</p>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-info">Ver</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
