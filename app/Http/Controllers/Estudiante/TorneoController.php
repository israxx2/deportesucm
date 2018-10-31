<?php

namespace App\Http\Controllers\Estudiante;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Deporte;
use App\Torneo;

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
        $torneos = Torneo::orderBy('id', 'DESC')->get();

        foreach($torneos as $torneo){
            $torneo['participantes_actuales'] = $torneo->equipos->count();
        }

        return view('estudiante.torneos')
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
        $torneo = Torneo::find($id);
        $deportes_sidebar = Deporte::all();
        $i = 0;
        $equipos = $torneo->equipos;

        if(time($reserva->fecha_reserva) > time())
        {
            // hacer reserva
        }
        return view('reserva.index');


        // 1540577180
        // 1540577190
        return view('estudiante.torneos_show')
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('torneo', $torneo)
        ->with('i',$i);
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
