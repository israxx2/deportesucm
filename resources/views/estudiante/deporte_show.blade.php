@extends('estudiante.layouts.app')

@section('title',  $deporte->nombre)
@section('deporte', 'active')
@section('deporte_'.$deporte->id , 'active')
@section('content')

<br><br><br>
<div class="container">
        <div class="card bg-dark text-white">
            <img class="card-img-top" width="300" height="400" src="{{ asset('img/deporte/'.$deporte->imagen) }}" alt="Card image cap" style="filter: brightness(0.8);">
            <div class="card-img-overlay">
                <h1 class="card-title" style="font-size: 4.5em;">{{ $deporte->nombre }}</h1>
                <p class="card-text">{{ $deporte->descripcion }}</p>
            </div>
        </div>

            {{-- <div class="card" style="background-color: #0d00ff0f;">
                <div class="card-body">
                    <h4 class="card-title text-center"><b>MODALIDADES</b></h4>
                    <p class="card-text">
                        @foreach($deporte->modalidades as $modalidad)
                            <h5 class="card-title text-center">
                                <b> <a class="btn btn-danger btn-round" href="{{ route('estudiante.modalidades.show', ['id' => $modalidad->id]) }}">
                                        {{ ''.strtoupper($modalidad->nombre) }}
                                    </a> </b>
                            </h5>
                        @endforeach
                    </p>
                </div>
            </div> --}}
</div>

<div>
    <br>
    <hr>
<div class="container">

        <h2>Invitaciones Publicas</h2>

    <div class="container">
            <div class="form-group">
                {!! Form::open(['route' => 'estudiante.deportes.invitaciones.modalidad' , 'method' => 'POST']) !!}
                    <label>Filtrar por modalidad</label>
                    <select class="form-control" id="modalidad_id" name="modalidad_id" style="width: 20rem;">
                        <option value="null">Seleccione una modalidad</option>
                        @foreach($deporte->modalidades as $modalidad)
                            <option value="{{ $modalidad->id }}">{{ $modalidad->nombre }}</option>
                        @endforeach
                    </select>
                {!! Form::close() !!}
            </div>
        </div>
        <br>
    <div class="row">
        <div class="col-8">
            <div class="d-flex justify-content-around" id="div_invi">
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
                
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body" style="background-color: #bdc0ce82;">
                    <h5 class="card-title">Equipos por modalidad</h5>
                    @foreach($deporte->modalidades as $modalidad)
                        <a href="{{ route('estudiante.modalidades.show', ['id' => $modalidad->id]) }}" class="btn btn-neutral btn-sm" aria-disabled="true" style="background-color: #ffffff00; color: #3f3836;"><i class="far fa-hand-point-right"></i>{{ ' '.$modalidad->nombre }}</a><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>


</div>

<script src="{{ asset('estudiante/assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $('#modalidad_id').on('change',function(){
            $.post("{{ route('estudiante.deportes.invitaciones.modalidad') }}",{
                id:$('#modalidad_id').val(),
                _token:'{{ csrf_token() }}'
            }).done(function(data){
                $('#div_invi').html(data);
            });
        });
    });
</script>
@endsection
