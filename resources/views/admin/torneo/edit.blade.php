@extends('layouts.app')

@section('title', 'Editar TORNEO')

@section('content')

{!! Form::open(['route' => ['admin.torneo.update', $torneo->id] , 'method' => 'PUT']) !!}
    
  

    <div class="form-group">
            <label>Nombre Del Torneo</label>
              <input type="text" name="n_torneo" class="form-control" value="{{$torneo->nombre}}"> 
        </div>
        <div class="form-group">
            <label>Descripcion</label>
                <textarea name="descripcion" class="form-control" rows="3" value="{{$torneo->descripcion}}"> </textarea>
        </div>
        <div class="form-group">
            <label>Fecha</label>
                <input type="text" name="fecha" class="form-control" value="{{$torneo->fecha}}"> 
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Min Jugadores</label>
                        <input type="number" name="min" class="form-control" value="{{$torneo->min}}"> 
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Max Jugadores</label>
                        <input type="number" name="max" class="form-control" value="{{$torneo->max}}"> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Tipo Torneo</label>
                    <select name="tipo_t">
                        <option value="llave">Llave</option>
                        <option value="grupo">Grupo</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">  
                    <label>Modalidad</label>
                    <select name="modalidad">
                    @foreach($modalidades as $modalidad)
                        <option value="{{$modalidad->id}}">{{ $modalidad->deporte->nombre }},{{ $modalidad->nombre }}</option>
                    @endforeach
                    </select>
            </div>
          </div>
            <div class="row">
                
                <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
           
</div>
</div>
  
  {!! Form::close() !!}

@endsection
