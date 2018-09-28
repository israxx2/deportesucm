@extends('layouts.app')
@section('title', 'Usuarios')



@section('content')

<br>
<hr>
<div class="container-fluid">
    <div class="box">
        <h3 class="box-title">Usuarios</h3>


        <div class="box-body">
                <ul class="nav nav-pills" role="tablist">
                    <li role="presentation" class="active"><a href="{{ route('admin.user.index') }}">Usuarios <span class="badge">{{ count($users) }}</span></a></li>
                    <li role="presentation"><a href="{{ route('admin.user.borrados') }}">Borrados <span class="badge">{{ count($usersOnlyTrashed) }}</span></a></li>
                </ul>

            <div class="row">
                {!! Form::open(['route' => 'admin.user.filtro1' , 'method' => 'POST']) !!}
                <div class="col-sm-6">
                    <hr>
                        <label>Filtro </label>
                    <select class="form-control" id="carrera_id" name="carrera_id" required style="width: 100%">
                    <option value="null">Seleccione una carrera</option>

                    @foreach($carreras as $carrera)
                        <option value="{{ $carrera->id }}">{{ $carrera->id.'- '.$carrera->nombre }}</option>
                    @endforeach
                    </select>
                </div>
                {!! Form::close() !!}
                <div class="col-sm-6">
                    </div>
            </div>
        </div>
        <div id="muestra"></div>
        <div class="table-responsive" id="div_user">
            <table class="table table-striped display compact table-condensed" id="table_user">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>

                        <th>Estado</th>
                <th>Detalles</th>
                <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->nombres }}</td>
                            <td>{{ $user->apellidos }}</td>


                            <td>
                                @if($user->deleted_at == null)
                                    <p href="#" class="btn btn-success">
                            Activo
                        </p>
                                @else
                        <p href="#" class="btn btn-danger" data-toggle="modal" data-target="#activar{{ $user->id }}">
                            inactivo
                        </p>
                                @endif
                            </td>
                    <td>
                        <a href="{{ '/admin/user/'.$user->id  }}" class="btn btn-info">
                            <i class="fa fa-info"></i>
                        </a>
                    </td>
                    <td>
                    @if($user->deleted_at == null)
                        <button type="button" class="btn btn-danger" onclick="del({{ $user->id }})">
                                    <i class="fa fa-trash"></i>
                        </button>
                            @else
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $user->id }}" disabled>
                                    <i class="fa fa-trash"></i>
                        </button>
                            @endif

                    </td>
                        </tr>

                        <!-- Modal Delete-->


                        <!-- Modal Activar-->
                        <div class="modal" tabindex="-1" role="dialog" id = "activar{{ $user->id }}" style="top:20%;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Activar Jugador {{ $user->id }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Estás seguro de volver a activar al jugador?</p>
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open(['route' => ['admin.user.activar', $user->id] , 'method' => 'POST']) !!}
                                            <button type="submit" class="btn btn-success">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </button>
                                        {!! Form::close() !!}
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <!-- MODAL DE BORRAR CREADO X EL MASTER CHAVEZ -->
    <div class="modal" tabindex="-1" role="dialog" id ="modal_delete" style="top:20%;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Borrar Jugador <span id="n_id"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de borrar al jugador?</p>
                    </div>
                    <div class="modal-footer">
                        <form id="form_delete">
                            <input type="hidden" name="id_del" id="id_del">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

</div>
<script>
    $(document).ready(function(){
            $('#carrera_id').on('change',function(){
                $.post("{{ route('admin.user.filtro1') }}",{
                    id:$('#carrera_id').val(),
                    _token:'{{ csrf_token() }}'
                }).done(function(data){
                   $('#div_user').html(data);
                });
            });
        });

        function del(id){
            $('#n_id').html(id);
            $('#id_del').val(id);
            $('#modal_delete').modal('show');
        };

        $('#form_delete').on('submit', function(e){
            axios.delete('/admin/user/'+$('#id_del').val()).then(response => {
                console.log(response);
                location.reload();
            }).catch(error => {
                console.log(error);
            });
        });


    </script>

@endsection
