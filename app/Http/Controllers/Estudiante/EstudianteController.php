<?php

namespace App\Http\Controllers\Estudiante;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EstudianteController extends Controller
{
    public function inicio(){
        return view('estudiante.inicio');
    }

    public function perfil(){
        return view('estudiante.perfil');
    }
}
