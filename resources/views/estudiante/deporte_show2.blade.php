@if($invitaciones->isEmpty())
    <p>No hay invitaciones públicas</p>
@else
@foreach($invitaciones as $invitacion)
    <div class="card" style="width: 20rem;">
        <div class="card-header">
            <h6>{{ $invitacion->equipoEmisor->modalidad->nombre }}</h6>
        </div>
        <div class="card-body">

            <h4 class="card-title">{{ $invitacion->equipoEmisor->nombre }}</h4>
            <hr>
        <p class="card-text">{{ 'horario: '.$invitacion->horario }}</p>
            <hr>
            <p class="card-text">{{ 'lugar:'.$invitacion->lugar }}</p>
            <button class="btn btn-success btn-fab btn-icon btn-round">
                <i class="fas fa-check"></i>
            </button>
        </div>
    </div>
@endforeach
@endif