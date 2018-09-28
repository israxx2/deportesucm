@extends('layouts.app')
@section('title', 'Usuarios')



@section('content')

<br>
<hr>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-xs-12">
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

        <div class="col-md-8 col-xs-12">
        @foreach ($collection as $data)
          
            <!-- The time line -->
          <ul class="timeline">
                <!-- timeline time label -->
                <li class="time-label">
                      <span class="bg-red">
                         
                              {{ $data['created_at']->format('d-m-Y')}}
                         
                      </span>
                </li>
                <!-- /.timeline-label -->

                <!-- timeline item -->
                <li>
                  
                  <i class="{{ $data['icon']}}"></i>

                  <div class="timeline-item">
                
                    <span class="time"> {{ $data['created_at']->format('H:i:s')}}
                    
               <i class="fa fa-clock-o"></i> </span>
                    <h3 class="timeline-header"><a href="#">{{ $data['titulo']}}</a>
                     
                    @if($data['titulo2'] !=null )
                    <a class="text-red"> {{ $data['titulo2']}}</a>
 
                    @endif
                     
                     </h3>
                    
                   

                    <div class="timeline-body">
                    {{ $data['descrip']}}
                    </div>
                    <div class="timeline-footer">
                      @if($data['ver_mas'] !=null )
                        <a href={{ $data['ver_mas']}} class="btn btn-warning btn-xs ">ver mas</a>

                      @endif
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                @endforeach
              
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
            </ul>
        </div>

    </div>

</div>

@endsection
