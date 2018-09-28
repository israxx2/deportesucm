@extends('layouts.app')
@section('title', 'Usuarios')

@section('content')


<br>
<hr>
<div class="container">
<h3 class="box-title">Usuarios</h3>
    <ul class="nav nav-pills" role="tablist">
    <li role="presentation"><a href="{{ route('admin.user.index') }}">Usuarios <span class="badge">{{ count($users) - count($usersOnlyTrashed) }}</span></a></li>
    <li role="presentation" class="active"><a href="{{ route('admin.user.borrados') }}">Borrados <span class="badge">{{ count($usersOnlyTrashed) }}</span></a></li>
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

	 <button style="margin: 5px;" class="btn btn-danger btn-xs delete-all" data-url=""><i class="fa fa-times" aria-hidden="true"></i>  Borrar Seleccionados </button>


	<div class="table-responsive" id="div_user">
		<table class="table table-striped display compact table-condensed" id="table_user">
			<thead>
				<tr>
					<th><input type="checkbox" id="check_all"></th>
					<th>#</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Reactivar</th>
					<th>Detalles</th>
					<th>Eliminar</th>
			
				</tr>
			</thead>
			<tbody>
				@foreach($usersOnlyTrashed as $user)
				
					<tr>
						<td><input type="checkbox" class="checkbox" data-id="{{$user->id}}"></td>	
						<td>{{ $user->id }}</td>
						<td>{{ $user->nombres }}</td>
						<td>{{ $user->apellidos }}</td>
						

						<td>
							@if($user->deleted_at == null)
								<p href="#" class="btn btn-success">
						Activo
					</p>
							@else
					<p href="#" class="btn btn-success" data-toggle="modal" data-target="#activar{{ $user->id }}">
					<i class="fa fa-check"></i>
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
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $user->id }}">
								<i class="fa fa-trash"></i>
					</button>
						@else
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $user->id }}" >
								<i class="fa fa-trash"></i>
					</button>
						@endif

				</td>
				
					</tr>
	
					<!-- Modal Delete-->
					<div class="modal" tabindex="-1" role="dialog" id = "destroy{{ $user->id }}" style="top:20%;">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Borrar Jugador {{ $user->id }}</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>¿Estás seguro de borrar al jugador?</p>
								</div>
								<div class="modal-footer">
									{!! Form::open(['route' => ['admin.user.destroy_force', $user->id] , 'method' => 'post']) !!}
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

<script>
    $(document).ready(function(){
            $('#carrera_id').on('change',function(){
                $.post("{{ route('admin.user.filtro2') }}",{
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
						url: "{{ route('admin.user.deleteall') }}",
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
