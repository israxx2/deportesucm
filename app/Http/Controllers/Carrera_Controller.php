<?php

namespace App\Http\Controllers;
use App\carrera;

use Illuminate\Http\Request;

class Carrera_Controller extends Controller
{
    public function index()
    {
        $carrera= carrera::all();
        
        return view('carrera.index');
    }
}
