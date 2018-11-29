<?php

namespace App\Http\Controllers\Mod;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Inscripcion;

class SolicitudController extends Controller
{
    public function index()
    {
        $inscripcion = DB::select('SELECT inscripcion.id as id, equipos.nombre as nombre_equipo,
        torneos.nombre as nombre_torneo 
        FROM `equipos` join inscripcion ON  equipos.id =inscripcion.equipo_id
        join torneos ON torneos.id=inscripcion.torneo_id');

        return view('mod.solicitud.index')->with('inscripcion', $inscripcion);
    }

}
