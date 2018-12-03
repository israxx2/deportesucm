<table class="table table-striped display compact table-condensed" id="table_user">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Tipo</th>
            <th>Detalles</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($modalidad as $modalidad)
            <tr>
                <td>{{ $modalidad->id }}</td>
				<td>{{ $modalidad->nombre }}</td>
				<td>{{ $modalidad->descripcion }}</td>
				<td>{{ $modalidad->deporte_id }}</td>
				<td>{{ $modalidad->min }}</td>
				<td>{{ $modalidad->max }}</td>
                <td>
                    <a href="{{ '/admin/modalidad/'.$modalidad->id  }}" class="btn btn-info">
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
