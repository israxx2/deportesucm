<?php

namespace App\Http\Controllers\Mod;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Deporte;
use App\Torneo;
use App\Modalidad;
use Illuminate\Support\Facades\DB;

class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deportes_sidebar = Deporte::all();
        $torneos = Modalidad::orderBy('id', 'DESC')->get();
        return view('mod.torneos.index')
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('torneos', $torneos);
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
        $torneo = new Torneo;
        $torneo->nombre = $request->n_torneo;
        $torneo->descripcion = $request->descripcion;
        $torneo->fecha = $request->fecha;
        $torneo->min = $request->min;
        $torneo->max = $request->max;
        $torneo->tipo = $request->tipo_t;
        $torneo->modalidad_id=$request->modalidad;
        $torneo->fase_actual = 1;
        $torneo->cerrado = 0;
        $torneo->finalizado = 0;
        $torneo->save();
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
}
