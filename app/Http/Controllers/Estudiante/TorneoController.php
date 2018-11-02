<?php

namespace App\Http\Controllers\Estudiante;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Deporte;
use App\User;
use App\Torneo;
use App\Equipo;
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
            return view('estudiante.torneos_show_2')
            ->with('deportes_sidebar', $deportes_sidebar)
            ->with('torneo', $torneo)
            ->with('i', $i)
            ->with('fases', $fases)
            ->with('equiposLiderados', $equiposLiderados)
            ->with('equiposBaja', $equiposBaja);
        } else
        {
            return view('estudiante.torneos_show_2')
            ->with('deportes_sidebar', $deportes_sidebar)
            ->with('torneo', $torneo)
            ->with('i',$i)
            ->with('equiposLiderados', $equiposLiderados)
            ->with('equiposBaja', $equiposBaja);
        }
    }

    public function ingresar(Request $request)
    {
        //no tiene que estar en otro torneo
        //si el torneo está cerrado no se puede entrar
        //si está fuera de fecha tampoco puede entrar
        //si ya pertenece al torneo no puede ingresar denuevo
        //si no se ingresa ningun equipo que retorne a la pagina sin hacer nada
        //si el torneo esta lleno no puede ingresar



        if($request->equipoLiderado_id == null)
        {
            dd("no ha ingresado ningun equipo. Retorne a la página anterior.");
            return Redirect(route('estudiante.torneos.show', ['id' => $request->torneo_id]));
        }else
        {
            $torneo = Torneo::find($request->torneo_id);
            $equipoLiderado = Equipo::find($request->equipoLiderado_id);
            $torneosEquipoLiderado = $equipoLiderado->torneos;
            $consulta_1 = $torneosEquipoLiderado->where('modalidad_id', $equipoLiderado->modalidad_id);
            $consulta_2 = $consulta_1->where('finalizado', 1);

            //si el torneo está cerrado no se puede entrar
            if($torneo->cerrado){
                flash('el torneo está cerrado')->error();
            }

            //si ya pertenece al torneo no puede volver a ingresar
            elseif(count($equipoLiderado->torneos->where('id', $torneo->id)) > 0)
            {
                flash('Ya pertenece al torneo')->error();
            }
            //si está fuera de fecha no puede puede entrar
            elseif(strtotime($torneo->fecha) < time())
            {
                flash('está fuera de plazo')->error();
            }

            //si el torneo esta lleno no puede ingresar
            elseif($torneo->max <= count($torneo->equipos))
            {
                flash('el torneo está lleno')->error();
            }
            //si ya está inscrito en otro torneo de la misma modalidad no puede ingresar
            elseif(count($consulta_2)>0)
            {
                flash('ya pertenece a un torneo')->error();
            }
            else{
                flash('Se ha inscrito al torneo con éxito!')->success();
                $torneo->equipos()->attach($equipoLiderado->id);
            }

            return Redirect(route('estudiante.torneos.show', ['id' => $torneo->id]));
        }

    }

    public function baja(Request $request)
    {
        if($request->equipoBaja_id == null)
        {
            flash('No existe o no has seleccionado ningun equipo')->error();
        } else
        {
            $torneo = Torneo::find($request->torneo_id);

            //si el torneo está cerrado no puede salir
            if($torneo->cerrado == 1){
                flash('El torneo está cerrado, no puedes salirte ahora')->error();
            } else{
                $torneo->equipos()->detach($request->equipoBaja_id);
                flash('Se ha dado de baja con éxito')->success();
            }
        }
        return Redirect(route('estudiante.torneos.show', ['id' => $request->torneo_id]));
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
