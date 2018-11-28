@extends('estudiante.layouts.app')

@section('title', 'invitacion')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card card-chart bg-info">
            <div class="card-header">
                <h4 class="card-title">Realizar Nueva Invitacion Privada 
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#crearInvitacion"><i class="fas fa-plus"></i></button></h4>
            </div>

        </div>
    </div>

    <div class="col-sm-4">
        <div class="card card-chart ">
        <div class="card-header">
        <center><h4>INVITACIONES RECIBIDAS</h4></center>
        <hr>
        </div>
            <div class="card-body">
                @foreach( $mis_invitaciones as $invitacion)
            
            <b>
            <h6  style="text-align: right; "> {{strtoupper($invitacion->nombre_equipo)}}</h6>
            
            </b>
                <p class="text-muted">{{$invitacion->descripcion_invi}}</p><br>
                
                <p><b>Horario:</b> {{$invitacion->horario_invi}}.</p>
                
                <p><b>Lugar:</b> {{$invitacion->lugar_invi}}</p>
                
                <p><b>Número contacto:</b> {{$invitacion->numero_invi}}</p>
                <input name="emisor" type="hidden" value="{{$invitacion->emisor}}">
                <input name="receptor" type="hidden" value="{{$invitacion->receptor}}">
                <div class="row">
                    <div class="col-sm-6"> {!! Form::open(['route' => ['estudiante.invitaciones.aceptar', $invitacion->id] , 'method' => 'POST']) !!}
                        <button class="btn btn-success">ACEPTAR</button>
                    {!! Form::close() !!}
                    </div>
                    <div class="col-sm-6"  style="text-align: right">
                    {!! Form::open(['route' => ['estudiante.invitaciones.rechazar', $invitacion->id] , 'method' => 'POST']) !!}
                        <button class="btn btn-danger">CANCELAR</button>
                    {!! Form::close() !!}
                    </div>
                </div>

                   

                
               
                <br><hr>

            @endforeach
               
            </div>

        </div>
    </div>   

    <div class="col-sm-4">
        <div class="card card-chart">
        <div class="card-header">
            <center><h4>INVITACIONES ENVIADAS</h4></center>
            <hr>
        </div>
            <div class="card-body">
            @foreach( $mis_invitaciones as $invitacion)
           
             <b>
             <h6  style="text-align: right; "> {{strtoupper($invitacion->nombre_equipo)}}</h6>
            
             </b>
                <p class="text-muted">{{$invitacion->descripcion_invi}}</p><br>
               
                <p><b>Horario:</b> {{$invitacion->horario_invi}}.</p>
                
                <p><b>Lugar:</b> {{$invitacion->lugar_invi}}</p>
               
                <p><b>Número contacto:</b> {{$invitacion->numero_invi}}</p>
                <input name="emisor" type="hidden" value="{{$invitacion->emisor}}">
                <input name="receptor" type="hidden" value="{{$invitacion->receptor}}">
                <div  style="text-align: right">
                {!! Form::open(['route' => ['estudiante.invitaciones.rechazar', $invitacion->id] , 'method' => 'POST']) !!}
                     <button class="btn btn-danger">CANCELAR</button>
                {!! Form::close() !!}
                </div>
              
                <br><hr>

             @endforeach
                
            </div>

        </div>
    </div>
    <div class="col-sm-4">
        <div class="card card-chart">
        <div class="card-header">
            <center><h4>INVITACIONES ACEPTADAS</h4></center>
            <hr>
        </div>
            <div class="card-body">
            @foreach( $aceptadas as $invitacion)
           
             <b>
             <h6  style="text-align: right; "> {{strtoupper($invitacion->nombre_equipo)}}</h6>
            
             </b>
                <p class="text-muted">{{$invitacion->descripcion_invi}}</p><br>
               
                <p><b>Horario:</b> {{$invitacion->horario_invi}}.</p>
                
                <p><b>Lugar:</b> {{$invitacion->lugar_invi}}</p>
               
                <p><b>Número contacto:</b> {{$invitacion->numero_invi}}</p>
                <input name="emisor" type="hidden" value="{{$invitacion->emisor}}">
                <input name="receptor" type="hidden" value="{{$invitacion->receptor}}">
                <div  style="text-align: right">
                {!! Form::open(['route' => ['estudiante.invitaciones.rechazar', $invitacion->id] , 'method' => 'POST']) !!}
                     <button class="btn btn-danger">CANCELAR</button>
                {!! Form::close() !!}
                </div>
              
                <br><hr>

             @endforeach
                
            </div>

        </div>
    </div>
      
        
   

 </div>




         
    </div>
</div>
<!-- CREAR EQUIPO -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>    
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

<div class="modal fade" id="crearInvitacion" tabindex="-1" role="dialog" aria-labelledby="crearInvitacionTitulo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="crearInvitacionTitulo">Crear Invitacion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
            </button>
        </div>
        <div class="modal-body">

            {!! Form::open(['route' => 'estudiante.invitaciones.store' , 'method' => 'POST']) !!}
            <div class="form-group">
            <label>Equipo emisor</label>
                <select name="id_e" class="form-control">
                    <option value="">Seleccione un equipo</option>
                    @foreach($equip as $equipo)
                    <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
            <label>Equipo destino</label>
                <select name="id_d" class="form-control">
                    <option value="">Seleccione un equipo</option>
                    @foreach($equipos as $equipo)
                    <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>horario</label>
                <input name="horario" id="horario" type="text" class="form-control" placeholder="ej: 28/10/2018 16:50" required>
            </div>
            <div class="form-group">
                <label>Nro de contacto</label>
                <input name="numero" id="numero" type="text" class="form-control" placeholder="ej: +569XXXXXXXX" required>
            </div>
            <div class="form-group">
                <label>lugar</label>
                <input name="lugar" id="lugar" type="text" class="form-control" placeholder="ej: multicanchas universidad" required>
            </div>
            <div class="form-group">
                <label>descripcion</label>
                <input name="descripcion" id="descripcion" type="text" class="form-control" placeholder="se jugara algo tranquilo etc ..." required>
            </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection
