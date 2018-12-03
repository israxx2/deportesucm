@extends('layouts.app')
@section('title', 'Deportes')

@section('content')


<br>
<hr>
<div class="container-fluid">
	<div class="box">
		<h3 class="box-title">Deportes</h3>
		<div class="box-body">
		<ul class="nav nav-pills" role="tablist">
		<li role="presentation"><a href="{{ route('admin.deporte.index') }}">Deportes <span class="badge">{{ count($deporte) - count($deportesOnlyTrashed) }}</span></a></li>
		<li role="presentation" class="active"><a href="{{ route('admin.deporte.borrados') }}">Borrados <span class="badge">{{ count($deportesOnlyTrashed) }}</span></a></li>
		</ul>



	<div class="table-responsive" id="div_user">
		<table class="table table-striped display compact table-condensed" id="table_user">
			<thead>
				<tr>
					<th><input type="checkbox" id="check_all"></th>
					<th>#</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Activar</th>
					<th>Borrar </th>

				</tr>
			</thead>
			<tbody>
                @if($deportesOnlyTrashed->isEmpty())

                @else
                    @foreach($deportesOnlyTrashed as $deporte)

                        <tr>
                            <td><input type="checkbox" class="checkbox" data-id="{{$deporte->id}}"></td>
                            <td>{{ $deporte->id }}</td>
                            <td>{{ $deporte->nombre }}</td>
                            <td>{{ $deporte->descripcion }}</td>


                            <td>
                                @if($deporte->deleted_at == null)
                                    <p href="#" class="btn btn-success">
                            Activo
                        </p>
                                @else
                        <p href="#" class="btn btn-success" data-toggle="modal" data-target="#activar{{ $deporte->id }}">
                        <i class="fa fa-check"></i>
                        </p>
                                @endif
                            </td>
                    <td>
                    @if($deporte->deleted_at == null)
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $deporte->id }}">
                                    <i class="fa fa-trash"></i>
                        </button>
                            @else
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $deporte->id }}" >
                                    <i class="fa fa-trash"></i>
                        </button>
                            @endif

                    </td>

                        </tr>

                        <!-- Modal Delete-->
                        <div class="modal" tabindex="-1" role="dialog" id = "destroy{{ $deporte->id }}" style="top:20%;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Borrar Jugador {{ $deporte->id }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Estás seguro de borrar el deporte?</p>
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open(['route' => ['admin.deporte.destroy_force', $deporte->id] , 'method' => 'post']) !!}
                                            <button type="submit" class="btn btn-danger">
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

                        <!-- Modal Activar-->
                        <div class="modal" tabindex="-1" role="dialog" id = "activar{{ $deporte->id }}" style="top:20%;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Activar Deporte {{ $deporte->id }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Estás seguro de volver a activar a¿el Deporte?</p>
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open(['route' => ['admin.deporte.activar', $deporte->id] , 'method' => 'POST']) !!}
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
                @endif


			</tbody>
		</table>
	</div>

<button style="margin: 5px;" class="btn btn-danger btn-xs delete-all" data-url="">Borrar seleccionados   <i class="fa fa-times" aria-hidden="true"></i> </button>

</div>
</div>

<script>
        function del(id){
            $('#n_id').html(id);
            $('#id_del').val(id);
            $('#modal_delete').modal('show');
        };

        $('#form_delete').on('submit', function(e){
            axios.delete('/admin/deporte/'+$('#id_del').val()).then(response => {
                console.log(response);
                location.reload();
            }).catch(error => {
                console.log(error);
            });
        });


    </script>

<script type="text/javascript">

	$(document).ready(function () {
		$('#check_all').on('click', function(e) {
		if($(this).is(':checked',true))
		{
			$(".checkbox").prop('checked', true);
		} else {
			$(".checkbox").prop('checked',false);
		}
		});

		$('.checkbox').on('click',function(){
			if($('.checkbox:checked').length == $('.checkbox').length){
				$('#check_all').prop('checked',true);
			}else{
				$('#check_all').prop('checked',false);
			}
		});

		$('.delete-all').on('click', function(e) {
			var idsArr = [];
			$(".checkbox:checked").each(function() {
				idsArr.push($(this).attr('data-id'));
			});
			if(idsArr.length <=0)
			{
				alert("Favor seleccionar al menos un item.");
			}  else {

				if(confirm("¿Estas seguro?, se borraran de forma permanente")){
					var strIds = idsArr.join(",");
					$.ajax({
						url: "{{ route('admin.deporte.borrados') }}",
						type: 'GET',
						headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
						data: 'ids='+strIds,
						success: function (data) {
							if (data['status']==true) {
								$(".checkbox:checked").each(function() {
									$(this).parents("tr").remove();
								});
								alert(data['message']);
							} else {
								alert('A ocurrido un error');
							}
						},
						error: function (data) {
							alert(data.responseText);
						}
					});
				}
			}
		});



	});

</script>
@endsection
