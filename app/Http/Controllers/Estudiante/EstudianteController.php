<?php

namespace App\Http\Controllers\Estudiante;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Equipo;
use App\Deporte;

class EstudianteController extends Controller
{
    public function inicio(){
        $deportes = Deporte::all();

        return view('estudiante.inicio')
        ->with('deportes', $deportes);
    }

    public function perfil(){

        $deportes = Deporte::all();

        return view('estudiante.perfil')
        ->with('deportes', $deportes);
    }

    public function deporte_show(){

        $deportes = Deporte::all();

        return view('estudiante.deportes.show')
        ->with('deportes', $deportes);
    }
}
