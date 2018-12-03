@extends('estudiante.layouts.app')

@section('title', 'Comunidad')
@section('comunidad', 'active')
@section('content')

@if(Session::has('message'))
<p class="alert alert-success">{{ Session::get('message') }}</p>
@endif

<br>
<hr>
<br>
<div class="row">

    <div class="col-3">
        <div class="container">
            <p>Buscar por..</p>
            <div class="form-group">
                {!! Form::open(['route' => 'estudiante.comunidad.carreras' , 'method' => 'POST']) !!}
                    <label>Carreras</label>
                    <select class="form-control" id="carrera_id" name="carrera_id">
                        <option value="null">Seleccione una carrera</option>
                        @foreach($carreras as $carrera)
                            <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                        @endforeach
                    </select>
                {!! Form::close() !!}
            </div>
        </div>

    </div>

    <div class="col-6" id="div_user">
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
                            <a href="{{ route('estudiante.perfil.show', ['id' => $user->id]) }}">
                                <button class="btn btn-info btn-round">
                                        <i class="far fa-hand-point-right"></i> Detalles
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $users->links() }}
    </div>

    <div class="col-3">
            <div class="card bg-dark text-white">
                    <img class="card-img" src="{{ asset('img/deporte_8.jpg') }}" alt="deporte" style="background-color: rgba(0,0,0,0.8); filter:brightness(0.6);">
                    <div class="card-img-overlay">
                      <h4 class="card-title">Jugadores UCM</h4>
                      <p class="card-text">"Los limites están en tu mente".</p>
                    </div>
                  </div>
    </div>
</div>

<script src="{{ asset('estudiante/assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $('#carrera_id').on('change',function(){
            $.post("{{ route('estudiante.comunidad.carreras') }}",{
                id:$('#carrera_id').val(),
                _token:'{{ csrf_token() }}'
            }).done(function(data){
                $('#div_user').html(data);
            });
        });
    });
</script>
@endsection

