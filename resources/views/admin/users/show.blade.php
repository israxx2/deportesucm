@extends('layouts.app')
@section('title', 'Usuarios')



@section('content')

<br>
<hr>

  <div class="container-fluid">
    <div class="row">
        <div class="col-md-4  ">
        <!--primer box -->
          <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Informacion del Usuario</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <p><b>NOMBRES: </b>{{ $user->nombres }}</p>
                    <p><b>APELLIDOS: </b>{{ $user->apellidos }}</p>
                    <p> <b>CARRERA: </b>{{ $user->carrera->nombre }}</p>
                    <p><b>NICK: @ </b>{{ $user->nick }}</p>
                    <p><b>Correo: </b>{{ $user->email }}</p>
                    <p><b>Carrera: </b>{{ $user->carrera_id }}</p>
                    <p><b>Tipo: </b>{{ $user->tipo }}</p>
                    <a href="{{ '/admin/user/'.$user->id.'/edit' }}" class="btn btn-warning btn-xs">
                          <i class="fa fa-edit"> Editar</i>
                    </a> 
                  </div>
                </div>
             
              </div>  
            </div>
            <!--fin primer box -->
            <!--segundo box -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Deportes Mas Jugados </h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                 
                  <canvas id="myChart" width="400" height="400"></canvas>

                  
                  </div>
                </div>
             
              </div>  
            </div>
          </div>
          <!--fin segundo box -->
      

  <div class="col-md-8 col-xs-12">
          @foreach ($collection as $data)
          
            <!-- The time line -->
              <ul class="timeline">
                  <!-- timeline time label -->
                  <li class="time-label">
                      <span class="bg-red"> {{ $data['created_at']->format('d-m-Y')}} </span>
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



<!--Graficos-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>


<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["Futbol", "Tenis", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235)',
                'rgba(255, 206, 86)',
                'rgba(75, 192, 192)',
                'rgba(153, 102, 255)',
                'rgba(255, 159, 64)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    }
});
</script>

@endsection
