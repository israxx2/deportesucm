<?php

namespace App\Http\Controllers\Mod;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Deporte;
use App\Torneo;
use App\User;
use App\Modalidad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $modalidad = Modalidad::orderBy('id', 'DESC')->get();
        $torneo = Torneo::orderBy('id', 'DESC')->get();
        foreach($torneo as $torneos){
            $torneos['participantes_actuales'] = $torneos->equipos->count();
        }
        return view('mod.torneos.index')
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('torneos', $torneo)
        ->with('modalidades', $modalidad);
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
        $deportes_sidebar = Deporte::all();
        return view('mod.torneos.index')
        ->with('deportes_sidebar', $deportes_sidebar);
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
        $user = User::find(Auth::User()->id);
        $equiposLiderados = $user->equiposLiderados
        ->where('modalidad_id', $torneo->modalidad_id);

        $equiposBaja = $equipos->where('user_id', $user->id);

        //SI ES DE TIPO LLAVE RETORNA ADEMÁS LAS FASES.
        if($torneo->tipo == 'llave')
        {
            $fases = 0;
            while($res <= $participantes)
            {
                $fases++;
                $res = pow(2,$fases);
            }
            return view('mod.torneos.torneos_show_2')
            ->with('deportes_sidebar', $deportes_sidebar)
            ->with('torneo', $torneo)
            ->with('i', $i)
            ->with('fases', $fases)
            ->with('equiposLiderados', $equiposLiderados)
            ->with('equiposBaja', $equiposBaja);
        } else
        {
            return view('mod.torneos.torneos_show_2')
            ->with('deportes_sidebar', $deportes_sidebar)
            ->with('torneo', $torneo)
            ->with('i',$i)
            ->with('equiposLiderados', $equiposLiderados)
            ->with('equiposBaja', $equiposBaja);
        }
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
    public function editarres(Request $request)
    {
        dd($request);
    }
    public function registrarenf(Request $request)
    {   
        $torneus = DB::select('SELECT 
        equipo_id from inscripcion where torneo_id = '.$request->torneo);     

        $torneo = DB::select('SELECT 
        DISTINCT
        inscripcion.equipo_id,
        equipos.nombre,
        inscripcion.torneo_id
        from inscripcion join equipos on inscripcion.equipo_id =equipos.id
        join torneos on inscripcion.torneo_id = torneos.id
        join enfrentamientos on enfrentamientos.torneo_id = torneos.id
        where torneos.id= '.$request->torneo. ' and enfrentamientos.fase = '.$request->fase);
        $deportes_sidebar = Deporte::all();

        return view('mod.torneos.registrarenf')
        ->with('deportes_sidebar', $deportes_sidebar)
        ->with('torneo',$torneo);

    }
    public function guardar(Request $request)
    {   
        dd($request);
    }
}
