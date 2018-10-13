 <table class="table table-striped display compact table-condensed" id="table_user">
        <thead>
            <tr>
            
                <th>#</th>
                <th>MODALIDAD</th>
                <th>EQUIPO</th>
                <th>LOCAL</th>
                <th>VISITA</th>
                <th>PUNTOS LOCAL</th>
                <th>PUNTOS VISITA</th>
                <th>GANADOR</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($resultado as $resultado)
                <tr>
                    <td>{{ $resultado->id }}</td>
                    <td>{{ $resultado->nombre }}</td>
                    <td>{{ $resultado->equipo_nombre }}</td>
                    <td>{{ $resultado->local_id }}</td>
                    <td>{{ $resultado->visita_id }}</td>
                    <td>{{ $resultado->puntos_local }}</td>
                    <td>{{ $resultado->puntos_visita }}</td>
                    <td>{{ $resultado->ganador_id }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
