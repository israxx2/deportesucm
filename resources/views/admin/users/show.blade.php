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
            <!-- The time line -->
          <ul class="timeline">
                <!-- timeline time label -->
                <li class="time-label">
                      <span class="bg-red">
                        10 Feb. 2014
                      </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-envelope bg-blue"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                    <div class="timeline-body">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                      quora plaxo ideeli hulu weebly balihoo...
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-primary btn-xs">Read more</a>
                      <a class="btn btn-danger btn-xs">Delete</a>
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-user bg-aqua"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                    <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-comments bg-yellow"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                    <div class="timeline-body">
                      Take me to your leader!
                      Switzerland is small and neutral!
                      We are more like Germany, ambitious and misunderstood!
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline time label -->
                <li class="time-label">
                      <span class="bg-green">
                        3 Jan. 2014
                      </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-camera bg-purple"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                    <div class="timeline-body">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
              </ul>
        </div>

    </div>

</div>

@endsection
