@extends('estudiante.layouts.app')

@section('title', 'Perfil')
@section('perfil', 'active')
@section('content')

<div class="row">
    <div class="col-ml-3 col-sm-4">
        <div class="card card-user">
            <div class="image">
                <img src="{{ asset('estudiante/assets/img/fondo-de-pantalla-plano-de-color-arena.jpg') }}" alt="...">
            </div>
            <div class="card-body">
                <div class="author">
                    <a href="#">
                    <img class="avatar border-gray" src="{{ asset('estudiante/img_perfil/'.$user->avatar) }}" alt="avatar" data-toggle="modal" data-target="#imagen">
                        <h5 class="title">{{ $user->nombres.' '.$user->apellidos }}</h5>
                    </a>
                    <p class="description">
                        @if($user->nick == null)
                            Sin Apodo
                        @else
                            {{ $user->nick }}
                        @endif
                    </p>

                    <blockquote class="blockquote">
                        @if($user->descripcion == null)
                            <p class="mb-0">Sin descripción</p>
                        @else
                            <p class="mb-0">{{ $user->descripcion }}</p>
                        @endif


                      </blockquote>

                            <a class="btn btn-link" href="#" role="button" data-toggle="modal" data-target="#descripcion">editar<i class="fas fa-pen"></i></a>


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

    <div class="col-ml-9 col-sm-8">
        <div class="card card-chart">
            <div class="card-header">
              <h5 class="card-category">Estadisticas</h5>
              <h4 class="card-title"></h4>
            </div>
            <div class="card-body">
              <div class="chart-area">
                <canvas id="lineChartExample"></canvas>
              </div>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
              </div>
            </div>
          </div>
    </div>

</div>

<!-- Modal Imagen -->
<div class="modal fade" id="imagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <center>
                <img class="avatar border-gray" src="{{ asset('estudiante/img_perfil/'.$user->avatar) }}" alt="...">
            </center>
        </div>
        <div class="modal-footer">
            <div class="row">
                <div class="col-2">
                        {!! Form::open(['route' => 'estudiante.perfil.imagen.delete' , 'method' => 'POST']) !!}
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        {!! Form::close() !!}
                </div>

                <div class="col-6">
                    {!! Form::open(['route' => 'estudiante.perfil.imagen' , 'method' => 'POST', 'files' => true]) !!}
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                <span class="btn btn-default btn-file"><span class="fileinput-new">Cambiar imagen</span><span class="fileinput-exists">Change</span><input type="file" name="avatar"></span>
                                <span class="fileinput-filename"></span>
                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Modal Descripcion -->
<div class="modal fade" id="descripcion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cambiar Descripción</h5>
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                {!! Form::open(['route' => 'estudiante.perfil.descripcion' , 'method' => 'POST']) !!}
                    <input name="descripcion" id="descripcion" type="text" class="form-control" placeholder="Ingrese una descripcion..." required>
                    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
@endsection
