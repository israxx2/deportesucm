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
        $participantes = count($torneo->equipos);
        $res = 0;

        //SI ES DE TIPO LLAVE RETORNA ADEMÁS LAS FASES.
        if($torneo->tipo == 'llave')
        {
            $fases = 0;
            while($res <= $participantes)
            {
                $fases++;
                $res = pow(2,$fases);
        }

            return('estudiante.torneos_show')
            ->with('deportes_sidebar', $deportes_sidebar)
            ->with('torneo', $torneo)
            ->with('i',$i)
            ->with('fases', $fases);

        } else
        {
        return view('estudiante.torneos_show')
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('torneo', $torneo)
        ->with('i',$i);
    }




        // if(time($reserva->fecha_reserva) > time())
        // {
        //     // hacer reserva
        // }


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
