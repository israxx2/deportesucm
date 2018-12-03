@extends('estudiante.layouts.app')

@section('title', 'Perfil')
@section('perfil', 'active')
@section('content')

<div class="row">
    <div class="col-1">

    </div>
    <div class="col-10">
            <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('img/portada.jpg') }}" alt="..." width="1100px" height="300px">
                    </div>
                    <div class="card-body">
                        <div class="author">
                             <a href="#">
                            <img class="avatar border-gray" src="{{ asset('estudiante/img_perfil/'.$user->avatar) }}" alt="...">
                                <h5 class="title">{{ $user->nombres.' '.$user->apellidos }}</h5>
                            </a>
                            <p class="description">
                                @if($user->nick == null)
                                    Sin Apodo
                                @else
                                    {{ $user->nick }}
                                @endif
                            </p>
                        </div>
                        <p class="description text-center">
                            {{ $user->descripcion }}
                        </p>

                        <br><br>
                        <hr>

                        <div class="container" style="background-color: #E1F5FE; width: 70%; padding: 10px;">
                            <div class="card card-nav-tabs">
                                @foreach($deportes->modalidades as $modalidad)
                                    @foreach($modalidad->equipos as $equipo)
                                        <div class="card-header card-header-danger">
                                            {{ $equipo->nombre }}
                                        </div>
                                    @endforeach
                                @endforeach

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Cras justo odio</li>
                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                    <li class="list-group-item">Vestibulum at eros</li>
                                </ul>
                            </div>
                        </div>


                    </div>
                    <hr>
                    <div class="button-container">
                        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="fab fa-facebook-f"></i>
                        </button>
                        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="fab fa-google-plus-g"></i>
                        </button>
                    </div>
                </div>
    </div>
    <div class="col-1">

    </div>
</div>

@endsection

