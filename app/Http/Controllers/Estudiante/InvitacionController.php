<?php

namespace App\Http\Controllers\Estudiante;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Invitacion;
use App\Deporte;
use App\Equipo;
use App\Modalidad;
use App\Partido;
use Illuminate\Support\Facades\Auth;

class InvitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user()->id;
        $equipos = DB::select('SELECT equipos.id,
        equipos.nombre from equipos where equipos.user_id <> '.$user);
        $invitaciones = DB::select('SELECT 
        invitaciones.id as id,
        invitaciones.emisor_id as emisor,
        invitaciones.receptor_id as receptor, 
        equipos.nombre as nombre_equipo,
        invitaciones.descripcion as descripcion_invi,
        invitaciones.horario as horario_invi,
        invitaciones.lugar as lugar_invi,
        invitaciones.numero as numero_invi
        FROM invitaciones join equipos on invitaciones.emisor_id = equipos.id
        where invitaciones.tipo = "PRIVADA"
        and invitaciones.aceptado = "false"
        and invitaciones.receptor_id in (SELECT equipos.id from equipos where 
        equipos.user_id = '. $user.')');
        $deportes_sidebar = Deporte::all();
        return view('estudiante.invitaciones.index')
        ->with('equipos', $equipos)
        ->with('invitaciones', $invitaciones)
        ->with('deportes_sidebar', $deportes_sidebar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invitacion = new Invitacion;
        $invitacion->emisor_id =Auth::user()->id;
        $invitacion->receptor_id = $request->id;
        $invitacion->horario = $request->horario;
        $invitacion->lugar = $request->lugar;
        $invitacion->descripcion = $request->descripcion;
        $invitacion->numero = $request->numero;
        $invitacion->tipo = 'PRIVADA';
        $invitacion->save();
        return Redirect('e/invitacion/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function publico()
    {
        dd('hola');
        $user=Auth::user()->id;
        $equipos = DB::select('SELECT equipos.id,
        equipos.nombre from equipos where equipos.user_id <> '.$user);
        $invitaciones = DB::select('SELECT 
        invitaciones.id as id,
        invitaciones.emisor_id as emisor,
        invitaciones.receptor_id as receptor, 
        equipos.nombre as nombre_equipo,
        invitaciones.descripcion as descripcion_invi,
        invitaciones.horario as horario_invi,
        invitaciones.lugar as lugar_invi,
        invitaciones.numero as numero_invi
        FROM invitaciones join equipos on invitaciones.emisor_id = equipos.id
        where invitaciones.tipo = "PRIVADA"
        and invitaciones.aceptado = "false"
        and invitaciones.receptor_id in (SELECT equipos.id from equipos where 
        equipos.user_id = '. $user.')');
        $deportes_sidebar = Deporte::all();
        return view('estudiante.invitaciones.publico')
        ->with('equipos', $equipos)
        ->with('invitaciones', $invitaciones)
        ->with('deportes_sidebar', $deportes_sidebar);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function aceptar($id, Request $request)
    {
        $partidos = new Partido();
        $partidos->local_id = $request->emisor;
        $partidos->visita_id = $request->receptor;
        $partidos->puntos_local = 0;
        $partidos->puntos_visita = 0;
        $partidos->ganador_id = null;
        $partidos->save();
        $invi=Invitacion::find($id);
        $invi->aceptado = "true";
        $invi->save();  
        return Redirect('e/invitacion/');
    }

    
}
