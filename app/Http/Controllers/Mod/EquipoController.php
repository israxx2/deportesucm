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
        $equipos = DB::select('SELECT equipos.nombre, 
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

    public function filtro(Request $request)
    {
        $deportes_sidebar = Deporte::all();
        $equipos = DB::select('SELECT equipos.nombre, 
        equipos.descripcion, 
        equipos.victorias_totales,
        equipos.derrotas_totales,
        users.nombres as nombre_u,
        users.apellidos as apellido_u FROM equipos join users
        on equipos.user_id = users.id
        where equipos.nombre = "'.$request->filtro.'" or users.nombres = "'.$request->filtro.'"
        or users.apellidos = "'.$request->filtro.'"');

        return view('mod.equipos.index')
        ->with('equipos', $equipos)
        ->with('deportes_sidebar', $deportes_sidebar);
    }
}
