@extends('layouts.app')
@section('title', 'Modalidad')



@section('content')

<br>
<hr>
<div class="container-fluid">
    <div class="box">
        <h3 class="box-title">Modalidad</h3>

        <div class="box-body">
                <ul class="nav nav-pills" role="tablist">
                    <li role="presentation" class="active"><a href="{{ route('admin.modalidad.index') }}">Modalidades <span class="badge">{{ count($modalidad) }}</span></a></li>
                    <li role="presentation"><a href="{{ route('admin.modalidad.borrados') }}">Borrados <span class="badge">{{ count($modalidadesOnlyTrashed) }}</span></a></li>
                </ul>

            <div class="row">
                {!! Form::open(['route' => 'admin.modalidad.filtro1' , 'method' => 'POST']) !!}
                <div class="col-sm-3">
                    <hr>
                        <label>Filtro </label>
                    <select class="form-control" id="deporte_id" name="deporte_id" required style="width: 100%">
                    <option value="null">Seleccione un deporte</option>

                    @foreach($deportes as $deporte)
                        <option value="{{ $deporte->id }}">{{ $deporte->id.'- '.$deporte->nombre }}</option>
                    @endforeach
                    </select>
                </div>
                {!! Form::close() !!}
                <div class="col-sm-6">
                    </div>
            </div>

        <div id="muestra"></div>
        <div class="table-responsive" id="div_user">
            <table class="table table-striped display compact table-condensed" id="table_user">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="check_all"></th>
						<th>#</th>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Deporte</th>
						<th>Minimo</th>
						<th>Maximo</th>
						<th>Ver Mas </th>
						<th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($modalidad as $modalidad)
                        <tr>
                            <td><input type="checkbox" class="checkbox" data-id="{{$modalidad->id}}"></td>
							<td>{{ $modalidad->id }}</td>
							<td>{{ $modalidad->nombre }}</td>
							<td>{{ $modalidad->descripcion }}</td>
							<td>{{ $modalidad->deporte_id }}</td>
							<td>{{ $modalidad->min }}</td>
							<td>{{ $modalidad->max }}</td>
                            <td>
                                <a href="{{ '/admin/modadlidad/'.$modalidad->id  }}" class="btn btn-info">
                                    <i class="fa fa-info"></i>
                                </a>
                            </td>
                            <td>
                            @if($modalidad->deleted_at == null)
                                <button type="button" class="btn btn-danger" onclick="del({{ $modalidad->id }})">
                                            <i class="fa fa-trash"></i>
                                </button>
                                    @else
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $modalidad->id }}" disabled>
                                            <i class="fa fa-trash"></i>
                                </button>
                                    @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <button style="margin: 5px;" class="btn btn-danger btn-xs delete-all" data-url="">Borrar seleccionados   <i class="fa fa-times" aria-hidden="true"></i> </button>
    </div>

    </div>
    <!-- MODAL DE BORRAR  -->
    <div class="modal" tabindex="-1" role="dialog" id ="modal_delete" style="top:20%;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Borrar Modadlidad <span id="n_id"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de borrar la Modaliadad?</p>
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
            $('#deporte_id').on('change',function(){
                $.post("{{ route('admin.modalidad.filtro1') }}",{
                    id:$('#deporte_id').val(),
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
            axios.delete('/admin/modalidad/'+$('#id_del').val()).then(response => {
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
						url: "{{ route('admin.modalidad.borrados') }}",
						type: 'POST',
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
