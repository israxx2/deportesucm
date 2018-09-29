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
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nombres }}</td>
                <td>{{ $user->apellidos }}</td>
                <td>
                    @if($user->tipo == 'admin')
                        <p class="label label-info">ADMIN</p>
                    @elseif($user->tipo == 'coordinador')
                        <p class="label label-danger">COORDINADOR</p>
                    @else
                        <p class="label label-success">ESTUDIANTE</p>
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
        @endforeach
    </tbody>
</table>
