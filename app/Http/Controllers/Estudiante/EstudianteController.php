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
use App\Reclamo;
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
        $equipo = Equipo::all();
        $modalidad = Modalidad::where('deporte_id', $id)->get();



        return view('estudiante.deporte_show')
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('deporte', $deporte)
        ->With('equipo',$equipo)
        ->with('modalidad',$modalidad);
    }


    public function modalidad_show($id){

        $modalidad = Modalidad::find($id);
        $deportes_sidebar = Deporte::all();
        $ranking = $modalidad->equipos->sortBy('victorias_totales');
        $i=1;

        foreach($ranking as $equipo){
            $equipo['puesto']=$i;
            $i=$i+1;

        }

        return view('estudiante.modalidad_show')
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('ranking',$ranking)
        ->with('modalidad', $modalidad);
    }



    public function equipo_store(Request $request){
        $equipo = new Equipo();
        $equipo->nombre = strtoupper($request->nombre);
        $equipo->modalidad_id = (int)$request->modalidad;
        $equipo->user_id = Auth::User()->id;
        $equipo->conformado = 0;
        $equipo->save();

        $equipo->users()->attach(Auth::User()->id);

        return Redirect(route('estudiante.equipos.show', ['id' => $equipo->id]));
    }

    public function equipos(){

        $user= User::find(Auth::user()->id);
        $equipos = $user->equipos;
        $deportes_sidebar = Deporte::all();

        $deportes = $deportes_sidebar;
        return view('estudiante.equipos')
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('deportes', $deportes)
        ->with('equipos', $equipos);
    }

    public function equipo_show($id){
        $deportes_sidebar = Deporte::all();
        $equipo = Equipo::find($id);

        return view('estudiante.equipo_show')
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('equipo',$equipo);
    }

    public function partidos(){
        $deporte=Deporte::all();
        $modalidad=Modalidad::all();
        $deportes_sidebar = Deporte::all();
        $user=Auth::user()->id;

        $resultado = DB::select('SELECT

            partidos.id as id,
            deportes.imagen as imagen,
            users.id as id_user,
            modalidades.id as id_modalidad,
            deportes.nombre as nombre_deporte,
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
            join deportes ON deportes.id = modalidades.deporte_id
            join partidos ON partidos.local_id =equipos.id or partidos.visita_id = equipos.id
            where users.id='. $user.'
            ORDER BY partidos.created_at DESC');

       for($i = 0; $i < sizeof($resultado); $i++)
       {
           
        $n_local= Equipo::find($resultado[$i]->local_id);
        $n_visita= Equipo::find($resultado[$i]->visita_id);

         $resultado[$i]->local_id = strtoupper($n_local->nombre);
         $resultado[$i]->visita_id = strtoupper($n_visita->nombre);
       }
      


        $contador = DB::select('SELECT *
        from invitaciones join equipos ON invitaciones.receptor_id = equipos.id
        join modalidades ON modalidades.id = equipos.modalidad_id
        join deportes ON deportes.id = modalidades.deporte_id
        join users ON users.id = equipos.user_id
        where users.id='. $user.'  AND invitaciones.deleted_at is NULL');

        return view('estudiante.partidos')
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('resultado', $resultado)
        ->with('deporte', $deporte)
        ->with('contador', $contador);
    }

    public function filtro_deporte(Request $request)
    {
        $user=Auth::user()->id;

        if($request->id == 'null'){


            $resultado = DB::select('SELECT

            partidos.id as id,
            deportes.imagen as imagen,
            users.id as id_user,
            modalidades.id as id_modalidad,
            deportes.nombre as nombre_deporte,
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
            join deportes ON deportes.id = modalidades.deporte_id
            join partidos ON partidos.local_id =equipos.id or partidos.visita_id = equipos.id
            where users.id='. $user.'
            ORDER BY partidos.created_at DESC');

        } else {


            $resultado = DB::select('SELECT

            partidos.id as id,
            users.id as id_user,
            deportes.imagen as imagen,
            modalidades.id as id_modalidad,
            deportes.nombre as nombre_deporte,
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
            join deportes ON deportes.id = modalidades.deporte_id
            join partidos ON partidos.local_id =equipos.id or partidos.visita_id = equipos.id
            where users.id='. $user.'
            AND deportes.id ='.$request->id.'
            ORDER BY partidos.created_at DESC');

      

        }

        for($i = 0; $i < sizeof($resultado); $i++)
        {
            
         $n_local= Equipo::find($resultado[$i]->local_id);
         $n_visita= Equipo::find($resultado[$i]->visita_id);
 
          $resultado[$i]->local_id = strtoupper($n_local->nombre);
          $resultado[$i]->visita_id = strtoupper($n_visita->nombre);
        }
        return view('estudiante.filtro_mis_partidos',['resultado'=>$resultado])->render();


    }

    public function registrar_resultado_index(){
        $user=Auth::user()->id;

        $deportes_sidebar = Deporte::all();

        $resultado = DB::select('SELECT
        invitaciones.id as invitacion_id,
        deportes.nombre as nombre,
        invitaciones.lugar as lugar,
        invitaciones.emisor_id as emisor_id,
        invitaciones.receptor_id as receptor_id

        from invitaciones join equipos ON invitaciones.receptor_id = equipos.id
        join modalidades ON modalidades.id = equipos.modalidad_id
        join deportes ON deportes.id = modalidades.deporte_id
        join users ON users.id = equipos.user_id
        where users.id='. $user.'  AND invitaciones.deleted_at is NULL');


        return view('estudiante.registrar_resultado_index')
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('resultado', $resultado);

    }

    public function registrar_resultado_store(Request $request){
        
        $Invitacion = Invitacion::find($request->invitacion_id);     
        $Invitacion->delete();
        $Invitacion->save();

        $partido = new Partido();
        $partido->local_id = $request->id_local; //este dato debe venir de la invitacion
        $partido->visita_id = $request->id_visita;//este dato debe venir de la invitacion
        $partido->puntos_local = $request->puntos_local;
        $partido->puntos_visita = $request->puntos_visita;

        if ($request->puntos_local > $request->puntos_visita ) {

            $partido->ganador_id = $request->id_local;
        }
        else  {
            $partido->ganador_id = $request->id_visita;
        }

        $partido->save();

        return Redirect('e/partidos/');


    }

    public function reclamo(Request $request){

        $reclamo = new Reclamo();
        $reclamo->descripcion = $request->Descripcion ;
        $reclamo->partido_id = $request->partido_id ;
        $reclamo->save();
        return Redirect('e/partidos/')->with('message', 'Reclamo Enviado con exito!');;
    }

    public function solicitud_equipo(Request $request){
        $request->equipo_id;
        $request->user_id;
        
        
        return Redirect('e/partidos/');
    }


    public function filtro_equipo(Request $modalidad)
    {
      
        dd($modalidad);
        $deporte=1;

        if($modalidad->id == 'null'){

            $equipo = DB::select('SELECT nombre, descripcion FROM equipos where modalidad_id = '.$modalidad); 

        }
        else{
            $equipo='null';
        }
        return view('estudiante.filtro_equipo',['equipo'=>$equipo])->render()->with('deporte',$deporte);



    }


}
