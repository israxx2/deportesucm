<?php

namespace App\Http\Controllers\Estudiante;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Equipo;
use App\Invitacion;
use App\Deporte;
use App\Modalidad;
use App\Partido;
use Illuminate\Support\Collection as Collection;

class EstudianteController extends Controller
{
    public function inicio(){
        $deportes_sidebar = Deporte::all();

        return view('estudiante.inicio')
        ->with('deportes_sidebar', $deportes_sidebar);
    }

    public function perfil(){

        $deportes_sidebar = Deporte::all();

        return view('estudiante.perfil')
        ->with('deportes_sidebar', $deportes_sidebar);
    }

    public function deporte_show($id){

        $deportes_sidebar = Deporte::all();
        $deporte = Deporte::find($id);
        $invitaciones = Invitacion::withTrashed()->orderBy('id', 'ASC')
        ->where('tipo','PUBLICA')
        ->get();
        return view('estudiante.deporte_show')
        ->with('invitaciones',$invitaciones)
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('deporte', $deporte);
    }

    public function modalidad_show($id){

        $modalidad = Modalidad::find($id);
        $deportes_sidebar = Deporte::all();
        $deporte = Deporte::find($modalidad->deporte->id);

        return view('estudiante.modalidad_show')
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('deporte', $deporte);
    }

    public function equipo_store(Request $request){
        $equipo = new Equipo();
        $equipo->nombre = strtoupper($request->nombre);
        $equipo->modalidad_id = (int)$request->modalidad;
        $equipo->user_id = Auth::User()->id;
        $equipo->conformado = 0;
        $equipo->save();

        return Redirect(route('estudiante.equipos.show', ['id' => $equipo->id]));
    }

    public function equipos(){

        $user=Auth::user()->id;
        $equipos=Equipo::where('user_id','=',$user)->get();
        $deportes_sidebar = Deporte::all();

        return view('estudiante.equipos')
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('equipos', $equipos);
    }

    public function equipo_show($id){
        $deportes_sidebar = Deporte::all();

        return view('estudiante.equipo_show')
        ->with('deportes_sidebar', $deportes_sidebar);
    }

    public function partidos(){
        $modalidad=Modalidad::all();
        $deportes_sidebar = Deporte::all();
        $user=Auth::user()->id;

        $resultado = DB::select('SELECT
        partidos.id as id,
        modalidades.id as id_modalidad,
        modalidades.nombre as nombre,
        equipos.id as equipo_id,
        equipos.nombre as equipo_nombre,
        partidos.local_id,
        partidos.visita_id,
        partidos.ganador_id,
        partidos.puntos_local,
        partidos.puntos_visita

        from users join cuenta ON users.id = cuenta.user_id
        join equipos ON cuenta.equipo_id = equipos.id 
        join modalidades ON equipos.modalidad_id = modalidades.id          
        join partidos ON partidos.local_id =equipos.id or partidos.visita_id = equipos.id
        where users.id='. $user);

        //cambiar por nombres de lo tim
        $new_data = Collection::make();
        foreach ($resultado as $key => $value) {
           $local_id=$value->local_id;
           $visita_id=$value->visita_id;
           $local=Equipo::select('nombre')->where('id',$local_id)->get()->toarray();
           $visita=Equipo::select('nombre')->where('id',$visita_id)->get()->toarray(); 
           $local=$local[0]['nombre'];
           $visita=$visita[0]['nombre'];

           $new_data = $new_data->concat([
            'Partido' => [
                'local' =>$local,
                'visita' =>$visita
            ]]);
        }
 

        
       


        return view('estudiante.partidos')
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('resultado', $resultado)
        ->with('modalidad', $modalidad);
    }

    public function filtro_modalidad(Request $request)
    {   
        $user=Auth::user()->id;
      
        if($request->id == 'null'){
             

            $resultado = DB::select('SELECT
            partidos.id as id,
            modalidades.id as id_modalidad,
            modalidades.nombre as nombre,
            equipos.id as equipo_id,
            equipos.nombre as equipo_nombre,
            partidos.local_id,
            partidos.visita_id,
            partidos.ganador_id,
            partidos.puntos_local,
            partidos.puntos_visita
    
            from users join cuenta ON users.id = cuenta.user_id
            join equipos ON cuenta.equipo_id = equipos.id 
            join modalidades ON equipos.modalidad_id = modalidades.id          
            join partidos ON partidos.local_id =equipos.id or partidos.visita_id = equipos.id
            where users.id='. $user);

        } else {
            
            
            $resultado = DB::select('SELECT
            partidos.id as id,
            modalidades.id as id_modalidad,
            modalidades.nombre as nombre,
            equipos.id as equipo_id,
            equipos.nombre as equipo_nombre,
            partidos.local_id,
            partidos.visita_id,
            partidos.ganador_id,
            partidos.puntos_local,
            partidos.puntos_visita

            from users join cuenta ON users.id = cuenta.user_id
            join equipos ON cuenta.equipo_id = equipos.id 
            join modalidades ON equipos.modalidad_id = modalidades.id          
            join partidos ON partidos.local_id =equipos.id or partidos.visita_id = equipos.id
            where users.id='. $user.'
            AND modalidades.id ='.$request->id );
            
           
        }

        return view('estudiante.filtro_mis_partidos',['resultado'=>$resultado])->render();

 
    }

    public function registrar_resultado(){
        $deportes_sidebar = Deporte::all();
        $equipos = Equipo::all();
        return view('estudiante.registrar_resultado')
        ->with(compact('partido','equipos'))
        ->with('deportes_sidebar', $deportes_sidebar);
    
    }

    public function registrar_resultado_store(Request $request){

        $partido = new Partido();
        $partido->local_id = $request->local; //este dato debe venir de la invitacion
        $partido->visita_id = $request->visita;//este dato debe venir de la invitacion
        $partido->puntos_local = $request->puntos_local;
        $partido->puntos_visita = $request->puntos_visita;
        $partido->ganador_id = $request->ganador;

        $partido->save();

        return Redirect('e/partidos/');


    }


}
