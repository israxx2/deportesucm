@extends('layouts.app')
@section('title', 'PARTIDO')



@section('content')

<br>
<hr>
<div class="container-fluid">
    <div class="box">
        <h3 class="box-title">Partido</h3>

        <div class="box-body">
                <ul class="nav nav-pills" role="tablist">
                    <li role="presentation" class="active"><a href="{{ route('admin.partido.index') }}">Partidos <span class="badge">{{ count($partido) }}</span></a></li>
                    <li role="presentation"><a href="{{ route('admin.partido.borrados') }}">Borrados <span class="badge">{{ count($partidosOnlyTrashed) }}</span></a></li>
                </ul>


        <div id="muestra"></div>
        <div class="table-responsive" id="div_user">
            <table class="table table-striped display compact table-condensed" id="table_user">
                <thead>
                    <tr>
                       	<th><input type="checkbox" id="check_all"></th>
						  <th>#</th>
                  		  <th>LOCAL</th>
                  		  <th>VISITA</th>
                  		  <th>PUNTOS LOCAL</th>
                 	 	  <th>PUNTOS VISITA</th>
                 	 	  <th>GANADOR</th>
                 	 	  <th>Ver Mas </th>
                 	 	  <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partido as $partido)
                        <tr>
                            <td><input type="checkbox" class="checkbox" data-id="{{$partido->id}}"></td>
							<td>{{ $partido->id }}</td>
                      		  <td>{{ $partido->local_id }}</td>
                       		 <td>{{ $partido->visita_id }}</td>
                       		 <td>{{ $partido->puntos_local }}</td>
                        	<td>{{ $partido->puntos_visita }}</td>
                        	<td>{{ $partido->ganador_id }}</td>
                            <td>
                                <a href="{{ '/admin/partido/'.$partido->id  }}" class="btn btn-info">
                                    <i class="fa fa-info"></i>
                                </a>
                            </td>
                            <td>
                            @if($partido->deleted_at == null)
                                <button type="button" class="btn btn-danger" onclick="del({{ $partido->id }})">
                                            <i class="fa fa-trash"></i>
                                </button>
                                    @else
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $partido->id }}" disabled>
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
                        <h5 class="modal-title">Borrar Partido <span id="n_id"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de borrar el PArtido?</p>
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

        function del(id){
            $('#n_id').html(id);
            $('#id_del').val(id);
            $('#modal_delete').modal('show');
        };

        $('#form_delete').on('submit', function(e){
            axios.delete('/admin/partido/'+$('#id_del').val()).then(response => {
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
						url: "{{ route('admin.partido.borrados') }}",
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
