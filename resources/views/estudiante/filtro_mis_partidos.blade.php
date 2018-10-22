@foreach($resultado as $resultado)
    <div id="div_user"class="card" style="width: 20rem;">
            <img class="card-img-top" width="320" height="180"     
                src="{{ $resultado->imagen }}"        
                alt="Card image cap">
        <div class="card-body" >
            <h4 class="card-title">
                Partido #{{ $resultado->id }}
                &nbsp;&nbsp;&nbsp;
                
                
                <b>{{ $resultado->puntos_local }} : {{ $resultado->puntos_visita }}</b>
                
               
            
        
            </h4> 
            
            <p class="card-text">
                <p> <b>Equipo Rival: {{ $resultado->visita_id }}</b ></p>
                
                <p> </p>
                
            </p>
            <button style="float: right;" type="button" 
                class="btn btn-danger btn-xs" 
                data-toggle="modal" 
                data-id="{{$resultado->id_user }}"
                data-target="#favoritesModal">Reclamar
		</button>
            </div>
    </div>
   

@endforeach