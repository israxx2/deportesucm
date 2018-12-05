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
use App\Carrera;
use Illuminate\Support\Collection as Collection;

class EstudianteController extends Controller
{
    public function __construct(){
        $this->middleware('usuarioAlumno',['only'=>['inicio']]);
        $this->middleware('usuarioAlumno',['only'=>['perfil']]);
        $this->middleware('usuarioAlumno',['only'=>['deporte_show']]);
        $this->middleware('usuarioAlumno',['only'=>['modalidad_show']]);
        $this->middleware('usuarioAlumno',['only'=>['equipo_store']]);
        $this->middleware('usuarioAlumno',['only'=>['equipos']]);
        $this->middleware('usuarioAlumno',['only'=>['equipo_show']]);
        $this->middleware('usuarioAlumno',['only'=>['partidos']]);
        $this->middleware('usuarioAlumno',['only'=>['filtro_deporte']]);
        $this->middleware('usuarioAlumno',['only'=>['registrar_resultado_index']]);
        $this->middleware('usuarioAlumno',['only'=>['registrar_resultado_store']]);
        $this->middleware('usuarioAlumno',['only'=>['reclamo']]);
        $this->middleware('usuarioAlumno',['only'=>['solicitud_equipo']]);
        $this->middleware('usuarioAlumno',['only'=>['abandonar_equipo']]);
        $this->middleware('usuarioAlumno',['only'=>['show_all_equipos']]);

    }
    public function inicio(){
        $deportes_sidebar = Deporte::all();

        return view('estudiante.inicio')
        ->with('deportes_sidebar', $deportes_sidebar);
    }

    public function perfil(){
        $historial = collect([]);
        $deportes_sidebar = Deporte::all();
        $user = User::find(Auth::User()->id);
        foreach($user->equipos as $equipo){
            foreach($equipo->partidosLocal as $partido){
                $equipoLocal = $partido->equipoLocal;
                $equipoVisita = $partido->equipoVisita;
                $modalidad = $equipo->modalidad;
                $deporte = $modalidad->deporte;
                $partido['deporte'] = $deporte->nombre;
                $partido['modalidad'] = $modalidad->nombre;
                $partido['equipoLocal'] = $equipoLocal->nombre;
                $partido['equipoVisita'] = $equipoVisita->nombre;
                $historial->push($partido);
            }
            foreach($equipo->partidosVisita as $partido){
                $equipoLocal = $partido->equipoLocal;
                $equipoVisita = $partido->equipoVisita;
                $modalidad = $equipo->modalidad;
                $deporte = $modalidad->deporte;
                $partido['deporte'] = $deporte->nombre;
                $partido['modalidad'] = $modalidad->nombre;
                $partido['equipoLocal'] = $equipoLocal->nombre;
                $partido['equipoVisita'] = $equipoVisita->nombre;
                $historial->push($partido);
            }
        }
        $historial = $historial->sortBy('created_at');
        $a = $historial->splice(5);

        return view('estudiante.perfil')
        ->with('user', $user)
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('historial', $historial);
    }

    public function deporte_show($id){

        $deportes_sidebar = Deporte::all();
        $deporte = Deporte::find($id);
        $invitaciones = Invitacion::all()
        ->where('receptor_id', null);

        foreach($invitaciones as $invitacion){

            if($invitacion->equipoEmisor->modalidad->deporte->id != $deporte->id)
            {
                $invitaciones->pull($invitacion->id - 1);
            }
        }
        return view('estudiante.deporte_show')
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('invitaciones', $invitaciones)
        ->with('deporte', $deporte);
    }

    public function deporte_show_modalidad(Request $request){
        $modalidad = Modalidad::find($request->id);
        $deporte = Deporte::find($modalidad->deporte->id);
        $invitaciones = Invitacion::all()
        ->where('receptor_id', null);

        if($request->id == 'null'){

            foreach($invitaciones as $invitacion){

                if($invitacion->equipoEmisor->modalidad->deporte->id != $deporte->id)
                {
                    $invitaciones->pull($invitacion->id - 1);
                }
            }
        } else {
            foreach($invitaciones as $invitacion){

                if($invitacion->equipoEmisor->modalidad->deporte->id != $deporte->id || $invitacion->equipoEmisor->modalidad->id != $request->id)
                {
                    $invitaciones->pull($invitacion->id - 1);
                }
            }
        }

        //$a = response()->json(['success' => 'Pasó la prueba :3']);

        return view('estudiante.deporte_show2',['invitaciones'=>$invitaciones])->render();
        //->with('users', $users);
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
        ->with('modalidad', $modalidad)
        ->with('deporte', $deportes_sidebar)
        ->with('ranking',$ranking);
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

    public function imagen(Request $request){

        // ruta de las imagenes guardadas
        $ruta = public_path().'/estudiante/img_perfil';

        // recogida del form
        $imagenOriginal = $request->file('avatar');
        $imagen = time() . '.' . $imagenOriginal->getClientOriginalExtension();
        $imagenOriginal->move($ruta, $imagen);

        $user = User::find(Auth::User()->id);
        $user->avatar = time() . '.' . $imagenOriginal->getClientOriginalExtension();
        $user->save();
        return Redirect('e/perfil');
    }

    public function imagen_delete(){
        $user = User::find(Auth::User()->id);
        $user->avatar = "default.png";
        $user->save();
        return Redirect('e/perfil');
    }

    public function descripcion(Request $request){
        $user = User::find(Auth::User()->id);
        $user->descripcion = $request->descripcion;
        $user->save();
        return Redirect('e/perfil');
    }

    public function nick(Request $request){
        $user = User::find(Auth::User()->id);
        $user->nick = $request->nick;
        $user->save();
        return Redirect('e/perfil');
    }

    public function equipos(){

        $user= User::find(Auth::user()->id);
        $equipos = $user->equipos;
        $deportes_sidebar = Deporte::all();
        $deportes = $deportes_sidebar;
        $equi = DB::select('SELECT equipos.id, equipos.nombre
        FROM equipos where user_id = '.Auth::user()->id);
        return view('estudiante.equipos')
        ->with('user', $user)
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('deportes', $deportes)
        ->with('equipos', $equipos)
        ->with('equi', $equi);
    }

    public function eq(Request $request){

        $user= User::find(Auth::user()->id);
        $equipos = $user->equipos;
        $deportes_sidebar = Deporte::all();
        $deportes = $deportes_sidebar;
        $aux= $request->id;
        $equi = DB::select('SELECT equipos.id, equipos.nombre
        FROM equipos where user_id = '.Auth::user()->id);
        $miembro_p= DB::select('SELECT users.id as id_usuario, users.nombres as nombre_us, users.apellidos as apellido_us
        FROM `cuenta` join users ON users.id= cuenta.user_id
        where cuenta.equipo_id='.$aux.'
        AND cuenta.estado="pendiente" ');
        return view('estudiante.equipos2')
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('deportes', $deportes)
        ->with('miembro_p', $miembro_p)
        ->with('equipos', $equipos)
        ->with('aux', $aux)
        ->with('equi', $equi);
    }

    public function equipo_show($id){
        $deportes_sidebar = Deporte::all();
        $equipo= Equipo::find($id);

        $is_miembro= DB::select('SELECT users.nombres, users.apellidos
        FROM `cuenta` join users ON users.id= cuenta.user_id
        where cuenta.equipo_id='.$id.'
        AND cuenta.user_id='.Auth::user()->id.'
        AND cuenta.estado="aceptada" ');

        $is_enviada= DB::select('SELECT users.nombres, users.apellidos
        FROM `cuenta` join users ON users.id= cuenta.user_id
        where cuenta.equipo_id='.$id.'
        AND cuenta.user_id='.Auth::user()->id.'
        AND cuenta.estado="pendiente" ');



        $miembros= DB::select('SELECT users.id, users.nombres, users.apellidos
        FROM `cuenta` join users ON users.id= cuenta.user_id
        where cuenta.equipo_id='.$id.'
        AND cuenta.estado="aceptada" ');


        return view('estudiante.equipo_show')
        ->with('equipo', $equipo)
        ->with('is_miembro', $is_miembro)
        ->with('is_enviada', $is_enviada)
        ->with('miembros', $miembros)
        ->with('deportes_sidebar', $deportes_sidebar);
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


        $equipo=$request->equipo_id;
        $user_id=Auth::user()->id;
        $user= User::find($user_id);
        $user->equipos()->attach($equipo, ['user_id'=>$user_id,'estado' => 'pendiente']);

        $deportes_sidebar = Deporte::all();
        $equipo2= Equipo::find($equipo);

        return redirect('e/equipos/'.$request->equipo_id)
        ->with('equipo', $equipo2)
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('message', 'Solicitud Enviada con exito!');

    }

    public function abandonar_equipo(Request $request){
        $equipo=$request->equipo_id;
        $user_id=Auth::user()->id;
        $equipo= Equipo::find($equipo);
        $equipo->users()->detach($user_id);

        $deportes_sidebar = Deporte::all();
        $equipo2= Equipo::find($equipo);

        return redirect('e/equipos/'.$request->equipo_id)
        ->with('equipo', $equipo2)
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('alert', 'Abdandonaste el equipo con exito!');

    }


    public function comunidad(){
        $users = User::orderBy('apellidos', 'ASC')
        ->where('tipo','estudiante')
        ->paginate(15);
        $deportes_sidebar = Deporte::all();
        $carreras = Carrera::all();
        return view('estudiante.comunidad')
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('users', $users)
        ->with('carreras', $carreras);
    }

    public function comunidad_carreras(Request $request)
    {
        //retorna todos los usuarios
        //ordenados por apellido

        if($request->id == 'null'){
            $users = User::orderBy('apellidos', 'ASC')
            ->get();
        } else {
            $users = User::orderBy('apellidos', 'ASC')
            ->where([
                ['carrera_id', $request->id],
                ['tipo', 'estudiante']
            ])
            ->get();
        }

        //$a = response()->json(['success' => 'Pasó la prueba :3']);

        return view('estudiante.comunidad_filtro1',['users'=>$users])->render();
        //->with('users', $users);
    }

    public function perfil_show($id){
        $historial = collect([]);
        $deportes_sidebar = Deporte::all();
        $user = User::find(Auth::User()->id);
        $deportes = Deporte::all();

        if(Auth::User()->id == $id){
            return Redirect('e/perfil');
        }
        else{
            return view('estudiante.perfil_show')
            ->with('user', $user)
            ->with('deportes', $deportes)
            ->with('deportes_sidebar', $deportes_sidebar);
        }
        $historial = $historial->sortBy('created_at');
        $a = $historial->splice(5);

        return view('estudiante.perfil_show')
        ->with('user', $user)
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('historial', $historial);
    }

    public function aceptar_soli(Request $request){
        $us=user::find($request->id_us);
        $equipos=equipo::find($request->id_eq);
        $equipos->users()->detach($request->id_us);
        $us->equipos()->attach($request->id_eq, ['user_id'=>$request->id_us,'estado' => 'aceptada']);
        return redirect('e/equipos');
    }


    public function rechazar_soli(Request $request){
        $equipo=$request->id_eq;
        $equipo= Equipo::find($equipo);
        $equipo->users()->detach($request->id_us);
        return redirect('e/equipos');

    }

    public function eliminar_jugador(Request $request){
        $equipo=$request->id_eq;
        $equipo= Equipo::find($equipo);
        $equipo->users()->detach($request->id_ju);
        return redirect('e/equipos');

    }
    public function filtro(Request $request)
    {
        $deportes_sidebar = Deporte::all();
        $deportes= $deportes_sidebar;
        if($request->filtro){
            $equipos = DB::select('SELECT equipos.nombre, 
            equipos.descripcion, 
            equipos.victorias_totales,
            equipos.derrotas_totales,
            users.nombres as nombre_u,
            users.apellidos as apellido_u FROM equipos join users
            on equipos.user_id = users.id
            where equipos.nombre = "'.$request->filtro.'" or users.nombres = "'.$request->filtro.'"
            or users.apellidos = "'.$request->filtro.'" and users.id= '.Auth::user()->id);
        }
        else{
            $equipos = DB::select('SELECT equipos.nombre, 
            equipos.descripcion, 
            equipos.victorias_totales,
            equipos.derrotas_totales,
            users.nombres as nombre_u,
            users.apellidos as apellido_u FROM equipos join users
            on equipos.user_id = users.id and users.id= '.Auth::user()->id);
        }
        return view('estudiante.efiltro')
        ->with('equipos', $equipos)
        ->with('deportes', $deportes)
        ->with('deportes_sidebar', $deportes_sidebar);
    }

}
