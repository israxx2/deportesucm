@extends('layouts.app')
@section('title', 'Carrera')



@section('content')

<br>
<hr>

<div class="container-fluid">

	<ul class="list-group list-group-flush">
	  <li class="list-group-item list-group-item-dark">
		<div class="d-flex justify-content-between">
		
			<a href="{{ '/admin/carrera/'.$carrera->id.'/edit' }}" class="btn btn-warning">
				<i class="fa fa-edit"> Editar</i> 
			</a> <h5></h5>
		</div>
	  </li>
	    </li>
	  <li class="list-group-item"><b>NOMBRE: </b>{{ $carrera->nombre }}</li>
	</ul>

    <div class="row">
        <div class="col-sm-4  "></div>
       
        </div>
        <div class="col-sm-4  ">
            <!--segundo box -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Deportes Mas Jugados en la Carrera de {{ $carrera->nombre }}</h3>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                    <div class="col-md-12">
                    @if(!empty($deporte))
                        <canvas id="myChart" width="400" height="400"></canvas>
                    @else
                    <center>
                    <b><p>no existen registros de deportes jugados por usuarios de la carrera</p>
                   </b>
                   </center>
                    @endif
                    </div>
                    </div>
                
                </div>  
                </div>
            </div>
            <!--fin segundo box -->
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
        labels: {!!$deporte!!},
        datasets: [{
            label: '# of Votes',
            data: {!!$Cantidad!!},
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
