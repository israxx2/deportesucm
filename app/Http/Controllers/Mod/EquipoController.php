<?php

namespace App\Http\Controllers\Mod;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Deporte;
use App\Equipo;
class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deportes_sidebar = Deporte::all();
        $equipos = DB::select('SELECT equipos.id,
        equipos.nombre, 
        equipos.descripcion, 
        equipos.victorias_totales,
        equipos.derrotas_totales,
        users.nombres as nombre_u,
        users.apellidos as apellido_u FROM equipos join users
        on equipos.user_id = users.id');
        return view('mod.equipos.index')
        ->with('equipos', $equipos)
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jugadores = DB::select('SELECT users.nombres,
        users.apellidos,
        users.ciudad,
        users.nick
        from users join cuenta on users.id = cuenta.user_id
        join equipos on cuenta.equipo_id = equipos.id
        where equipos.id = '.$id);

        $equipos = DB::select('SELECT equipos.id,
        equipos.nombre, 
        equipos.descripcion, 
        equipos.victorias_totales,
        equipos.derrotas_totales,
        users.nombres as nombre_u,
        users.apellidos as apellido_u FROM equipos join users
        on equipos.user_id = users.id where equipos.id = '.$id);
        return view('mod.equipos.equiposhow')
        ->with('jugadores',$jugadores)
        ->with('equipos', $equipos);
        dd($equipos);
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

    public function filtro(Request $request)
    {

        $deportes_sidebar = Deporte::all();
        if($request->filtro){
            $equipos = DB::select('SELECT equipos.nombre, 
            equipos.descripcion, 
            equipos.victorias_totales,
            equipos.derrotas_totales,
            users.nombres as nombre_u,
            users.apellidos as apellido_u FROM equipos join users
            on equipos.user_id = users.id
            where equipos.nombre = "'.$request->filtro.'" or users.nombres = "'.$request->filtro.'"
            or users.apellidos = "'.$request->filtro.'"');
        }
        else{
            $equipos = DB::select('SELECT equipos.nombre, 
            equipos.descripcion, 
            equipos.victorias_totales,
            equipos.derrotas_totales,
            users.nombres as nombre_u,
            users.apellidos as apellido_u FROM equipos join users
            on equipos.user_id = users.id');
        }
        return view('mod.equipos.index')
        ->with('equipos', $equipos)
        ->with('deportes_sidebar', $deportes_sidebar);
    }
}
